<?php
include 'config.php';

$articleId = $_GET['id'];

execute("UPDATE article SET viewCnt = viewCnt + 1 WHERE id = '{$articleId}'");
$row = getRow("SELECT * FROM article WHERE id = '{$articleId}'");
?>
<meta charset="utf-8">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<h1>상세 페이지</h1>
ID : <?=$row['id']?><br>
등록날짜 : <?=$row['regDate']?><br>
조회수 : <?=$row['viewCnt']?><br>
제목 : <?=$row['title']?><br>

<br>

<?php
// 게시물 댓글들 얻어오기
$sql = "
SELECT * FROM articlereply
WHERE articleId = '{$_GET['id']}'
ORDER BY id DESC
";
$replies = getRows($sql);
?>
<script>
function deleteReply(replyId) {
	$.post(
		'perform_delete_reply.php',
		{
			id : replyId
		},
		function(data) {
			$('.reply-' + data.id).remove();

			alert(data.msg);
		},
		'json'
	);
}
</script>
<? foreach ( $replies as $reply ) { ?>
<div class="reply-<?=$reply['id']?>">
<?=$reply['regDate']?> : <?=$reply['body']?>
<button onclick="deleteReply(<?=$reply['id']?>);">댓글삭제</button>
<hr>
</div>
<? } ?>

<form method="POST" action="perform_add_reply.php">
<input type="hidden" name="articleId" value="<?=$row['id']?>">
<input type="text" name="body">
<input type="submit" value="댓글입력">
</form>

<div>
    <a href="list.php">리스트 페이지로 이동하기</a>
	<a href="add.php">생성</a>
	<a href="modify.php?id=<?=$row['id']?>">수성</a>
</div>

