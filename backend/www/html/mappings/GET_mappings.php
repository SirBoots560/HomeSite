<?php

switch($url_components['path']){             
            
    case '/get':
        if($params['category'] == 'All' || $params == null){
            $data = json_encode($TEMP_DATA); 
        } else {
            $filtered_Data = array();
            foreach($TEMP_DATA as $val){
                if($params['category'] == $val['category'])
                    array_push($filtered_Data, $val);
            }
            $data = json_encode($filtered_Data);
        }                                                 
        
        break;
    default:
        var_dump($url_components['path']);                           
        http_response_code(404);
        echo("Error Not Found");
        die();
}

sendResponse($data);