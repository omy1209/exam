<?php
include 'config.php';
include 'guest_only.php';
?>
<meta charset="utf-8">
<h1>회원가입</h1>
<script>
function submitForm(form) {
	if ( form.loginId.value == '' ) {
		alert('아이디를 입력해주세요');
		form.loginId.focus();
		
		return false;
	}

	if ( form.nickname.value == '' ) {
		alert('닉네임을 입력해주세요');
		form.nickname.focus();
		
		return false;
	}
	
	if ( form.loginPassword.value == '' ) {
		alert('비밀번호를 입력해주세요');
		form.loginPassword.focus();
		
		return false;
	}
	
	if ( form.loginPassword.value != form.loginPasswordConfirm.value ) {
		alert('비밀번호 확인을 동일하게 입력해주세요.');
		form.loginPasswordConfirm.focus();
		
		return false;
	}
	
	form.submit();
}
</script>
<form onsubmit="submitForm(this); return false;" action="perform_join.php" method="POST">
<input type="text" name="loginId" placeholder="아이디">
<input type="text" name="nickname" placeholder="닉네임">
<input type="password" name="loginPassword" placeholder="비밀번호">
<input type="password" name="loginPasswordConfirm" placeholder="비밀번호 확인">
<input type="submit" value="회원가입">
</form>
<div>
    <a href="list.php">리스트 페이지로 이동하기</a>
</div>
