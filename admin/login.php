<? include $_SERVER['DOCUMENT_ROOT'] . '/config.php'; ?>
<? include 'header.php'; ?>
<meta charset="utf-8">
<h1>관리자 로그인</h1>
<script>
function submitForm(form) {
	if ( form.loginId.value == '' ) {
		alert('아이디를 입력해주세요');
		form.loginId.focus();
		
		return false;
	}

	if ( form.loginPassword.value == '' ) {
		alert('비밀번호를 입력해주세요');
		form.loginPassword.focus();
		
		return false;
	}
	
	form.submit();
}
</script>
<form onsubmit="submitForm(this); return false;" action="perform_login.php" method="POST">
<input type="text" name="loginId" placeholder="아이디">
<input type="password" name="loginPassword" placeholder="비밀번호">
<input type="submit" value="로그인">
</form>
