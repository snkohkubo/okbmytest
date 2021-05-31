<?

$recaptcha = htmlspecialchars($_POST["g-recaptcha-response"],ENT_QUOTES,'UTF-8');

if(isset($recaptcha)){
	$captcha = $recaptcha;
}else{
	$captcha = "";
	echo "captchaエラー";
	exit;
}
$secretKey = "6LfTVgEbAAAAACUKvvOjmRvnT5oh5RkFMYY-WKOi";

$resp = @file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}");
$resp_result = json_decode($resp,true);

if(intval($resp_result["success"]) !== 1) {
	//認証失敗時の処理をここに書く
    echo "captchaNG";
}else{
	//認証成功時の処理をここに書く
	//ここにmailsend等の記述をする。
    echo "captchaOK";
}