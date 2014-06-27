<?php
for ($i = 1; $i < 100; $i++) {
echo $i . ' is beging' . "\n";
if ($o = SendMail('190296465@qq.com', 'Cloud', 'test', '中文测试邮件' . $i))
	echo $i . ' is ok!' . "\n";
else
	echo $i . ' is error! msg:' . $o . "\n";
echo '###########################################' . "\n" ;
sleep(5);
}




function SendMail($to, $name, $subject = '', $body = '', $attachment = null) {
$config = array(
	'SMTP_HOST' => 'smtp.qq.com', //SMTP服务器
	'SMTP_PORT' => '465', //SMTP服务器端口
	'SMTP_USER' => '190296465@qq.com', //SMTP服务器用户名
	'SMTP_PASS' => 'nys312', //SMTP服务器密码
	'FROM_EMAIL' => '190296465@qq.com', //发件人EMAIL
	'FROM_NAME' => 'Cloud', //发件人名称
	'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
	'REPLY_NAME' => '', //回复名称（留空则为发件人名称）
);
require_once('PHPMailer.php');
$mail = new PHPMailer(); //PHPMailer对象
$mail->CharSet = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
$mail->IsSMTP();  // 设定使用SMTP服务
$mail->SMTPDebug = 0;                     // 关闭SMTP调试功能
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true;                  // 启用 SMTP 验证功能
$mail->SMTPSecure = 'ssl';                 // 使用安全协议
$mail->Host = $config['SMTP_HOST'];  // SMTP 服务器
$mail->Port = $config['SMTP_PORT'];  // SMTP服务器的端口号
$mail->Username = $config['SMTP_USER'];  // SMTP服务器用户名
$mail->Password = $config['SMTP_PASS'];  // SMTP服务器密码
$mail->SetFrom($config['FROM_EMAIL'], $config['FROM_NAME']);
$replyEmail = $config['REPLY_EMAIL'] ? $config['REPLY_EMAIL'] : $config['FROM_EMAIL'];
$replyName = $config['REPLY_NAME'] ? $config['REPLY_NAME'] : $config['FROM_NAME'];
$mail->AddReplyTo($replyEmail, $replyName);
$mail->Subject = $subject;
$mail->MsgHTML($body);
$mail->AddAddress($to, $name);
if (is_array($attachment)) { // 添加附件
	foreach ($attachment as $file) {
		is_file($file) && $mail->AddAttachment($file);
	}
} else {
	is_file($attachment) && $mail->AddAttachment($attachment);
}
return $mail->Send() ? true : $mail->ErrorInfo;
}
?>