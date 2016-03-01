<?php
    sleep(1.2);
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
    }else{
      echo json_encode(array(
        "country" => "city " //country doesn't work
      ));
    }
?>
