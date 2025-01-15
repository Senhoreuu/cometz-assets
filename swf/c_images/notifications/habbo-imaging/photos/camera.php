<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	$remoteIp = (isset($_SERVER['HTTP_X_SUCURI_CLIENTIP']) ? trim($_SERVER['HTTP_X_SUCURI_CLIENTIP']) : isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? trim($_SERVER['HTTP_X_FORWARDED_FOR']) : trim($_SERVER['REMOTE_ADDR']);
	$photoName = (isset($_GET['data'])) ? $_GET['data'] : false;
	$photoImage = (!empty(file_get_contents('php://input'))) ? file_get_contents('php://input') : false;

  // DESCOMENTA O RESTO DPS LA EM BAIXO
  // TEM DE DAR PERMISSAO PARA A PASTA DA CAMERA E DA SWF PARA PODER ALTERAR E ADICIONAR FICHEIROS NO LOCAL
	// if ($remoteIp == '::1') { //IP DA MAQUINA
		if (empty($photoImage)) {
			header('HTTP/1.1 401 No image identified for upload.');
		} else if (empty($photoName)) {
			header('HTTP/1.1 401 No image name was identified.');
		} else {
			if (!is_numeric($photoName)) {
				$putPhoto = file_put_contents('photos/' . $photoName . '.png', $photoImage);
				$putPhotoSmall = file_put_contents('photos/' . $photoName . '_small.png', $photoImage);

				if ($putPhoto && $putPhotoSmall) {
					die($photoName . '.png');
				} else {
					header('HTTP/1.1 401 An unexpected error has occurred, please try again later.');
				}
			} else if (is_numeric($photoName)) {
				$putPhoto = file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/swf/c_images/navigator-thumbnail/' . $photoName . '.png', $photoImage);

				if ($putPhoto) {
					$data = [
						'response' => 'success'
					];

					die(json_encode($data));
				} else {
					header('HTTP/1.1 401 An unexpected error has occurred, please try again later.');
				}
			} else {
				header('HTTP/1.1 401 No image routes were found.');
			}
		}
	// } else {
	//	header('HTTP/1.1 401 You are not allowed to use such functionality.');
	// }
	exit;
?>
