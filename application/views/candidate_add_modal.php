<div class="main_notify"></div>
<form action="" method="POST" id="candidate_add_form" enctype="multipart/form-data">
   <input type="hidden" name="id" value="<?php echo  isset($candidate_data['id']) ? $candidate_data['id'] : ''; ?>">
   <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" value="<?php echo  isset($candidate_data['name']) ? $candidate_data['name'] : ''; ?>" placeholder="Enter  name">
   </div>
   <div class="form-group">
      <label for="exampleInputEmail1">Department Name</label>
      <select class="form-control candidate_dept_name" name="dept_no">
         <option value="">--Select Any One--</option>
         <?php foreach ($departmentdata as $key => $dept) { ?>
            <option value="<?php echo $dept['dept_no'] ?>" <?php echo  isset($candidate_data['dept_no']) ? $candidate_data['dept_no'] == $dept['dept_no'] ? 'selected' : '' : ''; ?>><?php echo $dept['dept_name']; ?></option>
         <?php } ?>
      </select>

   </div>
   <div class="form-group">
      <label for="exampleInputEmail1">Sub Department Name</label>
      <select class="form-control candidate_formsub_dept_no" name="sub_dept_no">
         <option value="">--Select Any One--</option>
         <?php foreach ($sub_dept_data as $key => $sub_dept) { ?>
            <option value="<?php echo $sub_dept['id']; ?>" <?php
                                                echo isset($candidate_data['sub_department_id']) ? $candidate_data['sub_department_id'] == $sub_dept['id'] ? 'selected' : '' : ''; ?>><?php echo $sub_dept['sub_department_name']; ?></option>
         <?php } ?>
      </select>

   </div>
   <div class="form-group">
      <label for="exampleInputEmail1">Candidate Image</label>
      <input type="file" name="candidate_image" class="form-control">
   </div>

   <input type="submit" class="btn btn-primary"></input>
   </div>
</form>