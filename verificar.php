<?php
$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null;
$erro_recaptcha = $GLOBALS;
if (!is_null($captcha)) {
	$res = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfpklIhAAAAAL2vuw8agNA4mkK_5--jkmHszDUY&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']));
	if ($res->success === true) {
		//CAPTCHA validado!!!
		if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['mensagem'])) {

			//RECEBER VALORES VINDO DO POST E LIMPAR
			$nome = limpaPost($_POST['nome']);
			$email = limpaPost($_POST['email']);
			$telefone = limpaPost($_POST['telefone']);
			$telefone = str_replace('(', '', $telefone);
			$telefone = str_replace(')', '', $telefone);
			$telefone = str_replace('-', '', $telefone);
			$mensagem = limpaPost($_POST['mensagem']);
		
		
			//Verificar se os valores do post estão vazios
			if (empty($nome) || empty($email) || empty($telefone) || empty($mensagem)) {
				$erro_geral = "Todos os campos são obrigatórios";
			} else {
				//Instanciar a classe Formulario
				$cliente = new Formulario($nome, $email, $telefone, $mensagem);
		
				//Validar formulario
				$cliente->validar_formulario();
		
				//se não houver erros:
				if (empty($cliente->erro)) {
					//inserir
					$cliente->insert();
					$mail = new PHPMailer(true);
		
					//Tentar enviar email
					try {
						$mail->isSMTP();   //Send using SMTP        
						$mail->CharSet = 'UTF-8';
						$mail->Encoding = 'base64';
						$mail->Host       = 'smtp.gmail.com';                     //definindo SMTP server de envio
						$mail->SMTPAuth   = true;
						$mail->Username   = 'nathan.maia99@gmail.com';                     //login do email 
						$mail->Password   = 'fnxbogfwrjvjdkid';                               //senha de app
						$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
						$mail->Port       = 465;
						//Recipients
						$mail->setFrom('nathan.maia99@gmail.com', 'Mensagem do Cliente'); //qm esta mandando email
						$mail->addAddress($email, $nome, 0);     //Enviando para o cliente
						//Content
						$mail->isHTML(true); //CORPO do email com HTML
						$mail->Subject = 'Atendimento ao cliente!'; //titulo do email
						$mail->Body    = 'Olá ' . $nome . '! <br><br>
						Obrigado por entrar em contato conosco!<br><br>
						Logo, um de nossos atendentes irá responder sua mensagem.<br><br>
						
						Atenciosamente,<br><br>
						
						Equipe Design.';
		
						$mail->send();
						$_POST['nome'] = '';
						$_POST['email'] = '';
						$_POST['telefone'] = '';
					} catch (Exception $e) {
						echo "Houve um problema ao enviar e-mail de confirmação: {$mail->ErrorInfo}";
					}
				}
			}
			header('location: index.php');
		}
	} else {
		echo 'Recaptcha inválido';
	}
}
