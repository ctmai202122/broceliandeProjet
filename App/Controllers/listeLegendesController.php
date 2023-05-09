<?php

namespace Broceliande\Controllers;

use Broceliande\Models\Legende;


$listeLegendes = Legende::getAll();

include_once (__DIR__ . '/../Views/viewListeLegendes.php');
?>