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
                                    <h2 class="title">Teams</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
            							              <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>teams">Teams</li></a>
                                        <li class="active">Add Teams</li>
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
                                                    <h5>Input Your Teams</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <form action="<?php echo base_url()?>insertTeams" method="POST" class="form-horizontal" enctype="multipart/form-data">
        
                                                  <div class="form-group">
                                                    <label for="text1" class="col-sm-2 control-label">Branch</label>
                                                    <div class="col-sm-10">  
                                                      <select name="id_branch" class="form-control" required="ON">
                                                        <option value="">Default Select</option>
                                                        <?php 
                                                          foreach($branch as $result){
                                                        ?>
                                                          <option value="<?php echo $result->id_branch;?>"><?php echo $result->branch;?></option>
                                                        <?php   
                                                          }
                                                        ?>
                                                      </select>
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="text1" class="col-sm-2 control-label">Pipelines</label>
                                                    <div class="col-sm-10">  
                                                      <select name="id_pipeline" class="form-control" required="ON">
                                                        <option value="">Default Select</option>
                                                        <?php 
                                                          foreach($pipelines as $result){
                                                        ?>
                                                          <option value="<?php echo $result->id_pipeline;?>"><?php echo $result->pipeline;?></option>
                                                        <?php   
                                                          }
                                                        ?>
                                                      </select>
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="text1" class="col-sm-2 control-label">Customer</label>
                                                    <div class="col-sm-10">  
                                                      <select name="id_customer" class="form-control" required="ON">
                                                        <option value="">Default Select</option>
                                                        <?php 
                                                          foreach($customers as $result){
                                                        ?>
                                                          <option value="<?php echo $result->id_customer;?>"><?php echo $result->name;?></option>
                                                        <?php   
                                                          }
                                                        ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                    
                                                  <div class="form-group">
                                                    <label for="text1" class="col-sm-2 control-label">Sales</label>
                                                    <div class="col-sm-10">  
                                                      <select name="id_sales" class="form-control" required="ON">
                                                        <option value="">Default Select</option>
                                                        <?php 
                                                          foreach($sales as $result){
                                                        ?>
                                                          <option value="<?php echo $result->id;?>"><?php echo $result->username;?></option>
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
