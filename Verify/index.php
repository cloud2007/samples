<?php
$array = array();
$Domain = $_POST['Domain'];
$Code = $_POST['Code'];
$String = file_get_contents('CODE');
$StringArray = explode("\r\n", $String);
if (in_array("{$Code}:{$Domain}", $StringArray)) {
    $array['Y'] = 1;
    $array['INFO'] = '您已通过商业授权！';
} else {
    $array['Y'] = 0;
    $array['INFO'] = '<p style="width:500px; margin:200px auto; padding:20px; border:1px solid #A0522D; border-radius:10px; color:#A0522D; background:#FFF; font: 30px/60px Microsoft Yahei; ">您的授权已经终止!请与管理员联系.联系QQ:190296465</p>';
}
echo json_encode($array);
?>