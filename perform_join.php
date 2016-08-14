<?php
include 'config.php';

$sql = "
SELECT COUNT(*) AS cnt
FROM `user`
WHERE loginId = '{$_REQUEST['loginId']}'
";
$row = getRow($sql);

if ( $row['cnt'] > 0 ) {
	?>
	<script>
	alert('[<?=$_REQUEST['loginId']?>]은(는) 이미 사용중인 아이디 입니다.');
	history.back();
	</script>
	<?
	exit;
}

$sql = "
SELECT COUNT(*) AS cnt
FROM `user`
WHERE nickname = '{$_REQUEST['nickname']}'
";
$row = getRow($sql);

if ( $row['cnt'] > 0 ) {
	?>
	<script>
	alert('[<?=$_REQUEST['nickname']?>]은(는) 이미 사용중인 닉네임 입니다.');
	history.back();
	</script>
	<?
	exit;
}

$sql = "
INSERT INTO `user`
SET regDate = NOW(),
loginId = '{$_POST['loginId']}',
loginPw = '{$_POST['loginPassword']}',
nickname = '{$_POST['nickname']}'
";
execute($sql);
?>
<script>
alert('회원가입이 완료되었습니다.');
location.replace('/index.php');
</script>