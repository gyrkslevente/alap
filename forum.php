<h1>Vendégkönyv</h1>
<br>
<form style ='margin: 24px 48px; line-height :32px;'
action='vendegkonyv_ir.php' method = 'get' target='kisablak'>

Neved : <input name ='vendegnev.txt'><br>
Üzeneted szövege : <br>
<textarea name ='uzenet' cols =60 rows=8></textarea>
<input type ='submit' value ='Üzenet elküldve '> 


</form>

<iframe name  ='kisablak'></iframe>


<?php

$fp = fopen("vendegkonyv.txt" , "r");
while($sor = fgets($fp)) $sorok[]  =$sor;
$sorok = array_reverse($sorok);

for($i =0; $i<count($sorok); $i++){
    $adat = explode(";" , $sorok[$i] );
    print "
            <div style ='margin:18px; background-color:grey ; padding:8px;'>
                    <spam style ='float:right'>$adat[0]</spam>
                    <b>$adat[1]</b>
                    <hr>
                    <i>$adat[2]</i>
            </div>
    
    ";
}
print $sor;


fclose($fp);

?>