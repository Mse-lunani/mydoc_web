<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">

        <span class="brand-text font-weight-light">
            Doctor Dashboard
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index" class="nav-link <?php echo $_SESSION['page'] == "index" ? "active" : "";  ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="schedule.php" class="nav-link <?php echo $_SESSION['page'] == "schedule" ? "active" : "";  ?>">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Schedule
                        </p>
                    </a>
                </li>
                                 <li class="nav-item">
                    <a href="appointment.php" class="nav-link <?php echo $_SESSION['page'] == "appointment" ? "active" : "";  ?>">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Appointments
                        </p>
                    </a>
                </li>
                
                
                 <li class="nav-item">
                    <a href="register_patient.php" class="nav-link <?php echo $_SESSION['page'] == "register_patient" ? "active" : "";  ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Register a client
                        </p>
                    </a>
                </li>

                 <li class="nav-item">
                    <a href="queue.php" class="nav-link <?php echo $_SESSION['page'] == "queue" ? "active" : "";  ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Add client to queue
                        </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="consultation.php" class="nav-link <?php echo $_SESSION['page'] == "queue" ? "active" : "";  ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                           Manage queue
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="invoice.php" class="nav-link <?php echo $_SESSION['page'] == "invoice" ? "active" : "";  ?>">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                           Manage invoices
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?logout=l" class="nav-link <?php echo $_SESSION['page'] == "logout" ? "active" : "";  ?>">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<div class="content-wrapper">