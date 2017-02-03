var contact = {
	sendForm: function(){
		contact.validateDate();
		$.ajax({
			url: 'controllers/?action=contact',
			method: "POST",
			dataType: "json",
			data: $("#contact-form").serialize(),
			success: function(data){
				if(data.retorno){
					alert("Sua consulta foi enviada com sucesso");
					//location.reload();
					$("#contact-form")[0].reset();

				}else{
					alert("Não foi  possível enviar a sua consulta");
				}
			}
		
		})
	},
	validateDate: function(){
		
		if($("#data_saida").val() != "" && $("#data_retorno").val() != ""){
			var inputDataPartida = $("#dtp_data_saida").val().split(" ");
			var dataP = inputDataPartida[0].split("-");
			
			//var horaPartida = inputDataPartida[1];
			var horaPartida = inputDataPartida[1].split(":");
			
			var dataPartida = new Date(dataP[0], dataP[1]-1, dataP[2], horaPartida[0], horaPartida[1]);
			console.debug(dataPartida);
			//console.debug($('.tx_data_horario').formatDate("yy-mm-dd", inputDataPartida[0]));

			var inputDataRetorno = $("#dtp_data_retorno").val().split(" ");
			var dataR = inputDataRetorno[0].split("-");
			console.debug(dataR);
			var horaRetorno	= inputDataRetorno[1].split(":");
			var dataRetorno = new Date(dataR[0], dataR[1]-1, dataR[2], horaRetorno[0], horaRetorno[1]);
			
			console.debug(dataRetorno);
			if(dataPartida > dataRetorno){
				$("#data_retorno").focus();
				alert("A data/Hora de retorno não pode ser menor que a data de retorno");
				return false;
			}
			
			/*if(dataPartida == dataRetorno){
				
				var comparaHoraRetorno = horaRetorno.split(":");
				
				if(comparaHoraPartida[0] > comparaHoraRetorno[0]){
					
					$("#data_saida").focus();
					alert("A hora de saída não pode ser maior que a hora de chegada");
					return false;

				}else if(comparaHoraPartida[0] == comparaHoraRetorno[0]){
					
					if(comparaHoraPartida[1] > comparaHoraRetorno[1]){
						
						$("#data_saida").focus();
						alert("A hora de saída não pode ser maior que a hora de chegada");
						return false;

					}/*else if(comparaHoraPartida[1] == comparaHoraRetorno[1]){
						
						if(comparaHoraPartida[2] > comparaHoraRetorno[2]){
							$("#data_saida").focus();
							alert("A hora de saída não pode ser maior que a hora de chegada");
							return false;
						}	
					}
				}
			}*/
		}	 
	}
}	