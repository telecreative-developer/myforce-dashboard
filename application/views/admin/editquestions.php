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
                                    <h2 class="title">Edit Questions</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
            							              <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>questions">Questions</li></a>
                                        <li class="active">Edit Questions</li>
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
                                                    <h5>Edit Your Questions</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                            <?php foreach($questions as $result){?>
                                                <form method="POST" action="<?php echo base_url()?>updatequestions/<?php echo $result->id_question;?>" class="form-horizontal">
                                                    <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Questions</label>
                                                      <div class="col-sm-10">
                                                        <input type="text" name="questions" class="form-control" id="questions" value="<?php echo $result->question;?>" placeholder="Input type text">
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Step</label>
                                                      <div class="col-sm-10">  
                                                        <select name="step" class="form-control">
                                                          <option value="<?php echo $result->step?>">Step <?php echo $result->step;?> </option>
                                                          <option value="1">Step 1 </option>
                                                          <option value="2">Step 2</option>
                                                          <option value="3">Step 3</option>
                                                          <option value="4">Step 4</option>
                                                          <option value="5">Step 5</option>
                                                          <option value="6">Step 6</option>
                                                        </select>
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
