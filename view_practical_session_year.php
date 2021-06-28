<?php
 
include("database.php");
$subject_data =$_GET['subject_data'];
@session_start();
 $_SESSION["subject_data"] = $_GET["subject_data"];
$subject_data = $_SESSION["subject_data"];

 
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

</form>
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
   var url_data = <?php echo $subject_data;?>;
   var url, data;

   if (url_data == 47 || url_data == 2 || url_data == 7 || url_data == 12 || url_data == 17 || url_data == 22 || url_data == 27 || url_data == 32 || url_data == 37 || url_data == 42 || url_data == 51|| url_data == 56|| url_data == 61|| url_data == 66|| url_data == 71|| url_data == 76 || url_data == 81 || url_data == 87 || url_data == 87|| url_data == 46 || url_data == 4 || url_data == 9 || url_data == 14 || url_data == 19 || url_data == 24 || url_data == 29 || url_data == 34 || url_data == 39 || url_data == 44 || url_data == 53 || url_data == 58 || url_data == 63 || url_data == 68 || url_data == 73 || url_data == 83 || url_data == 89 || url_data == 48 || url_data == 3 || url_data == 8 || url_data == 13 || url_data == 18 || url_data == 23 || url_data == 28 || url_data == 33 || url_data == 38 || url_data == 43 || url_data == 52 || url_data == 57 || url_data == 62 || url_data == 67 || url_data == 72 || url_data == 82 || url_data == 88) {
    url = "view_f&b_format.php?year_id="; //F & B = FO = AO
    data = item_id;
} else if (url_data == 49 || url_data == 1 || url_data == 6 || url_data == 11 || url_data == 16 || url_data == 21 || url_data == 26 || url_data == 31 || url_data == 36 || url_data == 41 || url_data == 50 || url_data == 55 || url_data == 60 || url_data == 65 || url_data == 70 || url_data == 80 || url_data == 86 || url_data == 91 ){
    url = "view_fp_format.php?year_id="; //FP  format
    data = item_id;
}  else if (url_data == 5 || url_data == 25 || url_data == 54 || url_data == 94){
    url = "view_computer_format.php?year_id="; //Computer or RM format
    data = item_id;
} 
   else if (url_data == 10 || url_data == 30 || url_data == 59 || url_data == 90){
    url = "view_french_format.php?year_id="; //French format
    data = item_id;
} 
else{
    url = ".php?year_id=";
    data = item_id;
}

  $.ajax({url: url+data, success: function(result){
    $("#admission_year").html(result);
  }});

});


// $.ajax({
//     type: "POST",
//     url: url,
//     data: data,
//     success: success,
//     dataType: dataType
// });


</script>