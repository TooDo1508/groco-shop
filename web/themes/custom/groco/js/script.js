

jQuery('.slide_product').slick({
  loop:true,
    slidesToShow: 3,
    rows: 2 ,
    slidesToScroll: 1,
    slidesRow:2,
    dots: false,
    prevArrow: false,
    nextArrow: false,
    infinite: true,
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

