<?php
/**
 * @file templates/list-body.php
 *
 * Display the entries loop when using a list layout
 *
 * @package GravityView
 * @subpackage GravityView/templates
 *
 * @global GravityView_View $this
 */

/**
 * @action `gravityview_list_body_before` Tap in before the entry loop has been displayed
 * @param GravityView_View $this The GravityView_View instance
 */

do_action( 'gravityview_list_body_before', $this );

// There are no entries.
if( ! $this->getTotalEntries() ) {

	?>

	<div class="gv-list-view gv-no-results">
		<div class="gv-list-view-title">
			<h3><?php echo gv_no_results(); ?></h3>
		</div>
	</div>
	<?php

} else { ?>
<script type="text/javascript">
  $(document).ready(function(){
    //Auto-complete
    
    $("#search-box-filter_184").chosen();
    
    $("form.gv-widget-search").attr("autocomplete","off");
    var individual_company = [
    <?php foreach ( $this->getEntries() as $entry ) {
		$this->setCurrentEntry( $entry );
		global $wpdb;
	  $which_company = $entry[15]; //local branch name
    if ($which_company == '') {
      $which_company = $entry[3]; //company name
    }
    $which_company = trim($which_company);  
	  $myrows = $wpdb->get_results("SELECT * FROM wp_docebo WHERE branch = '$which_company' AND active = 1  AND experience <> 20 AND current = 1 AND designation_list != 2 ORDER BY last"); ?>"<?php echo $which_company; ?>",
    <?php foreach ($myrows as $row) {
  		    $name = $row->first . ' ' . $row->last; ?>"<?php echo $name; ?>",
    <?php }
    }
  ?>
  ];
  autocomplete(document.getElementById("gv_search_2132"), individual_company);

  function autocomplete(inp, arr) { 
    var currentFocus; 
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value; 
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1; 
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items"); 
        this.parentNode.appendChild(a); 
        for (i = 0; i < arr.length; i++) { 
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) { 
            b = document.createElement("DIV"); 
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length); 
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>"; 
                b.addEventListener("click", function(e) { 
                inp.value = this.getElementsByTagName("input")[0].value; 
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) { 
          currentFocus++; 
          addActive(x);
        } else if (e.keyCode == 38) {  
          currentFocus--; 
          addActive(x);
        } else if (e.keyCode == 13) { 
          e.preventDefault();
          if (currentFocus > -1) { 
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      if (!x) return false;
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
  }
   
  //UPDATE NXT LEVEL LOGO
  function updateNxtLevelLogo() {
    setTimeout(function(){
      $('#nxt-data-table tr td.nxt-level-2-status').each(function() {
        var str1 = $(this).text();
        var str2 = 'nxt-level-2';
          if(str1.indexOf(str2) != -1){
          $(this).parent().addClass('nxt-level-2-designation');
        } else {
          $(this).parent().addClass('nxt-level-1-designation');
        }
      }); 

      }, 200);
  }
    
  //HOMEPAGE ZIPCODE SEARCH
    function homepageZipcodeSearch() {
      $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null) {
           return null;
        }
        return decodeURI(results[1]) || 0;
      }
      var zipcode_param = $.urlParam('zip_code');
      if(zipcode_param) { 
        $("#search-box-filter_16_5").prop("value",zipcode_param);
        setTimeout(function(){ 
          $("#gv_search_button_2132").trigger( "click" );
        }, 500);
      }
    }
    
    
  //data tables
    var dataTable = $('#nxt-data-table').dataTable({
      "fnDrawCallback": function( oSettings ) {
       $('.page-id-2134 .gv-list-view').each(function(){
        var $gvRow = $(this);
        var $show = $gvRow.find('.toggle .show');
        var $hide = $gvRow.find('.toggle .hide');

        $($show,this).on( "click", function(e) {
          e.preventDefault();
          $('.gv-list-view-content', $gvRow).addClass('show');
          $('.gv-list-view-title').removeClass('show-excerpt');
          $($show).hide();
          $($hide).show();
        });

        $($hide,this).on( "click", function(e) {
          e.preventDefault();
          $('.gv-list-view-content', $gvRow).removeClass('show');
          $('.gv-list-view-title').addClass('show-excerpt');
          $($show).show();
          $($hide).hide();
        });
      });

        
        
        
    },
    "order": [[ 2, "desc" ], [ 0, "desc" ]],
    "retrieve": true,
    "bFilter": true,
      //"paging": false,
      dom: "<'row'<'col-sm-3'l><'col-sm-3'f><'col-sm-6'p>>" +
"<'row'<'col-sm-12'tr>>" +
"<'row'<'col-sm-5'i><'col-sm-7'p>>",
    "columnDefs": [
      {
        "targets": [0],
        "visible": false,
        "searchable": false
      }
    ],
    "oLanguage": {
      "oPaginate": {
        "sPrevious": "«",
        "sNext": "»"
      }
    },
      "initComplete": function(settings, json) {
        homepageZipcodeSearch();
        setTimeout(function(){
          $(".gv-container-2132").show();
        }, 500);
        updateNxtLevelLogo();
  }
  });

    
    
  
    
  $("#gv_search_button_2132").on( "click", function() {
    

    $(".filter-name").remove();
    $(".page-numbers").hide();

    /*var search_data = $("#search-box-filter_184").val();
    if(search_data) {
      $(".filters-clear").append('<span class="filter-name">' + search_data + '</span>');
    }*/
    var utility_data = $("#gv_search_2132").val();
    if(utility_data) {
      $(".filters-clear").append('<span class="filter-name">' + utility_data + '</span>');
    }
    var zipcode_data = $("#search-box-filter_16_5").val();
    if(zipcode_data) {
      $.get("https://utility-db.neea.org/api/utilities", {
        service_area: zipcode_data,
        api_key: "93f7d293-4a06-4b74-8520-1fa888976e78",
        paginate: false,
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.responseJSON, textStatus);
      })
      .done(function(data, textStatus) {
        $(".filter-name").remove();
        $.each(data.data, function(index, utility){
          $(".filters-clear").append('<span class="filter-name">' + utility.name + '</span>');
       
        });
        $(".filter-name").each(function (index) {
          var data = $(this);
          search_text += '|' + data.text() + '';
        });
        var new_search_text = search_text.replace('|','');
        //console.log(new_search_text);
        $('#nxt-data-table_filter input').val(' ');
        $('#nxt-data-table_filter input').val(new_search_text).keyup();
         var keywords =  $('#nxt-data-table_filter input').val().replace("People's Utility District", 'PUD').replace('Energy Trust of Oregon- Portland General Electric and Pacific Power (OR)','Energy Trust of Oregon|Portland General Electric|Pacific Power (OR)').replace('(Oregon)', '(OR)').replace('(Washington)', '(WA)').replace('(Idaho)', '(ID)').replace("Rural Electric Association", "REA").replace("People's Utility District", 'PUD').replace('Energy Trust of Oregon- Portland General Electric and Pacific Power (OR)','Energy Trust of Oregon|Portland General Electric|Pacific Power (OR)').replace('(Oregon)', '(OR)').replace('(Washington)', '(WA)').replace('(Idaho)', '(ID)').replace("Rural Electric Association", "REA").split('|'), filter ='';
       for (var i=0; i<keywords.length; i++) {
         console.log(keywords[i]);
           filter = (filter!=='') ? filter+'|'+keywords[i] : keywords[i];
       }            
       dataTable.fnFilter(filter, null, true, false, true, true);
      });
    }

    var search_text = '';
    $(".filter-name").each(function (index) {
      var data = $(this);
      search_text += '|' + data.text() + '';

    });
    $('#nxt-data-table_filter input').val(' ');
    var new_search_text = search_text.replace('|','');
        console.log('"'+new_search_text+'"');
    $('#nxt-data-table_filter input').val('"'+new_search_text+'"').keyup();
    
 
      
    
    return false;
  });
    $(".gv-search-clear").text("RESET");

  $(".gv-search-clear").click(function(){
    
    $(".chosen-single > span").text('Utility Territory');
    $(".chosen-results  .active-result").removeClass('result-selected');
    $(".gv-search-clear").text("RESET");
    setTimeout(function(){
$(".gv-search-button").click();
      $(".gv-search-clear").text("RESET");
}, 500);
    
  });
 
    
    
  $("#search-box-filter_16_5").attr("placeholder","Search by ZIP Code");
  $.fn.dataTableExt.afnFiltering.push(
    function(oSettings, aData, iDataIndex) {
        var filter_val = $("#nxt-data-table_filter input").val();
        var filter = '"'+filter_val+'"';
        filter = filter.split(' ');
        for (var f=0;f<filter.length;f++) {
            for (var d=0;d<aData.length;d++) {
                if (aData[d].indexOf(f)>-1) {
                    return true;
                }
            }
        }
     }
  );


    
  $('#nxt-data-table').on( 'page.dt', function () {
    updateNxtLevelLogo();
  });
    
    $('#nxt-data-table').on( 'search.dt', function () {
    updateNxtLevelLogo();
} );
    
    
  updateNxtLevelLogo();
    

}); 
</script>
  <div class="filters-clear"></div>
  <table id="nxt-data-table" style="width:100%">
    <thead>
        <tr>
            <th>Index</th>
            <th>Participants</th>
            <th>NXT Level 2</th>
        </tr>
    </thead>
    <tbody>

<?php
	// There are entries. Loop through them.
	foreach ( $this->getEntries() as $entry ) {

		$this->setCurrentEntry( $entry );

		// get individuals
		global $wpdb;
	  $which_company = $entry[15];
    if ($which_company == '') {
      $which_company = $entry[3];
    }
    $which_company = trim($which_company);
	  $myrows = $wpdb->get_results("SELECT * FROM wp_docebo WHERE branch = '$which_company' AND active = 1 AND experience <> 20 AND current = 1 AND designation_list != 2 ORDER BY last");

	?>

		<tr>
      <td class="rand_num"><?php echo (rand(10,1000)); ?></td>
      <td><div id="gv_list_<?php echo $entry['id']; ?>" class="<?php echo esc_attr( apply_filters( 'gravityview_entry_class', 'gv-list-view', $entry, $this ) ); ?>">

		<?php

		/**
		 * @action `gravityview_entry_before` Tap in before the the entry is displayed, inside the entry container
		 * @param array $entry Gravity Forms Entry array
		 * @param GravityView_View $this The GravityView_View instance
		 */
		do_action( 'gravityview_entry_before', $entry, $this );

		?>

		<?php if ( $this->getField('directory_list-title') || $this->getField('directory_list-subtitle') ) { ?>

			<?php

			/**
			 * @action `gravityview_entry_title_before` Tap in before the the entry title is displayed
			 * @param array $entry Gravity Forms Entry array
			 * @param GravityView_View $this The GravityView_View instance
			 */
			do_action( 'gravityview_entry_title_before', $entry, $this );

			?>
			<div class="gv-list-view-title">

				<?php if ( $this->getField('directory_list-title') ) {
					$i          = 0;
					$title_args = array(
						'entry'      => $entry,
						'form'       => $this->getForm(),
						'hide_empty' => $this->getAtts( 'hide_empty' ),
					);

					foreach ( $this->getField( 'directory_list-title' ) as $field ) {
						$title_args['field'] = $field;

						// The first field in the title zone is the main
						if ( $i == 0 ) {
							$title_args['markup'] = '<h3 id="{{ field_id }}" class="{{class}}">{{label}}{{value}}</h3>';
							echo gravityview_field_output( $title_args );
							unset( $title_args['markup'] );

							if (count($myrows) > 0) {
    			      $individual = 'individuals';
    			      if (count($myrows) == 1) {
    			        $individual = 'individual';
    			      }
    			      print '<h3 class="number_of_users">' . count($myrows) . ' designated ' . $individual . '</h3>';
    			    }
    			    else {
    			      /*print '<h3 class="number_of_users">&nbsp;</h3>';*/
    			    }

						} else {
							$title_args['wpautop'] = true;
							echo gravityview_field_output( $title_args );
						}

						$i ++;
					}
				}

				$this->renderZone('subtitle', array(
					'markup' => '<h4 id="{{ field_id }}" class="{{class}}">{{label}}{{value}}</h4>',
					'wrapper_class' => 'gv-list-view-subtitle',
				));
			?>
			</div>

			<?php

			/**
			 * @action `gravityview_entry_title_after` Tap in after the title block
			 * @param array $entry Gravity Forms Entry array
			 * @param GravityView_View $this The GravityView_View instance
			 */
			do_action( 'gravityview_entry_title_after', $entry, $this );

			?>

		<?php } ?>

		<div class="gv-grid gv-list-view-content">

			<?php

				/**
				 * @action `gravityview_entry_content_before` Tap in inside the View Content wrapper <div>
				 * @param array $entry Gravity Forms Entry array
				 * @param GravityView_View $this The GravityView_View instance
				 */
				do_action( 'gravityview_entry_content_before', $entry, $this );

				$this->renderZone('image', array(
                    'wrapper_class' => 'gv-grid-col-1-3 gv-list-view-content-image',
                    'label_markup' => '<h4>{{label}}</h4>',
                    'wpautop'      => true
                ));

				$this->renderZone('description', array(
					'wrapper_class' => 'gv-grid-col-1-3 gv-list-view-content-description',
					'label_markup' => '<h4>{{label}}</h4>',
					'wpautop'      => true
				));

				$this->renderZone('content-attributes', array(
					'wrapper_class' => 'gv-list-view-content-attributes',
					'markup'     => '<p id="{{ field_id }}" class="{{class}}">{{label}}{{value}}</p>'
				));

				/**
				 * @action `gravityview_entry_content_after` Tap in at the end of the View Content wrapper <div>
				 * @param array $entry Gravity Forms Entry array
				 * @param GravityView_View $this The GravityView_View instance
				 */
				do_action( 'gravityview_entry_content_after', $entry, $this );

			?>

			<?php
  		  $leads = "";

        // get level 2's
  		  foreach ($myrows as $row) {
  		    $leads .= '<li>';
  		    $level = 1;
  		    $name = $row->first . ' ' . $row->last;
  		    $email = $row->email;
  		    $phone = $row->phone;
    		  //$leads .= '<div class="left"><div class="level-' . $level . '"></div></div>';
          if($row->nxt_level_2) {
      		  $leads .= '<div class="left"><div class="level-2"><img src="/wp-content/themes/nxt-level/assets/img/nxt-level-2-rect-logo.jpg" alt="" width="30" /></div></div>';
            $leads .= '<div class="right"><div class="name">' . $name . '</div>';
            $leads .= '<div class="email"><a href="mailto:' . $email . '">' . $email . '</a></div>';
            $leads .= '<div class="phone">' . $phone . '&nbsp;</div></div>';
            $leads .= '</li>';
          }
  		  }

        // get level 1's
        foreach ($myrows as $row) {
          $leads .= '<li>';
          $level = 1;
          $name = $row->first . ' ' . $row->last;
          $email = $row->email;
          $phone = $row->phone;
          //$leads .= '<div class="left"><div class="level-' . $level . '"></div></div>';
          if(!$row->nxt_level_2) {
            $leads .= '<div class="left"><div class="level-1"><img src="/wp-content/themes/nxt-level/assets/img/nxt-level-1-rect-logo.jpg" alt="" width="30" /></div></div>';
            $leads .= '<div class="right"><div class="name">' . $name . '</div>';
            $leads .= '<div class="email"><a href="mailto:' . $email . '">' . $email . '</a></div>';
            $leads .= '<div class="phone">' . $phone . '&nbsp;</div></div>';
            $leads .= '</li>';
          }
        }

  		  if ($myrows) {
  		    print '<div class="gv-grid-col-1-3 gv-list-view-leads">';
  		    print '<span class="gv-field-label">Designated Individuals:</span>';
  		    print '<ul>';
  		    print $leads;
  		    print '</ul>';
  		    print '</div>';
  		  }
  		?>

		</div>

		<?php

		// Is the footer configured?
		if ( $this->getField('directory_list-footer-left') || $this->getField('directory_list-footer-right') ) {

			/**
			 * @action `gravityview_entry_footer_before` Tap in before the footer wrapper
			 * @param array $entry Gravity Forms Entry array
			 * @param GravityView_View $this The GravityView_View instance
			 */
			do_action( 'gravityview_entry_footer_before', $entry, $this );

			?>

			<div class="gv-grid gv-list-view-footer">
				<div class="gv-grid-col-1-2 gv-left">
					<?php $this->renderZone('footer-left'); ?>
				</div>

				<div class="gv-grid-col-1-2 gv-right">
					<?php $this->renderZone('footer-right'); ?>
				</div>
			</div>

			<?php

			/**
			 * @action `gravityview_entry_footer_after` Tap in after the footer wrapper
			 * @param array $entry Gravity Forms Entry array
			 * @param GravityView_View $this The GravityView_View instance
			 */
			do_action( 'gravityview_entry_footer_after', $entry, $this );

		} // End if footer is configured



		/**
		 * @action `gravityview_entry_after` Tap in after the entry has been displayed, but before the container is closed
		 * @param array $entry Gravity Forms Entry array
		 * @param GravityView_View $this The GravityView_View instance
		 */
		do_action( 'gravityview_entry_after', $entry, $this );

		?>

      </div></td>
      <td class="nxt-level-2-status rand_num">
      <?php foreach ($myrows as $row) {
           
  		    if($row->nxt_level_2) {
            echo 'nxt-level-2'; 
          } 
      } ?>
      </td>
      
      </tr>

	<?php } ?>
      
  </tbody>
</table>

<?php } // End if has entries

/**
 * @action `gravityview_list_body_after` Tap in after the entry loop has been displayed
 * @param GravityView_View $this The GravityView_View instance
 */
do_action( 'gravityview_list_body_after', $this );
