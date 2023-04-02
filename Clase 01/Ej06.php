<?php
    $nums=[];
    $promNums=0;

    for($i=1;$i<=5;$i++)
    {
        $numRand=rand(1,9);
        array_push($nums,$numRand);
    }
    
    foreach ($nums as $n)
        $promNums+=$n;
    
    $promNums/=count($nums);

    if($promNums>6)
        print "Promedio mayor a 6: $promNums<br>";
    elseif($promNums==6)
        print "Promedio 6.<br>";
    else
        print "Promedio menor a 6: $promNums<br>";
?>