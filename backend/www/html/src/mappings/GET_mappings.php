<?php

    $SQL = "SELECT * FROM 'tasks'";
    $result = mysqli_query($conn, "SELECT * FROM tasks");
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

    switch($url_components['path']){             
        case '/get':
            if($params['category'] == 'All' || $params == null){
                $data = json_encode($result); 
            } else {
                $filtered_Data = array();
                foreach($result as $val){
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