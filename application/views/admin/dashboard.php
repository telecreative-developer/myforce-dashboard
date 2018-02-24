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

                    <div class="left-sidebar fixed-sidebar bg-primary box-shadow tour-three">
                        <div class="sidebar-content">
                            <?php include "partial/navigation.php" ?>
                        </div>
                    </div>

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-sm-12">
                                    <h2 class="title">Dashboard</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                            </div>
                            <div class="row breadcrumb-div">
                                <div class="col-sm-12">
                                    <ul class="breadcrumb">
            							<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            							<li class="active">Dashboard</li>
            						</ul>
                                </div>
                            </div>
                        </div>

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="#">
                                            <span class="number counter">1,411</span>
                                            <span class="name">Comments</span>
                                            <span class="bg-icon"><i class="fa fa-comments"></i></span>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="#">
                                            <span class="number counter">322</span>
                                            <span class="name">Total Tickets</span>
                                            <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="#">
                                            <span class="number counter">5,551</span>
                                            <span class="name">Bank Credits</span>
                                            <span class="bg-icon"><i class="fa fa-bank"></i></span>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="#">
                                            <span class="number counter">16,710</span>
                                            <span class="name">Thumbs Up</span>
                                            <span class="bg-icon"><i class="fa fa-thumbs-o-up"></i></span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section class="section pt-10">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel border-primary no-border border-3-top" data-panel-control>
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Production Change <small>over years</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div id="production-chart" class="op-chart"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="panel border-primary no-border border-3-top" data-panel-control>
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Traffic Stats <small>over years</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div id="traffic-chart" class="op-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="section pt-n">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="panel border-primary no-border border-3-top">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>User Table Details</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <ul class="nav nav-tabs border-bottom border-primary" role="tablist">
                                                    <li role="presentation" class="active"><a class="" href="#home7" aria-controls="home7" role="tab" data-toggle="tab">Approved</a></li>
                                                    <li role="presentation"><a class="" href="#profile7" aria-controls="profile7" role="tab" data-toggle="tab">Pending</a></li>
                                                </ul>

                                                <div class="tab-content bg-white p-15">
                                                    <div role="tabpanel" class="tab-pane active" id="home7">
                                                        <table class="table table-clean">
                                                        	<tbody>
                                                        		<tr>
                                                        			<td class="line-height-60"><img src="<?php echo base_url()?>assets/images/letter/profile-image-1.jpg" alt="" class="border-radius-50 img-size-50"></td>
                                                        			<td class="line-height-30"><small><b>Alepy Macintyre</b> <br>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br><span class="color-success">Approved</span></small></td>
                                                                    <td class="w-10">10.10pm</td>
                                                        		</tr>
                                                        	</tbody>
                                                        </table>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="profile7">
                                                        <table class="table table-clean">
                                                        	<tbody>
                                                        		<tr>
                                                        			<td class="line-height-60"><img src="<?php echo base_url()?>assets/images/letter/a.png" alt="" class="border-radius-50 img-size-50"></td>
                                                        			<td class="line-height-30"><small><b>Alepy Macintyre</b> <br>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br><span class="color-success">Approved</span></small></td>
                                                                    <td class="w-10">10.10pm</td>
                                                        		</tr>
                                                        	</tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="panel border-primary no-border border-3-top" data-panel-control>
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Tasks <small>with priority indicator</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <p>Following is the list of all the pending tasks. Click on task to mark it done. You can toggle the status by clicking on an item.</p>

                                                <div class="row">
                                                    <div class="tasks-list col-md-12">
                                                        <div class="task mb-10">
                                                            <input type="checkbox" name="one" class="line-style-blue">
                                                            <label>This is medium priority task. It is indicated in primary color.</label>
                                                        </div>

                                                        <div class="task mb-10">
                                                            <input type="checkbox" name="one" class="line-style-red">
                                                            <label>This is top priority task. It is indicated in danger color.</label>
                                                        </div>

                                                        <div class="task mb-10">
                                                            <input type="checkbox" name="one" class="line-style-green">
                                                            <label>This is low priority task. It is indicated in success color. </label>
                                                        </div>

                                                        <div class="task mb-10">
                                                            <input type="checkbox" name="one" class="line-style-blue" checked="">
                                                            <label>This is medium priority task. It is indicated in primary color.</label>
                                                        </div>

                                                    </div>
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>
        <?php include"style/javascriptDashboard.php";?>
        