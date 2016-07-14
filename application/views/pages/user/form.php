

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$title?>
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard active"></i> Dashboard</a></li>
            <li><a href="#">Users</a></li>
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
                <div>
                    <?php require_once(APPPATH.'other/flash.php') ?>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <?php $data = array(
                        'id' => 'user'
                    );
                    echo form_open('',$data);?>
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="fname">First Name</label>
                            <?php $data = array(
                                'name' => 'fname',
                                'type' => 'text',
                                'class' => 'form-control',
                                'value' => isset($fname)?$fname:set_value('fname')
                            );
                            echo form_input($data);?>
                            <span class="text-danger"><?php echo form_error('fname'); ?></span>
                    </div>
                        <div class="form-group col-md-6">
                            <label for="fname">Last Name</label>
                                <?php $data = array(
                                    'name' => 'lname',
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'value' => isset($lname)?$lname:set_value('lname')
                                );
                                echo form_input($data);?>
                                <span class="text-danger"><?php echo form_error('lname'); ?></span>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <?php $data = array(
                                'name' => 'email',
                                'type' => 'email',
                                'class' => 'form-control',
                                'value' => isset($uemail)?$uemail:set_value('email')
                            );
                            echo form_input($data);?>
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <?php $data = array(
                                'name' => 'phone',
                                'type' => 'text',
                                'class' => 'form-control',
                                'value' => isset($phone)?$phone:set_value('phone')
                            );
                            echo form_input($data);?>
                            <span class="text-danger"><?php echo form_error('phone'); ?></span>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="role">Role</label>
                            <?php
                            $roles = [
                                '-SELECT-' => '-SELECT-',
                                'customer' => 'Customer',
                                'admin' => 'Admin'
                            ];
                            $attributes = 'class = "form-control" id = "role"';
                            echo form_dropdown('role',$roles,set_value('role',isset($urole)?$urole:''),$attributes);?>
                            <span class="text-danger"><?php echo form_error('role'); ?></span>
                        </div>
                    </div>
                    <?php if(!isset($switch)): ?>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <?php $data = array(
                                'name' => 'password',
                                'type' => 'password',
                                'class' => 'form-control',
                            );
                            echo form_input($data);?>
                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm">Confirm Password</label>
                            <?php $data = array(
                                'name' => 'confirm',
                                'type' => 'password',
                                'class' => 'form-control',
                            );
                            echo form_input($data);?>
                            <span class="text-danger"><?php echo form_error('confirm'); ?></span>

                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                    <?php echo form_close();?>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                Manage Users In The System
            </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
