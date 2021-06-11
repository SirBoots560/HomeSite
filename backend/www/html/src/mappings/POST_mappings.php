<?php

switch($url_components['path']){             
    case '/add':                                                   
        $data =  array(     'id' => 69,
                            'title' => 'Task-69',
                            'category' => 'Cleaning',
                            'complete' => false);
        array_push($TEMP_DATA, $data);
        break;

    case 'delete':

        break;
                
    default:                                
        http_response_code(404);
        echo("Error Not Found");
        die();
} 