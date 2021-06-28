<?php
 
include("database.php");
$class_id=$_GET['id'];


@session_start();
 $_SESSION["class_id"] = $_GET["id"];
$class_id = $_SESSION["class_id"];
 ?>
<div class="">
  
    
                <div class="form-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Select Branch</label>
                    <div class="col-md-3">
                                        <select name="sem_id" class="form-control select user select2 select2me" placeholder="Select..." id="sem_id_data">
                                         <option value="">Select...</option>
                                        <?php

                                        $query = mysqli_query($con,"select * from master_class_sem where class_id='".$class_id."'");

                                        while ($rows = mysqli_fetch_array($query)) {
                                          $id = $rows['id'];
                                          $class_name = $rows['class_name'];
                                          ?>
                                        <option value="<?php echo $id;?>"><?php echo $rows['sem_name'];?></option>
                                        <?php 
                                        }
                                        ?>                                  
                                    
                                    </select>
                    </div>
                  </div>
                                    
                                  
                                            
                  
                   <div id="admission" class="scroller"  data-always-visible="1" data-rail-visible="0"></div>

                   
                </div>

                
                 
              
  </div>
</form>
</div>


<script>

$(document).ready(function(){
  $("#sem_id_data").change(function(){
        var item_id = $('#sem_id_data option:selected').val();
      $.ajax({
    url: "view_practical_year.php?sem_id_data="+item_id,
    }).done(function(response) {
      $("#admission").html(""+response+"");
    });
});
});


</script>
  
