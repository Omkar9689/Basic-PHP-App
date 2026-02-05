<?php
class EmployeeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllEmployees() {
        $stmt = $this->pdo->query("SELECT * FROM employees ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEmployee($name, $email, $position) {
        $sql = "INSERT INTO employees (name, email, position) VALUES (?, ?, ?)";
        return $this->pdo->prepare($sql)->execute([$name, $email, $position]);
    }
}