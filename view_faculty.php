<?php
include 'index.php';
include 'database.php';

page_contain();

@session_start();
$role=$_SESSION['role_id']; 
?>
<div class="panel panel-info">
  <div class="panel-heading font-weight-bold">	Faculty Details</div>
  <div class="panel-body">
  	<div class="">
  <p>Faculty Details</p>            
  <table class="table table-hover" id="myTable">
    <thead class="thead-dark">
      <tr>
      	<th>S.No.</th>
        <th>Name</th>
        <?php

        if ($role==1 || $role==2) {?>
          <th>User Name</th>
         <?php 
        }

        ?>
       
        <?php

        if ($role==1 || $role==2) {?>
          <th>Password</th>
         <?php 
        }

        ?>
       
        <th>Designation</th>
        <th>Mobile No.</th>
        <th>Date of Joining</th>
        <th>Address</th>
        <?php

        if ($role==1 || $role==2) {?>
          <th>Action</th>
         <?php 
        }

        ?>
       
      </tr>
    </thead>
    <tbody>
      <?php

      $sql_query = mysqli_query($con,"select * from faculty_login where flag = 0 ");
      $i = 1;
      
      
      while ($row = mysqli_fetch_array($sql_query)) {
      	
      	$role_id=$row['role_id'];
      		
      		$r2=mysqli_query($con,"select * from master_role where id='".$role_id."'");		
                            $fet=mysqli_fetch_array($r2);
                            $role_name=$fet['role_name'];
			
         // $class_id = $row['class_id'];

         // 	$row3 = mysqli_query($con,"select * from master_class where id='".$class_id."'");
         // 				$mix = mysqli_fetch_array($row3);
         // 				$class_name=$mix['class_name'];

      	?>
      
      	<tr>
      		<td><?php echo $i++;?></td>
      		<td><?php echo $row['name']?></td>
      		<?php

        if ($role==1 || $role==2) {?>
          <td><?php echo $row['user_name'];?></td>
         <?php 
        }

        ?>
       <?php

        if ($role==1  || $role==2) {?>
          <td><?php echo $row['passwords'];?></td>
         <?php 
        }

        ?>
      		
      		
      		<td><?php 
      				echo $role_name;
      		
      		?>	
      		</td>

      		<td><?php echo $row['mobile_no']?></td>
      		<td><?php 
      		$dateFormat = $row['date_of_joining'];
      		$newDate = date("d-m-Y", strtotime($dateFormat));
      		echo $newDate;
      		?>
      			
      		</td>
      		<td><?php echo $row['address']?></td>
          <?php

        if ($role==1 || $role==2) {?>
          <td>
            <button type="button" title="Delete Faculty" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
              <i class="fa fa-trash"></i>
            </button>
          </td>
         <?php 
        }

        ?>
      
          <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Faculty</h4>
      </div>
      <div class="modal-body">
        <b>Are you sure you want to delete ?</b>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="delete_faculty.php?delete=<?php echo $row['id'];?>" class="btn btn-sm btn-danger">Yes</a>
      </div>
    </div>

  </div>
</div>
      	</tr>

      <?php	
      }
      ?>
    </tbody>
  </table>
</div>

  </div>
</div>
<?php
  include 'footer.php';

?>