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
                                    <h2 class="title">Branches</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
            							              <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>branches">Branches</li></a>
                                        <li class="active">Add Branches</li>
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
                                                    <h5>Input Your Branches</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">

                                                <form method="POST" action="<?php echo base_url()?>insertbranches" class="form-horizontal">
                                                	<div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Branches</label>
                                                		<div class="col-sm-10">
                                                			<input type="text" name="title" class="form-control" id="title" placeholder="Input your title" required="ON">
                                                		</div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                		<label for="predefined" class="col-sm-2 control-label">Managers</label>
                                                		<div class="col-sm-10">
                                                        <select name="id_manager" class="form-control" required="ON" required="ON">
                                                          <option value="">Default Select</option>
                                                          <?php 
                                                            foreach($managers as $result){
                                                          ?>
                                                            <option value="<?php echo $result->id_manager;?>"><?php echo $result->first_name;?> <?php echo $result->last_name;?></option>
                                                          <?php   
                                                            }
                                                          ?>
                                                        </select>
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
