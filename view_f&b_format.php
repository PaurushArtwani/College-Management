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
 $subject_data = $_SESSION["subject_data"];


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
    <?php
//F & B = FO = AO
      if ($subject_data == 47 || $subject_data == 2 || $subject_data == 7 || $subject_data == 12 || $subject_data == 17 || $subject_data == 22 || $subject_data == 27 || $subject_data == 32 || $subject_data == 37 || $subject_data == 42 || $subject_data == 51|| $subject_data == 56|| $subject_data == 61|| $subject_data == 66|| $subject_data == 71|| $subject_data == 76 || $subject_data == 81 || $subject_data == 87 || $subject_data == 87|| $subject_data == 46 || $subject_data == 4 || $subject_data == 9 || $subject_data == 14 || $subject_data == 19 || $subject_data == 24 || $subject_data == 29 || $subject_data == 34 || $subject_data == 39 || $subject_data == 44 || $subject_data == 53 || $subject_data == 58 || $subject_data == 63 || $subject_data == 68 || $subject_data == 73 || $subject_data == 83 || $subject_data == 89 || $subject_data == 48 || $subject_data == 3 || $subject_data == 8 || $subject_data == 13 || $subject_data == 18 || $subject_data == 23 || $subject_data == 28 || $subject_data == 33 || $subject_data == 38 || $subject_data == 43 || $subject_data == 52 || $subject_data == 57 || $subject_data == 62 || $subject_data == 67 || $subject_data == 72 || $subject_data == 82 || $subject_data == 88) {?>
    <a href="f&b_evaluation_print.php?year_id=<?php echo $year_id;?>" target="_blank" class="btn btn-sm btn-info" ><i class="fa fa-print"></i></a>
    <?php //FP  format
} else if ($subject_data == 49 || $subject_data == 1 || $subject_data == 6 || $subject_data == 11 || $subject_data == 16 || $subject_data == 21 || $subject_data == 26 || $subject_data == 31 || $subject_data == 36 || $subject_data == 41 || $subject_data == 50 || $subject_data == 55 || $subject_data == 60 || $subject_data == 65 || $subject_data == 70 || $subject_data == 80 || $subject_data == 86 || $subject_data == 91 ){?>
    <a href="fp_evaluation_print.php?year_id=<?php echo $year_id;?>" target="_blank" class="btn btn-sm btn-info" ><i class="fa fa-print"></i></a>
    <?php
    //Computer or RM format
}  else if ($subject_data == 5 || $subject_data == 25 || $subject_data == 54 || $subject_data == 94){?>
    <a href="computer_evaluation_print.php?year_id=<?php echo $year_id;?>" target="_blank" class="btn btn-sm btn-info" ><i class="fa fa-print"></i></a>
  <?php
} 


    ?>
    <thead class="thead-dark">
      <tr>
        <th width="2%">S.No.</th>
        <!-- <th>Roll No.</th> -->
   

        <th>Student Name</th>
        <th>Journal(5)</th>
        <th>Gromming (5)</th>
        <th>Viva (10)</th>
        <th>Practical (10)</th>
        <th>Total (30)</th>
        
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

        $query = mysqli_query($con,"select * from internal_exam_practical_number where student_id = '$student_id' AND practical_subject_id = '$subject_data' ");

        $row2 = mysqli_fetch_array($query);

        $journal = $row2['journal'];
        $gromming = $row2['gromming'];
        $viva = $row2['viva'];
        $total_number = $row2['total_number'];
         $practical = $row2['practical'];
        ?>
        <form id="form"  action="hems.php">
        <tr>
        <td><?php echo $i;?></td>
       <!-- <td><?php// echo $roll_no;?></td> -->
      
       <td><?php echo $student_name;?></td>
       <td>
       
        <?php echo $journal; ?>
        
      </td>
        <td>
         <?php echo $gromming ; ?>
        </td>

        <td>
         <?php echo $viva ; ?>
        </td>

        <td>
         <?php echo $practical ; ?>
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