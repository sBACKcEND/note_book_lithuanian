<?php


$dsn="mysql:host=localhost;dbname=second;charset=utf8mb4";

$pdo=new PDO($dsn,'root');

// $pdo=new PDO($dsn,'root','root');
// $sql="SELECT * FROM countries WHERE population>50000000";

// $result=$pdo->query($sql);


// $contries=$result->fetchAll(PDO::FETCH_ASSOC);

/*
foreach($countries as $country){
    echo $country['name'].'Populiacija: '.$country['population'].'<br>';
}

*/


/*
while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
    echo $row['name'].'<br>';
}
*/
