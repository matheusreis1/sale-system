<!DOCTYPE html>
<html>
<head>
    <title>Sale System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link href="<?php echo STYLEPATH; ?>libs/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" media="screen" />
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo BASEPATH;?>" class="navbar-brand">Sale System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Products
                  <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                  <li><a href="<?php echo BASEPATH;?>products">Manage Products</a></li>
                  <li><a href="<?php echo BASEPATH;?>products/add.php">New Product</a></li>
              </ul>
            </li>        
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Sellers
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASEPATH;?>sellers">Manage Sellers</a></li>
                    <li><a href="<?php echo BASEPATH;?>sellers/add.php">New Seller</a></li>
                </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>


<main class="container">