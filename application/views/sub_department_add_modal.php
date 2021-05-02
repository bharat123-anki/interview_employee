<div class="main_notify"></div>
<form action="" method="POST" id="sub_dept_form">
   <span class="sucess_message" style="color:green"></span>
   <div class="form-group">
      <input type="hidden" name="id" value="<?php echo  isset($sub_department_data['id']) ? $sub_department_data['id'] : ''; ?>">
      <label for="exampleInputEmail1">Department Name</label>
      <select class="form-control dept_name" name="dept_no">
         <option value="">--Select Any One--</option>
         <?php foreach ($departmentdata as $key => $dept) { ?>
            <option value="<?php echo $dept['dept_no'] ?>" <?php echo  isset($sub_department_data['dept_no']) ? $sub_department_data['dept_no'] == $dept['dept_no'] ? 'selected' : '' : ''; ?>><?php echo $dept['dept_name']; ?></option>
         <?php } ?>
      </select>

   </div>
   <div class="form-group">
      <label for="exampleInputEmail1">Sub Department Name</label>
      <input type="text" class="form-control" id="sub_department_name" aria-describedby="emailHelp" name="sub_department_name" value="<?php echo  isset($sub_department_data['sub_department_name']) ? $sub_department_data['sub_department_name'] : ''; ?>" placeholder="Enter Sub department name">
   </div>

   <input type="submit" class="btn btn-primary"></input>
   </div>
</form>