<div class="content-wrapper">
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <form action="<?=base_url('pos/payment')?>" method="post">
            <div class="box-body">
                <div class="container">
                    <div class="row">
                        <?php require_once(APPPATH.'other/flash.php') ?>
                        <div class="col-md-6">
                            <div id="cart"></div>
                        </div>
                        <div class="col-md-6">
                            <h2>Payment Options</h2>
                            <div class="form-group">
                                <!-- radio -->

                                    <div class="radio">
                                        <label>
                                            <input type="radio" class="rad" name="payment" id="cash" value="cash">
                                            <p><i class="glyphicon glyphicon-credit-card "></i> Cash Payment</p>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" class="rad" name="payment" id="card" value="card">
                                            <p><i class="glyphicon glyphicon-credit-card "></i> Credit Card</p>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" class="rad" name="payment" id="mpesa" value="mpesa">
                                            <p><i class="glyphicon glyphicon-credit-card "></i> Mpesa</p>
                                        </label>
                                    </div>

                                <div id="pay"></div>


                            </div>
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                                <div class="form-group pull-right">
                                    <button type="button" id="trash" onclick="emp()" class="btn btn-danger del"><span class="glyphicon glyphicon-remove"></span> Empty Cart</button>
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-credit-card"></span> Make Payment</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->
    </section>
</div>