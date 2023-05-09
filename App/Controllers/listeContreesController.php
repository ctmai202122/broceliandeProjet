<?php

namespace Broceliande\Controllers;
use Broceliande\Models\Contree;


$listeContrees = Contree::getAll();

include_once (__DIR__ . '/../Views/viewListeContrees.php');
?>