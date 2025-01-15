YouTube
<?php
if(isset($_GET['youtubeUrl'])){
    $youtubeUrl = $_GET['youtubeUrl'];
    $videoId = getYoutubeVideoId($youtubeUrl);
    if($videoId !== false){
        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$videoId.'" frameborder="0" allowfullscreen></iframe>';
    }
    else{
        echo 'Invalid YouTube URL';
    }
}

function getYoutubeVideoId($url){
    $videoId = false;
    $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $params);
    if(isset($params['v'])){
        $videoId = $params['v'];
    }
    else{
        $path = parse_url($url, PHP_URL_PATH);
        $videoId = substr($path, 1);
    }
    if(!$videoId){
        $videoId = preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $url, $matches) ? $matches[1] : false;
    }
    return $videoId;
}
?>