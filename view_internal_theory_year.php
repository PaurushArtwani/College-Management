<?php
 
include("database.php");
$sem_id =$_GET['sem_id_data'];
@session_start();
 
 $_SESSION["sem_id_data"] = $_GET["sem_id_data"];
$sem_id = $_SESSION["sem_id_data"];
$class_id = $_SESSION["class_id"];
 ?>
<div class="">
  
    
                <div class="form-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Select Subject</label>
                    <div class="col-md-3">
                                        <select name="subject_data" class="form-control select user select2 select2me" placeholder="Select..." id="subject_data">
                                         <option value="">Select...</option>
                                        <?php

                                        $query = mysqli_query($con,"select * from master_subject_theory_paper where (class_id='$class_id') && (sem_id = '$sem_id') ");

                                        while ($rows = mysqli_fetch_array($query)) {
                                          $id = $rows['id'];
                                          $paper_code = $rows['paper_code'];
                                          $subject_paper = $rows['subject_paper'];
                                          ?>
                                        <option value="<?php echo $id;?>"><?php echo $paper_code; ?>-<?php  echo $subject_paper ;?></option>
                                        <?php 
                                        }
                                        ?>                                  
                                    
                                    </select>
                    </div>
                  </div>
                                    
                                  
                                            
                  
                   <div id="admission_years" class="scroller"  data-always-visible="1" data-rail-visible="0"></div>

                   
                </div>

                
                 
              
  </div>
</form>
</div>

<script>

$(document).ready(function(){
  $("#subject_data").change(function(){
        var item_id = $('#subject_data option:selected').val();
      $.ajax({
    url: "view_internal_session_year.php?subject_data="+item_id,
    }).done(function(response) {
      $("#admission_years").html(""+response+"");
    });
});
});


</script>

  
