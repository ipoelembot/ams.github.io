function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 0);
	}
}
function bar_progress(progress_line_object, direction) {
	var number_of_steps = progress_line_object.data('number-of-steps');
	var now_value = progress_line_object.data('now-value');
	var new_value = 0;
	if(direction == 'right') {
		new_value = now_value + ( 100 / number_of_steps );
	}
	else if(direction == 'left') {
		new_value = now_value - ( 100 / number_of_steps );
	}
	progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}
jQuery(document).ready(function() {

    $('form fieldset:first').fadeIn('slow');
    
    $('form input[type="text"], form input[type="password"], form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });

    // next step
    $('form .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	var current_active_step = $(this).parents('form').find('.form-wizard.active');
    	var progress_line = $(this).parents('form').find('.progress-line');

/*       
            parent_fieldset.find('input[type="text"]').each(function() {
            if ( ($(this).prop('required')) && ($(this).val() == "") ){

                ($(this).attr("id") != "frm_016") && ($(this).attr("id") != "frm_025") && ($(this).attr("id") != "frm_087") && 
                ($(this).attr("id") != "frm_086") && ($(this).attr("id") != "frm_048") && ($(this).attr("id") != "frm_051") &&
                ($(this).attr("id") != "frm_012") && ($(this).attr("id") != "frm_013") && ($(this).attr("id") != "frm_050") &&
                ($(this).val() == "") ){

                //$(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });

        parent_fieldset.find('input[type="number"]').each(function() {
            if ($(this).val() == "") {
                //$(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });

        parent_fieldset.find('textarea').each(function() {
            if( $(this).val() == "" ) {
                //$(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });

        // Validasi untuk option yang tidak ngechain 
        parent_fieldset.find("select").each(function() {
            if (($(this).prop('required')) && ($(this).val() == "") ) {
                //$(this).addClass('input-error');
                next_step = false;
            }
            



            if ( ($(this).attr("id") != "frm_088") && ($(this).attr("id") != "frm_089") && ($(this).attr("id") != "frm_090") &&
                 ($(this).attr("id") != "frm_091") && ($(this).attr("id") != "frm_092") && ($(this).attr("id") != "frm_100") &&
                 ($(this).attr("id") != "frm_112") && ($(this).attr("id") != "frm_113") && ($(this).attr("id") != "frm_114") &&
                 ($(this).attr("id") != "frm_115") && ($(this).attr("id") != "frm_116") && ($(this).attr("id") != "frm_049") &&
                 ($(this).attr("id") != "frm_052") && ($(this).attr("id") != "frm_053") && ($(this).attr("id") != "frm_054") &&
                 ($(this).val() == "") ){
                  
                  $(this).addClass('input-error');
                  next_step = false;
            }




            else {
                $(this).removeClass('input-error');
            }
        });
        // End line of lines --- Validasi untuk option yang tidak ngechain 


        // Validasi untuk option yang ngechain
        parent_fieldset.find("select option:selected").each(function() {
            if (($(this).text() == "Pilih")){
                  
                //$(this).addClass('input-error');
                next_step = false;
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        // End of lines --- Validasi untuk option yang ngechain




        // Validasi untuk option yang ngechain (step 1) 
      var option1 = document.getElementById('frm_001');
        var option2 = document.getElementById('frm_002');
        var option3 = document.getElementById('frm_003');
        var option4 = document.getElementById('frm_004');
        var option5 = document.getElementById('frm_006');
        var option6 = document.getElementById('frm_007');

        var invalid1 = option1.value == "";
        var invalid2 = option2.value == "";
        var invalid3 = option3.options[option3.selectedIndex].text;
        var invalid4 = option4.options[option4.selectedIndex].text;
        var invalid5 = option5.options[option5.selectedIndex].text;
        var invalid6 = option6.options[option6.selectedIndex].text;

        if ((invalid1) || (invalid2) || (invalid3 == "Pilih") || (invalid4 == "Pilih") || (invalid5 == "Pilih") || (invalid6 == "Pilih")){
            $(this).addClass('input-error');
            next_step = false;
        }
        else {
            $(this).removeClass('input-error');
        }
        // End line of Validasi untuk option yang ngechain (step 1)




*/
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
    			current_active_step.removeClass('active').addClass('activated').next().addClass('active');
    			bar_progress(progress_line, 'right');
	    		$(this).next().fadeIn();
    			scroll_to_class( $('form'), 20 );
	    	});
    	}
    });
    
    // previous step
    $('form .btn-previous').on('click', function() {
    	var current_active_step = $(this).parents('form').find('.form-wizard.active');
    	var progress_line = $(this).parents('form').find('.progress-line');
    	
    	$(this).parents('fieldset').fadeOut(400, function() {
    		current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
    		bar_progress(progress_line, 'left');
    		$(this).prev().fadeIn();
			scroll_to_class( $('form'), 20 );
    	});
    });

    // submit button
    $('form').on('submit', function(e) {
        $(this).find('input[type="text"], textarea, select, input[type="number"]').each(function() {
            if ( ($(this).prop('required')) && ($(this).val() == "") ){



/*            if( ($(this).attr("id") != "frm_016") && ($(this).attr("id") != "frm_025") && ($(this).attr("id") != "frm_087") && 
                ($(this).attr("id") != "frm_086") && ($(this).attr("id") != "frm_088") && ($(this).attr("id") != "frm_089") && 
                ($(this).attr("id") != "frm_090") && ($(this).attr("id") != "frm_091") && ($(this).attr("id") != "frm_092") && 
                ($(this).attr("id") != "frm_100") && ($(this).attr("id") != "frm_112") && ($(this).attr("id") != "frm_113") && 
                ($(this).attr("id") != "frm_114") && ($(this).attr("id") != "frm_115") && ($(this).attr("id") != "frm_116") &&
                ($(this).attr("id") != "frm_117") && ($(this).attr("id") != "frm_118") && ($(this).attr("id") != "frm_054") &&
                ($(this).attr("id") != "frm_119") && ($(this).attr("id") != "frm_120") && ($(this).attr("id") != "frm_121") &&
                ($(this).attr("id") != "frm_122") && ($(this).attr("id") != "frm_123") && ($(this).attr("id") != "frm_124") &&
                ($(this).attr("id") != "frm_012") && ($(this).attr("id") != "frm_013") && ($(this).attr("id") != "frm_048") &&
                ($(this).attr("id") != "frm_049") && ($(this).attr("id") != "frm_050") && ($(this).attr("id") != "frm_051") &&
                ($(this).attr("id") != "frm_052") && ($(this).attr("id") != "frm_053") && ($(this).val() == "" )) {*/



                    e.preventDefault();
                    $(this).addClass('input-error');
            }
            else {
                    $(this).removeClass('input-error');
            }
        });
    });
});