function watchSection(sectionId, sectionVisible, toggleClass) {
    var targetSection = document.getElementById(sectionId);
    var sectionVisible = document.getElementById(sectionVisible);

    let wasVisible = true;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {

            // Scrolled past section
            if (!entry.isIntersecting && wasVisible) {
                
                sectionVisible.classList.add(toggleClass);
                wasVisible = false;
            }

            // Back in view
            if (entry.isIntersecting && !wasVisible) {

                sectionVisible.classList.remove(toggleClass);
                wasVisible = true;
            }

        });
    }, {
        threshold: 0
    });

    observer.observe(targetSection);
}

watchSection(
    "searchBar",
    "desktopSearch",
    "searchBarActive"
);