<?php
 
include("database.php");

@session_start();
 $_SESSION["sem_id_data"] = $_GET["sem_id_data"];
$sem_id = $_SESSION["sem_id_data"];

//$sem_id_data = $_SESSION['sem_id_data'] = $sem_id['sem_id_data'];
 
 ?>
<div class="">
  
    
                <div class="form-body">
                                            
                  
                   
                  <div class="form-group">
                    <label class="col-md-3 control-label">Select Session</label>
                    <div class="col-md-3">
                                        <select name="session_year" class="form-control select user select2 select2me" placeholder="Select..." id="year">
                                         <option value="">Select...</option>
                                          <option value="2015-16">2015-16</option>
                                           <option value="2016-17">2016-17</option>
                                            <option value="2017-18">2017-18</option>
                                             <option value="2018-19">2018-19</option>
                                              <option value="2019-20">2019-20</option>
                                               <option value="2020-21">2020-21</option>
                                                <option value="2021-22">2021-22</option>

                                        
                                    </select>
                    </div>
                    <center>
                <input type="button" name="submit" id="search" value="Search" class="btn btn-primary">
              </center>

                  </div>

                  </div>


                 
                </div>
                 
              
  </div>


</div>

<div class="">
  
    
                <div class="form-body">
                                            
                  
                   
                  <div class="form-group">
                    
                  <div id="admission_year" class="scroller"  data-always-visible="1" data-rail-visible="0"></div>

                </div>
                 
              
  </div>


</div>

<script>

$("#search").click(function(){
   var item_id = $('#year option:selected').val();
  $.ajax({url: "ajax_student_admission_year.php?year_id="+item_id, success: function(result){
    $("#admission_year").html(result);
  }});
});

</script>