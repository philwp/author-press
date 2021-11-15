function initializeBlock() {
  jQuery(".slider").slick({
    //aria-label for region
    regionLabel: "Reviews carousel",

    //add navigation dots
    dots: true,

    //customize screen reader text
    nextArrow:
      '<button class="slick-next slick-arrow"><span class="slick-next-icon" aria-hidden="true"></span><span class="slick-sr-only">Next Review</span></button>',

    //customize screen reader text
    prevArrow:
      '<button class="slick-prev slick-arrow"><span class="slick-prev-icon" aria-hidden="true"></span><span class="slick-sr-only">Previous Review</span></button>',
  });
}

jQuery(document).ready(function () {
  initializeBlock();
});

if (window.acf) {
  window.acf.addAction("render_block_preview/type=reviews", initializeBlock);
}
