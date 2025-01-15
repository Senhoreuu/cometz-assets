<?php
/* XDR */
 
const colorsRGB = [1 => [255, 214, 1], 2 => [238, 118, 0], 3 => [132, 222, 0], 4 => [88, 154, 0], 5 => [80, 193, 251], 6 => [0, 111, 207], 7 => [255, 152, 227], 8 => [243, 52, 191], 9 => [255, 45, 45], 10 => [175, 10, 10], 11 => [255, 255, 255], 12 => [192, 192, 192], 13 => [55, 55, 55], 14 => [251, 231, 172], 15 => [151, 118, 65], 16 => [194, 234, 255], 17 => [255, 241, 101], 18 => [170, 255, 125], 19 => [135, 230, 200], 20 => [152, 68, 231], 21 => [222, 169, 255], 22 => [255, 181, 121], 23 => [195, 170, 110], 24 => [122, 122, 122]];
const unpainTable = [209, 210, 211, 212];

function getParts($partCode, $isSymbol = false) {
	$badgePartCode = [];
	$len = strlen($partCode);
	
	if ($len < 4 || $len > 6)
		return null;

	$partKey = substr($partCode, 0, (strlen($partCode) == 6 || (!$isSymbol && strlen($partCode) == 5)) ? 3 : 2);
	$partColor = (int)substr($partCode, strlen($partKey), 2);
	if ($len > strlen($partKey) + 2)
		$partPos = (int)substr($partCode, -1, 1);

	return [$partKey, colorsRGB[$partColor] ?? '', $partPos ?? 0];
}

function checkString($str) {
	return preg_match('/^[a-z0-9-]*\$/i', $str);
}

function colorSize($img, $rgb) {
  	imagetruecolortopalette($img, true, 256);
  	$numColors = imagecolorstotal($img);

 	for ($x = 0; $x < $numColors; $x++) {
		list($r, $g, $b) = array_values(imagecolorsforindex($img, $x));
		$grayscale = ($r + $g + $b) / 3 / 0xff;

		imagecolorset($img, $x, $grayscale * $rgb[0], $grayscale * $rgb[1], $grayscale * $rgb[2]);
	}
}

if(!isset($_GET['badge']) || checkString($_GET['badge']))
	exit;

$badgeCode = str_replace(['.gif', 'X'], '', $_GET['badge']);

$baseCode = '';
$symbolsCode = [];

$getBase = strstr($badgeCode, 'b') !== false;
$getSymbols = strstr($badgeCode, 's') !== false;

if ($getSymbols) {
	$newParts = explode('s', $badgeCode);
	$baseCode = str_replace('b', '', $newParts[0]);

	if(strlen($baseCode) < 4 && strlen($baseCode) > 5)
		exit;
	
	unset($newParts[0]);

	foreach($newParts as $k => $p)	{
		if (strlen($p) < 4 || strlen($p) > 6 || !is_numeric($p))
			continue;	
		
		$symbolsCode[] = $p;
	}
}else{
	$baseCode = str_replace('b', '', $badgeCode);
	
	if(strlen($baseCode) < 3 || strlen($baseCode) > 5)
		exit;
}

$gifImage = imagecreatefromgif('badges/base/base.gif');
$gifWidth = imagesx($gifImage);
$gifHeight = imagesy($gifImage);

if($getBase) {
	if(!is_numeric($baseCode))
		goto b;

	$basePart = getParts($baseCode);
	if ($basePart == null)
		goto b;

	$colorHex = $basePart[1];

	if (!file_exists('badges/base/' .  $basePart[0] . '.gif'))
		goto b;

	$baseImage = imagecreatefromgif('badges/base/' .  $basePart[0] . '.gif');
	$getWidth = imagesx($baseImage);
	$getHeight = imagesy($baseImage);
	
	$x = ($gifWidth / 2) - ($getWidth / 2);
	$y = ($gifHeight / 2) - ($getHeight / 2);

	if(!empty($basePart[1]))
		colorSize($baseImage, $colorHex);

	if(file_exists('badges/base/' .  $basePart[0] . '_' .  $basePart[0] . '.gif'))
		imagecopymerge($baseImage, imagecreatefromgif('badges/base/' .  $basePart[0] . '_' .  $basePart[0] . '.gif'), 0, 0, 0, 0, $getWidth, $getHeight, 100);

	imagecopy($gifImage, $baseImage, $x, $y, 0, 0, $getWidth, $getHeight);
}
b:

if ($getSymbols) {
	foreach($symbolsCode as $symbolCode) {
		$symbolPart = getParts($symbolCode, true);
		if($symbolPart == null)
			continue;

		if($symbolPart[0] == 0 || !file_exists('badges/templates/' . $symbolPart[0] . '.gif'))
			continue;

		$symbolImage = imagecreatefromgif('badges/templates/' . $symbolPart[0] . '.gif');
		$pos = (!isset($symbolPart[2]) || $symbolPart[2] < 0 || $symbolPart[2] > 8) ? 0 : $symbolPart[2];

		$x = 0;
		$y = 0;
		$getWidth = imagesx($symbolImage);
		$getHeight = imagesy($symbolImage);

		if ($pos == 1) {
			$x = ($gifWidth - $getWidth) / 2;
		} else if($pos == 2) {
			$x = $gifWidth - $getWidth;
		} else if($pos == 3) {
			$y = ($gifHeight / 2) - ($getHeight / 2);
		} else if($pos == 4) {
			$x = ($gifWidth / 2) - ($getWidth / 2);
			$y = ($gifHeight / 2) - ($getHeight / 2);
		} else if($pos == 5)	{
			$x = $gifWidth - $getWidth;
			$y = ($gifHeight / 2) - ($getHeight / 2);
		} else if($pos == 6) {
			$y = $gifHeight - $getHeight;
		} else if($pos == 7) {
			$x = ($gifWidth - $getWidth) / 2;
			$y = $gifHeight - $getHeight;
		} else if($pos == 8) {
			$x = $gifWidth - $getWidth;
			$y = $gifHeight - $getHeight;
		}

		if(!empty($symbolPart[1]) && !isset(unpainTable[$symbolPart[0]]))
			colorSize($symbolImage, $symbolPart[1]);

		if (file_exists('badges/templates/' . $symbolPart[0] . '_' . $symbolPart[0] . '.gif'))
			imagecopymerge($symbolImage, imagecreatefromgif('badges/templates/' . $symbolPart[0] . '_' . $symbolPart[0] . '.gif'), 0, 0, 0, 0, $getWidth, $getHeight, 100);
		
		imagecopy($gifImage, $symbolImage, $x, $y, 0, 0, $getWidth, $getHeight);
	}
}

header('Content-type: image/gif');
imagegif($gifImage);