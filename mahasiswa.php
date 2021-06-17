<?php
require_once "method.php";
$mhs = new Mahasiswa();
$request_method = $_SERVER["REQUEST_METHOD"];
$key = "1234";
$keyuser = !empty($_GET["api_key"]);
switch ($request_method) {
	case 'GET':
		if ($keyuser == $key) {
			if ((!empty($_GET["id"]))) {
				$id = intval($_GET["id"]);
				$mhs->get_mhs($id);
			} else {
				$mhs->get_mhss();
			}
		} else {
			$mhs->jsonOut();
		}
		break;
	case 'POST':
		if ($keyuser == $key) {
			if (!empty($_GET["id"])) {
				$id = intval($_GET["id"]);
				$mhs->update_mhs($id);
			} else {
				$mhs->insert_mhs();
			}
		} else {
			$mhs->jsonOut();
		}
		break;
	case 'DELETE':
		if ($keyuser == $key) {
			$id = intval($_GET["id"]);
			$mhs->delete_mhs($id);
		} else {
			$mhs->jsonOut();
		}
		break;
	default:
		// Invalid Request Method
		header("HTTP/1.0 405 Method Not Allowed");
		break;
		break;
}
