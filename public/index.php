<?php

require_once "../config/config.php";
include(HEADER_TEMPLATE);

?>

<h1>
    Sale System
</h1>
<hr/>

<div class="row">
    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="sales/add.php" class="btn btn-primary">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-plus fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>New Sale</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="products" class="btn btn-default">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Products</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="sellers" class="btn btn-default">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Sellers</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="sales" class="btn btn-default">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Sales</p>
                </div>
            </div>
        </a>
    </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>