<?php
require "phpshaper/slickauth/SlickPassword.php";

$slickPassword = new phpshaper\slickauth\SlickPassword();
// US Password, total lenght 16 signs. 3 Numbers and 3 special characters
echo $slickPassword->generateUS (16, 3, 3). "\n";
// US Password, optimized for IOS , total lenght 16 signs. 2 Numbers and 4 special characters
echo $slickPassword->generateUSiOS (16, 2, 4). "\n";
// DE Password, total lenght 16 signs. 4 Numbers and 4 special characters
echo $slickPassword->generateDE (16, 4, 4). "\n";
// DE Password, optimized for IOS, total lenght 16 signs. 5 Numbers and 4 special characters
echo $slickPassword->generateDEiOS (16, 5, 4). "\n";

?>