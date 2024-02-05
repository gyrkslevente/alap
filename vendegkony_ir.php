<?php

    print_r($_POST);

    if(!file_exists ("vendegkonyv.txt"))
    {
        $fp = fopen("vendegkonyv.txt ", "w");
        fclose($fp);
    }

    if(   $_POST['uzenet']=="" ){
        die("<script> alert ('Nem irtál semmit')</script>");
    }
    $_POST = str_replace(";" , "," , $_POST);
    $uzenet = $_POST['uzenet'];
    $uzenet = str_replace("\r\n" , "<br>" , $uzenet);
    $kiiras = date("Y.m.d H:i:s"). $_POST['vendegnev']. ";" .$uzenet . \r\n;
    $fp =fopen("vendegkonyv.txt"," a");
    fwrite($fp , $kiiras);
    fclose($fp);
?>

<script>aler ("Köszi")</script>