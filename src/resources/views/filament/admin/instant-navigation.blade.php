<style>
/* Hilangkan seluruh animasi loading bar dan spinner di panel agar navigasi terasa instan murni */
#nprogress,
.nprogress-busy,
.nprogress-container,
.fi-loading-indicator,
.fi-topbar-loading-indicator,
[wire\:loading],
[wire\:loading\.delay] {
    display: none !important;
    opacity: 0 !important;
    visibility: hidden !important;
    height: 0 !important;
    width: 0 !important;
    pointer-events: none !important;
}

/* Transisi konten halaman instan dan mulus */
.fi-main {
    transition: opacity 0.08s ease-in-out;
}
</style>

<script>
(function() {
    // Nonaktifkan NProgress jika ada agar tidak memunculkan bar loading
    if (window.NProgress) {
        window.NProgress.configure({ showSpinner: false, minimum: 1 });
        window.NProgress.start = function() {};
        window.NProgress.done = function() {};
    }

    // Prefetching agresif saat kursor menyentuh menu sidebar
    const prefetchedUrls = new Set();
    
    function prefetchUrl(url) {
        if (!url || url.startsWith('#') || url.startsWith('javascript:') || url === window.location.href || prefetchedUrls.has(url)) {
            return;
        }
        prefetchedUrls.add(url);
        
        // Browser speculative prefetch
        const link = document.createElement('link');
        link.rel = 'prefetch';
        link.href = url;
        link.as = 'document';
        document.head.appendChild(link);

        if (window.fetch) {
            fetch(url, { priority: 'low', credentials: 'same-origin' }).catch(function() {});
        }
    }

    document.addEventListener('mouseover', function(e) {
        const target = e.target.closest('.fi-sidebar a[href], .fi-topbar a[href]');
        if (target) {
            prefetchUrl(target.getAttribute('href'));
        }
    }, { passive: true });
})();
</script>
