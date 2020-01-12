<?php
require_once '../request/request.php';
require_once '../controller/PostForm.php';

// サーバー側の設定により、エンドポイントは必ずこのファイルにくるように設定する

// リクエスト情報の管理
$request = new Request($_GET, $_POST, $_SERVER);

// エラーチェック
$postForm = new PostForm($request);
$postForm->execute();

?>
