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
                                        <a class="dashboard-stat bg-primary" href="<?php echo base_url()?>questions">
                                            <?php $query = $this->db->query("SELECT * FROM questions"); ?>
                                            <span class="number"><?php echo $query->num_rows();?></span>
                                            <span class="name">Questions</span>
                                            <span class="bg-icon"><i class="fa fa-comments"></i></span>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-pinkpoints" href="<?php echo base_url();?>answers">
                                            <?php $query = $this->db->query("SELECT * FROM answers"); ?>
                                            <span class="number"><?php echo $query->num_rows();?></span>
                                            <span class="name">Answers</span>
                                            <span class="bg-icon"><i class="fa fa-comments"></i></span>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="<?php echo base_url();?>sales">
                                            <?php $query = $this->db->query("SELECT * FROM users"); ?>
                                            <span class="number"><?php echo $query->num_rows();?></span>
                                            <span class="name">Sales</span>
                                            <span class="bg-icon"><i class="fa fa-comments"></i></span>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-pinkpoints" href="<?php echo base_url();?>managers">
                                            <?php $query = $this->db->query("SELECT * FROM managers"); ?>
                                            <span class="number"><?php echo $query->num_rows();?></span>
                                            <span class="name">Managers</span>
                                            <span class="bg-icon"><i class="fa fa-comments"></i></span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section class="section pt-n">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel border-primary no-border border-3-top">
                                            <div class="panel-body p-20">

                                                <ul class="nav nav-tabs border-bottom border-primary" role="tablist">
                                                    <li role="presentation" class="active"><a class="" href="#home7" aria-controls="home7" role="tab" data-toggle="tab">Branch</a></li>
                                                </ul>

                                                <div class="tab-content bg-white p-15">
                                                    <div role="tabpanel" class="tab-pane active" id="home7">
                                                        <table class="table table-clean">
                                                        	<tbody>
                                                                <?php 
                                                                    foreach($results as $fetch){
                                                                    ?>
                                                                    
                                                                    <tr>
                                                                        <td class="line-height-60">
                                                                            <?php 
                                                                            if($fetch->avatar == ""){
                                                                                if($fetch->gender == '1'){
                                                                                ?>    
                                                                                  <img src="http://www.tlcteignmouth.co.uk/wp-content/uploads/2015/06/default-avatar_man.png" class="border-radius-50 img-size-50">
                                                                                <?php 
                                                                                  }else{
                                                                                    ?>
                                                                                    <img src="http://usvirtualcareers.com/wp-content/uploads/2016/06/default-avatar_women.png" class="border-radius-50 img-size-50">
                                                                                <?php  
                                                                                }
                        
                                                                              }else{  
                                                                              ?> 
                                                                                <img src="<?php echo $fetch->avatar;?>" class="border-radius-50 img-size-50">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            
                                                                        </td>
                                                                        <td class="line-height-30"><small><b><a href="<?php echo base_url()?>pagesManagers/<?php echo $fetch->id_manager;?>" style="color:#000000;"><?php echo $fetch->first_name;?> <?php echo $fetch->last_name;?></a></b> <br>
                                                                        <?php 
                                                                            if($fetch->address == ""){
                                                                                echo "Address manager not found, please input address manager";
                                                                            }else{
                                                                                echo $fetch->address;
                                                                            }
                                                                        ?>
                                                                        <br><span class="color-success"><i class="fa fa-map-marker"></i> <?php echo $fetch->branch;?></span></small></td>
                                                                    </tr>
                                                                <?php
                                                                    }
                                                                ?>
                                                        	</tbody>
                                                        </table>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <ul style="float:right; margin-top:-35px;">
                                                                    <?php 
                                                                        echo $links;
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                    <div id="map"></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>
<script>
function initMap() {

    var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 3,
    center: {lat: -28.024, lng: 140.887}
    });

    // Create an array of alphabetical characters used to label the markers.
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // Add some markers to the map.
    // Note: The code uses the JavaScript Array.prototype.map() method to
    // create an array of markers based on a given "locations" array.
    // The map() method here has nothing to do with the Google Maps API.
    var markers = locations.map(function(location, i) {
    return new google.maps.Marker({
        position: location,
        label: labels[i % labels.length]
    });
    });

    // Add a marker clusterer to manage the markers.
    var markerCluster = new MarkerClusterer(map, markers,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
}
var locations = [
    {lat: -31.563910, lng: 147.154312},
    {lat: -33.718234, lng: 150.363181},
    {lat: -33.727111, lng: 150.371124},
    {lat: -33.848588, lng: 151.209834},
    {lat: -33.851702, lng: 151.216968},
    {lat: -34.671264, lng: 150.863657},
    {lat: -35.304724, lng: 148.662905},
    {lat: -36.817685, lng: 175.699196},
    {lat: -36.828611, lng: 175.790222},
    {lat: -37.750000, lng: 145.116667},
    {lat: -37.759859, lng: 145.128708},
    {lat: -37.765015, lng: 145.133858},
    {lat: -37.770104, lng: 145.143299},
    {lat: -37.773700, lng: 145.145187},
    {lat: -37.774785, lng: 145.137978},
    {lat: -37.819616, lng: 144.968119},
    {lat: -38.330766, lng: 144.695692},
    {lat: -39.927193, lng: 175.053218},
    {lat: -41.330162, lng: 174.865694},
    {lat: -42.734358, lng: 147.439506},
    {lat: -42.734358, lng: 147.501315},
    {lat: -42.735258, lng: 147.438000},
    {lat: -43.999792, lng: 170.463352}
]
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPF1vKePAEW_y28-zlEYSkl5LCZbgpkfI&callback=initMap">
</script>
<?php include "style/javascriptDashboard.php";?>