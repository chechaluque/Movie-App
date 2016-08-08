$(document).on('click','.pagination a', function(e) {
	e.preventDefault();
	var page = $(this).attr('href').split('page=')[1];
	var route = "/usuario";
	console.log(page);
	$.ajax({
		url: route,
		type: 'GET',
		dataType: 'json',
		data: {page: page},
		success: function(data){
			$('.users').html(data);
		}
	
	});
	
});