<?php

require "../connection/Connection.php";

class Employee extends Connection
{
    public $conn;

    public function __construct()
    {
        $this->conn = $this->connection_database();
    }

    public function get_all_employees($where)
    {
        try {
            $sql = "SELECT id, emp_id, first_name, last_name,age, birth_date,image FROM employees $where";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insert_employee($columns, $values, $prepare)
    {
        try {
            $sql = "INSERT INTO employees ($columns) VALUES ($prepare)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update_employee($id, $columns, $values)
    {
        try {
            $sql = "UPDATE employees SET $columns WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);
            return "success";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete_employee($id)
    {
        try {
            $sql = "DELETE FROM employees WHERE id=$id";
            $this->conn->exec($sql);
            return "success"; 
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}