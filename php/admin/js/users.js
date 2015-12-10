(function(){
	$(document.body).on({
    	click: function(e){
	        var box_pai = $(this).parent();
	        var campo_real = box_pai.find('.ipt-file');
	        var campo_fake = box_pai.find('.texto');
	        campo_real.trigger("click");
	    }
	},'.btn-file');




	/*
	    Pega imagem e transforma em base64 e salva no input hidden 
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

	        // Verifica se o arquivo foi enviado para o input file
	        if (files && file) {
	            // Cria um novo reader para ler o conteúdo do arquivo
	            var reader = new FileReader();

	            reader.onload = function(readerEvt) {
	                var binaryString = readerEvt.target.result;
	                // Pega o input hidden e apaga o conteudo atual
	                input_file.parent().find(".image-base64").val();
	                // Insere o valor da imagem em Base64
	                input_file.parent().find(".image-base64").val(btoa(binaryString));
	            };

	            reader.readAsBinaryString(file);
	        }

	    }    
	},'.ipt-file');


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