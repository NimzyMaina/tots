<?php if ( null != $this->session->flashdata('success')){?>
    <div id="infoMessage" class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('success');?></div>
<?php } ?>
<?php if ( null != $this->session->flashdata('error')){?>
    <div id="infoMessage" class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('error');?></div>
<?php } ?>

<?php if ( null != $this->session->flashdata('message')){?>
    <div id="infoMessage" class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('message');?></div>
<?php } ?>
