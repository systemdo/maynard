<?php 
class ContactController{
	
	function sendContact(){
		try{

			$contact = new ContactForm();

			$contact->setNome($this->sanitize('nome'));
			if(!empty($_POST['telefone'])){
				$contact->setTelefone($this->sanitize('telefone'));
			}
			if(!empty($_POST['n_passageiros'])){
				$contact->setNuPassageiros($this->sanitize('n_passageiros'));
			}

			if(!empty($_POST['local_saida'])){
				$contact->setLocalSaida($this->sanitize('local_saida'));
			}


			if(!empty($_POST['local_destino'])){
				$contact->setLocalDestino($this->sanitize('local_destino'));
			}

			if(!empty($_POST['veiculo'])){
				$contact->setVeiculo($this->sanitize('veiculo'));
			}

			$contact->setEmail($this->sanitizeEmail('email'));

			if(!empty($_POST['data_saida'])){
				$contact->setDataSaida($this->sanitize('data_saida'));
			}	

			if(!empty($_POST['data_retorno'])){
				$contact->setDataRetorno($this->sanitize('data_retorno'));
			}

			if(!empty($_POST['texto_consulta'])){
				$contact->setTextoConsulta($this->sanitize('texto_consulta'));
			}

			$this->sendEmail($contact);
			echo json_encode(array('retorno'=> true));

		}catch(Exception $e){
			echo json_encode(array('retorno' => false , 'mensagem' => $e->getMessage()));
		}
		

	} 

	function sanitize($name){
		$validate = filter_input(INPUT_POST , $name, FILTER_SANITIZE_STRING);
		if($validate){
			return $name = htmlentities($validate);
		}
		throw new Exception("O campo de ucfirst($name) contém erro");
		return false;
	}
	/**
	 * Tratar e verificar se o email é valido
	 * @param type $email 
	 * @return type
	 */
	function sanitizeEmail($email){
		$validate = filter_input(INPUT_POST, $email, FILTER_VALIDATE_EMAIL);
		if($validate){
			return htmlentities($validate);
		}
		throw new Exception("O Email é invalido");
		return false;
	}
	/**
	 * Enviar email 
	 * @param ContactForm $contact 
	 * @return Exception 
	 */
	function sendEmail(ContactForm $contact){
		$message = '<html><body>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= "<tr style='background: #eee;'><td><strong>Nome:</strong> </td><td>" . strip_tags($contact->getNome()) . "</td></tr>";
		$message .= "<tr><td><strong>Email:</strong> </td><td>" .strip_tags($contact->getEmail()). "</td></tr>";

		if(!empty($contact->getTelefone())){
			$message .= "<tr><td><strong>Telefone:</strong> </td><td>" .strip_tags($contact->getTelefone()). "</td></tr>";
		}

		if(!empty($contact->getNuPassageiros())){
			$message .= "<tr><td><strong>Passageiros:</strong> </td><td>" .strip_tags($contact->getNuPassageiros()). "</td></tr>";
		}

		if(!empty($contact->getLocalSaida())){
			$message .= "<tr><td><strong>Local Saída:</strong> </td><td>" .strip_tags($contact->getLocalSaida()). "</td></tr>";
		}
		if(!empty($contact->getLocalDestino())){
			$message .= "<tr><td><strong>Local Destino:</strong> </td><td>" .strip_tags($contact->getLocalDestino()). "</td></tr>";
		}

		if(!empty($contact->getDataSaida())){
			$message .= "<tr><td><strong>Data de Saída:</strong> </td><td>" .strip_tags($contact->getDataSaida()). "</td></tr>";
		}

		if(!empty($contact->getDataRetorno())){
			$message .= "<tr><td><strong>Data de Retorno:</strong> </td><td>" .strip_tags($contact->getDataRetorno()). "</td></tr>";
		}
		
		if(!empty($contact->getVeiculo())){
			$message .= "<tr><td><strong>Veículo:</strong> </td><td>" .strip_tags($contact->getVeiculo()). "</td></tr>";
		}

		if(!empty($contact->getTextoConsulta())){
			$message .= "<tr><td><strong>Texto de Consulta:</strong> </td><td>" .strip_tags($contact->getTextoConsulta()). "</td></tr>";
		}
		$message .= "<tr><td><strong>Ip Solicitante:</strong> </td><td>" . $this->getRealIp() . "</td></tr>";

		$message .= "<tr><td><strong>Local Solicitante:</strong> </td><td>" . gethostbyaddr($this->getRealIp()) . "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";

		//$to = 'lukinhasmad@gmail.com';
		//$to = 'aloysiomaynard@hotmail.com';
		$to = 'jean.silva@gmail.com';

		//$subject = "Consulta Cliente(". $contact->getNome().")";
		$subject = "Consulta Cliente";

		
		$headers = "From: " . $contact->getEmail() . "\r\n";
		$headers .= "Cc: lukinhasmad@gmail.com \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		if (mail($to, $subject, $message, $headers)) {
			return true;
			//echo 'Your message has been sent.';
		} else {
			throw new Exception("Email não enviado");
		}

	}

	function getRealIp() {
       if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  //check ip from share internet
       	$ip=$_SERVER['HTTP_CLIENT_IP'];
       } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
       	$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
       } else {
       	$ip=$_SERVER['REMOTE_ADDR'];
       }
       return $ip;
   }
}
?>