<html>
    <head>
                    <title> PHPteru :v </title>
    </head>
    <body background="splash.jpg">
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
     
     
    <h1> Cek Bilangan Genap atau tidak </h1>
    <input type="text" name="bil1">
    <button type="submit" name="submit"> Submit </button>
     
    <?php
    for($genap=1;$genap<=50;$genap++)
    {
    if($genap % 2 == 0)
    {
    	echo $genap."~";
    }
    }

    echo"<br> <br>";
    if(isset($_POST['bil1']))
    {
	if($_POST['bil1'] >= 0 && $_POST['bil1'] <= 50 && $_POST['bil1'] %2 == 0)
	{
        	echo "Ini loo bilanngan genap range 0-50";
	}
	else
	{
		echo "Ternyata bukan bil Genap range 0-50";
	}
    }
           
     
     
    ?>

    </body>
</html>