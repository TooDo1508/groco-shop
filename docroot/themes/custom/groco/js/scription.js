


// (function($, window, Drupal, drupalSettings) {

// Drupal.behaviors.test = {
  // attach(context) {
  //   console.log( "read3y!" )
  //   // Create only one aria-live element.
  //   jQuery( document ).ready(function() {
  //     console.log( "ready!" );
  //     jQuery('.slide_product').slick({
  //       infinite: true,
  //       slidesToShow: 3,
  //       slidesToScroll: 3
  //     });
  // });
//   },
// };

// })(jQuery, window, Drupal, drupalSettings)


jQuery('.slide_product').slick({
  loop:true,
    slidesToShow: 3,
    rows: 2 ,
    slidesToScroll: 1,
    slidesRow:2,
    dots: false,
    prevArrow: false,
    nextArrow: false,
    infinite: false,
    spaceBetween: 20,
    autoplay:{
        delay:3000,
        disableOnInteraction:false,
    },
   
    breakpoints: {
      0: {
        slidesPerView: 1,
        
      },
      768: {
        slidesPerView: 2,
      
      },
      1024: {
        slidesPerView: 3,
        
      },
    },
});
