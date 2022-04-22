<?php

namespace Core\Response;

class Response
{

    /**
     * @param $data
     */
    public static function send($data){
        http_response_code($data["status"]);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

}