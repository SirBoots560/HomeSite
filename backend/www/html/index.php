<?php
    //Function for sending response to frontend based on conditionals below
    function sendResponse($data){
        header('Access-Control-Allow-Origin: http://localhost', false);
        header('Content-Type: application/json');
        echo $data;
    }


    //Garbage data for dev purposes
    $TEMP_DATA = array( array(  'id' => 1,
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

    //Determining the response
    $data;
    $path = ltrim($_SERVER['REQUEST_URI'], '/');    
    $elements = explode('/', $path);                

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        switch(array_shift($elements)){             

            case 'get':                                                           
                $data = json_encode($TEMP_DATA);
                break;

            default:                                
                http_response_code(404);
                echo("Error Not Found");
                die();
        } 
    } else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        switch(array_shift($elements)){             

            case 'add':                                                           
                
                break;

            case: 'delete':

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
