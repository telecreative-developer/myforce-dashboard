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
                                    <h2 class="title">Edit Sub Products</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
            							              <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>subproducts">Sub Products</li></a>
                                        <li class="active">Edit Sub Products </li>
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
                                                    <h5>Edit Your Sub Products</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                            <?php foreach($subproducts as $result){?>
                                                <form method="POST" action="<?php echo base_url()?>updateSubProducts/<?php echo $result->id_subproduct;?>" class="form-horizontal" enctype="multipart/form-data">
                                                  <div class="form-group">
                                                    <label for="text1" class="col-sm-2 control-label">Title</label>
                                                    <div class="col-sm-10">
                                                      <input type="text" name="title" class="form-control" id="title" value="<?php echo $result->subproduct;?>" placeholder="Input type text">
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Picture</label>
                                                		<div class="col-sm-10">
                                                      <input id="picture" type="file" class="validate" name="picture">
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">File</label>
                                                		<div class="col-sm-10">
                                                      <input id="file" type="file" class="validate" name="file">
                                                    </div>
                                                	</div>
                                                    
                                                  <div class="form-group">
                                                      <label for="text1" class="col-sm-2 control-label">Description</label>
                                                      <div class="col-sm-10">
                                                          <textarea class="form-control note-codable" name="description" placeholder="Desc.." style="height: 300px;"><?php echo $result->desc;?></textarea>
                                                      </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="predefined" class="col-sm-2 control-label">Product</label>
                                                    <div class="col-sm-10">
                                                        <select name="id_product" class="form-control">
                                                          <option value="<?php echo $result->id_product?>"><?php echo $result->product;?></option>
                                                          <?php 
                                                            foreach($products as $listproduct){
                                                          ?>
                                                              <option value="<?php echo $listproduct->id_product;?>"><?php echo $listproduct->product;?></option>
                                                          <?php   
                                                            }
                                                          ?>
                                                        </select>
                                                    </div>
                                                  </div>

                                                  <!-- <div class="form-group">
                                                      <label for="time" class="col-sm-2 control-label">Price</label>
                                                      <div class="col-sm-10">
                                                        <input type="number" name="price" class="form-control" id="time">
                                                      </div>
                                                  </div> -->
                                                  
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
