$(function() {

  var $tabs = $('.page-id-1503 #tabs ul#tab-nav li');
  var $headerLinks = $('.page-id-1503 .header-links a');

  $tabs.on('click', function(e) {
    e.preventDefault();
    var tab_id = $(this).children().attr('href').replace('#', '');
    selectTab(tab_id);
  });

  $headerLinks.on('click', function(e) {
    e.preventDefault();
    var tab_id = $(this).attr('href').replace('#', '');
    selectTab(tab_id);
    $('html, body').animate({
        scrollTop: $('#' + tab_id).offset().top + (-200)
    }, 500);
  });

  // Show the first tab.
  $tabs.filter(':eq(0)').click();

  function selectTab(tab_id) {
    $('.page-id-1503 #tabs div').removeClass('active');
    $('#' + tab_id).addClass('active');
    $tabs.removeClass('active');
    $tabs.find('a[href="#' + tab_id + '"]').parents('li').addClass('active');
  }
  
  var $companies_link = $('.page-template-page-lowwatt .content-footer-wrapper a');
  
  $companies_link.on('click', function(e) {
    e.preventDefault();
    var tab_id = $(this).attr('href').replace('#', '');
    selectTab(tab_id);
    $('html, body').animate({
        scrollTop: $('#' + tab_id).offset().top + (-200)
    }, 500);
  });

  $('#gform_1 #gform_submit_button_1').on( "click", function() {
    
    var first = $('#gform_1 #input_1_2').val();
    var last = $('#gform_1 #input_1_3').val();
    var zip = $('#gform_1 #input_1_4').val();
    var email = $('#gform_1 #input_1_1').val();
    
    var pkg = {
      'first': first,
      'last': last,
      'zip': zip,
      'email': email,
    };

    console.log('starting');

      if (first.length > 1 && last.length > 1) {
        $.ajax({
          url: "/app/plugins/campaigner/subscribe.php",
          data: pkg,
          type: 'post',
        }).done(function(data) {
          console.log(data);
          console.log('finished');
        });
      }

  });

  $('#unsub .submit').on( "click", function() {
    var email = $('#unsub #email').val();
    
    var pkg = {
      'email': email,
    };

    console.log('starting');
    console.log(email);
    $('#unsub .message').html('<img id="gform_ajax_spinner_1" class="gform_ajax_spinner" src="/app/plugins/gravityforms/images/spinner.gif" alt="">');

    if (validateEmail(email)) {
      if (email.length > 1) {
        $.ajax({
          url: "/app/plugins/campaigner/unsubscribe.php",
          data: pkg,
          type: 'post',
        }).done(function(data) {
          console.log(data);
          console.log('finished');
          $('#unsub .message').html('<p>You have been unsubscribed from the Light Source newsletter.</p>');
          $('#unsub #email').val('');
        });
      }
      else {
        $('#unsub .message').html('<p>You did not enter the email in a valid format. Please re-enter.</p>');
      }
    } else {
      $('#unsub .message').html('<p>You did not enter the email in a valid format. Please re-enter.</p>');
    }
    
    return false;
  });
  
  function validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
  }

  var $ondemand = $('#ondemand-link');

  $ondemand.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $('#ondemand-block').offset().top + (-200)
    }, 500);
  });

});