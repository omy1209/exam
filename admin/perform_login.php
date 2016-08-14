<?
include $_SERVER['DOCUMENT_ROOT'] . '/config.php';

$adminId = 'admin';
$adminPassword = '1111';

if ( $_REQUEST['loginId'] == $adminId and $_REQUEST['loginPassword'] == $adminPassword ){
	$_SESSION['adminLoginId'] = $adminId;
	
	$msg = '관리자 로그인 성공';
}
else {
	$msg = '관리자 로그인 실패';
}

?>
<script>
alert('<?=$msg?>');
location.replace('index.php');
</script>
