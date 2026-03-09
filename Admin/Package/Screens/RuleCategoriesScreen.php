<?php

namespace Flute\Modules\Rules\Admin\Package\Screens;

use Flute\Admin\Platform\Actions\Button;
use Flute\Admin\Platform\Actions\DropDown;
use Flute\Admin\Platform\Actions\DropDownItem;
use Flute\Admin\Platform\Fields\Input;
use Flute\Admin\Platform\Fields\RichText;
use Flute\Admin\Platform\Fields\Sight;
use Flute\Admin\Platform\Fields\Toggle;
use Flute\Admin\Platform\Layouts\LayoutFactory;
use Flute\Admin\Platform\Repository;
use Flute\Admin\Platform\Screen;
use Flute\Admin\Platform\Support\Color;
use Flute\Modules\Rules\database\Entities\RuleCategory;
use Flute\Modules\Rules\Services\RuleCategoryServiceInterface;

class RuleCategoriesScreen extends Screen
{
    /**
     * @var array
     */
    public $categories = [];

    protected string $name = 'rules.admin.title.categories';

    protected ?string $description = 'rules.admin.title.categories_description';

    protected $permission = 'admin.rules';

    /**
     */
    protected RuleCategoryServiceInterface $categoryService;

    public function mount(): void
    {
        breadcrumb()->add(__('def.admin_panel'), url('/admin'))
            ->add(__('rules.admin.title.categories'));

        $this->categoryService = app(RuleCategoryServiceInterface::class);
        $this->loadCategories();
    }

    public function commandBar(): array
    {
        return [
            Button::make(__('def.add'))
                ->icon('ph.bold.plus-bold')
                ->type(Color::PRIMARY)
                ->modal('addCategoryModal'),
        ];
    }

    public function layout(): array
    {
        if (empty($this->categories)) {
            return [
                LayoutFactory::view('admin-rules::partials.empty-categories'),
            ];
        }

        $sortable = LayoutFactory::sortable('categories', [
            Sight::make('title', '')
                ->render(static fn (RuleCategory $category) => view('admin-rules::cells.category-title', compact('category'))),
            Sight::make('actions', '')
                ->render(
                    static fn (RuleCategory $category) => DropDown::make()
                        ->icon('ph.regular.dots-three-outline-vertical')
                        ->list([
                            DropDownItem::make(__('def.edit'))
                                ->modal('editCategoryModal', ['categoryId' => $category->id])
                                ->icon('ph.regular.pencil')
                                ->type(Color::OUTLINE_PRIMARY)
                                ->size('small')
                                ->fullWidth(),
                            DropDownItem::make(__('def.delete'))
                                ->confirm(__('rules.admin.messages.confirm_delete'))
                                ->method('deleteCategory', ['id' => $category->id])
                                ->icon('ph.regular.trash')
                                ->type(Color::OUTLINE_DANGER)
                                ->size('small')
                                ->fullWidth(),
                        ])
                ),
        ]);

        $sortable->onSortEnd('updateCategoryPositions');

        return [$sortable];
    }

    /**
     * Update category positions after sorting
     */
    public function updateCategoryPositions(): void
    {
        $sortableResult = json_decode(request()->input('sortableResult'), true);
        if (!$sortableResult) {
            $this->flashMessage(__('rules.admin.messages.invalid_sort_data'), 'danger');

            return;
        }

        $this->categoryService->updatePositions($sortableResult);

        orm()->getHeap()->clean();

        $this->loadCategories();
        $this->flashMessage(__('rules.admin.messages.categories_reordered'), 'success');
    }

    /**
     * Add Category Modal
     */
    public function addCategoryModal(Repository $parameters)
    {
        return LayoutFactory::modal($parameters, [
            LayoutFactory::field(
                Input::make('category_name')
                    ->type('text')
                    ->placeholder(__('rules.admin.placeholders.category_name'))
            )->label(__('rules.admin.fields.name'))
                ->required(),

            LayoutFactory::field(
                RichText::make('category_content')
                    ->placeholder(__('rules.admin.placeholders.content'))
            )->label(__('rules.admin.fields.content'))
                ->small(__('rules.admin.helps.content')),

            LayoutFactory::field(
                Toggle::make('category_active')
                    ->value(true)
            )->label(__('rules.admin.fields.active')),
        ])
            ->title(__('rules.admin.title.add_category'))
            ->size('lg')
            ->applyButton(__('def.add'))
            ->method('saveCategory');
    }

    /**
     * Edit Category Modal
     */
    public function editCategoryModal(Repository $parameters)
    {
        $categoryId = $parameters->get('categoryId');
        $category = RuleCategory::findByPK((int) $categoryId);

        if (!$category) {
            return LayoutFactory::modal($parameters, [
                __('rules.admin.messages.category_not_found'),
            ])
                ->title(__('rules.admin.messages.error'))
                ->withoutApplyButton();
        }

        return LayoutFactory::modal($parameters, [
            LayoutFactory::field(
                Input::make('category_id')
                    ->type('hidden')
                    ->value($category->id)
            ),

            LayoutFactory::field(
                Input::make('category_name')
                    ->type('text')
                    ->value($category->name)
                    ->placeholder(__('rules.admin.placeholders.category_name'))
            )->label(__('rules.admin.fields.name'))
                ->required(),

            LayoutFactory::field(
                RichText::make('category_content')
                    ->value($category->content)
                    ->placeholder(__('rules.admin.placeholders.content'))
            )->label(__('rules.admin.fields.content'))
                ->small(__('rules.admin.helps.content')),

            LayoutFactory::field(
                Toggle::make('category_active')
                    ->value($category->active)
            )->label(__('rules.admin.fields.active')),
        ])
            ->title(__('rules.admin.title.edit_category', ['category' => $category->name]))
            ->size('lg')
            ->applyButton(__('def.save'))
            ->method('saveCategory');
    }

    /**
     * Save a category
     */
    public function saveCategory(): void
    {
        $categoryId = request()->input('category_id');
        $isNew = empty($categoryId);

        if ($isNew) {
            $category = new RuleCategory();
        } else {
            $category = $this->categoryService->getById((int) $categoryId);

            if (!$category) {
                $this->flashMessage(__('rules.admin.messages.category_not_found'), 'danger');

                return;
            }
        }

        $name = request()->input('category_name');

        if (empty($name)) {
            $this->flashMessage(__('rules.admin.messages.name_required'), 'danger');

            return;
        }

        $category->name = $name;
        $category->content = request()->input('category_content');
        $category->active = filter_var(request()->input('category_active'), FILTER_VALIDATE_BOOLEAN);

        $this->categoryService->save($category);
        $this->loadCategories();

        if ($isNew) {
            $this->flashMessage(__('rules.admin.messages.category_created'), 'success');
        } else {
            $this->flashMessage(__('rules.admin.messages.category_updated'), 'success');
        }

        $this->closeModal();
    }

    /**
     * Delete a category
     */
    public function deleteCategory(): void
    {
        $id = (int) request()->input('id');
        $category = $this->categoryService->getById($id);

        if (!$category) {
            $this->flashMessage(__('rules.admin.messages.category_not_found'), 'danger');

            return;
        }

        $name = $category->name;

        if (!empty($category->children)) {
            $this->flashMessage(__('rules.admin.messages.category_has_children'), 'danger');

            return;
        }

        if ($this->categoryService->delete($id)) {
            $this->loadCategories();
            $this->flashMessage(__('rules.admin.messages.category_deleted', ['category' => $name]), 'success');
        } else {
            $this->flashMessage(__('rules.admin.messages.delete_error'), 'danger');
        }
    }

    /**
     * Load categories
     */
    protected function loadCategories(): void
    {
        $this->categories = $this->categoryService->getAll(true);
    }
}
