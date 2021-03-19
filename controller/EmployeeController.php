<?php

require "../model/Employee.php";

class EmployeeController
{

    public $employee;
    public function __construct()
    {
        $this->employee = new Employee();
    }

    public function load_all_employee($where = null)
    {
        return $this->employee->get_all_employees($where);
    }

    public function insert_employee($columns, $values, $prepare)
    {
        return $this->employee->insert_employee($columns, $values, $prepare);
    }

    public function update_employee($id, $columns, $values)
    {
        return $this->employee->update_employee($id, $columns, $values);
    }

    public function delete_employee($id)
    {
        return $this->employee->delete_employee($id);
    }
}