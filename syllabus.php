<?php
include 'index.php';
include 'database.php';

page_contain();


?>
<div class="panel panel-info">
  <div class="panel-heading font-weight-bold">Syllabus</div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
                <div class="form-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Select Course</label>
                    <div class="col-md-3">
                                        <select name="role_id" class="form-control select user select2 select2me" placeholder="Select..." id="view_u">
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
                 
              </form>
  </div>
</div>
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script>

$(document).ready(function(){
  $("#view_u").change(function(){
        var item_id = $('#view_u option:selected').val();
	  	$.ajax({
		url: "view_syllabus.php?id="+item_id,
		}).done(function(response) {
	    $("#data").html(""+response+"");
		});
});
});


</script>

<?php
	include 'footer.php';

?>