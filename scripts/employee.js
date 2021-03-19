$(document).ready(function () {
    EMPLOYEE.getEmployees();
});

$('#frm_add_employee').submit(function(event) {
    event.preventDefault();
    var post_data = {
        emp_id          : $("#txt_empid").val(),
        first_name      : $("#txt_fname").val(),
        last_name       : $("#txt_lname").val(),
        age             : $("#txt_age").val(),
        birth_date      : $("#txt_birthdate").val()

    }

    EMPLOYEE.insertEmployee(post_data);
});

$('#frm_update_employee').submit(function(event) {
    event.preventDefault();
    var post_data = {
        id              : EMPLOYEE.id,
        emp_id          : $("#txt_edit_empid").val(),
        first_name      : $("#txt_edit_fname").val(),
        last_name       : $("#txt_edit_lname").val(),
        age             : $("#txt_edit_age").val(),
        birth_date      : $("#txt_edit_birthdate").val()

    }

    console.log(EMPLOYEE.id);
    EMPLOYEE.udpateEmployee(post_data);
});

let EMPLOYEE = {

    //method

    id : 0,
    getEmployees: function () 
    {
        $.ajax({
            url: "../data/EmployeeData.php?action=getEmployees",
            dataType: "json",
            success: function (result)
            {
                var row = ``;
                console.log(result);

                for(var x = 0; x < result.length; x++)
                {
                    data = result[x];
                    row += `
                    <tr>
                        <td><a href="../assets/img/${data["image"]}" target="_blank"><img src="../assets/img/${data["image"]}" class="img" style="width:50px;border-radius: 50%;"></a></td>
                        <td>${data["emp_id"]}</td>
                        <td>${data["first_name"]}</td>
                        <td>${data["last_name"]}</td>
                        <td>${data["age"]}</td>
                        <td>${data["birth_date"]}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="EMPLOYEE.getSpecificEmployee(${data["id"]})">
                                <i class="fa fa-edit"> Edit</i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="EMPLOYEE.deleteEmployee(${data["id"]})">
                                <i class="fa fa-trash"> Delete</i>
                            </button>
                        </td>
                    </tr>
                    `;

                    $("#tbl_employee_body").html(row);
                    $("#tbl_employee").DataTable();

                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    },

    // No attachment
    
    insertEmployee: function (post_data)
    {
        console.log(post_data);
        $.ajax({
            url: "../data/EmployeeData.php?action=insertEmployee",
            data:post_data,
            type: "post",
            dataType: "json",
            async: false,
            success: function (result) {
                EMPLOYEE.getEmployees();

                $("#txt_empid").val(""),
                $("#txt_fname").val(""),
                $("#txt_lname").val(""),
                $("#txt_age").val(""),
                $("#txt_birthdate").val("")

                console.log(result);
                $("#modal_add_employee").modal("hide");
            },
            error: function (error)
            {
                console.log(error);
            }
        })
    },

    // insertEmployee: function (_this)
    // {
    //     // console.log(_this);
    //     $.ajax({
    //         url: "../data/EmployeeData.php?action=insertEmployee",
    //         type: "post",
    //         data: new FormData( _this ),
    //         processData: false,
    //         contentType: false,
    //         dataType: "json",
    //         async: false,
    //         success: function (result) {
    //             EMPLOYEE.getEmployees();

    //             $("#file_image").val(null),
    //             $("#txt_empid").val(""),
    //             $("#txt_fname").val(""),
    //             $("#txt_lname").val(""),
    //             $("#txt_age").val(""),
    //             $("#txt_birthdate").val("")

    //             console.log(result);
    //             $("#modal_add_employee").modal("hide");
    //         },
    //         error: function (error)
    //         {
    //             console.log(error);
    //         }
    //     })
    // },

    getSpecificEmployee: function (id) {
        $.ajax({
            url: "../data/EmployeeData.php?action=getSpecificEmployee",
            data: 
            {
                id : id,
            },
            dataType: "json",
            type: "post",
            async: false,
            success: function (result)
            {
                console.log(result);
                EMPLOYEE.id = id;
                $("#modal_update_employee").modal("show");

                $("#txt_edit_empid").val(result.emp_id).prop("readonly", true),
                $("#txt_edit_fname").val(result.first_name),
                $("#txt_edit_lname").val(result.last_name),
                $("#txt_edit_age").val(result.age),
                $("#txt_edit_birthdate").val(result.birth_date)

            },
            error: function (error)
            {
                console.log(error);
            }

        })
    },

    udpateEmployee: function (post_data)
    {
        $.ajax({
            url: "../data/EmployeeData.php?action=updateEmployee",
            data:post_data,
            type: "post",
            dataType: "json",
            async: false,
            success: function (result)
            {
                EMPLOYEE.getEmployees();

                console.log(result);
                $("#modal_update_employee").modal("hide");

                $("#txt_edit_empid").val(""),
                $("#txt_edit_fname").val(""),
                $("#txt_edit_lname").val(""),
                $("#txt_edit_age").val(""),
                $("#txt_edit_birthdate").val("")

            },
            error: (error) =>
            {
                console.log(error);
            }
        })
    },

    deleteEmployee: function (id)
    {
        if(confirm("Are you sure want to remove?"))
        {
            $.ajax({
                url: "../data/EmployeeData.php?action=deleteEmployee",
                data:
                {
                    id : id
                },
                dataType: "json",
                type: "post",
                async: false,
                success: (result) =>
                {
                    EMPLOYEE.getEmployees();
                    console.log(result);

                },
                error: (error) =>
                {
                    console.log(error);
                }

            })
        }
    },
    clearFields: () =>
    {
        $("#txt_empid").val(""),
        $("#txt_fname").val(""),
        $("#txt_lname").val(""),
        $("#txt_age").val(""),
        $("#txt_birthdate").val("")
    },
}