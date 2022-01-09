$('.add-to-cart').on('submit', function(ev){
	ev.preventDefault();

	var $form = $(this);
	var $button = $form.find("[type='submit']");

	//peticion ajax

	$.ajax({

		url: $form.attr('action'),
		method: $form.attr('method'),
		data: $form.serialize(),
		beforeSend: function(){
			$button.val('Cargando...');
		},
		success: function(){
			$button.css('background-color','#00c853' ).val('Agregado');

			setTimeout(function(){
				restartButton($button);
			},2000);
		},
		error: function(){
			console.log(err);
			$button.css('background-color','#d5000' ).val('Hubo un error');

			setTimeout(function(){
				restartButton($button);
			},2000);
		}
	});

	return false;

});

function restartButton($button){
	$button.val('Agregar al carrito').attr('style','')

}
