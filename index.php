<?php
require 'bootstrap.php';



while (true) {
    $currTime = time();

    $total = 0;
    $c=0;
    $average = null;
    
    while (time() < $currTime + $_ENV['RUN_FOR_SECONDS']) {
        $c++;
        $rn=rand(0,1);
        $total+=$rn;
        usleep($_ENV['SLEEP_MICROSECONDS']);    
    }
    $average = $total/$c;
    $deviation = (1- (0.5 + ($average)));
    $deviation_readable = $deviation * 1000;
    
    echo 'iterations:'.$c. "\n";
    #echo 'total:'.$total. "\n";
    echo 'average:'.$average. "\n";
    
    echo 'deviation:' . $deviation . "\n";
    echo 'deviation_readable:' . $deviation_readable . "\n";

    $stmt = $mysqli->prepare("INSERT INTO log(`date`,`iterations`,`avg`,`deviation`) VALUES(NOW(3),?,?,?)");
    $stmt->bind_param('sss',$c, $average, $deviation);
    $stmt->execute();
    
    // echo 'result:'.$ones/$zeros. "\n";
    
}

