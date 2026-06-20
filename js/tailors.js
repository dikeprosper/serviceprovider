document.addEventListener('DOMContentLoaded', function() {
    // Get all filter elements and sort button
    const filterElements = document.querySelectorAll('[data-id]');
    const sortButton = document.querySelector('.sort-btn');
    const clearButtons = document.querySelectorAll('.btn-clear');
    const paginationContainer = document.querySelector('.pagination-container');
    
    let currentFilters = {};
    let currentPage = 1;

    // ===== PRICE RANGE SLIDER HANDLING =====

    const MIN_VAL = 10000;
    const MAX_VAL = 50000;
    const GAP     = 10000;
    const STEP    = 1000;

    let priceMin  = MIN_VAL;
    let priceMax  = MAX_VAL;
    let sortOrder = null;

    const track      = document.getElementById('priceTrack');
    const fill       = document.getElementById('priceFill');
    const thumbMin   = document.getElementById('thumbMin');
    const thumbMax   = document.getElementById('thumbMax');
    const minDisplay = document.getElementById('priceMinDisplay');
    const maxDisplay = document.getElementById('priceMaxDisplay');
    const btnLow     = document.getElementById('btnLowToHigh');
    const btnHigh    = document.getElementById('btnHighToLow');

    if (!track || !fill || !thumbMin || !thumbMax || !minDisplay || !maxDisplay) {
        console.warn('Price range: one or more elements not found.');
        return;
    }

    function fmt(n) {
        return '₦' + Math.round(n).toLocaleString('en-NG');
    }

    function pct(val) {
        return ((val - MIN_VAL) / (MAX_VAL - MIN_VAL)) * 100;
    }

    function render() {
        const pMin = pct(priceMin);
        const pMax = pct(priceMax);
        thumbMin.style.left  = pMin + '%';
        thumbMax.style.left  = pMax + '%';
        fill.style.left      = pMin + '%';
        fill.style.right     = (100 - pMax) + '%';
        minDisplay.textContent = fmt(priceMin);
        maxDisplay.textContent = fmt(priceMax);
    }

    function valFromEvent(e) {
        const rect    = track.getBoundingClientRect();
        const clientX = e.touches ? e.touches[0].clientX : e.clientX;
        const ratio   = Math.min(1, Math.max(0, (clientX - rect.left) / rect.width));
        return Math.round((MIN_VAL + ratio * (MAX_VAL - MIN_VAL)) / STEP) * STEP;
    }

    function makeDraggable(thumb, isMin) {
        function onMove(e) {
            e.preventDefault();
            const v = valFromEvent(e);
            if (isMin) {
                priceMin = Math.max(Math.min(v, priceMax - GAP), MIN_VAL);
            } else {
                priceMax = Math.min(Math.max(v, priceMin + GAP), MAX_VAL);
            }
            render();
        }
        function onUp() {
            document.removeEventListener('mousemove', onMove);
            document.removeEventListener('mouseup', onUp);
            document.removeEventListener('touchmove', onMove);
            document.removeEventListener('touchend', onUp);
        }
        thumb.addEventListener('mousedown', function (e) {
            e.preventDefault();
            document.addEventListener('mousemove', onMove);
            document.addEventListener('mouseup', onUp);
        });
        thumb.addEventListener('touchstart', function () {
            document.addEventListener('touchmove', onMove, { passive: false });
            document.addEventListener('touchend', onUp);
        });
        thumb.addEventListener('keydown', function (e) {
            const step = 5000;
            if (e.key === 'ArrowRight' || e.key === 'ArrowUp') {
                isMin
                    ? (priceMin = Math.min(priceMin + step, priceMax - GAP))
                    : (priceMax = Math.min(priceMax + step, MAX_VAL));
                render(); e.preventDefault();
            }
            if (e.key === 'ArrowLeft' || e.key === 'ArrowDown') {
                isMin
                    ? (priceMin = Math.max(priceMin - step, MIN_VAL))
                    : (priceMax = Math.max(priceMax - step, priceMin + GAP));
                render(); e.preventDefault();
            }
        });
    }

    makeDraggable(thumbMin, true);
    makeDraggable(thumbMax, false);

    // Sort buttons
    btnLow.addEventListener('click', function () {
        sortOrder = 'low';
        btnLow.classList.add('active');
        btnHigh.classList.remove('active');
    });

    btnHigh.addEventListener('click', function () {
        sortOrder = 'high';
        btnLow.classList.remove('active');
        btnHigh.classList.add('active');
    });

    // Clear button resets price range and sort
    document.querySelector('.btn-clear[data-group="price"]').addEventListener('click', function () {
        priceMin  = MIN_VAL;
        priceMax  = MAX_VAL;
        sortOrder = null;
        btnLow.classList.remove('active');
        btnHigh.classList.remove('active');
        render();
    });

    render();

    // Expose values globally so other scripts can read them anytime
    window.getPriceFilter = function () {
        return { priceMin, priceMax, sortOrder };
    };


    // ======================================

    // Add click listener to all filter elements
    filterElements.forEach(element => {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get the data-id (type) of the clicked element
            const dataId = this.getAttribute('data-id');
            
            // Get the container to add selected class to (button or parent div)
            const container = this.tagName === 'BUTTON' ? this : this.parentElement;
            
            // Remove selected class from all elements with the same data-id and their containers
            document.querySelectorAll(`[data-id="${dataId}"]`).forEach(el => {
                const elContainer = el.tagName === 'BUTTON' ? el : el.parentElement;
                elContainer.classList.remove('selected');
            });
            
            // Add selected class to the clicked element's container
            container.classList.add('selected');
        });
    });

    // Add click listener to clear buttons
    clearButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get the data-group attribute to identify which group to clear
            const group = this.getAttribute('data-group');
            
            // Remove selected class from all elements in this group
            document.querySelectorAll(`[data-id="${group}"]`).forEach(element => {
                const container = element.tagName === 'BUTTON' ? element : element.parentElement;
                container.classList.remove('selected');
            });
        });
    });

    // Function to fetch and display providers
    function fetchProviders(page = 1) {
        currentPage = page;
        
        // Collect filter data
        const filterData = { page: page };
        document.querySelectorAll('[data-id]').forEach(element => {
            const container = element.tagName === 'BUTTON' ? element : element.parentElement;
            
            if (container.classList.contains('selected')) {
                const type = element.getAttribute('data-id');
                const value = element.getAttribute('data-value');
                
                if (!filterData[type]) {
                    filterData[type] = [];
                }
                filterData[type].push(value);
            }
        });

        // Add price range if available
        filterData.priceMin  = priceMin;
        filterData.priceMax  = priceMax;
        filterData.sortOrder = sortOrder;
        
        currentFilters = filterData;
        
        // Send filters to tailor_action.php via AJAX
        fetch(siteUrl+'tailor_action.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(filterData)
        })
        .then(response => response.json())
        .then(data => {
            // Update the providers container with filtered results
            document.getElementById('providers-container').innerHTML = data.html;
            
            // Update pagination
            updatePagination(data.currentPage, data.totalPages);
            
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error filtering providers. Please try again.');
        });
    }

    // Function to update pagination buttons
    function updatePagination(currentPage, totalPages) {
        const paginationContainer = document.querySelector('.pagination-container');
        if (!paginationContainer) return;
        
        let paginationHTML = '<button class="btn btn-light pagination-prev">‹</button>';
        
        // Determine which pages to show
        const maxPageButtons = 5; // Maximum page buttons to display (excluding prev/next)
        let startPage = 1;
        let endPage = totalPages;
        
        if (totalPages > maxPageButtons) {
            // Show pages around current page
            startPage = Math.max(1, currentPage - 2);
            endPage = Math.min(totalPages, currentPage + 2);
            
            // Adjust if at beginning
            if (currentPage <= 3) {
                endPage = Math.min(totalPages, maxPageButtons);
            }
            
            // Adjust if at end
            if (currentPage > totalPages - 3) {
                startPage = Math.max(1, totalPages - maxPageButtons + 1);
            }
        }
        
        // Show first page if not in range
        if (startPage > 1) {
            const isActive = 1 === currentPage ? 'btn-primary' : 'btn-light';
            paginationHTML += `<button class="btn ${isActive} pagination-number" data-page="1">1</button>`;
            
            if (startPage > 2) {
                paginationHTML += '<span class="px-2">...</span>';
            }
        }
        
        // Show range of pages
        for (let i = startPage; i <= endPage; i++) {
            const isActive = i === currentPage ? 'btn-primary' : 'btn-light';
            paginationHTML += `<button class="btn ${isActive} pagination-number" data-page="${i}">${i}</button>`;
        }
        
        // Show last page if not in range
        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                paginationHTML += '<span class="px-2">...</span>';
            }
            
            const isActive = totalPages === currentPage ? 'btn-primary' : 'btn-light';
            paginationHTML += `<button class="btn ${isActive} pagination-number" data-page="${totalPages}">${totalPages}</button>`;
        }
        
        paginationHTML += '<button class="btn btn-light pagination-next">›</button>';
        
        paginationContainer.innerHTML = paginationHTML;
        
        // Add click listeners to pagination buttons
        document.querySelectorAll('.pagination-number').forEach(btn => {
            btn.addEventListener('click', function() {
                const page = parseInt(this.getAttribute('data-page'));
                fetchProviders(page);
            });
        });
        
        // Previous button
        document.querySelector('.pagination-prev').addEventListener('click', function() {
            if (currentPage > 1) {
                fetchProviders(currentPage - 1);
            }
        });
        
        // Next button
        document.querySelector('.pagination-next').addEventListener('click', function() {
            if (currentPage < totalPages) {
                fetchProviders(currentPage + 1);
            }
        });
    }

    // Handle Sort button click
    if (sortButton) {
        sortButton.addEventListener('click', function(e) {
            fetchProviders(1); // Reset to page 1 when filtering
            sortButton.parentElement.style.transform = "scale(0)";  // close the sort options
        });
    }
    
    // Initialize pagination on page load
    fetchProviders(1);
});
