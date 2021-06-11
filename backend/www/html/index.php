<?php
    //Function for sending response to frontend based on conditionals below
    function sendResponse($data){
        header('Content-Type: application/json');
        echo $data;
    }

    header('Access-Control-Allow-Origin: http://localhost', false);
    $data;

    //Garbage data for dev purposes
    $TEMP_DATA = array(     array(  'id' => 1,
                                    'title' => 'Task',
                                    'category' => 'Cleaning',
                                    'complete' => false),
                            array(  'id' => 2,
                                    'title' => 'Task-2',
                                    'category' => 'Cleaning',
                                    'complete' => false),
                            array(  'id' => 3,
                                    'title' => 'Task-3',
                                    'category' => 'Cleaning',
                                    'complete' => false),
                            array(  'id' => 4,
                                    'title' => 'Task-4',
                                    'category' => 'Cats',
                                    'complete' => false)
                        );

    $url = $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
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
    } else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        switch(array_shift($elements)){             

            case 'add':                                                           
                
                break;

            case 'delete':

                break;
                
            default:                                
                http_response_code(404);
                echo("Error Not Found");
                die();
        } 

    } else {
        http_response_code(404);
        echo("Error Not Found");
        die();
    }
    
    sendResponse($data);

?>
