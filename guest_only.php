<?
if ( isLogined() === true ) {
	if ( isAjax() ) {
		$resultData = [
			'resultCode' => 'F-1',
			'msg' => '이미 로그인 되어 있습니다.'
		];

		echo json_encode($resultData);
	}
	else {
		?>
		<script>
		alert('이미 로그인 되어 있습니다.');
		location.replace('index.php');
		</script>
		<?
	}
	exit;
}
?>