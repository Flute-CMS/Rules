/**
 * Rules Module - Fast & Minimal JavaScript
 * Optimized for instant response and smooth UX
 */

(function() {
    'use strict';

    let currentSlug = null;
    let initialized = false;

    /**
     * Initialize rules module
     */
    function init() {
        if (initialized) return;

        // Get current slug from URL
        currentSlug = getSlugFromUrl();

        // Initialize expanded states immediately (no animation on load)
        initExpandedStates();

        // Set active tab from URL
        if (currentSlug) {
            setActiveBySlug(currentSlug, false);
        }

        initialized = true;
    }

    /**
     * Extract slug from current URL
     */
    function getSlugFromUrl() {
        const path = window.location.pathname;
        const match = path.match(/^\/rules\/?(.*)$/);
        return match ? match[1].replace(/\/$/, '') : '';
    }

    /**
     * Initialize pre-expanded categories without animation
     */
    function initExpandedStates() {
        document.querySelectorAll('.rule-tab-container[data-expanded="true"]').forEach(container => {
            const children = container.querySelector('.rule-tab-children');
            const icon = container.querySelector('.toggle-icon');

            if (children) {
                children.style.display = 'flex';
                children.style.opacity = '1';
            }

            if (icon) {
                icon.style.transform = 'rotate(90deg)';
            }
        });
    }

    /**
     * Handle category click - called from onclick
     */
    window.handleCategoryClick = function(button, slug) {
        if (currentSlug === slug) return;

        currentSlug = slug;
        setActiveTab(button);

        // Auto-expand parent if clicking a parent with children
        const container = button.closest('.rule-tab-container');
        if (container && container.querySelector('.rule-tab-children')) {
            if (container.dataset.expanded !== 'true') {
                expandCategory(container);
            }
        }
    };

    /**
     * Toggle category expand/collapse
     */
    window.toggleRuleCategory = function(event, toggle) {
        event.stopPropagation();
        event.preventDefault();

        const container = toggle.closest('.rule-tab-container');
        if (!container) return;

        const isExpanded = container.dataset.expanded === 'true';

        if (isExpanded) {
            collapseCategory(container);
        } else {
            expandCategory(container);
        }
    };

    /**
     * Set active tab visually
     */
    function setActiveTab(button) {
        // Remove all active states
        document.querySelectorAll('.rule-tab').forEach(tab => {
            tab.classList.remove('rule-tab-active', 'rule-tab-parent-active');
        });

        // Set new active
        button.classList.add('rule-tab-active');

        // If child tab, mark parent as active too
        if (button.classList.contains('rule-tab-child')) {
            const container = button.closest('.rule-tab-container');
            const parentTab = container?.querySelector('.rule-tab:not(.rule-tab-child)');
            if (parentTab) {
                parentTab.classList.add('rule-tab-parent-active');
            }
        }
    }

    /**
     * Set active by slug
     */
    function setActiveBySlug(slug, animate = true) {
        const button = document.querySelector(`[data-category-slug="${slug}"]`);
        if (!button) return;

        setActiveTab(button);

        // Expand parent if child is active
        if (button.classList.contains('rule-tab-child')) {
            const container = button.closest('.rule-tab-container');
            if (container && container.dataset.expanded !== 'true') {
                if (animate) {
                    expandCategory(container);
                } else {
                    // Instant expand without animation
                    const children = container.querySelector('.rule-tab-children');
                    const icon = container.querySelector('.toggle-icon');

                    container.dataset.expanded = 'true';

                    if (children) {
                        children.style.display = 'flex';
                        children.style.opacity = '1';
                    }

                    if (icon) {
                        icon.style.transform = 'rotate(90deg)';
                    }
                }
            }
        }
    }

    /**
     * Expand category - fast animation
     */
    function expandCategory(container) {
        const children = container.querySelector('.rule-tab-children');
        const icon = container.querySelector('.toggle-icon');

        if (!children) return;

        container.dataset.expanded = 'true';

        // Show children with fast animation
        children.style.display = 'flex';
        children.style.overflow = 'hidden';
        children.style.height = '0px';
        children.style.opacity = '0';

        // Force reflow
        children.offsetHeight;

        // Animate
        children.style.transition = 'height 0.15s ease, opacity 0.15s ease';
        children.style.height = children.scrollHeight + 'px';
        children.style.opacity = '1';

        // Rotate icon
        if (icon) {
            icon.style.transform = 'rotate(90deg)';
        }

        // Cleanup after animation
        setTimeout(() => {
            children.style.height = 'auto';
            children.style.overflow = '';
            children.style.transition = '';
        }, 150);
    }

    /**
     * Collapse category - fast animation
     */
    function collapseCategory(container) {
        const children = container.querySelector('.rule-tab-children');
        const icon = container.querySelector('.toggle-icon');

        if (!children) return;

        container.dataset.expanded = 'false';

        // Get current height
        const height = children.scrollHeight;
        children.style.height = height + 'px';
        children.style.overflow = 'hidden';

        // Force reflow
        children.offsetHeight;

        // Animate
        children.style.transition = 'height 0.15s ease, opacity 0.15s ease';
        children.style.height = '0px';
        children.style.opacity = '0';

        // Rotate icon
        if (icon) {
            icon.style.transform = 'rotate(0deg)';
        }

        // Hide after animation
        setTimeout(() => {
            children.style.display = 'none';
            children.style.transition = '';
            children.style.overflow = '';
        }, 150);
    }

    /**
     * Handle HTMX content swap
     */
    document.addEventListener('htmx:afterSettle', function(event) {
        if (event.target.id !== 'rule-content') return;

        const newSlug = getSlugFromUrl();

        if (newSlug && newSlug !== currentSlug) {
            currentSlug = newSlug;
            setActiveBySlug(newSlug);
        }
    });

    /**
     * Handle browser back/forward
     */
    window.addEventListener('popstate', function() {
        const slug = getSlugFromUrl();

        if (slug !== currentSlug) {
            currentSlug = slug;
            if (slug) {
                setActiveBySlug(slug);
            }
        }
    });

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
