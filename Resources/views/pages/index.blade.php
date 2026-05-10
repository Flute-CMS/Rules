@extends('flute::layouts.app')

@push('head')
    @at(mm('Rules', 'Resources/assets/js/rules.js'))
@endpush

@push('content')
    <section class="container">
        <x-legend title="{{ __('rules.page_title') }}" description="{{ __('rules.page_description') }}"></x-legend>

        @if (count($categories) > 0)
            <div @class([
                'rules-layout',
                'rules-layout-single' => count($categories) === 1 && empty($categories[0]->children),
            ])>
                @if (count($categories) > 1 || !empty($categories[0]->children))
                    <aside class="rules-sidebar">
                        <div class="rules-sidebar__header">
                            <div class="rules-sidebar__title">
                                <x-icon path="ph.regular.shield-check" />
                                <span>{{ __('rules.page_title') }}</span>
                            </div>
                            <span class="rules-sidebar__count">{{ count($categories) }}</span>
                        </div>

                        <nav class="rules-categories">
                            @foreach ($categories as $index => $category)
                                @php
                                    $isActive =
                                        ($firstCategory && $firstCategory->id === $category->id) ||
                                        ($index === 0 && !$firstCategory);
                                    $hasActiveChild = false;
                                    if (!empty($category->children)) {
                                        foreach ($category->children as $child) {
                                            if ($firstCategory && $firstCategory->id === $child->id) {
                                                $hasActiveChild = true;
                                                break;
                                            }
                                        }
                                    }
                                    $shouldExpand = $hasActiveChild || ($isActive && !empty($category->children));
                                @endphp

                                <div class="rule-tab-container"
                                     data-category-id="{{ $category->id }}"
                                     @if ($shouldExpand) data-expanded="true" @endif>

                                    <button class="rule-tab {{ $isActive ? 'rule-tab-active' : '' }} {{ $hasActiveChild ? 'rule-tab-parent-active' : '' }}"
                                        hx-get="{{ url('/rules/' . $category->slug) }}"
                                        hx-push-url="true"
                                        hx-target="#rule-content"
                                        hx-swap="innerHTML"
                                        onclick="handleCategoryClick(this, '{{ $category->slug }}')"
                                        data-category-slug="{{ $category->slug }}"
                                        data-category-id="{{ $category->id }}">

                                        <span class="rule-tab-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>

                                        <span class="rule-tab-text">{{ __($category->name) }}</span>

                                        @if (!empty($category->children))
                                            <span class="rule-tab-toggle" onclick="toggleRuleCategory(event, this)">
                                                <x-icon path="ph.regular.caret-right" class="toggle-icon" />
                                            </span>
                                        @endif
                                    </button>

                                    @if (!empty($category->children))
                                        <div class="rule-tab-children">
                                            @foreach ($category->children as $childIndex => $child)
                                                <button
                                                    class="rule-tab rule-tab-child {{ $firstCategory && $firstCategory->id === $child->id ? 'rule-tab-active' : '' }}"
                                                    hx-get="{{ url('/rules/' . $child->slug) }}"
                                                    hx-push-url="true"
                                                    hx-target="#rule-content"
                                                    hx-swap="innerHTML"
                                                    onclick="handleCategoryClick(this, '{{ $child->slug }}')"
                                                    data-category-slug="{{ $child->slug }}"
                                                    data-category-id="{{ $child->id }}">
                                                    <span class="rule-tab-child-dot"></span>
                                                    {{ __($child->name) }}
                                                </button>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </nav>
                    </aside>
                @endif

                <main class="rules-content">
                    <div id="rule-content">
                        @if ($firstCategory)
                            @include('rules::partials.category-content', ['category' => $firstCategory])
                        @endif
                    </div>
                </main>
            </div>
        @else
            <div class="no-rules">
                <x-icon path="ph.regular.book-open" class="no-rules-icon" />
                <p>{{ __('rules.no_categories') }}</p>
            </div>
        @endif
    </section>
@endpush
