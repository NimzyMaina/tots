<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=base_url("public/img/$profile")?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?=$fullname?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">HOME</li>
            <li class="<?php echo active_link('pagecontroller'); ?>" ><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="header">USER MANAGEMENT</li>
            <li class="treeview <?php echo active_link('user'); ?>">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(2)=='create')? 'active' : ''; ?>"><a href="<?php echo base_url("users/create"); ?>"><i class="fa fa-circle-o"></i> Create User</a></li>
                    <li class="<?php echo ($this->uri->segment(2)=='manage')? 'active' : ''; ?>"><a href="<?php echo base_url("users/manage"); ?>"><i class="fa fa-circle-o"></i> Manage Users</a></li>
                </ul>
            </li>
            <li class="header">CATEGORY MANAGEMENT</li>
            <li class="treeview <?php echo active_link('category'); ?>">
                <a href="#">
                    <i class="fa fa-sitemap"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(2)=='create')? 'active' : ''; ?>"><a href="<?php echo base_url("category/create"); ?>"><i class="fa fa-circle-o"></i> Create Category</a></li>
                    <li class="<?php echo ($this->uri->segment(2)=='manage')? 'active' : ''; ?>"><a href="<?php echo base_url("category/manage"); ?>"><i class="fa fa-circle-o"></i> Manage Categories</a></li>
                </ul>
            </li>

            <li class="header">INVENTORY MANAGEMENT</li>
            <li class="treeview <?php echo active_link('inventory'); ?>">
                <a href="#">
                    <i class="fa fa-barcode"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($this->uri->segment(2)=='create')? 'active' : ''; ?>"><a href="<?php echo base_url("product/create"); ?>"><i class="fa fa-circle-o"></i> Add Product</a></li>
                    <li class="<?php echo ($this->uri->segment(2)=='manage')? 'active' : ''; ?>"><a href="<?php echo base_url("product/manage"); ?>"><i class="fa fa-circle-o"></i> Manage Products</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>