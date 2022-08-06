<?php 
$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null;
$erro_recaptcha = $GLOBALS;
if(!is_null($captcha)){
	$res = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfpklIhAAAAAL2vuw8agNA4mkK_5--jkmHszDUY&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']));
	if($res->success === true){
		//CAPTCHA validado!!!
		header('location: index.php');
	}
	else{
		return $erro_recaptcha['erro_recaptcha'] = 'reCAPTCHA inválido!';
	}
}
?>