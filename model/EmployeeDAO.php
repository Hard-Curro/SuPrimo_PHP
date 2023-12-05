<?php
require_once dirname(__DIR__) . "\\model\\employee.php";

session_start();

function selectEmployee($pdo) {
    try {
        $statement = $pdo->prepare("SELECT * FROM employee");
        $statement->execute();

        $results = [];

        foreach ($statement->fetchAll() as $p) {

            $image = $p["image"];
            $image2 = productImage($image);
            $productos = new Employee ($p["employee_id"], $p["emp_name"], $p["job_title"], $p["emp_description"], $image2); 
            array_push($results,$productos);
        }

        return $results;

    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}


function productImage($foto){
  $base64Image = base64_encode($foto);
  return $base64Image;
}

?>