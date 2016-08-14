<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
	alert($('#ajax-btn').text());
	
	function call() {
		alert('통신시작하겠습니다.');
		$.post(
		    'json_test4.php',
			{
				'id' : 3
			},
			function(data) {
				alert(data.name);
			},
			'json'
		);
	}
	
	$('#ajax-btn').on('click', call);
});
</script>
<button id="ajax-btn">아작스 통신 시작!!</button>