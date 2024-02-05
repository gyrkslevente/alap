<?
    session_start();
    date_default_timezone_set("Europe/Budapest")
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>
    <?
    if( isset($_GET['p'])) $p=$_GET['p'] ; else $p="" ;

    if($p==""               )   print "Pista"               ; else
    if($p=="rolunk"         )   print "Mi cégünk"                             ; else
    if($p=="termekek"       )   print "Termékeink"      ; else
    if($p=="karrier"        )   print "Álláslehetőségek"      ; else
    if($p=="vendegkonyv"          )   print "Vendégkönyv"   ; else
    if($p=="kapcs"          )   print "Elérhetőségeink"   ; else
                                print "Ajajj!"   ;
    ?>
    </title>
</head>
<body>
    <div id='menu'>
        [
        <a href='./'                >   Kezdőoldal  </a> ||
        <a href='./?p=rolunk'       >   Rólunk      </a> |
        <a href='./?p=termekek'     >   Termékeink  </a> |
        <a href='./?p=karrier'      >   Szavazás     </a> |
        <a href='./?p=vendegkonyv'        >  Vendégkönyv       </a> |
        <a href='./?p=kapcs'        >   Kapcsolat   </a>
        ]
    </div>     
    <div id=tartalom>
    <?

    // print_r( $_GET )    ;
    if( isset($_GET['p'])) $p=$_GET['p'] ; else $p="" ;

    if($p==""               )   print "<h1>Akciók, aktualitások</h1>"               ; else
    if($p=="rolunk"         )   print "<h1>Rólunk</h1>"                             ; else
    if($p=="termekek"       )   print "<h1>Termékeink</h1>"                         ; else
    if($p=="karrier"        )   include("szavazas_form.php")                        ; else
    if($p=="vendegkonyv"          )   include ("forum.php")                              ; else
    if($p=="kapcs"          )   include("elerhetoseg.php")                          ; else
                                print "<h1>404 - A kért oldal nem található</h1>"   ;
    
    

    ?>
    <?

        $fajlnev = date("Ymd") . ".txt" ;
            
        if ( !file_exists($fajlnev) ) 
        {
            $fp = fopen ($fajlnev , "w") ; // létrehozás
            fwrite($fp , "0") ;
            fclose($fp) ;
        }

        //$n = 528 ;

        $fp = fopen ($fajlnev , "r") ; // olvasásra megnyit
        $n = fread($fp , filesize($fajlnev)) ;
        fclose($fp) ;

        if(!isset($_SESSION['eg']))
        {
            $n++ ;

            $fp = fopen ($fajlnev , "w") ; // felülírás
            fwrite($fp , $n) ;
            fclose($fp) ;

            $_SESSION['eg'] = "kábel" ;
        }

        print "<p>Az oldalt eddig $n látogató látta.</p>" ;
        print session_id();
    ?>
    </div> 
</body>
</html>
