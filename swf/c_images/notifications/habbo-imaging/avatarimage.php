<?php
function arrayToString($get) {
    $getFields = null;
	
    foreach($get as $key=>$value) { 
        $getFields .= $key.'='.$value.'&'; 
    }        
    return rtrim($getFields, '&') . "&";
}

header('Location: https://www.habbo.nl/habbo-imaging/avatarimage?'.arrayToString($_GET));