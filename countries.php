<?php
    sleep(0.5);
    if($_GET["country"] == 1){
        echo json_encode(array(
        "1"=> "Washington",
        "2"=> "Sietle"
        ));
    }else if($_GET["country"] == 2){
        echo json_encode(array(
            "3" => "Paris",
            "4" => "Marcell"
        ));
    }
?>
