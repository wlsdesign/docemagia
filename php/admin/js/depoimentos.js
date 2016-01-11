(function(){
	
	
	function fechaMensagem(){
		$('.fechar').on('click', function(){
			$(this).parent().fadeOut();
		});
	};

	$(document.body).on({
    	click: function(e){
	        var box_pai = $(this).parent();
	        var campo_real = box_pai.find('.ipt-file');
	        var campo_fake = box_pai.find('.texto');
	        campo_real.trigger("click");
	    }
	},'.btn-file');

	/*
	    Evento para escolher imagem
	*/
	$(document.body).on({
	    change: function(e){
	        e.preventDefault();
	        // Atualiza o valor do input file com o path fake
	        var box_pai = $(this).parent();
	        var valor = $(this).val();
	        var campo_fake = $(".texto", box_pai);
	        campo_fake.text(valor);

	        // Pega o arquivo que foi enviado para o input file
	        var input_file = $(this)
	        var files = input_file[0].files;
	        var file = files[0];
	    }    
	},'.ipt-file');


	/*
		Fechar tela do popup
	*/

	$('.close').on('click', function(){
		$(this).parents('.popup').fadeOut('fast');

	});

	/* 
		Editar Usuário
	 */


})();