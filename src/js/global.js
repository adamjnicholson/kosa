{
    const searchEls = {
        searchContainer: document.querySelector('.icon-menu .search-container'),
        searchIcon: document.querySelector('.icon-menu .search-icon-container'),
        searchInput: document.querySelector('.icon-menu form.search-form .search-field')
    }

    const toggleSiteSearch = e => {
        searchEls.searchContainer.classList.toggle('active');
        if ( searchEls.searchContainer.classList.contains('active')) {
            searchEls.searchInput.focus()
        }
    }

    const closeSiteSearch = () => {
        if (window.innerWidth < 768) {
            searchEls.searchContainer.classList.remove('active');
        }
    }
    
    const init = () => {
        searchEls.searchIcon.addEventListener('click', toggleSiteSearch);
        window.addEventListener('resize', closeSiteSearch);
    }

    init();
}
