<select class="form-control sub_dept_no" name="sub_dept_no">
	<option value="">--Select Any One--</option>
	<?php foreach ($subdepartmentdata as $key => $sub_dept) { ?>
		<option value="<?php echo $sub_dept['id'] ?>"><?php echo $sub_dept['sub_department_name']; ?></option>
	<?php } ?>
</select>