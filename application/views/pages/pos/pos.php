<div class="content-wrapper">
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="container">
                    <div class="row">
                        <?php require_once(APPPATH.'other/flash.php') ?>
                    <div class="col-md-6">
                        <div class="row">
                        <div class="search-page search-content-2">
                            <div class="search-bar bordered">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" id="productPicker" class="form-control input-lg" placeholder="Search for product...">
                                            <span class="input-group-btn">
                                            <button class="btn btn-primary bold btn-lg" type="button">Search</button>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="search-desc clearfix text-bold">Will Be Added To cart. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <br><br>

                        <div class="row">
                        <table class="table table-bordered" id="resultTable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="wrapper"></tbody>
                        </table>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div id="cart"></div>
                    </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <form method="post">
                                <div class="form-group pull-right">
                                    <button type="button" id="trash" onclick="emp()" class="btn btn-danger del"><span class="glyphicon glyphicon-remove"></span> Empty Cart</button>
                                    <a href="<?=base_url('pos/checkout')?>" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Check Out</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>