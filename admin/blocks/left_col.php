<div class="left_col scroll-view">
   <div class="navbar nav_title" style="border: 0;">
      <a href="./" class="site_title"><i class="fa fa-paw"></i> <span>Trang quản trị</span></a>
   </div>
   <div class="clearfix"></div>
   <!-- menu profile quick info -->
   <div class="profile clearfix">
      <div class="profile_pic">
         <img src="images/img.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
         <span>Welcome,</span>
         <h2><?= $_SESSION['HoTen'] ?></h2>
      </div>
   </div>
   <!-- /menu profile quick info -->
   <br />
   <!-- sidebar menu -->
   <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
         <h3>General</h3>
         <ul class="nav side-menu">
            <li>
               <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
               <ul class="nav child_menu">
                  <li><a href="index.php?p=listTheLoai">Quản lý thể loại</a></li>
                  <li><a href="index.php?p=listLoaiTin">Quản lý loại tin</a></li>
                  <li><a href="index.php?p=listTin">Quản lý tin tức</a></li>
                  <li><a href="index.php?p=listQuangCao">Quản lý quảng cáo</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
   <!-- /sidebar menu -->
   <!-- /menu footer buttons -->
   <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
   </div>
   <!-- /menu footer buttons -->
</div>