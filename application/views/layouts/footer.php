<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> beta
    </div>
    <strong>Copyright &copy; <?=date('Y')?> <a href="<?=base_url()?>">Cuddly Tots</a>.</strong> All rights
    reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="<?= base_url('public/plugins/jQuery/jQuery-2.1.4.min.js')?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?= base_url('public/js/bootstrap.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url("public/js/app.min.js"); ?>" type="text/javascript"></script>

<!-- SlimScroll -->
<script src="<?= base_url('public/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?= base_url('public/plugins/fastclick/fastclick.min.js')?>"></script>

<script src="<?= base_url('public/plugins/datatables/jquery.dataTables.js')?>"></script>

<script src="<?= base_url('public/plugins/datatables/dataTables.bootstrap.js')?>"></script>

<script src="<?= base_url("public/js/sweetAlert2.min.js"); ?>" type="text/javascript"></script>

<script src="<?= base_url("public/js/debounce.js"); ?>" type="text/javascript"></script>


<script>
    var ajax_url = '<?= base_url('ajax')?>';

    var search_url = '<?=  base_url('ajax/search') ?>';
    var cart_add = '<?=  base_url('ajax/addcart') ?>';
    var cart_fetch = '<?=  base_url('ajax/fetch') ?>';
    var cart_edit = '<?=  base_url('ajax/cartedit') ?>';
    var cart_delete = '<?=  base_url('ajax/cartdelete') ?>';
    var cart_empty ='<?= base_url('ajax/cartempty')?>';
    var payment  = '<?= base_url('ajax/payment')?>';
    var total = <?php echo @$this->cart->total(); ?>;

</script>


<script src="<?php echo base_url("public/js/main.js"); ?>" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        $('.table').DataTable();
    });
</script>
</body>
</html>
