<?
include 'config.php';

$sql = "
DELETE FROM articleReply
WHERE id = {$_POST['id']}
";
execute($sql);

$r = [
	'name' => 'JHS',
];

echo json_encode($r);
?>