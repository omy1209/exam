<?php
include 'config.php';
include 'login_check.php';

$sql = "
SELECT id
FROM `user`
WHERE loginId = '{$_SESSION['loginId']}'
";
$row = getRow($sql);

$userId = $row['id'];

$sql = "
INSERT INTO articlereply
SET regDate = NOW(),
articleId = '{$_POST['articleId']}',
body = '{$_POST['body']}',
userId = '{$userId}'
";
execute($sql);   

$link = 'detail.php?id=' . $_POST['articleId'];
?>
<script>
location.replace('<?=$link?>');
</script>