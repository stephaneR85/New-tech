$(document).ready( function() {

  $('#champ').keyup( function(){
    $field = $(this);
    $('#results').html('');
    $('#ajax-loader').remove(); 
 
    if( $field.val().length > 1 )
    {
      $.ajax({
  	type : 'GET',
	url : '../Modele/recherche.php' , 
	data : 'champ='+$(this).val() ,
	success : function(data){ 
		$('#ajax-loader').remove();
		$('#results').html(data); 
	}
      });
    }		
  });
});

function efface(){
	if(document.getElementById('champ').value=='Rechercher un produit')document.getElementById('champ').value='';
	}
function affiche(){
	if(document.getElementById('champ').value=='')document.getElementById('champ').value = 'Rechercher un produit';
	}