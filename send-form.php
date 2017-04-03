<?php
    
/*
$url = 'mailto:prof-hause@mail.ru ';
$safe_email=$safe_url='';
for($i=0; $i<strlen($email); $i++){
   $safe_email .= '&#'.ord($email{$i}).';';
}
for($i=0; $i<strlen($url); $i++){
   $safe_url .= '&#'.ord($url{$i}).';';
}
print "<a href='$safe_url'>$safe_email</a>";


$name = '';
$mail = '';
$tel = '';
$mess = '';
$ak2 = '';
*/

    
function getIp()
{if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
	$ip_address=$_SERVER['HTTP_X_FORWARDED_FOR'];
}

if (!isset($ip_address)){
		if (isset($_SERVER['REMOTE_ADDR']))	
		$ip_address=$_SERVER['REMOTE_ADDR'];
}
return $ip_address;
}

//taking info about date, IP and user agent

$timestamp = date("Y-m-d H:i:s");
$ip   = getIp();
$host = gethostbyaddr($ip); 
$user_agent = $_SERVER["HTTP_USER_AGENT"];

	
//taking the data from form	

$remont = array('Уровень ремонта','Ремонт под сдачу','Экономичный ремонт','Средний ремонт','Элитны ремонт');
$tel = addslashes(trim($_POST['tel']));
$sqw = addslashes(trim($_POST['sqw']));
$name = addslashes(trim($_POST['name']));
$rem = addslashes(trim($_POST['rem']));



//preparing mail
		
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=utf-8\n";
$headers .= "Content-Transfer-Encoding: quoted-printable\n";
$headers .= "From: igor.kevler@mail.ru\n";

$content = 
'Ваше имя: '.$name.'<br>'.
'Площадь: '.$sqw.'<br>'.
'Телефон: '.$tel.'<br>'.
'Уровень ремонта: '.$remont[$rem].'<br>'.
'Time: '.$timestamp.'<br>'.
'IP: '.$host.'<br>'.
'User agent: '.$user_agent;


//sending mail
	
mail("igor.kevler@mail.ru", "Под ключ- заявка с сайта", $content, $headers);
header('Content-Type: text/html; charset=utf-8');
echo 'Спасибо! Ваше письмо отправлено. Вы будете перенаправлены на страницу товара.'; 

echo "<script>
setTimeout(function() {
  window.history.back();
},1500);
</script>"; 
?>
