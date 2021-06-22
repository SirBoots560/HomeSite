<?php

$SQL = "";

switch($url_components['path']){             
    case '/add':
        $data = json_decode(file_get_contents('php://input'), true);                                                   

        $title = $conn->real_escape_string($data['title']);
        $category = $conn->real_escape_string($data['category']);
        $complete = $data['complete'];
        
        $SQL = "INSERT INTO tasks VALUES(DEFAULT, '$title', '$category', $complete );";

        $result = $conn->query($SQL);
        break;

    case '/delete':
        $id = json_decode(file_get_contents('php://input'), true);

        $SQL = "DELETE FROM tasks WHERE `id`='$id'";

        $result = $conn->query($SQL);
        break;

    case '/complete':
        $id = json_decode(file_get_contents('php://input'), true);
    
        $SQL = "UPDATE tasks SET `complete` = 1 WHERE `id`='$id'";
    
        $result = $conn->query($SQL);
        break;
                
    default:                                
        http_response_code(404);
        echo("Error Not Found");
        die();
}

