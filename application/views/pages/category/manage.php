

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Categories
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard active"></i> Dashboard</a></li>
            <li><a href="#">Categories</a></li>
            <li class="active">Manage Categories</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Category</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php require_once(APPPATH.'other/flash.php') ?>
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Active</th>
                        <th class="col-sm-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($categories as $category){
                        if($category->active) {
                            $act = '<span class="toog label label-success" data-id = " '.$category->id.'" data-action = "toog_cat" data-status = "'.$category->active.'" > Active</span >';
                        }else {
                            $act = '<span class="toog label label-danger" data-id = " '.$category->id.'" data-action = "toog_cat" data-status = "'.$category->active.'" > Inactive</span >';
                        }
                        echo "<tr>
                                <td> ".$category->name." </td>
                                <td>". $category->description ."</td>
                                <td>".$act."</td>
                                <td>
                                <a class='btn btn-primary' href='".base_url('category/edit/'.$category->id)."'>Edit</a>
                                <a class='btn btn-danger' href='".base_url('category/delete/'.$category->id)."'>Delete</a>
                                </td>
                                </tr>";
                    }
                    ?>
                    </tbody>

                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th style="width:125px;">Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
                Will be used to group products
            </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

