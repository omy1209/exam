<?php
include 'config.php';

$sql = "
UPDATE article
SET title = '{$_POST['title']}'
WHERE id = '{$_POST['id']}'
";
execute($sql);

$link = "detail.php?id=" . $_POST['id'];
?>
<script>
location.replace('<?=$link?>');
</script>