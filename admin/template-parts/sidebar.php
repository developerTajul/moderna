<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
            <div class="profile-image">
            <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="profile image">
            <div class="dot-indicator bg-success"></div>
            </div>
            <div class="text-wrapper">
            <p class="profile-name"><?php echo $_SESSION['fullname']; ?></p>
            <p class="designation"><?php echo $_SESSION['username']; ?></p>
            </div>
        </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="menu-icon typcn typcn-document-text"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <!-- add category -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                </li>
                </ul>
            </div>
        </li>

        <!-- add category -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#add_posts" aria-expanded="false" aria-controls="add_posts">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Posts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="add_posts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="posts.php">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_new_post.php">Add New Post</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- add category -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#add_category" aria-expanded="false" aria-controls="add_category">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="add_category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="add_category.php">Add Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categories.php">Categories</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- add tags -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tags" aria-expanded="false" aria-controls="tags">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Tags</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tags">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="add_tag.php">Add New Tag</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tags.php">Tags</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Form elements</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
            <i class="menu-icon typcn typcn-th-large-outline"></i>
            <span class="menu-title">Charts</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
            <i class="menu-icon typcn typcn-bell"></i>
            <span class="menu-title">Tables</span>
        </a>
        </li>

    </ul>
</nav>