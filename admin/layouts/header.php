<?php

session_start();
$baseUrl = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'];

if(!isset($_SESSION['user_id']) && $_SERVER['PHP_SELF'] != '/project/admin/auth/index.php') {
	header("Location: $baseUrl/project/admin/auth/index.php");
	exit;
}



?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
	<meta name="author" content="Bootlab">

	<title>Admin Panel</title>

	<link href="<?=$baseUrl?>/project/admin/assets/css/modern.css" rel="stylesheet">

	<style>
		body {
			opacity: 0;
		}
	</style>
	<script src="<?=$baseUrl?>/project/admin/assets/js/settings.js"></script>
</head>