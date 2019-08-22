$(function() {
  $(document).ready(function(){
    
    var doc = document.documentElement;
    doc.setAttribute('data-useragent', navigator.userAgent);
    
    var runMenu = true;
    
    function checkSize(){
      if( $(window).width() < 960 && runMenu ) {
        $('.sub-menu').hide();
        $('.menu-item-has-children').append('<span class="sub-icon"></span>');
        $('.sub-icon').on('click', function(){
          $(this).parent().toggleClass('sub-menu-open');
          $(this).prev().slideToggle();
        });
        runMenu = false;
      }
    }
    
    checkSize();
    
    $(window).resize(checkSize);
    
    // accordion
    var icons = {
      header: "accordion-closed",
      activeHeader: "accordion-open"
    };
    $( "#accordion" ).accordion({
      active: false,
      collapsible: true,
      heightStyle: "content",
      icons: icons
    });
    $( "#toggle" ).button().on( "click", function() {
      if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
        $( "#accordion" ).accordion( "option", "icons", null );
      } else {
        $( "#accordion" ).accordion( "option", "icons", icons );
      }
    });

    // toggle gravityview
    $('.page-id-2134 .gv-list-view').each(function(){
      var $gvRow = $(this);
      var $show = $gvRow.find('.toggle .show');
      var $hide = $gvRow.find('.toggle .hide');

      $($show,this).click(function(e){
        e.preventDefault();
        $('.gv-list-view-content', $gvRow).addClass('show');
        $('.gv-list-view-title').removeClass('show-excerpt');
        $($show).hide();
        $($hide).show();
      });

      $($hide,this).click(function(e){
        e.preventDefault();
        $('.gv-list-view-content', $gvRow).removeClass('show');
        $('.gv-list-view-title').addClass('show-excerpt');
        $($show).show();
        $($hide).hide();
      });
    });
    // plus, minus
    $(".custom-disclaimer").toggle(function() {
      $(".gv-custom-copy").addClass('show-custom');
      $('.gv-list-view-title').addClass('toggle-minus');
    }, function() {
      $(".gv-custom-copy").removeClass('show-custom');
      $('.gv-list-view-title').removeClass('toggle-minus');
    });

    //*******
    // google analytics
    //*******

    // homepage hero learn more cta
    $('.home .hero-ctas .button.orange-button').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'Homepage - Learn More',
        'event_label' : 'learn more'
      });
    });
    // homepage hero apply now cta
    $('.home .hero-ctas .button.orange-outline').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'Homepage - Apply',
        'event_label' : 'apply'
      });
    });
    // individual designation hero apply now cta
    $('.page-id-5186 .hero-ctas .button.orange-button').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'Individual - Top Apply',
        'event_label' : 'top apply'
      });
    });
    // individual designation terms & conditions link click
    $('.page-id-5186 .timeline .timeline-content a').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'Individual - TOC',
        'event_label' : 'toc'
      });
    });
    // individual designation bottom apply now cta
    $('.page-id-5186 .section-closing .button').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'Individual - Bottom Apply',
        'event_label' : 'bottom apply'
      });
    });
    // company designation hero apply now cta
    $('.page-id-5184 .hero-ctas .button.orange-button').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'Company - Top Apply',
        'event_label' : 'top apply'
      });
    });
    // company designation terms & conditions link click
    $('.page-id-5184 .timeline .timeline-content a').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'Company - TOC',
        'event_label' : 'toc'
      });
    });
    // company designation bottom apply now cta
    $('.page-id-5184 .section-closing .button').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'Company - Bottom Apply',
        'event_label' : 'bottom apply'
      });
    });
    // global top bar training login cta
    $('.primary-header .buttons-nav .button:contains("Training Login")').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'Training Login',
        'event_label' : 'login'
      });
    });
    // support page individuals interested accordion item
    $('.page-id-1810 .accordion-group .ui-accordion-header:contains("Individuals Interested")').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'FAQ - Individuals Interested in NXT Level Training',
        'event_label' : 'faq-individuals'
      });
    });
    // support page companies interested accordion item
    $('.page-id-1810 .accordion-group .ui-accordion-header:contains("Companies Interested")').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'FAQ - Companies Interested in NXT Level Training',
        'event_label' : 'faq-company'
      });
    });
    // support page NXT level 1 accordion item
    $('.page-id-1810 .accordion-group .ui-accordion-header:contains("NXT Level 1")').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'FAQ - NXT Level 1',
        'event_label' : 'faq-nxtlevel1'
      });
    });
    // support page NXT level 2 accordion item
    $('.page-id-1810 .accordion-group .ui-accordion-header:contains("NXT Level 2")').on('click', function(){
      gtag('event', 'Click', {
        'event_category' : 'FAQ - NXT Level 2',
        'event_label' : 'faq-nxtlevel2'
      });
    });

  });
});

$(window).bind("load", function() {

  // designation list pagination scroll
  if($('#nxt-data-table_wrapper.dataTables_wrapper').length) {
    $('.dataTables_paginate').click(function() {
      var wrapper = $('#nxt-data-table_wrapper.dataTables_wrapper').offset().top - 140;
      $('html,body').animate({
        scrollTop: wrapper
      }, 700);
    });
  }

});
