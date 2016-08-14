<div>
	<? if ( isAdminLogined() ) { ?>
	<?=$_SESSION['adminLoginId']?>님 환영합니다.
	<a href="perform_logout.php">[로그아웃]</a>
	<? } ?>
</div>