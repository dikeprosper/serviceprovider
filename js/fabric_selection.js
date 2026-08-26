document.addEventListener('DOMContentLoaded', function () {


    const PAGE_SIZE = 20; // adjust per section if needed

    const gridConfigs = [
        { grid: document.getElementById('first-fits-grid'), pagination: document.getElementById('first-fits-pagination'), page: 1 },
        { grid: document.getElementById('other-fits-grid'), pagination: document.getElementById('other-fits-pagination'), page: 1 }
    ].filter(cfg => cfg.grid);

    const filterButtons = document.querySelectorAll('.filter-btn');

    function normalize(str) {
        return (str || '').trim().toLowerCase();
    }

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const targetCat = this.dataset.filterCat;

            gridConfigs.forEach(cfg => {
                cfg.currentFilter = targetCat;
                cfg.page = 1; // reset to page 1 whenever the filter changes
                applyFilterAndPage(cfg);
            });
        });
    });

    function applyFilterAndPage(cfg) {
        const items = Array.from(cfg.grid.children);
        const targetCat = cfg.currentFilter || 'all';

        // FLIP: record First positions of currently visible items
        const firstRects = new Map();
        items.forEach(item => {
            if (!item.classList.contains('is-hidden')) {
                firstRects.set(item, item.getBoundingClientRect());
            }
        });

        // determine which items match the category filter
        const matching = items.filter(item =>
            targetCat === 'all' || normalize(item.dataset.category) === normalize(targetCat)
        );

        const totalPages = Math.max(1, Math.ceil(matching.length / PAGE_SIZE));
        cfg.page = Math.min(cfg.page, totalPages);

        const pageStart = (cfg.page - 1) * PAGE_SIZE;
        const pageEnd = pageStart + PAGE_SIZE;
        const visibleThisPage = new Set(matching.slice(pageStart, pageEnd));

        items.forEach(item => {
            const shouldShow = visibleThisPage.has(item);
            item.classList.toggle('is-hidden', !shouldShow);
        });

        // Last positions, then Invert + Play
        items.forEach(item => {
            if (item.classList.contains('is-hidden')) return;

            const first = firstRects.get(item);
            if (!first) return; // newly shown item, no prior position to animate from

            const last = item.getBoundingClientRect();
            const deltaX = first.left - last.left;
            const deltaY = first.top - last.top;

            if (deltaX || deltaY) {
                item.style.transition = 'none';
                item.style.transform = `translate(${deltaX}px, ${deltaY}px)`;

                requestAnimationFrame(() => {
                    item.style.transition = 'transform 0.3s ease';
                    item.style.transform = '';
                });
            }
        });

        renderPaginationControls(cfg, totalPages);
    }

    function renderPaginationControls(cfg, totalPages) {
        cfg.pagination.innerHTML = '';

        if (totalPages <= 1) return; // no controls needed for a single page

        for (let i = 1; i <= totalPages; i++) {
            const pageBtn = document.createElement('button');
            pageBtn.type = 'button';
            pageBtn.textContent = i;
            pageBtn.className = 'btn btn-fade fs-7 rounded-5 page-btn' + (i === cfg.page ? ' active' : '');

            pageBtn.addEventListener('click', function () {
                cfg.page = i;
                applyFilterAndPage(cfg);
            });

            cfg.pagination.appendChild(pageBtn);
        }
    }

    // initial render — "all" filter, page 1
    gridConfigs.forEach(cfg => {
        cfg.currentFilter = 'all';
        applyFilterAndPage(cfg);
    });

});