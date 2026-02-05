<?php
require_once 'config.php';
require_once 'model.php';

$model = new EmployeeModel($pdo);

// Handle Form Submission (The "C" in MVC)
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    
    if ($model->addEmployee($name, $email, $position)) {
        header("Location: index.php"); // Refresh to show data
        exit();
    }
}

// Fetch data for the View
$employees = $model->getAllEmployees();

// Load the View
include 'view.php';