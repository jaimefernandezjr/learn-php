<?php

include("index2.php");

$tao = new person;
$tao->set_name("Juan");


echo "<br>".$tao->get_name();

$binata = new boy;
$binata->set_height("19");
echo "<br>"." ".$binata->get_height();


include("index3.php");