<?php
require_once "method.php";
$mhs = new Mahasiswa();
$request_method = $_SERVER["REQUEST_METHOD"];
// $key = "1234";
// $keyuser = !empty($_GET["api_key"]);
switch ($request_method) {
	case 'GET':
		// if ($keyuser == $key) {
		if (((!empty($_GET["id"]))) && ($mhs->isValid($_GET))) {
			$id = intval($_GET["id"]);
			$mhs->get_mhs($id);
		} elseif (((empty($_GET["id"]))) && ($mhs->isValid($_GET))) {
			$mhs->get_mhss();
		} else {
			$mhs->jsonOut("gagal", "apikey not valid!!!", null);
		}
		// } else {
		// $mhs->jsonOut();
		// }
		break;
	case 'POST':
		if (((!empty($_GET["id"]))) && ($mhs->isValid($_GET))) {
			$id = intval($_GET["id"]);
			$mhs->update_mhs($id);
		} elseif (((empty($_GET["id"]))) && ($mhs->isValid($_GET))) {
			$mhs->insert_mhs();
		} else {
			$mhs->jsonOut("gagal", "apikey not valid!!!", null);
		}
		break;
	case 'DELETE':
		if (((!empty($_GET["id"]))) && ($mhs->isValid($_GET))) {
			$id = intval($_GET["id"]);
			$mhs->delete_mhs($id);
		} else {
			jsonOut("gagal", "apikey not valid!!!", null);
		}
		break;
	default:
		// Invalid Request Method
		header("HTTP/1.0 405 Method Not Allowed");
		break;
		break;
}
