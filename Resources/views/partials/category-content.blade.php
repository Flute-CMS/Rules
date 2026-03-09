<div class="rule-category-content">
    <h2>{{ __($category->name) }}</h2>

    @if ($category->content)
        <div class="rule-content-body">
            {!! markdown()->parse($category->content, false) !!}
        </div>

        <div class="rule-content-changed">
            <x-icon path="ph.regular.clock" />
            <span>{{ __('rules.content_changed', [':date' => $category->updatedAt->format(default_date_format())]) }}</span>
        </div>
    @else
        <div class="no-content">
            <x-icon path="ph.regular.file-text" class="no-content-icon" />
            <p>{{ __('rules.no_content') }}</p>
        </div>
    @endif
</div>
