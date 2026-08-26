document.addEventListener('DOMContentLoaded', function() {
    // Get all filter elements and sort button
    const filterElements = document.querySelectorAll('[data-id]');
    const sortButton = document.querySelector('.sort-btn');
    const clearButtons = document.querySelectorAll('.btn-clear');
    const paginationContainer = document.querySelector('.pagination-container');
    
    let currentFilters = {};
    let currentPage = 1;

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