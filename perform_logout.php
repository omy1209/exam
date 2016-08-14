<?
include 'config.php';

unset($_SESSION['loginId']);
?>
<script>
alert('로그아웃 되었습니다.');
location.replace('index.php');
</script>