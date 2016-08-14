<?php
include 'config.php';

$sql = "
DELETE FROM article
WHERE id = '{$_GET['id']}'
";
execute($sql);

$link = "list.php";
?>
<script>
location.replace('<?=$link?>');
</script>