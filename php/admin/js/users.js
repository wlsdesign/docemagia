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
	Criar Usuário
 */
var enviando_formulario = false;
$('#addusuario').submit(function(){
	var msg = $('.alertas');
	var obj_pai = $(this);
	// Inputs
	var ipt_nome = obj_pai.find('.nome');
	var ipt_login = obj_pai.find('.login');
	var ipt_senha = obj_pai.find('.senha');
	var ipt_foto = obj_pai.find('.ipt-file');

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
					// var clona = 
					// 	'<tr class="tr-body" data-id="<?php echo $ln["id"] ?>">'+
					// 		'<td class="col-3"><?php echo $ln["nome"] ?></td>' +
					// 		'<td class="col-3"><?php echo $ln["login"] ?></td>'+
					// 		'<td class="col-3"><a href="index.php?idUser=<?php echo $ln["id"] ?>" class="editar" title="Alterar"><img src="../imagens/editar.png" alt=""></a>'+ 
					// 		'<a href="javascript:;" class="excluir" title="Excluir"><img src="../imagens/trash.png" alt=""></a>'+
					// 		'</td>'+
					// 	'</tr>';
					ipt_nome.val("");
					ipt_login.val("");
					ipt_senha.val("");
					ipt_foto.val("");
					msg.addClass("alert-success").html("Cadastro realizado com sucesso <a href='javascript:;' class='fechar fr'><img src='../imagens/close.png' alt='Fechar'></a>").fadeIn("fast");
					setTimeout(function(){
						msg.fadeOut("slow");		
				 	}, 3000);
					
					fechaMensagem();
					setTimeout(function(){
						window.location.reload();		
				 	}, 3000);
				},
				// Se der algum problema
				error: function (request, status, error) {
					msg.addClass("alert-error").html("Cadastro não realizado. Tente novamente. <a href='javascript:;' class='fechar fr'><img src='../imagens/close.png' alt='Fechar'></a>").fadeIn("fast");
					setTimeout(function(){
						msg.fadeOut("slow");
					}, 3000);
					fechaMensagem();
					
					// E alerta o erro
					alert(request.responseText);
				}
			});
		}

	// Anula o envio convencional
	return false;
});

/* 
	Excluir Usuário
 */
var enviando_formulario = false;
$('.excluir').on('click', function(){
	var msg = $('.alertas');
	var data_id = $(this).parents('.tr-body');

	// O objeto do formulário
		var obj = this;
		
		// O objeto jQuery do formulário
		var form = $(obj);
		
		// O botão de submit
		var submit_btn = $('.excluir');
		
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
			if(confirm("Tem certeza que desejar excluir esse usuário?")){
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
				url: 'exclui-usuario.php?excluir='+ data_id.attr('data-id'),
				
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
					data_id.fadeOut().remove();
					msg.addClass("alert-success").html("Usuário excluído com sucesso <a href='javascript:;' class='fechar fr'><img src='../imagens/close.png' alt='Fechar'></a>").fadeIn("fast");
					setTimeout(function(){
						msg.fadeOut("slow");
					}, 3000);
					fechaMensagem();
				},
				// Se der algum problema
				error: function (request, status, error) {
					msg.addClass("alert-error").html("usuário nao excluído. Tente novamente. <a href='javascript:;' class='fechar fr'><img src='../imagens/close.png' alt='Fechar'></a>").fadeIn("fast");
					setTimeout(function(){
						msg.fadeOut("slow");
					}, 3000);
					fechaMensagem();
					// Volta o botão de submit
					volta_submit();
					
					// E alerta o erro
					alert(request.responseText);
				}
			});
			}else{
				return false;
			}
		}

	// Anula o envio convencional
	return false;
});



/* 
	Alterar usuário
 */
var enviando_formulario = false;
$('#form').submit(function(){
	var msg = $('.alertas');
	var obj_pai = $(this);
	// Inputs
	var ipt_nome = obj_pai.find('.nome');
	var ipt_login = obj_pai.find('.login');
	var ipt_foto = obj_pai.find('.ipt-file');

	// O objeto do formulário
		var obj = this;
		
		// O objeto jQuery do formulário
		var form = $(obj);
		
		// O botão de submit
		var submit_btn = $('#form :submit');
		
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
					obj_pai.parents('.popup').fadeOut('fast');
					ipt_nome.val("");
					ipt_login.val("");
					ipt_foto.val("");
					msg.addClass("alert-success").html("Alteração realizada com sucesso <a href='javascript:;' class='fechar fr'><img src='../imagens/close.png' alt='Fechar'></a>").fadeIn("fast");
					setTimeout(function(){
						msg.fadeOut("slow");
				 	}, 3000);
					
					fechaMensagem();
				},
				// Se der algum problema
				error: function (request, status, error) {
					msg.addClass("alert-error").html("Alteração não realizada. Tente novamente. <a href='javascript:;' class='fechar fr'><img src='../imagens/close.png' alt='Fechar'></a>").fadeIn("fast");
					setTimeout(function(){
						msg.fadeOut("slow");
					}, 3000);
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