<?php
require_once dirname(__DIR__) . "\\model\\Connection.php";
require_once dirname(__DIR__) . "\\model\\EmployeeDAO.php";

$resultado = selectEmployee($pdo);

require_once dirname(__DIR__) . "\\view\\AboutusView.php";
$pdo = null;
?>