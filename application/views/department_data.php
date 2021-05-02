<table class="table departmentDatatable">
   <thead>
      <tr>
         <th scope="col">#</th>
         <th scope="col">Dept Name</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($department_data as $key => $value) { ?>
         <tr>
            <th scope="row"><?php echo $value['dept_no']; ?></th>
            <td><?php echo $value['dept_name']; ?></td>
         </tr>
      <?php } ?>

   </tbody>
</table>




<script type="text/javascript">
   $('.departmentDatatable').DataTable({});
</script>