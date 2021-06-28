<?php
 
include("database.php");
$branch = $_GET['ids'];
$class = $_GET['id'];
  
 
 ?>
<div class="">
  
    
                <div class="form-body">
                                  
                                            <div id="data_syllabus" class="scroller"  data-always-visible="1" data-rail-visible="0"></div>

                  
                   <!-- <hr style="background: black;height: 1px;"> -->
                   <div class="row">
                     
                     <table  class="table table-bordered" id="dynemic_field">
                       <tr>
                         
                         <th style="width: 15%;">Paper Code</th>
                         <th>Paper Name</th>
                         <th>Action</th>
                       </tr>

                       <tr>
                         <td>
                           <input type="text" name="ppr_code" class="form-control" placeholder="Paper Code">
                         </td>

                         <td>
                           <input type="text" name="ppr_name" class="form-control" placeholder="Paper Name">
                         </td>

                         <td>
                           <button class="btn btn-success btn-sm" id="plus" type="button"  ><i class="fa fa-plus"></i></button>
                         </td>
                       </tr>
                     </table> 


                   </div>
                   <hr style="background: black;height: 1px;">
                   <center>
                      <input type="button" name="submit" id="submit" class="btn btn-primary" value="Submit">  
                    </center>
                  
                </div>
                 </div>
              </form>
  </div>
</div>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/sweetalert.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    
    var i = 1;
    $('#plus').click(function(){
      i++;
      $('#dynemic_field').append('<tr id="row'+i+'"><td> <input type="text" placeholder="Paper Code" name="ppr_code[]" class="form-control"></td><td><input type="text" placeholder="Paper Name" name="ppr_name[]" class="form-control"></td><td><button class="btn btn-danger btn_remove btn-sm" name="remove" id="'+i+'" type="button"  ><i class="fa fa-trash"></i></button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function(){
      var button_id = $(this).attr("id");
      $("#row"+button_id+"").remove();
    });

    $('#submit').click(function(){
      $.ajax({
        url:"process_data.php",
        method : "POST",
        data : $('#paper').serialize(),
        success : function(data)
        {
          alert(data);
          swal(data);
          $('#paper')[0].reset();
        } 
      });
    });
  });
</script>