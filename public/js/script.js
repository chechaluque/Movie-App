
$(document).ready(function(){
		$('#registro').click(function(){
			var dato = $('#genero').val();
			var route = "/genero";
			var token = $('#token').val();
			$.ajax({
				url: route,
				headers:{'X-CSRF-TOKEN': token},
				type: 'POST',
				dataType: 'json',
				data: {genero: dato},
				success:function() {
					 $('#msj-succes').show(300).delay(2500).fadeOut(500);
					 $('#genero').val('');
				},
				error:function(mjs){
					//console.log(mjs.responseJSON.genero);
					$('#msj').html(mjs.responseJSON.genero);
					$('#msj-error').show(300).delay(2500).fadeOut(500);
				}
			
			});
			
		});
});