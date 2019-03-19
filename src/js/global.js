{
  const bannerInit = () => {
    const $banner = jQuery('#page-banner .page-banner-inner');
    if ($banner.children().length > 1) {
      $banner.slick({
        autoplay: true,
        arrows: false,
        dots: true
      });
    }
  }
  const initMasonry = () => {
    const grid = document.querySelector('#attributes > .row');
    if (grid !== null) {
      const msnry = new Masonry(grid, {
        itemSelector: '.attribute',
        columnWidth: '.attribute',
        percentPosition: true
      });
    }
  }

  const sizesInit = (call) => {
    if ($slider.length && !$slider.hasClass('slick-initialized')) {
      $slider.slick({
        infinite: false,
        nextArrow: `<button type="button" class="slick-next">${localize.nextArrow}</button>`,
        prevArrow: `<button type="button" class="slick-prev">${localize.prevArrow}</button>`,
        responsive: [
          {
            breakpoint: 550,
            settings: "unslick"
          },
          
        ]
      })
    }
  }
    
  const init = () => {
    bannerInit();
    initMasonry();
    sizesInit('3');
  }

  let $slider = window.jQuery ? jQuery('.sizes-container') : null;

  window.addEventListener('resize', sizesInit.bind(this, '1'));
  window.addEventListener('orientationchange', sizesInit.bind(this, '2'));

    init();
}
