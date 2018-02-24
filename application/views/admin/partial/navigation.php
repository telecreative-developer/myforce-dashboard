<div class="user-info closed">
<img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
<h6 class="title">John Doe</h6>
<small class="info">PHP Developer</small>
</div>  

<div class="sidebar-nav">                            
<ul class="side-nav color-gray">
<li class="nav-header">
  <span class="">Main Category</span>
</li>
<li><a href="<?php echo base_url()?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
<li class="nav-header">
  <span class="">Appearance</span>
</li>
<li><a href="<?php echo base_url()?>events"><i class="fa fa-calendar-check-o"></i> <span>Events</span></a></li>
<li class="has-children">
    <a href="#"><i class="fa fa-file-text"></i> <span>Products</span> <i class="fa fa-angle-right arrow"></i></a>
    <ul class="child-nav">
        <li><a href="<?php echo base_url();?>products"><i class="fa fa-unlock"></i> <span>Products</span></a></li>
        <li><a href="<?php echo base_url();?>subproducts"><i class="fa fa-sign-in"></i> <span>Sub Products</span></a></li>
    </ul>
</li>

<li class="nav-header">
  <span class="">User management</span>
</li>

<li class="has-children">
    <a href="#"><i class="fa fa-user"></i> <span>Sales & Manager</span> <i class="fa fa-angle-right arrow"></i></a>
    <ul class="child-nav">
        <li><a href="<?php echo base_url();?>sales"><i class="fa fa-user-plus"></i> <span>Sales</span></a></li>
        <li><a href="<?php echo base_url();?>manager"><i class="fa fa-user-plus"></i> <span>Manager</span></a></li>
    </ul>
</li>
<li><a href="<?php echo base_url()?>regions"><i class="fa fa-calendar-check-o"></i> <span>Regions</span></a></li>
<li><a href="<?php echo base_url()?>branches"><i class="fa fa-calendar-check-o"></i> <span>Branches</span></a></li>

</ul>
</div>  