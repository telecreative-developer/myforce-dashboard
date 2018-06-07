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
                                    <h2 class="title">Add Targets</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
            							              <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>targets">Targets</li></a>
                                        <li class="active">Add Target</li>
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
                                                    <h5>Add Your Target</small></h5>
                                      
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <form method="POST" action="<?php echo base_url()?>insertTarget" class="form-horizontal">
                                                    <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Actual Revenue Monthly</label>
                                                      <div class="col-sm-4">
                                                        <input type="number" name="actual_revenue_month" class="form-control" id="target-month" value="" placeholder="Actual Revenue Monthly">
                                                      </div>

                                                      <label for="text1" class="col-sm-2 control-label">Actual Revenue Yearly</label>
                                                      <div class="col-sm-4">
                                                        <input type="number" name="actual_revenue_year" class="form-control" id="target-year" value="" placeholder="Actual Revenue yearly">
                                                      </div>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Actual Unit Monthly</label>
                                                      <div class="col-sm-4">
                                                        <input type="number" name="actual_unit_month" class="form-control" id="target-revenue-month" value="" placeholder="Actual Unit Monthly">
                                                      </div>

                                                      <label for="text1" class="col-sm-2 control-label">Actual Unit Yearly</label>
                                                      <div class="col-sm-4">
                                                        <input type="number" name="actual_unit_year" class="form-control" id="target-revenue-year" value="" placeholder="Target Pipeline Revenue Year">
                                                      </div>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Pipeline Unit Monthly</label>
                                                      <div class="col-sm-4">
                                                        <input type="number" name="pipeline_unit_month" class="form-control" id="target-revenue-month" value="" placeholder="Pipeline Unit Monthly">
                                                      </div>

                                                      <label for="text1" class="col-sm-2 control-label">Pipeline Revenue Monthly</label>
                                                      <div class="col-sm-4">
                                                        <input type="number" name="pipeline_revenue_month" class="form-control" id="target-revenue-year" value="" placeholder="Pipeline Revenue Monthly">
                                                      </div>
                                                    </div>

                                                     <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Year</label>
                                                      <div class="col-sm-4">
                                                        <input type="number" name="year" class="form-control" id="year" value="" placeholder="Year">
                                                      </div>
                                                      <label for="text1" class="col-sm-2 control-label">Sales</label>
                                                      <div class="col-sm-4">
                                                        <select name="id" class="form-control" required="ON">
                                                          <option value="">Default Select</option>
                                                          <?php 
                                                            foreach($sales as $result){
                                                            ?> 
                                                              <option value="<?php echo $result->id?>"><?php echo $result->first_name;?></option> 
                                                            <?php
                                                            }
                                                          ?>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Hit Rate</label>
                                                      <div class="col-sm-4">
                                                        <input type="number" step="any" name="hit_rate" class="form-control" id="hit_rate" value="<?php echo $result->target_pipeline_month;?>" placeholder="Hit Rate">
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
