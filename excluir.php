<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once "dao/MetragemDAO.php";

$id = $_GET['id'];

MetragemDAO::excluirMetragem($id);

header("location: index.php");