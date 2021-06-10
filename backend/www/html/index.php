<?php


function sendResponse($data){
    header('Access-Control-Allow-Origin: http://localhost', false);
    header('Content-Type: application/json');
    echo $data;
}


    $data;
    $path = ltrim($_SERVER['REQUEST_URI'], '/');    
    $elements = explode('/', $path);                

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        switch(array_shift($elements)){             

            case 'get':                             
                $data = array( array(  'id' => 1,
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
                                
                $data = json_encode($data);
                break;

            default:                                
                http_response_code(404);
                echo("Error Not Found");
                die();
        } 
    } else if($_SERVER['REQUEST_METHOD'] == 'POST'){

    } else {
        http_response_code(404);
        echo("Error Not Found");
        die();
    }
    
    sendResponse($data);

?>
