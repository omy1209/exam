<div>
	<a href="main.php">메인페이지</a>
	<a href="list.php">리스트</a>
	<? if ( isLogined() == false ) { ?>
	<? include 'login.php'; ?>
	<? } else { ?>
	<?=$_SESSION['loginId']?>님 환영합니다.
	<a href="add.php">글쓰기</a>
	<a href="perform_logout.php">[로그아웃]</a>
	<? } ?>
</div>