<?php
session_start();
$dbmsHost = 'sql105.epizy.com'; // 또는 127.0.0.1
$dbmsId = 'epiz_18722831';
$dbmsPw = 'aldus1209';
$dbName = 'epiz_18722831_School';
$dbPort = '3306';

// DB 연결
$link = mysqli_connect($dbmsHost,
$dbmsId, $dbmsPw, $dbName, $dbPort) or die();


// DB 연결을 UTF-8 모드로 설정
mysqli_query($link, "SET NAMES utf8;");

// 쿼리실행결과 다수의 줄(row)을 가져오기
// 사용법 : $rows = getRows("SELECT * FROM article");
function getRows($sql) {
	// 외부에 있는 $link 변수를 함수안에서 사용하겠다는 의미
	global $link;

    // 빈 배열선언
	$rows = array();

	// SELECT * FROM article 쿼리 실행
	$result = mysqli_query($link, $sql);

	if ( $result === true ) {
		return null;
	}

	// 쿼리 결과를 맵으로 받아오기
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

// 쿼리실행결과 1줄(row)을 가져오기
function getRow($sql) {
	list($row) = getRows($sql);

	/*
	위 list($row) = getRows($sql); 와 똑같은 처리를 다르게 하는 방법

	$rows = getRows($sql);
	$row = $rows;
	*/

	return $row;
}

// 사용법 : execute("DELETE FROM article");
function execute($sql) {
	getRows($sql);
}

function isLogined() {
	$isLogined = isset($_SESSION['loginId']);

	return $isLogined;
}

function isAjax() {
	return isset($_REQUEST['ajaxMode']);
}

function isAdminLogined() {
	$isLogined = isset($_SESSION['adminLoginId']);

	return $isLogined;
}
