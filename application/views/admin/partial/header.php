<div class="navbar-header no-padding">
  <a class="navbar-brand" href="index.html">
      <img src="images/logo-dark.svg" alt="My Force" class="logo">
  </a>
        <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <i class="fa fa-ellipsis-v"></i>
  </button>
        <button type="button" class="navbar-toggle mobile-nav-toggle" >
    <i class="fa fa-bars"></i>
  </button>
</div>

<div class="collapse navbar-collapse" id="navbar-collapse-1">
  <ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
            <li class="hidden-sm hidden-xs"><a href="#" class="user-info-handle"><i class="fa fa-user"></i></a></li>
            <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>
  </ul>

  <ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
    <li class="dropdown tour-two">
      <a href="<?php echo base_url()?>logout" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrator <span class="caret"></span></a>
      <ul class="dropdown-menu profile-dropdown">
        <li class="profile-menu bg-gray">
            <div class="">
                <img src="http://placehold.it/60/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                            <div class="profile-name">
                                <h6>Administrator</h6>
                            </div>
                            <div class="clearfix"></div>
            </div>
        </li>
        <li role="separator" class="divider"></li>
        <li><a href="<?php echo base_url()?>logout" class="color-danger text-center"><i class="fa fa-sign-out"></i> Logout</a></li>
      </ul>
    </li>
    <li><a href="#" class="hidden-xs hidden-sm open-right-sidebar"><i class="fa fa-ellipsis-v"></i></a></li>
  </ul>
</div>