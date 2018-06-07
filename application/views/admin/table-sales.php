<?php include "style/styleTable.php"?>
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

                    
                    <div class="left-sidebar fixed-sidebar bg-primary box-shadow tour-three">
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
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                      <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                      <li class="active">Sales</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Sales </h5>
                                                    <a href="<?php echo base_url()?>addsales"><button type="button" class="btn btn-primary btn-xs btn-labeled">Add Sales <i class="fa fa-plus"></i></button></a>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">
                                                <table id="example" class="display table-responsive table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="3%">No</th>
                                                            <th width="5%">Picture</th>
                                                            <th>Name</th>
                                                            <th>Username / Email</th>
                                                            <th>Phone</th>
                                                            <th>Bank</th>
                                                            <th>No Rek</th>
                                                            <!-- <th>Address</th> -->
                                                            <th>Point</th>
                                                            <th>Target Pipeline Unit Monthly</th>
                                                            <th>Target Pipeline Revenue Monthly</th>
                                                            <th>Hit Rate</th>
                                                            <th width="3%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
                                                            $no = 1; 
                                                            foreach ($sales as $result) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td>
                                                              <?php 
                                                                if($result->avatar == ""){
                                                                  if($result->gender == '1'){
                                                                  ?><img src="http://www.tlcteignmouth.co.uk/wp-content/uploads/2015/06/default-avatar_man.png" width="100%"/>
                                                                  <?php 
                                                                    }else{
                                                                      ?><img src="http://usvirtualcareers.com/wp-content/uploads/2016/06/default-avatar_women.png" width="100%"/>
                                                                  <?php  
                                                                  }

                                                                }else{
                                                                
                                                                ?> <img src="<?php echo $result->avatar;?>" width="100%"/>
                                                                
                                                              <?php
                                                                }
                                                              ?>
                                                            </td>
                                                            <td><?php echo $result->first_name;?> <?php echo $result->last_name;?></td>
                                                            <td>
                                                              <a href="pagesprofile/<?php echo $result->id?>" span style="color:blue;"><?php echo $result->username;?></a>
                                                              <br/>
                                                              <?php echo $result->email;?>
                                                            </td>
                                                            <td><?php echo $result->phone;?></td>
                                                            <td><?php echo $result->bank_name;?></td>
                                                            <td><?php echo $result->no_rek;?></td>
                                                            <!-- <td><?php echo $result->address;?></td> -->
                                                            <td><?php echo $result->point;?> Points</td>
                                                            <td><?php echo $result->pipeline_unit_month ?></td>
                                                            <td><?php echo $result->pipeline_revenue_month;?></td>
                                                            <td><?php echo $result->hit_rate;?></td>
                                                            <td>
                                                                <a href="<?php echo base_url();?>editsales/<?php echo $result->id;?>"><button type="button" class="btn btn-primary btn-xs btn-labeled"><i class="fa fa-pencil"></i></button></a>
                                                                <a onclick="javascript:return confirm('Delete ?')" href="<?php echo base_url();?>deleteSales/<?php echo $result->id;?>"><button type="button" class="btn btn-danger btn-xs btn-labeled"><i class="fa fa-remove"></i></button></a>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                            $no++;
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>

                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
<?php include "style/javascriptTable.php"; ?>