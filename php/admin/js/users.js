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

	// $('.editar').on('click', function(){
	// 	// var id = $(this).parents('.tr-body').attr('data-id');
	// 	// var pai = $(this).parents('#home').find('.popup');

	// 	// pai.find('#nome').val(id);
		
		

		


	// });

/* 
	Editar Usuário
 */
var enviando_formulario = false;
$('#addusuario').submit(function(){
	var msg = $('.alertas');

	// O objeto do formulário
		var obj = this;
		
		// O objeto jQuery do formulário
		var form = $(obj);
		
		// O botão de submit
		var submit_btn = $('#addusuario :submit');
		
		// O valor do botão de submit
		var submit_btn_text = submit_btn.val();
 
		// Dados do formulário
		var dados = new FormData(obj);
		
		// Retorna o botão de submit ao seu estado natural
		function volta_submit() {
			// Remove o atributo desabilitado
			submit_btn.removeAttr('disabled');
			
			// Retorna o texto padrão do botão
			submit_btn.val(submit_btn_text);
			
			// Retorna o valor original (não estamos mais enviando)
			enviando_formulario = false;
		}
		
		// Não envia o formulário se já tiver algum envio
		if ( ! enviando_formulario  ) {		
		
			// Envia os dados com Ajax
			$.ajax({
				// Antes do envio
				beforeSend: function() {
					// Configura a variável enviando
					enviando_formulario = true;
					
					// Adiciona o atributo desabilitado no botão
					submit_btn.attr('disabled', true);
					
					// Modifica o texto do botão
					submit_btn.val('Enviando...');
					
					// Remove o erro (se existir)
					$('.error').remove();
				}, 
				
				// Captura a URL de envio do form
				url: form.attr('action'),
				
				// Captura o método de envio do form
				type: form.attr('method'),
				
				// Os dados do form
				data: dados,
				
				// Não processa os dados
				processData: false,
				
				// Não faz cache
				cache: false,
				
				// Não checa o tipo de conteúdo
				contentType: false,
				
				// Se enviado com sucesso
				success: function( data ) {	
					volta_submit();
					msg.addClass("alert-success").html("Cadastro realizado com sucesso <a href='javascript:;' class='fechar fr'><img src='../imagens/close.png' alt='Fechar'></a>").fadeIn("fast");
					fechaMensagem();
				},
				// Se der algum problema
				error: function (request, status, error) {
					msg.addClass("alert-error").text("Cadastro não efetuado. Tente novamente.");
					msg.addClass("alert-error").html("Cadastro não realizado. Tente novamente. <a href='javascript:;' class='fechar fr'><img src='../imagens/close.png' alt='Fechar'></a>").fadeIn("fast");
					fechaMensagem();
					// Volta o botão de submit
					volta_submit();
					
					// E alerta o erro
					alert(request.responseText);
				}
			});
		}

	// Anula o envio convencional
	return false;
});


	// $(document.body).on({
	//     click: function(e){
	//         var img_base64 = $(".image-base64").val();
	//         data_send = {"nome": "original.jpg", "base64": img_base64}

	//         $.ajax({
	//             method: "POST",
	//             url: "/depara/upload",
	//             contentType: "application/json",
	//             dataType: "json",
	//             data: JSON.stringify(data_send),
	//             success: function(response) {
	//                 console.log(response.img_path);
	//                 $(".img-path").text(response.img_path);
	//                 $(".img-path").attr("href", response.img_path);
	//             },
	//             error: function(response) {
	//                 alert("Erro ao enviar imagem.");
	//             }
	//         }); 
	//     }    
	// },'.enviar-arquivo');
})();