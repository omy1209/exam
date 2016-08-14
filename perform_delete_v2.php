<?php
include 'config.php';

if ( isAdminLogined() == false )
{
	include 'login_check.php';
	
	$sql = "
	SELECT *
	FROM article
	WHERE id = '{$_REQUEST['id']}'
	";
	$row = getRow($sql);

	$sql = "
	SELECT id
	FROM `user`
	WHERE loginId = '{$_SESSION['loginId']}'
	";
	$row2 = getRow($sql);

	if ( $row['userId'] != $row2['id'] ) {
		$result = array(
			'resultCode' => 'F-1',
			'msg' => '권한이 없습니다.'
		);

		echo json_encode($result);
		
		exit;
	}
}

// 로그인이 되어있진 않다면 프로그램 종료
// - login_check.php 인클루드[완료]
// 이 게시물이 내가 쓴 게시물이 아닌 경우 프로그램 종료
// - 입력받은 id로 article 정보 가져오기
// - 현재 나의 세션에 저장된 로그인 아이디를 통해 회원
//   ID 받아오기
// - article 의 userId와 나의(로그인 된 회원)

$sql = "
DELETE FROM article
WHERE id = '{$_REQUEST['id']}'
";
execute($sql);

$result = array(
    'resultCode' => 'S-1',
	'msg' => '게시물이 삭제되었습니다.'
);

echo json_encode($result);