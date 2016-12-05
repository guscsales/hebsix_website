<?php
	header('Content-type: application/json');

	$datas = array('name', 'email', 'phone', 'message');
	$fields = array('Nome', 'E-mail', 'Telefone', 'Descrição');
	$fields_values = array();
	$errors = '';
	$obj = new stdClass();

	foreach($datas as $key => $data){
		if($data != 'phone' && (!isset($_GET[$data]) || $_GET[$data] == '' || $_GET[$data] == null)){
			$errors = 'Por favor, preencha o campo ' . $fields[$key] . '.';
			break;
		}
		
		$fields_values[$data] = utf8_decode($_GET[$data]);
	}
	
	if($errors != ''){
		$obj->success = false;
		$obj->message = $errors;
		
	} else {
	
		$to      = 'info@hebsix.com.br';
		$subject = '[CONTATO] ' . $fields_values['name'] . ' entrou em contato pelo site.';
		$message = 'Nome: ' . $fields_values['name'] . ' <br> ' .
				   'E-mail: ' . $fields_values['email'] . ' <br> ' .
				   'Telefone: ' . $fields_values['phone'] . ' <br> ' .
				   '<br>Mensagem: <br>' . $fields_values['message'] .'';
				   
		$headers = 'From: ' . $to . '\r\n';
		
		$headers .= "MIME-Version: 1.1\r\n";		

		$headers .= "Content-type: text/html; charset=UTF-8\r\n";

		$headers .= "Reply-To: " . $fields_values['email'] . "\r\n";
		

		$headers .= "X-Priority: 1\r\n";

		if(mail($to, $subject, $message, $headers, "YOUR_HOST")){
			$obj->success = true;
			$obj->message = 'E-mail enviado com sucesso!';
		} else {
			http_response_code(500);

			$obj->success = false;
			$obj->message = 'Um erro ocorreu.';
		};

	}
	
	die(json_encode($obj));
?>