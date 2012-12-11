<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FuelPHP Framework</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    
    <?php echo Asset::css('bootstrap-responsive.css'); ?>
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
            <?php echo Html::anchor('index/index','Fuel-Twitter TEST',array('class'=>'brand')); ?>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Menu</li>
              <li<?php if($content->menuClass=="index"){echo ' class="active"';}?>><?php echo Html::anchor('index/index','テストトップ'); ?></li>
              <li<?php if($content->menuClass=="oauth"){echo ' class="active"';}?>><?php echo Html::anchor('oauth/index','TwitterOAuth関係'); ?></li>
              <li<?php if($content->menuClass=="fb"){echo ' class="active"';}?>><?php echo Html::anchor('fb/index','Facebook関係'); ?></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->

        <div class="span9">
            <h2><?php echo $content->pageTitle?></h2>
            <?php echo $content;?>  
        </div><!--/span-->
        
        
      </div><!--/row-->

      <hr>

      <footer>
        <p>@hajime0083&copy; 2010-<?php echo date('Y');?></p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo Asset::js(array('jquery.js','bootstrap.js'))?>
  </body>
</html>
