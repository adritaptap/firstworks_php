

$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();

	$('#menu a').click(function(){
		page = $(this).attr('href');
		$.ajax({
			url:+page,
			cache: false,
			success:function(html){
				afficher(html);
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){
				alert(textStatus);

			}
		})

		return false;
	});
	
});

function afficher(data) {
	$('#contenu').empty();
	$('#contenu').append(data);

}