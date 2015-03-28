
jQuery(function($){


	$('body').on('click', '#caldera_forms-insert', function(e){

		e.preventDefault();
		var modal = $('.caldera-forms-insert-modal'),
			clicked = $(this);

		if( clicked.data('selected') ){
			clicked.data('selected', null);
		}


		modal.fadeIn(100);

	});

	$('body').on('click', '.caldera-forms-modal-closer', function(e){
		e.preventDefault();
		var modal = $('.caldera-forms-insert-modal');
		modal.fadeOut(100);		
	});

	$('body').on('click', '.caldera-forms-shortcode-insert', function(e){
	 	
	 	e.preventDefault();
	 	var caldera_forms = $('.selected-caldera_forms-shortcode:checked'),code;

	 	if(!caldera_forms.length){
	 		return;
	 	}

	 	code = '[caldera_forms slug="' + caldera_forms.val() + '"]';

	 	caldera_forms.prop('checked', false);	 	
		window.send_to_editor(code);
		$('.caldera-forms-modal-closer').trigger('click');

	});

});//
