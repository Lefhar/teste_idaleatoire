<?php
include('config.php');
include('app/Database.php');
include('app/Aleatoire.php');

$id = new Aleatoire();
echo $id->getIdaleatoire();