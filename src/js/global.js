{
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

  const slickInit = () => {
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
    initMasonry();
    slickInit();
  }

    init();
}
