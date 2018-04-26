<?php include "style/styleDashboard.php";?>
<?php header('Access-Control-Allow-Origin: *'); ?>
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
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Input Your Sales</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal" id="postSales">
                                                	<div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Firstname</label>
                                                		<div class="col-sm-4">
                                                			<input type="text" name="first_name" class="form-control" id="firstname" placeholder="Firstname" required="ON">
                                                    </div>
                                                    <label for="text1" class="col-sm-1 control-label">Lastname</label>
                                                		<div class="col-sm-5">
                                                			<input type="text" name="last_name" class="form-control" id="lastname" placeholder="Lastname" required="ON">
                                                		</div>
                                                  </div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Username</label>
                                                		<div class="col-sm-4">
                                                			<input type="text" name="username" class="form-control" id="username" placeholder="Username" required="ON">
                                                    </div>

                                                    <label for="text1" class="col-sm-1 control-label">Email</label>
                                                		<div class="col-sm-5">
                                                			<input type="email" name="email" class="form-control" id="email" placeholder="Email" required="ON">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Password</label>
                                                		<div class="col-sm-4">
                                                			<input type="password" name="password" class="form-control" id="password" placeholder="Password" required="ON">
                                                    </div>
                                                    <label for="text1" class="col-sm-1 control-label">Confirm Password</label>
                                                		<div class="col-sm-5">
                                                			<input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password" required="ON">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Phone</label>
                                                		<div class="col-sm-4">
                                                			<input type="number" name="phone" class="form-control" id="phone" placeholder="Phone" required="ON">
                                                    </div>
                                                    
                                                    <label for="text1" class="col-sm-1 control-label">Gender</label>
                                                		<div class="col-sm-5">
                                                      <select name="gender" class="form-control" required="ON">
                                                        <option value="">Default Select</option>
                                                        <option value="1">Pria</option>
                                                        <option value="0">Wanita</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                    <label for="text1" class="col-sm-2 control-label">Branches</label>
                                                		<div class="col-sm-4">
                                                      <select name="id_branch" class="form-control" required="ON">
                                                        <option value="">Default Select</option>
                                                        <?php 
                                                          foreach($branches as $result){
                                                          ?> 
                                                            <option value="<?php echo $result->id_branch?>"><?php echo $result->branch;?></option> 
                                                          <?php
                                                          }
                                                        ?>
                                                      </select>
                                                    </div>
                                                    
                                                    <label for="text1" class="col-sm-1 control-label">Bank</label>
                                                      <div class="col-sm-5">
                                                        <select name="bank_name" class="form-control" required="ON">
                                                          <option value="">Default Select</option>
                                                          <option value="Bank Central Asia">Bank Central Asia</option>
                                                          <option value="Bank Rakyat Indonesia">Bank Rakyat Indonesia</option>
                                                          <option value="Bank Mega">Bank Mega</option>
                                                          <option value="Bank Mandiri">Bank Mandiri</option>
                                                        </select>
                                                      </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="text1" class="col-sm-2 control-label">No Rek</label>
                                                		<div class="col-sm-4">
                                                      <input type="number" name="no_rek" class="form-control" id="norek" placeholder="No Rekening" required="ON">
                                                    </div>
                                                  </div>

                                                  <!-- <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Bio</label>
                                                      <div class="col-sm-10">
                                                        <textarea class="form-control note-codable" name="bio" placeholder="Biography" style="height: 200px;"></textarea>
                                                      </div>
                                                  </div> -->
                                                  <div class="hidden" style="display:none">
                                                    <input type="number" name="point" class="form-control" id="point" value="0" required="ON">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Address</label>
                                                      <div class="col-sm-10">
                                                        <textarea class="form-control note-codable" name="address" placeholder="Address" style="height: 200px;" required="ON"></textarea>
                                                      </div>
                                                  </div>
                                                    
                                                	<div class="form-group">
                                                		<div class="col-sm-offset-2 col-sm-10">
                                                			<input type="submit" class="btn btn-primary">
                                                		</div>
                                                  </div>
                                                </form>  
                                                <p id="demo" style="color:red;"></p>
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
<?php include "style/javascriptDashboard.php";?>
<script>

$(function () {
  $('form').on('submit', function (e) {
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;
    if(password == cpassword){
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'http://103.65.96.216:31001/users',
        data: $('form').serialize(),
        statusCode: {
          201: function () {
            alert("Success add sales");
            document.getElementById("postSales").reset();
          },
          400: function () {
           alert("username or password already in use");
          }
        }
      }
      );

    }else{
      e.preventDefault();
      document.getElementById("demo").innerHTML = "Password anda tidak sama";
    }
  });
});

</script>
