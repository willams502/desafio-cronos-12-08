<?php
$dbs=['biblioteca','redecronos'];
foreach($dbs as $db){
    try{
        $pdo=new PDO('mysql:host=127.0.0.1;dbname='.$db,'root','', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        $tables=$pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
        echo "DB: $db\n";
        foreach($tables as $t) echo " - $t\n";
    }catch(Exception $e){
        echo "DB: $db error: ".$e->getMessage()."\n";
    }
}
