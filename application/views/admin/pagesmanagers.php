<?php include "style/styleDashboard.php"; ?>
<?php 
    $id = $this->uri->segment(2);

    $query = $this->db->query("SELECT * FROM branches WHERE id_manager = $id");
    $row = $query->row();

    $branch = $row->branch;
?>
<?php
    foreach ($managers as $result) {
?>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <nav class="navbar top-navbar bg-white box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <?php include "partial/header.php";?>
                    </div>
                    <!-- /.row -->
            	</div>
            	<!-- /.container-fluid -->
            </nav>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <div class="left-sidebar fixed-sidebar bg-primary box-shadow tour-three">
                        <div class="sidebar-content">
                            <?php include "partial/navigation.php" ?>
                        </div>
                    </div>

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h4 class="title"><?php echo $result->first_name;?> <?php echo $result->last_name;?><small class="ml-10">Profile</small></h4>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                      <li><a href="<?php echo base_url()?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                      <li class="active">My Profile</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row mt-30">
                                <div class="col-md-5">
                                    <div class="panel border-primary no-border border-3-top">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>Profile Picture</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <?php 
                                                      if($result->avatar == ""){
                                                        if($result->gender == '1'){
                                                        ?>    
                                                          <center>
                                                            <div class="outline-product" style="background: url('http://www.tlcteignmouth.co.uk/wp-content/uploads/2015/06/default-avatar_man.png')center no-repeat; background-size:cover; width:200px; border-radius:100%; height:200px;">
                                                            </div>  
                                                          </center>
                                                        <?php 
                                                          }else{
                                                            ?>
                                                            <center>
                                                              <div class="outline-product" style="background: url('http://usvirtualcareers.com/wp-content/uploads/2016/06/default-avatar_women.png')center no-repeat; background-size:cover; width:200px; border-radius:100%; height:200px;">
                                                              </div>  
                                                            </center>
                                                        <?php  
                                                        }

                                                      }else{  
                                                      ?> 
                                                      <center>
                                                        <div class="outline-product" style="background: url('<?php echo $result->avatar;?>')center no-repeat; background-size:cover; width:200px; border-radius:100%; height:200px;">
                                                        </div>  
                                                      </center>
                                                    
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                    <!-- <div class="text-center">
                                                        <button type="button" class="btn btn btn-xs btn-labeled mt-10" style="color:#fff;background: linear-gradient(#EE8084, #DC6CBE);">Edit Manager<span class="btn-label btn-label-right"><i class="fa fa-pencil"></i></span></button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel -->

                                    <div class="panel border-primary no-border border-3-top">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>About</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body" style="padding-left:30px;">
                                            <div class="row">
                                                <table class="table table-responsive">
                                                	<tbody>
                                                    <tr>
                                                      <th width="0%">Name <span style="float:right;"> : </span> </th>
                                                        <td width="60%">
                                                            <p style="word-break:break-all; margin-bottom:0px;"><?php echo $result->first_name;?> <?php echo $result->last_name;?></p>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Username <span style="float:right;"> : </span> </th>
                                                        <td>
                                                            <p style="word-break:break-all; margin-bottom:0px;"><?php echo $result->username;?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email <span style="float:right;"> : </span> </th>
                                                        <td>
                                                            <p style="word-break:break-all; margin-bottom:0px;"><?php echo $result->email;?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender <span style="float:right;"> : </span> </th>
                                                        <td>
                                                            <?php 
                                                            if($result->gender == '1'){
                                                                echo "<p style='height:0px;'>Pria</p>";
                                                                
                                                            }else{
                                                                echo "<p style='height:0px;'>Wanita</p>";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phone Number <span style="float:right;"> : </span> </th>
                                                        <td>
                                                        <p style="word-break:break-all; margin-bottom:0px;"><?php echo $result->phone;?></p>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Level <span style="float:right;"> : </span> </th>
                                                        <td>
                                                        <button type="button" class="btn btn-default btn-sm" style="color:#fff;background: linear-gradient(#EE8084, #DC6CBE);">Manager</button>
                                                      </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Branch <span style="float:right;"> : </span> </th>
                                                        <td>
                                                        <p style="word-break:break-all; margin-bottom:0px;"><?php echo $branch;?></p>
                                                      </td>
                                                    </tr>
                                                    
                                                    <!-- <tr>
                                                			<th>BOD <span style="float:right;"> : </span></th>
                                                			<td>
                                                        <p style="word-break:break-all; margin-bottom:0px;"><?php echo $result->bod;?></p>
                                                      </td>
                                                    </tr> -->
                                                	</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-md-3 -->

                                <div class="col-md-7">

                                    <div class="row mb-30">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a class="dashboard-stat-2 bg-pinkpoints" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter"><?php echo $result->point;?></span>
                                                    <span class="name">Points</span>
                                                </div>
                                            </a>
                                            <!-- /.dashboard-stat-2 -->
                                        </div>
                                        <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    </div>
                                    <!-- /.row -->

                                    <ul class="nav nav-tabs nav-justified" role="tablist">
                                	</ul>
                                  <div class="tab-content bg-white p-15">
                                    <div role="tabpanel" class="tab-pane active" id="home2">
                                      Information 
                                      <hr/>
                                      <b>Address</b> <br/><?php echo $result->address;?>
                                      <br/>
                                    </div>
                                  </div>

                                  <div class="tab-content bg-white p-15" style="margin-top:10px;">
                                    <div role="tabpanel" class="tab-pane active" id="home2">
                                      Payment Method
                                      <hr/>
                                      <b>Bank Account</b> <br/><?php echo $result->bank_name;?>
                                      <br/><br/>
                                      <b>No Rek:</b> <br/><?php echo $result->no_rek;?>
                                    </div>
                                  </div>
                                <!-- /.col-md-9 -->
                                
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tab-box" style="padding-left:15px; padding-right:15px; margin-bottom:20px;">
                                        <div class="tab-content bg-white p-15">
                                            <div role="tabpanel" class="tab-pane active" id="home2">
                                                List Sales (<?php echo $branch;?>)
                                                <hr/>
                                                <div class="row">
                                                    
                                                    <?php 
                                                        foreach($sales as $fetch_sales){                                        
                                                    ?>    
                                                    <div class="col-lg-1">
                                                        <?php 
                                                        if($fetch_sales->avatar == ""){
                                                            if($fetch_sales->gender == '1'){
                                                            ?>    
                                                            <img src="http://www.tlcteignmouth.co.uk/wp-content/uploads/2015/06/default-avatar_man.png" class="border-radius-50" style="width:100%;">
                                                            <?php 
                                                            }else{
                                                                ?>
                                                                <img src="http://usvirtualcareers.com/wp-content/uploads/2016/06/default-avatar_women.png" class="border-radius-50" style="width:100%;">
                                                            <?php  
                                                            }

                                                        }else{  
                                                        ?> 
                                                        <img src="<?php echo $fetch_sales->avatar;?>" class="border-radius-50" style="width:100%;">
                                                        <?php
                                                        }
                                                        ?>         
                                                    </div>
                                                        <div class="col-lg-3">
                                                            <div class="box-sales" style="margin-top:25px;">
                                                                <p style="margin-bottom:0px;"> <a href="<?php echo base_url();?>pagesprofile/<?php echo $fetch_sales->id;?>"><?php echo $fetch_sales->first_name;?> <?php echo $fetch_sales->last_name;?></a></p>
                                                                <p> <?php echo $fetch_sales->email;?></p>
                                                            </div>
                                                        </div>
                                                    <?php 
                                                        }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.main-page -->
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->
    <?php } ?>
<?php include "style/javascriptDashboard.php";?>