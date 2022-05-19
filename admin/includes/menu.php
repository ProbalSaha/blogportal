
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category"
                    aria-expanded="true" aria-controls="category">
                <i class="fas fa-fw fa-cog"></i>
                <span>Category</span>
            </a>
            <div id="category" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">All Categories:</h6>
                    <a class="collapse-item" href="all_category.php">Categories</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#posts"
                aria-expanded="true" aria-controls="posts">
                <i class="fas fa-fw fa-cog"></i>
                <span>Post</span>
            </a>
            <div id="posts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">All Posts:</h6>
                    <a class="collapse-item" href="all_posts.php">Manage All Posts</a>
                    <a class="collapse-item" href="add_post.php">Add Post</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user"
                aria-expanded="true" aria-controls="user">
                <i class="fas fa-fw fa-cog"></i>
                <span>User</span>
            </a>
            <div id="user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">All Users:</h6>
                    <a class="collapse-item" href="all_users.php">Manage All Users</a>
                    <a class="collapse-item" href="addUser.php">Add User</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Utilities Collapse Menu -->
       
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    

    </ul>
    <!-- End of Sidebar -->