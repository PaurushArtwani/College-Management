<?php

include 'database.php';

@session_start();
$id=$_SESSION['id']; 
$full_name=$_SESSION['name']; 
$role=$_SESSION['role_id']; 
//$class_id=$_GET['id'];
$sem_id = $_SESSION["sem_id_data"];
$class_id = $_SESSION["class_id"];
$year_id = $_GET["year_id"];

//echo $sem_id;



// $qry='';

// if(!empty($class_id))
// {  
//   $qry.=" (`class_id`='$class_id') && (`sem_id`='$sem_id') ";
// }
 
//$qry.=" `flag`= 0  order by id asc ";





?>
    <div class="container-fluid">
           
  <table class="table table-hover table-striped" id="myTable"  class="display" style="width:100%">
    <a href="evaluation_print.php?year_id=<?php echo $year_id;?>" target="_blank" class="btn btn-sm btn-info" ><i class="fa fa-print"></i></a>
    <thead class="thead-dark">
      <tr>
        <th width="2%">S.No.</th>
        <!-- <th>Roll No.</th> -->
   

        <th>Student Name</th>
        <th>Marks Obtained (15)</th>
        <th>Teachers Assessment (15)</th>
        <th>Total Marks (30)</th>
        
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
      <p id="change"></p>
        
      
       
      <?php
      $query  = "select * from student_data where (`class_id`='$class_id') && (`sem_id`='$sem_id') && (`admission_session`='$year_id') && (`flag`='0') ORDER BY student_name ASC ";


//$result = mysqli_query($con, $query) or die( mysqli_error($con));
//echo $result;
      $run_query = mysqli_query($con,$query);
//var_dump($query);
      $i=0;

      while ($row_data = mysqli_fetch_array($run_query)) {
        $i++;
        $student_id = $row_data['id'];
        $roll_no = $row_data['roll_no'];
        $enrolment_no = $row_data['enrolment_no'];
        $student_name = $row_data['student_name'];
        $father_name = $row_data['father_name'];
        $mother_name = $row_data['mother_name'];
        $mobile_no = $row_data['mobile_no'];
        $subject_data = $_SESSION["subject_data"];

        $query = mysqli_query($con,"select * from internal_exam_theory_number where student_id = '$student_id' AND theory_subject_id = '$subject_data' ");

        $row2 = mysqli_fetch_array($query);

        $obtained_markss = $row2['obtained_marks'];
        $teacher_assmt = $row2['teachers_assessment'];
        $total_number = $row2['total_number'];
        ?>
        <form id="form"  action="hems.php">
        <tr>
        <td><?php echo $i;?></td>
       <!-- <td><?php// echo $roll_no;?></td> -->
      
       <td><?php echo $student_name;?></td>
       <td>
       
        <?php echo $obtained_markss; ?>
        
      </td>
        <td>
         <?php echo $teacher_assmt ; ?>
        </td>

        <td>

          <?php echo $total_number ; ?>
        </td> 

          <td>
            <a href="<?php echo 'internal_student_marks.php?id='.$student_id;?>" target="_blank"  class="btn btn-sm btn-success" title="Add Internal Theory Number" >
            <i class="fa fa-plus" aria-hidden="true"></i>
          </a>

          <!-- Button trigger modal -->
 </form>
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
        

        <?php
        

?>     
     </tbody>
  </table>

</div>
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>

<script type="text/javascript">
        function sum() {
           <?php
      $query  = "select * from student_data where (`class_id`='$class_id') && (`sem_id`='$sem_id') && (`admission_session`='$year_id') && (`flag`='0')";


//$result = mysqli_query($con, $query) or die( mysqli_error($con));
//echo $result;
      $run_query = mysqli_query($con,$query);
//var_dump($query);
      $i=0;

      while ($row_data = mysqli_fetch_array($run_query)) {
        $i++;
        $student_id = $row_data['id'];
        $roll_no = $row_data['roll_no'];
        $enrolment_no = $row_data['enrolment_no'];
        $student_name = $row_data['student_name'];
        $father_name = $row_data['father_name'];
        $mother_name = $row_data['mother_name'];
        $mobile_no = $row_data['mobile_no'];
        ?>
            var txtFirstNo = document.getElementById('txtFirstNo<?php echo $i;?>').value;
            var txtSecondNo = document.getElementById('txtSecondNo<?php echo $i;?>').value;
            var result = parseInt(txtFirstNo) + parseInt(txtSecondNo);
            var  n =0;

            if (!isNaN(result)) {

               document.getElementById('txtResult<?php echo $i;?>').value = result;
              
            }
           <?php    
          }
          ?>
        }    
        

    </script>

     <script type="text/javascript" language="javascript">




        function CheckValue(){
            //var box1 = parseInt(document.getElementById('txtFirstNo').value);
             <?php
      $query  = "select * from student_data where (`class_id`='$class_id') && (`sem_id`='$sem_id') && (`admission_session`='$year_id') && (`flag`='0')";


//$result = mysqli_query($con, $query) or die( mysqli_error($con));
//echo $result;
      $run_query = mysqli_query($con,$query);
//var_dump($query);
      $i=0;

      while ($row_data = mysqli_fetch_array($run_query)) {
        $i++;
        $student_id = $row_data['id'];
        $sem_id = $row_data['sem_id'];
        $class_id = $row_data['class_id'];
        $subject_data = $_SESSION["subject_data"];
        ?>
              var fistno = parseInt(document.getElementById('txtFirstNo<?php echo $i;?>').value);
            var second = parseInt(document.getElementById('txtSecondNo<?php echo $i;?>').value);
            var box2 = parseInt(document.getElementById('txtResult<?php echo $i;?>').value);
            
            if (fistno >15) {
              swal("Error!", "Only Marks Obtained Max 15 Number Allowed!", "error");return false;
            }

            if (second >15) {
              swal("Error!", "Only Teachers Assessment Max 15 Number Allowed!", "error");return false;
            }

            if (box2 < 12 ){
               swal("Error!", "Only allowed Total 12 Number!", "error");return false;
                
            }

            $.post('ajax_internal_process.php',{
            i : <?php echo $i;?>,
            obtained_marks : fistno,
            teacher_ass : second,
            total_number : box2,
            student_id : <?php echo $student_id;?>,
            class_id : <?php echo $class_id;?>,
            sem_id : <?php echo $sem_id;?>,
            theory_subject_id :<?php echo $subject_data;?>
          }, function(data,status){
                swal("Success!", "Internal Theory Number Added!", "success");
            
          });
            <?php
         }   
?>
         
        swal("Success!", "Internal Theory Number Added!", "success");
        return true; 
    }
    

         
        
    </script>

    
<?php
  include 'footer.php';
?>