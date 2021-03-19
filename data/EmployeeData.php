<?php

require "../controller/EmployeeController.php";


$employee = new EmployeeController();
$action   = $_GET['action'];

if($action == "getEmployees")
{
    $employee_list = $employee->load_all_employee();

    $datastorage = [];
    foreach ($employee_list as $employees) {
        $datastorage[] = [
            "id"                => $employees["id"],
            "emp_id"            => $employees["emp_id"],
            "first_name"        => $employees["first_name"],
            "last_name"         => $employees["last_name"],
            "age"               => $employees["age"],
            "birth_date"        => $employees["birth_date"],
            "image"             => $employees["image"]

        ];
    }
    
    echo json_encode($datastorage);
}

else if ($action == "insertEmployee")
{
    $post_data = $_POST;

    $columns = "";
    $prepare = "";
    $values = [];

    foreach ($post_data as $key => $value) {
        $values[] = $value;
        $columns .= $key . ",";
        $prepare .= "?,";
    }

    $columns = substr_replace($columns, "", -1);
    $prepare = substr_replace($prepare, "", -1);
    $employee->insert_employee($columns, $values, $prepare);
    echo json_encode("Inserted Successfully");
}

// else if ($action == "insertEmployee")
// {
//     $post_data = $_POST;

//     $columns = "";
//     $prepare = "";
//     $values = [];

//     foreach ($post_data as $key => $value) {
//         $values[] = $value;
//         $columns .= $key . ",";
//         $prepare .= "?,";
//     }


//     $tmp_name = $_FILES['input_file']['tmp_name'];

    
//     $name = $_FILES['input_file']['name'];
//     $values[] = $name;
//     $columns .= "image";
//     $prepare .= "?";
//     if (isset($name)) {

//         $path = '../assets/img/';

//         if (!empty($name)) {
//             if (move_uploaded_file($tmp_name, $path . $name)) {
//             }
//         }
//     }

//     // $columns = substr_replace($columns, "", -1);
//     // $prepare = substr_replace($prepare, "", -1);

//     $employee->insert_employee($columns, $values, $prepare);
//     echo json_encode("Inserted Successfully");
// }

else if ($action == "getSpecificEmployee")
{
    $id = $_POST["id"];

    $employee_list = $employee->load_all_employee("where id=$id");
    $datastorage = [];
    foreach ($employee_list as $employees) {
        $datastorage = [
            "id"                => $employees["id"],
            "emp_id"            => $employees["emp_id"],
            "first_name"        => $employees["first_name"],
            "last_name"         => $employees["last_name"],
            "age"               => $employees["age"],
            "birth_date"        => $employees["birth_date"],

        ];
    }
    
    echo json_encode($datastorage);
}

else if ($action == "updateEmployee")
{
    $id = $_POST["id"];
    $columns = "";
    $values = [];

    foreach ($_POST as $key => $value) {

        if($key != "id")
        {
            $values[] = $value;
            $columns .= $key . "=?,";
        }
    }

    $columns = substr_replace($columns, "", -1);
    $employee->update_employee($id, $columns, $values);
    echo json_encode("Updated Successfully");
}

else if ($action == "deleteEmployee")
{
    $id = $_POST["id"];
    $employee_list = $employee->delete_employee($id);
    echo json_encode("Deleted Successfully");
}