<?php include "style/styleDashboard.php"; ?>
<?php
    foreach ($sales as $result) {
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
                                <div class="col-md-4">
                                    <div class="panel border-primary no-border border-3-top">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>Profile Picture</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <img src="<?php echo $result->avatar;?>" alt="User Avatar" class="img-circle img-responsive">
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-primary btn-xs btn-labeled mt-10">Edit Users<span class="btn-label btn-label-right"><i class="fa fa-pencil"></i></span></button>
                                                    </div>
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

                                <div class="col-md-8">

                                    <div class="row mb-30">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a class="dashboard-stat-2 bg-primary" href="#">
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
                                      <br/>
                                      <b> Bio </b>
                                      <br/>
                                      <?php
                                        $bio = $result->bio; 
                                        if($bio == ""){
                                          echo"Kosong Gan";
                                        }else{
                                          ?> <p class="sub-title"><?php echo $result->bio;?></p> <?php
                                        }
                                      ?>
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
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="tab-content bg-white p-15" style="margin-top:10px;">
                                      <div role="tabpanel" class="tab-pane active" id="home2">
                                        Regions
                                        <hr/>
                                        <b>Region :</b> <?php echo $result->region;?>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="bg-white p-15" style="margin-top:10px;">
                                      <div role="tabpanel" id="home2">
                                        Branches
                                        <hr/>
                                        <b>Branch :</b> <?php echo $result->branch;?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            
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