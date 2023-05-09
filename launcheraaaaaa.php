<?php
header("Content-Type: text/plain; charset=UTF-8");
include('engine/api/api.class.php');

//Секретный ключ, проверяем, лаунчсервер ли делает запрос
$api_key_secret = "z7Kp4442EUyAII9SejfohEG9hFW0hi";

//Входящие параметры
$login = $_GET['login'];
$password = $_GET['password'];
$api_key = $_GET['api_key'];

if(empty($api_key) || strcmp($api_key, $api_key_secret) != 0) {
	exit("Error 01");
}

if(empty($login) || empty($password)) {
	exit("Empty login or password");
}

$auth_result = $dle_api->external_auth($login, $password);
echo($auth_result ? "OK:" . $login : "Incorrect login or password");
?>