<?
include 'config.php';
// 역대 가장 많은 댓글을 받은 게시물 TOP 10

$sql = "
SELECT article.*,
COUNT(articlereply.id) AS repliesCnt
FROM article
LEFT JOIN articlereply
ON article.id = articlereply.articleId
GROUP BY article.id
ORDER BY repliesCnt DESC
LIMIT 10
";
$topRepliesArticles = getRows($sql);
?>
<meta charset="utf-8">
<? include_once 'header.php'; ?>

<h1>역대 가장 많은 댓글이 달린 게시물 TOP 10</h1>

<table border="1">
<tr>
	<th>랭킹</th>
	<th>게시물 번호</th>
	<th>제목</th>
	<th>날짜</th>
	<th>댓글 수</th>
</tr>
<? foreach ( $topRepliesArticles as $index => $article ) { ?>
<tr>
	<td><?=$index + 1?>등</td>
	<td><?=$article['id']?></td>
	<td><?=$article['title']?></td>
	<td><?=$article['regDate']?></td>
	<td><?=$article['repliesCnt']?></td>
</tr>
<? } ?>
</table>

<?
// 역대 가장 많은 댓글을 받은 게시물 TOP 10
$sql = "
SELECT *
FROM article
ORDER BY viewCnt DESC
LIMIT 10
";
$topViewArticles = getRows($sql);
?>

<h1>역대 가장 많은 조회수를 기록한 게시물 TOP 10</h1>

<table border="1">
<tr>
	<th>랭킹</th>
	<th>게시물 번호</th>
	<th>제목</th>
	<th>날짜</th>
	<th>조회 수</th>
</tr>
<? foreach ( $topViewArticles as $index => $article ) { ?>
<tr>
	<td><?=$index + 1?>등</td>
	<td><?=$article['id']?></td>
	<td><?=$article['title']?></td>
	<td><?=$article['regDate']?></td>
	<td><?=$article['viewCnt']?></td>
</tr>
<? } ?>
</table>
