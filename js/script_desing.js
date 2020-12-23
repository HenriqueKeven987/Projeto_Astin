$(function(){

	//caixa de confimaçao de excluir
	$('[actionBtn=delete]').click(function(){
		var r = confirm("Tem Certeza que Deseja Excluir?");
		if (r == true) {
		  return;
		}else{
		  return false;
		}
	})

		
})






