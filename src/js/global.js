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

  const sizesInit = () => {
    if (window.jQuery){
      const $slider = jQuery('.sizes-container');
      if ($slider.length) {
        $slider.slick({
          infinite: false,
          nextArrow: `<button type="button" class="slick-next">${localize.nextArrow}</button>`,
          prevArrow: `<button type="button" class="slick-prev">${localize.prevArrow}</button>`,
        })
      }
    }
  }
    
  const init = () => {
    bannerInit();
    initMasonry();
    sizesInit();
  }

    init();
}
