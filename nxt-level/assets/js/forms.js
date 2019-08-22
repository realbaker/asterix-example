$(function() {
  // if (($('#gform_10').length != 1) && ($('#gform_13').length != 1)) {
  //   if ($('.main .gform_wrapper').length) {
  //     $("<div id='gform_alert' class='gform_alert' style='display:none;'><p>Are you sure you want to leave this form?</p><p>If you navigate away you will lose your progress.</p><p>To save your progress, cancel and choose \"Save and continue later\".</p><p><a class='gform_save_link gform_cancel_alert'>[Cancel]</a> <a id='gform_new_link' class='gform_save_link'>[Leave Form]</a></p></div>").prependTo('body');
  //     $("a").each(function() {
  //       if (!$(this).hasClass("gform_save_link") && !$(this).hasClass("chosen-single") && !$(this).hasClass("chosen-default")) {
  //         $(this).on("click", function(event) {
  //           console.log($(this));
  //           event.preventDefault();
  //           $('.gform_alert').find('#gform_new_link').attr('href', $(this).attr("href"));
  //           $('#gform_alert').modal();
  //           $('.gform_cancel_alert').on("click", function() {
  //             $.modal.close();
  //           });
  //         });
  //       }
  //     });
  //   }
  // }

  $('#check-inperson').change(function() {
  	if($(this).is(":checked")) {
  		$('#tribe_eventcategories option[value="5414"]').prop('selected', true);
  	} else {
    	$('#tribe_eventcategories option[value="5414"]').prop('selected', false);
    }
  });

  $('#check-webinar').change(function() {
  	if($(this).is(":checked")) {
  		$('#tribe_eventcategories option[value="5415"]').prop('selected', true);
  	} else {
    	$('#tribe_eventcategories option[value="5415"]').prop('selected', false);
    }
  });
});
