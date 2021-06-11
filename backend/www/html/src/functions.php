<?php
    //Function for sending response to frontend based on conditionals below
    function sendResponse($data){
        header('Content-Type: application/json');
        echo $data;
    }