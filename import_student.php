<?php
include 'index.php';

page_contain();

 error_reporting(0);
$connect = mysqli_connect("localhost", "root", "", "hotel_mgt");
$output = '';
if(isset($_POST["import"]))
{
   $class_id = $_POST['class_id'];
    $sem_id = $_POST['sem_id'];
   
 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("assets/Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
  $roll_no = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
  $enrolment_no = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
  $student_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
  $father_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
  $mother_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
  $category = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
//$date_of_birth = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
$mobile_no  = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
$father_mobile  = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
$admission_session  = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
$admission_year  = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());



    $query = "INSERT INTO student_data(roll_no, enrolment_no,student_name,father_name,mother_name,category,mobile_no,father_mobile,admission_session,class_id,sem_id,admission_year) VALUES ('".$roll_no."', '".$enrolment_no."', '".$student_name."', '".$father_name."', '".$mother_name."', '".$category."','".$mobile_no."', '".$father_mobile."', '".$admission_session."', '".$class_id."', '".$sem_id."', '".$admission_year."')";
   $query_data =  mysqli_query($connect, $query);

   //var_dump($query); die();

   if ($query_data==true) {?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        
        swal({
    title: "Good Job!",
    text: "Student Data Successfully Import!",
     icon: "success",
    type: "success"
}).then(function() {
    window.location = "examination.php";
});
      </script>
    <?php
   }
    else
   {
    echo mysqli_error($connect);
   }



    $output .= '<td>'.$roll_no.'</td>';
    $output .= '<td>'.$enrolment_no.'</td>';
    $output .= '</tr>';
   }
  } 
  $output .= '</table>';

 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>

<div class="panel panel-info">
  <div class="panel-heading font-weight-bold">Import Students</div>
  <div class="panel-body">
    <a href="assets/student_data_format.xlsx" class="btn btn-success btn-sm pull-right" >Download Format</a>     
   <!--  <marquee><b style="color:red;">Note: Date of Birth field must yyyy-mm-dd format in Excel file</b></marquee> -->              
    <form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
                <div class="form-body" style="margin-top: 25px;">
                  <div class="form-group">

                    <label class="col-md-3 control-label">Select Course</label>
                    <div class="col-md-3">
                                        <select name="class_id" class="form-control select user select2 select2me" placeholder="Select..." id="view_u">
                                         <option value="">Select...</option>
                                        <?php

                                        $query = mysqli_query($con,"select * from master_class");

                                        while ($rows = mysqli_fetch_array($query)) {
                                        	$id = $rows['id'];
                                        	$class_name = $rows['class_name'];
                                        	?>
                                        <option value="<?php echo $id;?>"><?php echo $rows['class_name'];?></option>
                                        <?php	
                                        }
                                        ?>                                  
                              			
                          			    </select>
                    </div>
                  </div>
                                    
                                  
                                            <div id="data" class="scroller" style="height:400px; padding-top:5px"  data-always-visible="1" data-rail-visible="0"></div>

                  
                   
                   
                </div>
                 
              
  </div>
</div>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script>

$(document).ready(function(){
  $("#view_u").change(function(){
        var item_id = $('#view_u option:selected').val();
      $.ajax({
    url: "ajax_import_student.php?id="+item_id,
    }).done(function(response) {
      $("#data").html(""+response+"");
    });
});
});


</script>
<?php
  include 'footer.php';
?>