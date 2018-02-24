<?php include"style/styleDashboard.php";?>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <nav class="navbar top-navbar bg-white box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <?php include "partial/header.php";?>
                    </div>  
            	</div>  
            </nav>

            <div class="content-wrapper">
                <div class="content-container">

                    <div class="left-sidebar bg-primary box-shadow ">
                        <div class="sidebar-content">
                            <?php include "partial/navigation.php" ?>
                        </div>  
                    </div>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title">Sales</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
            							              <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>sales">Sales</li></a>
                                        <li class="active">Add Sales</li>
            						            </ul>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-info" role="alert">
                                            <strong>Datatables!</strong> This is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table. For official documentation, <a href="<?php echo base_url();?>assets/https://datatables.net/" target="_blank" class=" ml-5"><i class="fa fa-hand-o-right"></i> click here <i class="fa fa-hand-o-left"></i></a>.
                                        </div>
                                        <!-- /.alert alert-info -->
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Input Your Sales</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <form action="<?php echo base_url()?>insertsales" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                                	<div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Firstname</label>
                                                		<div class="col-sm-4">
                                                			<input type="text" name="firstname" class="form-control" id="firstname" placeholder="Firstname">
                                                    </div>
                                                    <label for="text1" class="col-sm-1 control-label">Lastname</label>
                                                		<div class="col-sm-5">
                                                			<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Lastname">
                                                		</div>
                                                  </div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Picture</label>
                                                		<div class="col-sm-10">
                                                      <input id="picture" type="file" class="validate" name="picture" required="ON">
                                                    </div>
                                                	</div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Username</label>
                                                		<div class="col-sm-4">
                                                			<input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                                    </div>

                                                    <label for="text1" class="col-sm-1 control-label">Email</label>
                                                		<div class="col-sm-5">
                                                			<input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Password</label>
                                                		<div class="col-sm-4">
                                                			<input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                                    </div>
                                                    <label for="text1" class="col-sm-1 control-label">Confirm Password</label>
                                                		<div class="col-sm-5">
                                                			<input type="password" name="cpassword" class="form-control" id="password" placeholder="Confirm Password">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Phone</label>
                                                		<div class="col-sm-4">
                                                			<input type="number" name="phone" class="form-control" id="phone" placeholder="Phone">
                                                    </div>
                                                    
                                                    <label for="text1" class="col-sm-1 control-label">Gender</label>
                                                		<div class="col-sm-5">
                                                      <select name="gender" class="form-control">
                                                        <option value="1">Default Select</option>
                                                        <option value="1">Pria</option>
                                                        <option value="0">Wanita</option>
                                                      </select>
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Regions</label>
                                                		<div class="col-sm-4">
                                                      <select name="regions" class="form-control">
                                                        <option value="1">Default Select</option>
                                                        <?php 
                                                          foreach($regions as $result){
                                                          ?> 
                                                            <option value="<?php echo $result->id_region?>"><?php echo $result->region;?></option> 
                                                          <?php
                                                          }
                                                        ?>
                                                      </select>
                                                    </div>
                                                    
                                                    <label for="text1" class="col-sm-1 control-label">Branches</label>
                                                		<div class="col-sm-5">
                                                      <select name="branches" class="form-control">
                                                        <option value="1">Default Select</option>
                                                        <?php 
                                                          foreach($branches as $result){
                                                          ?> 
                                                            <option value="<?php echo $result->id_branch?>"><?php echo $result->branch;?></option> 
                                                          <?php
                                                          }
                                                        ?>
                                                      </select>
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Bank</label>
                                                		<div class="col-sm-4">
                                                			<select name="bank" class="form-control">
                                                        <option value="1">Default Select</option>
                                                        <option value="BCA">Bank Central Asia</option>
                                                        <option value="BRI">Bank Rakyat Indonesia</option>
                                                        <option value="Bank Mega">Bank Mega</option>
                                                        <option value="Bank Mandiri">Bank Mandiri</option>
                                                      </select>
                                                    </div>
                                                    
                                                    <label for="text1" class="col-sm-1 control-label">No Rek</label>
                                                		<div class="col-sm-5">
                                                      <input type="number" name="norek" class="form-control" id="norek" placeholder="No Rekening">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Bio</label>
                                                      <div class="col-sm-10">
                                                        <textarea class="form-control note-codable" name="bio" placeholder="Biography" style="height: 200px;"></textarea>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Address</label>
                                                      <div class="col-sm-10">
                                                        <textarea class="form-control note-codable" name="address" placeholder="Address" style="height: 200px;"></textarea>
                                                      </div>
                                                  </div>
                                                    
                                                	<div class="form-group">
                                                		<div class="col-sm-offset-2 col-sm-10">
                                                			<button type="submit" class="btn btn-primary">Submit</button>
                                                		</div>
                                                	</div>
                                                </form>  
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col md-4">
                                    </div>
                                </div>  
                            </div>  
                        </section>  
                    </div>  
                </div>  
            </div>  

        </div>
<?php include"style/javascriptDashboard.php";?>