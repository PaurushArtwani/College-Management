<?php

include 'database.php';

@session_start();
$id=$_SESSION['id']; 
$full_name=$_SESSION['name']; 
$role=$_SESSION['role_id']; 
//$class_id=$_GET['id'];
$sem_id=$_GET['sem_id_data'];
$class_id = $_SESSION["class_id"];



// $qry='';

// if(!empty($class_id))
// {  
//   $qry.=" (`class_id`='$class_id') && (`sem_id`='$sem_id') ";
// }
 
//$qry.=" `flag`= 0  order by id asc ";





?>
    <div class="container-fluid">
  <p>Student Details</p>            
  <table class="table table-hover" id="myTable">
    <thead class="thead-dark">
      <tr>
        <th width="10%">S.No.</th>
        <th>Roll No.</th>
        <th>Enrollment</th>

        <th>Student Name</th>
        <th>Father's Name</th>
        <th>Mother's Name</th>
        <th>Mobile No.</th>
       
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
      $query  = "select * from student_data where (`class_id`='$class_id') && (`sem_id`='$sem_id')";


$result = mysqli_query($con, $query) or die( mysqli_error($con));
//echo $result;

var_dump($query);
      $i=0;
      while ($rows = mysqli_fetch_array($query)) {
        $roll_no = $rows['roll_no'];
        $enrollment = $rows['enrolment_no'];
        $student_name = $rows['student_name'];
        $father_name = $rows['father_name'];
        $mother_name = $rows['mother_name'];
        $mobile_no = $rows['mobile_no'];
        //$father_mobile = $rows['father_mobile'];
        $class_name = $rows['class_id'];
        $id = $rows['id'];
        $semester_name = $rows['sem_id'];
        $i++;

        $rw1 = mysqli_query($con,"select * from master_class where id = '$class_name'");

        $class = mysqli_fetch_array($rw1);

        $course = $class['class_name'];


        $rw2 = mysqli_query($con,"select * from master_class_sem where class_id = '$class_id'");

        $sem = mysqli_fetch_array($rw2);

        $year = $sem['sem_name'];

        $s_name = $rows['sem_id'];

        $rw3 = mysqli_query($con,"select * from master_class_sem where id = '$s_name'");

        $section = mysqli_fetch_array($rw3);

        $section_name = $section['sem_name'];

        //$file_download = $rows['file'];

        ?>
        
        <tr>
          <td><?php echo $i;  ?></td>
          <td><?php echo $roll_no;  ?></td>
          <td><?php echo $enrollment;  ?></td>
          <td><?php echo $student_name;  ?></td>
          <td><?php echo $father_name;  ?></td>
          <td><?php echo $mother_name;  ?></td>
          <td><?php echo $mobile_no;  ?></td>
          
          
          <td><a href="<?php echo'assets/uploads/'.$file_download; ?>" class="btn btn-sm btn-success" title="Download" >
            <i class="fa fa-download" aria-hidden="true"></i>
          </a>
          <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Delete Syllabus</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="delete_syllabus.php?delete=<?php echo $rows['id'];?>" type="button" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
          <?php
          if ($role==1) {?>
          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" title="Delete" data-target="#exampleModal">
  
            <i class="fa fa-trash" aria-hidden="true"></i></button>
            
          </a>
          
          <?php
          }
          

          ?>
         
         
        </td>

          
        </tr>
        <?php
       } 

?>
     </tbody>
  </table>
</div>

 <?php

  include 'footer.php';

?>