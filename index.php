<!DOCTYPE html>
<html>
<head>
    <title>Hotel Managment ERP</title>
    <link rel="icon" type="text/css" href="assets/images/logo.png">
    
    <style type="text/css">

@media print {
    #printbtn {
        display :  none;
    }
}

</style>

    <?php
    include 'database.php';
@session_start();
$id=$_SESSION['id']; 
$full_name=$_SESSION['name']; 
$name=$_SESSION['user_name'];
$role=$_SESSION['role_id']; 

if(empty($id))
{
    header("location:login.php");
}
        function css()
        {?>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="assets/css/style.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/buttons.dataTables.min.css">





        
        <?php
    }
    css();
    ?>

</head>
<body>
    
    <div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">
               
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a type="button" data-toggle="modal" data-target="#myModaS"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>       

            <div id="myModaSl" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hemendra</h4>
      </div>
      <div class="modal-body">
        <img src="assets/images/hemendra.jpg" height="400" width="500" class="img-rounded" alt="Cinque Terre">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $full_name;?><b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                   
                    <li><a href="account_setting.php"><i class="fa fa-fw fa-cog"></i> Password</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
             
              
                <?php  $page_name_from_url=basename($_SERVER['PHP_SELF']);
                            @$fac_id=$_SESSION['id'];
                              $role_id=$_SESSION['category'];
                             $selecto7=mysqli_query($con,"select * from `user_management` where `role_id`='$role_id'");
                    while($reco7=mysqli_fetch_array($selecto7))
                   {
                       $mng_mdul_id[]=$reco7['module_id'];
                   }
                    
                 $sel_module2=mysqli_query($con,"select `main_menu` from `modules` where `page_name_url`='".$page_name_from_url."'");
                $arr_module2=mysqli_fetch_array($sel_module2);
                 $main_menu_active=$arr_module2['main_menu'];           
                
                    $selecto3=mysqli_query($con,"select * FROM `modules` ORDER BY id");
                    $i=0;
                      while($data=mysqli_fetch_array($selecto3))
                      {
                      $main_menu_arr[]='';
                      
                     if(in_array($data['id'],$mng_mdul_id))
                     {
                        if(empty($data['main_menu']) && empty($data['sub_menu']))
                        {
                            
                            ?>
                            <li class="<?php if($page_name_from_url==$data['page_name_url']){ echo 'active'; } ?>">
  <a href="<?php echo $data['page_name_url']; ?>"><i class="<?php echo $data['icon']; ?>"></i><?php echo $data['name']; if($page_name_from_url==$data['page_name_url']){ echo '<span class="selected"></span>'; } ?>
</a>
                            </li>
                            <?php
                        }
                      
                        if(!empty($data['main_menu']) && empty($data['sub_menu']))
                        {
                            if(in_array($data['main_menu'], $main_menu_arr))
                            {
                               
                            }
                            else
                            {
                                $main_menu_arr[]=$data['main_menu'];
                                
                                $i++;   
                                $data_target_id = $i;

                                  ?>
                                <li class="<?php if($main_menu_active==$data['main_menu']){ echo 'active'; } ?>">
                                    <a data-toggle="collapse" data-target="#<?php echo $data_target_id;?>" href="javascript:;">
                                    <i class="<?php echo $data['icon']; ?>"></i>
                                    <?php echo $data['main_menu']; ?> <span class="arrow"></span>                   
                                    <span class="selected"></span>
                                    <i class="fa fa-fw fa-angle-down pull-right" ></i>
                                    </a>
                                    <ul id="<?php echo $data_target_id;?>" class="sub-menu collapse ">
                                    <?php
                                    $selecto4=mysqli_query($con,"select * FROM `modules` where `main_menu`='".$data['main_menu']."'");
                                    while($data_value=mysqli_fetch_array($selecto4))
                                    {
                                        if(in_array($data_value['id'],$mng_mdul_id))
                                        {?>
                                            <li class="<?php if($page_name_from_url==$data_value['page_name_url']){ echo 'active'; } ?>">
                                                <a href="<?php echo $data_value['page_name_url']; ?>"> <?php echo $data_value['name']; ?><i class="fa fa-angle-double-right pull-right"></i></a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                    
                                    </ul>
                                </li>
                                <?php
                            }
                        }
                     }
                      }
                      ?>
                    
                </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

<?php
        function page_contain()
        { ?>

                <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->

            <!-- /.row -->
        
        <?php    
            
        }
?>


    
    <!-- /#page-wrapper -->
<!-- /#wrapper -->




