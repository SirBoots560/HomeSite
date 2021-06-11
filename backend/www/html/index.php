<?php
    require_once 'src/config.php';
    require_once 'src/functions.php';
        
    header('Access-Control-Allow-Origin: http://localhost');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: *');
    
    $data;
    $url = $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        require_once 'src/mappings/GET_mappings.php';

    } else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        require_once 'src/mappings/POST_mappings.php';

    } else if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){

        http_response_code(200);

    } else {

        http_response_code(404);
        echo("Error Not Found");
        die();

    }
