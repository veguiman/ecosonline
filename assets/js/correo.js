$(document).ready(function(){
	$("#fcontacto").submit(function( event ){
		event.preventDefault();

		$.ajax({
			type: 'POST',
			url: 'send.php',
			data: $(this).serialize(),
			success: function(data){
				$("#respuesta").slideDown();
				$("#respuesta").html(data);
				$(":text").each(function(){	
				$($(this)).val('');
				});
				$("textarea").each(function(){	
				$($(this)).val('');
				});
				



			}
		});



		return false;
	});
});