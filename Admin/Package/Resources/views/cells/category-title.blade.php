<div class="category-title">
    <div class="category-info">
        <h4 class="category-name">{{ $category->name }}</h4>
        <div class="category-status {{ $category->active ? 'is-active' : 'is-inactive' }}">
            <span class="status-dot"></span>
            <span>{{ $category->active ? __('rules.admin.status.active') : __('rules.admin.status.inactive') }}</span>
        </div>
    </div>
</div>
