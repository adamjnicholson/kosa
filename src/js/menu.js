{
    const menuEls = {
        fixedHeader: document.querySelector('.fixed-header'),
        hamburger: document.getElementById('hamburger'),
        mobileMenu: document.getElementById('mobile-menu-container')
    }

    const toggleMenu = () => {
        menuEls.mobileMenu.style.paddingTop = menuEls.fixedHeader.clientHeight + 'px';
        menuEls.hamburger.classList.toggle('active');
        menuEls.mobileMenu.classList.toggle('active');
    }

    const closeMenu = () => {
        if (window.innerWidth > 768) {
            menuEls.hamburger.classList.remove('active');
            menuEls.mobileMenu.classList.remove('active');
        }
    }

    // const smallMenu = () => {
    //     if (window.pageYOffset > menuEls.header.clientHeight) {
    //         menuEls.header.classList.add('small-header');
    //     } else {
    //         menuEls.header.classList.remove('small-header');
    //     }
    // }

    const init = () => {
        //Event Listeners
        menuEls.hamburger.addEventListener('click', toggleMenu);
        window.addEventListener('resize', closeMenu);
        // window.addEventListener('scroll', smallMenu);
        
        // smallMenu();
    }

    init();
}