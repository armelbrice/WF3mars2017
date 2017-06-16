$(function(){
	$('form').submit(function(e){
		e.preventDefault();
		$.ajax({
			url: 'form.php',
			type: 'post',
			cache: false, // pour éviter certains problèmes liés au cache
			data: $('form').serialize(),
			dataType: 'json',
			success: function(result) {
				'status' => 'success',
 				'msg' => 'La voiture a bien été ajoutée'
			},
			error: function(err){
				'status' => 'error',
 				'msg' => '... LISTE DES ERREURS JOINTES A L AIDE D UN <br/>'
			}
		});
	});
});