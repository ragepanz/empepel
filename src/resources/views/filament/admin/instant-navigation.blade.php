<script>
/**
 * Instant SPA Navigation with Hover Prefetching
 * Memungkinkan navigasi sidebar instan (0 detik) saat diklik karena data sudah di-prefetch saat mouse hover.
 */
(function() {
    function initHoverPrefetch() {
        const links = document.querySelectorAll('.fi-sidebar a[href], .fi-topbar a[href]');
        links.forEach(function(link) {
            const href = link.getAttribute('href');
            if (href && !href.startsWith('#') && !href.startsWith('javascript:') && !link.hasAttribute('wire:navigate.hover')) {
                link.setAttribute('wire:navigate.hover', '');
            }
        });
    }

    // Prefetch link saat kursor diarahkan ke menu sidebar (hover)
    document.addEventListener('mouseover', function(e) {
        const link = e.target.closest('.fi-sidebar a[href], .fi-topbar a[href]');
        if (!link) return;
        const href = link.getAttribute('href');
        if (!href || href.startsWith('#') || href.startsWith('javascript:') || href === window.location.href) return;
        if (link.dataset.hasPrefetched) return;

        link.dataset.hasPrefetched = 'true';

        // Browser link prefetch
        const prefetcher = document.createElement('link');
        prefetcher.rel = 'prefetch';
        prefetcher.href = href;
        prefetcher.as = 'document';
        document.head.appendChild(prefetcher);
    }, { passive: true });

    // Inisialisasi saat load dan setiap selesai SPA navigation
    document.addEventListener('DOMContentLoaded', initHoverPrefetch);
    document.addEventListener('livewire:navigated', initHoverPrefetch);
    document.addEventListener('alpine:init', initHoverPrefetch);
})();
</script>
