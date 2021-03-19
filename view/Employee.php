<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../template/head.php" ?>
</head>

<body>
    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Manage <b>Employees</b></h2>
						</div>
						<div class="col-xs-12">
							<button class="btn btn-success" data-toggle="modal" data-target="#modal_add_employee"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></button>
						</div>
					</div>
				</div>
				<br>
				<table class="table table-striped table-hover" id="tbl_employee">
					<thead>
						<tr>
							<th>Image</th>
							<th>Employee ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Age</th>
							<th>Birth Date</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody id="tbl_employee_body"></tbody>
				</table>
			</div>
		</div>        
    </div>
	<!-- Edit Modal HTML -->
	<div id="modal_add_employee" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<form id="frm_add_employee">
					<div class="modal-header">						
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Employee Number</label>
							<input type="text" id="txt_empid" name="emp_id" class="form-control" required>
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" id="txt_fname" name="first_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" id="txt_lname" name="last_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Age</label>
							<input type="number" id="txt_age" name="age" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Birth Date</label>
							<input type="date" id="txt_birthdate" name="birth_date" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" onclick="EMPLOYEE.clearFields()" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="modal_update_employee" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<form id="frm_update_employee">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Image</label>
							<input type="file" id="file_edit_image" class="form-control">
						</div>							
						<div class="form-group">
							<label>Employee Number</label>
							<input type="text" id="txt_edit_empid" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" id="txt_edit_fname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" id="txt_edit_lname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Age</label>
							<input type="number" id="txt_edit_age" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Birth Date</label>
							<input type="date" id="txt_edit_birthdate" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php include "../template/script.php"; ?>
	<script src="../scripts/employee.js"></script>
</body>
</html>