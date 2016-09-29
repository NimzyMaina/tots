

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Category
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard active"></i> Dashboard</a></li>
            <li><a href="#">Categories</a></li>
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
                <div class="containere">
                    <?php require_once(APPPATH.'other/flash.php') ?>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <?php $data = array(
                        'id' => 'category'
                    );
                    echo form_open('',$data);?>

                    <div class="form-group">
                        <label for="name" class="col-xs-1">Name</label>
                        <div class="col-xs-6">
                            <?php $data = array(
                                'name' => 'name',
                                'type' => 'text',
                                'class' => 'form-control',
                                'value' => isset($name)?$name:set_value('name')
                            );
                            echo form_input($data);?>
                            <span class="text-danger"><?php echo form_error('name'); ?></span>
                        </div>
                        <div class="messageContainer"></div>
                    </div>
                    <br><br><br><br>

                    <div class="form-group">
                        <label for="description" class="col-xs-1">Description</label>
                        <div class="col-xs-6">
                            <?php $data = array(
                                'name' => 'description',
                                'type' => 'text',
                                'class' => 'form-control',
                                'value' => isset($description)?$description:set_value('description')
                            );
                            echo form_input($data);?>
                            <span class="text-danger"><?php echo form_error('description'); ?></span>
                        </div>
                        <div class="messageContainer"></div>
                    </div>

                    <br><br><br><br>

                    <div class="form-group">
                        <div style = "padding-right: 470px"align="right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                    <?php echo form_close();?>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                Will be used to group products
            </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
