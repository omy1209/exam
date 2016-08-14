<?
include $_SERVER['DOCUMENT_ROOT'] . '/config.php';

unset($_SESSION['adminLoginId']);
?>
<script>
alert('관리자 로그아웃 되었습니다.');
location.replace('/');
</script>
