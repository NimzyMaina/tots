

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$title?>
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard active"></i> Dashboard</a></li>
            <li><a href="#"><?=ucfirst($this->uri->segment(1))?></a></li>
            <li class="active"><?=ucfirst($this->uri->segment(2))?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?=$title?></h3>
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($users as $user){
                        if($user->active) {
                            $act = '<span class="toog label label-success" data-id = " '.$user->id.'" data-action = "toog_user" data-status = "'.$user->active.'" > Active</span >';
                        }else {
                            $act = '<span class="toog label label-danger" data-id = " '.$user->id.'" data-action = "toog_user" data-status = "'.$user->active.'" > Inactive</span >';
                        }
                        echo "<tr>
                                <td> ".$user->fname." </td>
                                <td>". $user->lname ."</td>
                                <td>". $user->email ."</td>
                                <td>". $user->phone ."</td>
                                <td>". ucfirst($user->role) ."</td>
                                <td>". $act ."</td>
                                <td>

                                    <a class='btn btn-primary' href='".base_url('users/edit/'.$user->id)."'>Edit</a>

                                    <a class='btn btn-danger' href='".base_url('users/delete/'.$user->id)."'>Delete</a>

                                </td>
                                </tr>";
                    }
                    ?>
                    </tbody>

                    <tfoot>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Actions</th>
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

