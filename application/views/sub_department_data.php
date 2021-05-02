<table class="table SubdepartmentDatatable">
   <thead>
      <tr>
         <th scope="col">#</th>
         <th scope="col">Dept Name</th>
         <th scope="col">Sub Dept Name</th>
         <th scope="col">Action</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($subdepartmentdata as $key => $value) { ?>
         <tr>
            <th scope="row"><?php echo $key + 1; ?></th>
            <td><?php echo $value['dept_name']; ?></td>
            <td><?php echo $value['sub_department_name']; ?></td>
            <td data-id="<?php echo $value['id'] ?>"><a href="javascript:void(0)" class="sub_department_edit"><i class="fa fa-edit"></i> </a>|<a href="javascript:void(0)" class="sub_department_delete"><i class="fa fa-trash"></i> </a></td>

         </tr>
      <?php } ?>

   </tbody>
</table>




<script type="text/javascript">
   $('.SubdepartmentDatatable').DataTable({});
</script>