<?php
include 'config.php';

$sql = "
DELETE FROM articlereply
WHERE id = '{$_POST['id']}'
";
execute($sql);

$result = array(
    'resultCode' => 'S-1',
	'msg' => '댓글이 삭제되었습니다.',
	'id' => $_POST['id']
);

echo json_encode($result);