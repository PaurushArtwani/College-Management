<?php
include 'index.php';
include 'database.php';

page_contain();


?>
<div class="panel panel-info">
  <div class="panel-heading font-weight-bold">User Rights</div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" id="noticeform" method="post" enctype="multipart/form-data">
                <div class="form-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Select Category</label>
                    <div class="col-md-3">
                                        <select name="role_id" class="form-control select select2 select2me" placeholder="Select..." id="sid">
                                         <option value="">Select...</option>
                                            <?php
                                            $r1=mysqli_query($con,"select * from master_role");   
                                            $i=0;
                                            while($row1=mysqli_fetch_array($r1))
                                            {
                        $id=$row1['id'];
                        $role_name=$row1['role_name'];
                                            ?>
                              <option value="<?php echo $id;?>"><?php echo $role_name;?></option>                              
                              <?php }?> 
                              </select>
                    </div>
                  </div>
                                    
                                  
                                            <div id="data">
                                          
                                            </div>
                    
                  
                   
                   
                </div>
                 
              </form>
  </div>
</div>
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/select2/select2.min.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
  $("#sid").change(function(){
        var item_id = $('#sid option:selected').val();
      $.ajax({
    url: "view_rights.php?id="+item_id,
    }).done(function(response) {
      $("#data").html(""+response+"");
    });
});
});



</script>
<?php
include 'footer.php';
?>