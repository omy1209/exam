<?
include 'config.php';

$sql = "
SELECT COUNT(*) AS cnt, loginPw
FROM `user`
WHERE loginId = '{$_REQUEST['loginId']}'
";
$row = getRow($sql);

$resultCode = '';

if ( empty($resultCode) ) {
	if ( $row['cnt'] == 0 ) {
		$resultCode = 'F-1';
		$msg = '존재하지 않는 회원입니다.';
	}
}

if ( empty($resultCode) ) {
	if ( $row['loginPw'] != $_REQUEST['loginPw'] ) {
		$resultCode = 'F-2';
		$msg = '비밀번호를 정확히 입력해주세요.';
	}
}

if ( empty($resultCode) ) {
	$_SESSION['loginId'] = $_REQUEST['loginId'];
	$resultCode = 'S-1';
	$msg = '환영합니다.';
}
?>
<script>
alert('<?=$msg?>');
location.replace('index.php');
</script>