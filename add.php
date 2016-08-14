<?php
include 'config.php';
include 'login_check.php';
?>
<meta charset="utf-8">
<h1>게시물 작성</h1>
<form enctype="multipart/form-data" action="perform_add.php" method="POST">
<input type="text" name="title" placeholder="제목">
<br>
<textarea name="body" placeholder="본문">
</textarea>
<br>
<input type="file" name="img1" placeholder="이미지 1">
<br>
<input type="file" name="img2" placeholder="이미지 2">
<br>
<input type="submit" value="게시물 작성">
</form>
<div>
    <a href="list.php">리스트 페이지로 이동하기</a>
</div>
