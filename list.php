<?php
include 'config.php';

$rows = getRows("SELECT * FROM article ORDER BY id DESC LIMIT 100");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<meta charset="utf-8">

<? include 'header.php'; ?>

<h1>리스트 페이지</h1>
<script>
// 현재 웹피이지가 다 로딩 된 후(</html> 까지 로딩 되었다는 의미) 실행할 함수 등록
$(function() {

});

function deleteArticle(id) {
	$.post(
		'perform_delete_v2.php',
	    {
		    id : id,
			ajaxMode : 1
		},
	    function(data) {
			if ( data.resultCode.substr(0, 1) == 'S' )
			{
				alert(data.msg);

				$('.list-item-' + id).remove();
			}
			else {
				alert(data.msg);
			}
		},
		'json'
	);
}
</script>
<?php foreach ( $rows as $row ) { ?>
<div class="list-item-<?=$row['id']?>">
ID : <?=$row['id']?><br>
등록날짜 : <?=$row['regDate']?><br>
조회수 : <?=$row['viewCnt']?><br>
제목 : <?=$row['title']?><br>
<a href="detail.php?id=<?=$row['id']?>">상세페이지로 이동</a>
<!--
<a href="perform_delete.php?id=<?=$row['id']?>">삭제</a>
-->
<button onclick="deleteArticle(<?=$row['id']?>)">삭제(ajax 버전)</button>
<hr>
</div>
<?php } ?>
