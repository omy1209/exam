<?php
include 'config.php';

$articleId = $_GET['id'];
$row = getRow("SELECT * FROM article WHERE id = '{$articleId}'");
?>
<meta charset="utf-8">
<h1>게시물 수정</h1>
<form action="perform_modify.php" method="POST">
<input type="hidden" name="id" value="<?=$row['id']?>">
<input type="text" name="title" placeholder="제목" value="<?=$row['title']?>">
<input type="submit" value="게시물 수정">
</form>
<div>
    <a href="list.php">리스트 페이지로 이동하기</a>
</div>
