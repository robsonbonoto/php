<?php

function resposta($status, $status_message, $data)
{
    header("HTTP/1.1 $status $status_message");

    $resposta['status'] = $status;
    $resposta['status_message'] = $status_message;
    $resposta['data'] = $data;

    $json_response = json_encode($resposta,1);
}

?>