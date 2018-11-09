jQuery(function($) {
  var action = "venta";
  var currency = "dop";

  var rent_max_price_usd = 10000;
  var sale_max_price_usd = 1000000;

  var rent_max_price_dop = 500000;
  var sale_max_price_dop = 50000000;

  updateSearchInputs(currency, action);

  // Offcanvas Search
  jQuery('.offcanvas-search-toggler').on('click', function () {
    jQuery('.offcanvas-search').toggleClass('open');
    jQuery(this).toggleClass('open');
    jQuery('body').toggleClass('search-open');
  });



  jQuery('.advanced-search a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    e.target // newly activated tab
    e.relatedTarget // previous active tab

    action = jQuery(e.target).data("type");
    currency = jQuery(".advanced-search form #currency").val();

    updateSearchInputs(currency, action)

    jQuery(".advanced-search form #action").val(action);

  });

  jQuery('.advanced-search #currency').on('change', function(e) {
    updateSearchInputs(jQuery(e.target).val(), action)
  });

  function updateSearchInputs(currency, action) {
    console.log('currency', currency)
    console.log('action', action);

    if(currency == "usd") {
      jQuery( "#price_currency_from, #price_currency_to" ).html('US$');
    }else{
      jQuery( "#price_currency_from, #price_currency_to" ).html('RD$');
    }

    var max = 0;
    if(currency == "dop" && action == "venta") {
      max = sale_max_price_dop;
    }else if(currency == "usd" && action == "venta") {
      max = sale_max_price_usd;
    }else if(currency == "dop" && action == "alquiler") {
      max = rent_max_price_dop;
    }else if(currency == "usd" && action == "alquiler") {
      max = rent_max_price_usd;
    }

    jQuery( "#price_range" ).slider({
      range: true,
      min: 0,
      max: max,
      values: [ 0, max ],
      slide: function( event, ui ) {
        jQuery( "#price_from" ).val( ui.values[ 0 ]).number( true, 0 );
        jQuery( "#price_to" ).val( ui.values[ 1 ] ).number( true, 0 );

        jQuery( "#price_from_span" ).html( ui.values[ 0 ]).number( true, 0 );
        jQuery( "#price_to_span" ).html( ui.values[ 1 ] ).number( true, 0 );
      }
    });

    jQuery( "#price_from" ).val( 0 ).number( true, 0 );
    jQuery( "#price_to" ).val( max ).number( true, 0 );

    jQuery( "#price_from_span" ).html( 0 ).number( true, 0 );
    jQuery( "#price_to_span" ).html( max ).number( true, 0 );

  }

  jQuery('.property-carousel').owlCarousel({
    loop:true,
    margin:2,
    nav: true,
    navText: [
      '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="#fff" d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/><path d="M0 0h24v24H0z" fill="none"/></svg>',
      '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="#fff" d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'
    ],
    dots: false,
    items: 1,
    navSpeed: 800,

    // autoWidth:true,
    autoHeight:true,
    responsiveClass:true,
    responsive: {
      0: {
        stagePadding: 100,
      },
      768: {
        stagePadding: 200,
      },
      992: {
        stagePadding: 200,
      }
    }
  });

  jQuery('.owl-properties').owlCarousel({
    loop: false,
    center:false,
    startPosition: 0,
    margin:20,
    dots: true,
    autoplay: true,
    autoplayTimeout: 7000,
    responsive:{
        0:{
            items:1,
            slideBy: 1,
            margin: 10,
            stagePadding: 50,
            startPosition: 1,
        },
        600:{
            items:2,
            slideBy: 2,
            startPosition: 2,
            stagePadding: 80,
        },
        1000:{
            items:3,
            slideBy: 3
        }
    }
  });




  jQuery('.select2').select2({
    width: '100%',
    minimumResultsForSearch: -1
  });
  jQuery('.select2-search').select2({
    placeholder: 'Escribe el nombre de los sectores',
    width: '100%'
  });

});
