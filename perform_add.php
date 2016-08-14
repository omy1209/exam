<?php
include 'config.php';
include 'login_check.php';

function getFileExt($type) {
	list(, $type) = explode('/', $type);
	
	if ( $type == 'jpeg' ) {
		$type = 'jpg';
	}
	
	return $type;
}

function getFileInfo($raw) {
	$info = [];
	$info['originName'] = $raw['name'];
	$info['ext'] = getFileExt($raw['type']);
	
	return $info;
}

$sql = "
SELECT id
FROM `user`
WHERE loginId = '{$_SESSION['loginId']}'
";
$row = getRow($sql);

$sql = "
INSERT INTO article
SET regDate = NOW(),
title = '{$_POST['title']}',
userId = '{$row['id']}'
";
execute($sql);

$sql = "SELECT LAST_INSERT_ID() AS newId";
$row = getRow($sql);

$linkUrl = "detail.php?id=" . $row['newId'];

$articleId = $row['newId'];

$fileInfos = [];

foreach ( $_FILES as $key => $file ) {
	$fileInfo = getFileInfo($file);
	
	$sql = "
	INSERT INTO articlefile
	SET regDate = NOW(),
	articleId = '{$articleId}',
	originName = '{$fileInfo['originName']}',
	ext = '{$fileInfo['ext']}',
	`name` = ''
	";
	execute($sql);
	
	$sql = "SELECT LAST_INSERT_ID() AS newId";
	$row = getRow($sql);
	
	$newFileId = $row['newId'];
	$newFileName = $newFileId . '.' . $fileInfo['ext'];
	
	$sql = "
	UPDATE articlefile
	SET `name` = '{$newFileName}'
	WHERE id = '{$newFileId}'
	";
	execute($sql);
	
	$newFilePath = $_SERVER['DOCUMENT_ROOT'] . '/file/article/' . $newFileName;
	
	move_uploaded_file($file['tmp_name'], $newFilePath);
}

?>
<script>
location.replace('<?=$linkUrl?>');
</script>