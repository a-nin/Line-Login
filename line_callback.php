<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' lang='ja' xml:lang='ja'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<meta name='viewport' content='width=device-width,initial-scale=1.0,user-scalable=no' />
<link rel=stylesheet type="text/css" href="style.css">
</head>
<body>
<div class='all'>
<div class='main'>
  <?php

// Composerでインストールしたライブラリを一括読み込み
require_once  __DIR__ . '/vendor/autoload.php';

// GETリクエストのみ処理
$unsafe = $_SERVER['REQUEST_METHOD'] == 'POST'
       || $_SERVER['REQUEST_METHOD'] == 'PUT'
       || $_SERVER['REQUEST_METHOD'] == 'DELETE';

$session_factory = new \Aura\Session\SessionFactory;
$session = $session_factory->newInstance($_COOKIE);
$csrf_value =  $_GET['state'];
$csrf_token = $session->getCsrfToken();

// リクエストの種類とトークンの同一性を検証
if ($unsafe || !$csrf_token->isValid($csrf_value)) {
  echo '<p>不正なリクエストです。</p>';
  return;
}



   ?>
