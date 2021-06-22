<?php
    $where = " ";
    //var_dump($params['complete']);
    if(strcmp($params['complete'], 'true') == 0){
        $where = " WHERE 1";
    } else {
        $where = " WHERE `complete` = 0";
    }

    $result = $conn -> query("SELECT * FROM tasks".$where);
    //var_dump("SELECT * FROM tasks".$where);
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