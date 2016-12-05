<?php
	header('Content-type: application/json');

	$datas = array('name', 'email', 'phone', 'description', 'visual_identity', 'create_site', 'create_system');
	$fields = array('Nome', 'E-mail', 'Telefone', 'Descrição');
	$fields_values = array();
	$errors = '';
	$obj = new stdClass();

	if(!isset($_GET['visual_identity']) && !isset($_GET['create_site']) && !isset($_GET['create_system']))
		$errors = 'Selecione ao menos uma das opções de serviços.';

	if($errors == ''){
		foreach($datas as $key => $data){
			if($data != 'phone' && (!isset($_GET[$data]) || $_GET[$data] == '' || $_GET[$data] == null) &&
				!($data == 'phone' || $data == 'create_site' || $data == 'create_system')){
				$errors = 'Por favor, preencha o campo ' . $fields[$key] . '.';
				break;
			}
			
			$fields_values[$data] = $_GET[$data];
		}
	}
	
	if($errors != ''){
		$obj->success = false;
		$obj->message = $errors;
		
	} else {
	
		$to      = 'info@hebsix.com.br';
		$subject = '[ORÇAMENTO] ' . $fields_values['name'] . ' solicitou um orçamento.';
		$message = 'Nome: ' . $fields_values['name'] . ' <br> ' .
				   'E-mail: ' . $fields_values['email'] . ' <br> ' .
				   'Telefone: ' . $fields_values['phone'] . ' <br> ' .
				   'Serviços: ' . (isset($fields_values['visual_identity']) ? 'Identidade Visual ' : '')
				   				. (isset($fields_values['create_site']) ? 'Criação de Site ' : '')
								. (isset($fields_values['create_system']) ? 'Criação de Sistema ' : '') .
				   '<br>Descrição: ' . $fields_values['description'] .'';
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