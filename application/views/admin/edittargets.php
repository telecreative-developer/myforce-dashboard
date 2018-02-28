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
                                    <h2 class="title">Edit Targets</h2>
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
                                        <li class="active">Edit Targets</li>
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
                                                    <h5>Edit Your Target</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                            <?php foreach($targets as $result){?>
                                                <form method="POST" action="<?php echo base_url()?>updateTargets/<?php echo $result->id_target;?>" class="form-horizontal">
                                                    <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Target Month</label>
                                                      <div class="col-sm-4">
                                                        <input type="number" name="target_month" class="form-control" id="target-month" value="<?php echo $result->target_month;?>" placeholder="Target Month">
                                                      </div>

                                                      <label for="text1" class="col-sm-1 control-label">Target Year</label>
                                                      <div class="col-sm-5">
                                                        <input type="number" name="target_year" class="form-control" id="target-year" value="<?php echo $result->target_year;?>" placeholder="Target Year">
                                                      </div>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Target Revenue Month</label>
                                                      <div class="col-sm-4">
                                                        <input type="number" name="target_revenue_month" class="form-control" id="target-revenue-month" value="<?php echo $result->target_revenue_month;?>" placeholder="Target Revenue Month">
                                                      </div>

                                                      <label for="text1" class="col-sm-1 control-label">Target Revenue Year</label>
                                                      <div class="col-sm-5">
                                                        <input type="number" name="target_revenue_year" class="form-control" id="target-revenue-year" value="<?php echo $result->target_revenue_year;?>" placeholder="Target Revenue Year">
                                                      </div>
                                                    </div>

                                                     <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Year</label>
                                                      <div class="col-sm-4">
                                                        <input type="number" name="year" class="form-control" id="year" value="<?php echo $result->year;?>" placeholder="Year">
                                                      </div>
                                                    </div>
                                                    
                                                      
                                                    <div class="form-group">
                                                      <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                      </div>
                                                    </div>
                                                </form>  
                                              <?php } ?>
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
