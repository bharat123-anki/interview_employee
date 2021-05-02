<table class="table CandidateTable">
   <thead>
      <tr>
         <th scope="col">#</th>
         <th scope="col">Name</th>
         <th scope="col">Dept Name</th>
         <th scope="col">Sub Dept Name</th>
         <th scope="col">Image</th>
         <th scope="col">Action</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($candidateInfo as $key => $value) { ?>
         <tr>
            <th scope="row"><?php echo $key + 1; ?></th>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['dept_name']; ?></td>
            <td><?php echo $value['sub_dept_name']; ?></td>
            <td>
               <?php $image_path = "No Image Found";
               if (isset($value['candidate_image_path'])) {
                  if (!empty($value['candidate_image_path'])) {
                     $image_path = '<a href="' . base_url('uploads/candidate_images/') . $value['candidate_image_path'] . '" target="_blank" >Image</a>';
                  }
               }
               echo $image_path;
               ?>

            </td>
            <td data-id="<?php echo $value['id'] ?>">
               <a href="javascript:void(0)" class="candidateEditdata"><i class="fa fa-edit"></i> </a>|<a href="javascript:void(0)" class="candidatedeletedata"><i class="fa fa-trash"></i>
               </a>
            </td>

         </tr>
      <?php } ?>

   </tbody>
</table>




<script type="text/javascript">
   $('.CandidateTable').DataTable({});
</script>