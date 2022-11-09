<?php
// function pr($arr)
// {
//     echo '<pre>';
//     print_r($arr);
// }

// function prx($arr)
// {
//     echo '<pre>';
//     print_r($arr);
//     die();
// }

    function redirect($url) {
        header('Location: '.$url);
        die();
    }
?>