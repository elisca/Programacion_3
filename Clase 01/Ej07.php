<?php
    $numImpares=[];
    $i=1;

    while(count($numImpares)<10)
    {
        if($i%2>0 || $i==1)
        {
            array_push($numImpares,$i);
        }
        $i++;
    }

    print "FOR<br>";
    for($j=0;$j<count($numImpares);$j++)
        print "$numImpares[$j]<br>";

    print "FOREACH<br>";
    foreach ($numImpares as $impar)
        print "$impar<br>";

    print "WHILE<br>";
    $k=0;
    while($k<count($numImpares))
    {
        print "$numImpares[$k]<br>";
        $k++;
    }
?>