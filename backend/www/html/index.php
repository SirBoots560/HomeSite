<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $path = ltrim($_SERVER['REQUEST_URI'], '/');    
    $elements = explode('/', $path);                

    if(empty($elements[0])) {                       
        echo 'NAILED IT!';
    } else{ 
        switch(array_shift($elements)){             

            case 'get':                             
                $post_data = array( array(  'id' => 1,
                                            'title' => 'Task',
                                            'category' => 'Cleaning'),
                                    array(  'id' => 2,
                                            'title' => 'Task-2',
                                            'category' => 'Cleaning'),
                                    array(  'id' => 3,
                                            'title' => 'Task-3',
                                            'category' => 'Cleaning')
                                );
        
                $post_data = json_encode($post_data);
                break;

            default:                                
                $include = 'src/php/pages/error.php';
                $error = "404 - Not Found";
                $title = 'Error';
                break;
        }

        header('Content-Type: application/json');
        echo $post_data;
    }
}

?>
