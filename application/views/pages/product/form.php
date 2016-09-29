
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
            <li><a href="#">Products</a></li>
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
                    echo form_open_multipart('',$data);?>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fname">Product Name</label>
                            <?php $data = array(
                                'name' => 'name',
                                'type' => 'text',
                                'class' => 'form-control',
                                'value' => isset($name)?$name:set_value('name')
                            );
                            echo form_input($data);?>
                            <span class="text-danger"><?php echo form_error('name'); ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_id">Category</label>
                            <?php
                            $attributes = 'class = "form-control" id = "category_id"';
                            echo form_dropdown('category_id',$categories,set_value('category_id',isset($category_id)?$category_id:''),$attributes);?>
                            <span class="text-danger"><?php echo form_error('category_id'); ?></span>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <?php $data = array(
                                'name' => 'price',
                                'type' => 'text',
                                'class' => 'form-control',
                                'value' => isset($price)?$price:set_value('price')
                            );
                            echo form_input($data);?>
                            <span class="text-danger"><?php echo form_error('price'); ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="active">Active</label>
                            <?php
                            $roles = [
                                '-SELECT-' => '-SELECT-',
                                1 => 'Active',
                                0 => 'Inactive'
                            ];
                            $attributes = 'class = "form-control" id = "active"';
                            echo form_dropdown('active',$roles,set_value('active',isset($active)?$active:''),$attributes);?>
                            <span class="text-danger"><?php echo form_error('active'); ?></span>
                        </div>
                    </div>


                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <?php
                            $roles = [
                                '-SELECT-' => '-SELECT-',
                                'male' => 'Male',
                                'female' => 'Female',
                                'unisex' => 'Unisex'
                            ];
                            $attributes = 'class = "form-control" id = "gender"';
                            echo form_dropdown('gender',$roles,set_value('gender',isset($gender)?$gender:''),$attributes);?>
                            <span class="text-danger"><?php echo form_error('gender'); ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="image">Image</label>
                            <?php
                            $attributes = 'class = "form-control" id = "image"';
                            echo form_upload('image',$attributes);?>
                            <span class="text-danger"><?php echo form_error('image'); ?></span>
                        </div>
                    </div>
                    <?php if(!isset($switch)): ?>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <?php $data = array(
                                    'name' => 'description',
                                    'class' => 'form-control',
                                );
                                echo form_textarea($data,set_value('description',isset($description)?$description:''));?>
                                <span class="text-danger"><?php echo form_error('description'); ?></span>
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
                Manage <?=ucfirst($this->uri->segment(1))?> In The System
            </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
