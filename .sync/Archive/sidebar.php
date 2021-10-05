 <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
     <div class="container-fluid d-flex flex-column p-0">
         <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
             <div class="sidebar-brand-icon rotate-n-15"> <img data-aos="fade-right" data-aos-duration="1700" src="assets/img/php%20(1).png" style="height: 40px;margin-top: 5px;"></div>
             <div class="sidebar-brand-text mx-3" style="margin-left: -5px;"><span>Online <br>Examination</span></div>
         </a>
         <hr class="sidebar-divider my-0">
         <ul class="nav navbar-nav text-light" id="accordionSidebar">
             <li class="nav-item" role="presentation"><a class="nav-link <?php if (isset($page) && $page == 1) {
                                                                                echo "active";
                                                                            } ?>" href="Dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
             <li class="nav-item" role="presentation"><a class="nav-link <?php if (isset($page) && $page == 2) {
                                                                                echo "active";
                                                                            } ?>" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
             <li class="nav-item" role="presentation"><a class="nav-link <?php if (isset($page) && $page == 3) {
                                                                                echo "active";
                                                                            } ?>" href="table.php"><i class="fas fa-table"></i><span>Table</span></a></li>

         </ul>
         <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
     </div>
 </nav>