<?
$array = [
    'name' => '장희성',
	'age' => 31,
	'address' => [
		'dong' => '계산동',
		'bunji' => '365-305'
	]
];
?>
<meta charset="utf-8">
<?=json_encode($array)?>
<script>
var man = "장희성";
alert(man);

var age = 1231;

var man2 = {
	name : '장희성',
	age : 31,
	address : {
		dong : '계산동',
		bunji : '305-365'
	}
}
alert(man2.name + ' / ' + man2.age);
alert(man2['address']['dong'] + ' / ' + man2['address']['bunji']);
</script>

