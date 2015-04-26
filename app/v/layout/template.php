<!DOCTYPE html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>仓储</title>
  <meta name="keywords" content="BugTRace"/>
  <meta name="description" content="BugTRace Home Page"/>
  <link href="static/default.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="/static/css/bootstrapv3.min.css" rel="stylesheet" type="text/css" media="screen" />
  <script type="text/javascript" src="static/js/jquery.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
</head>
<body id="app">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">仓储</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> -->
        <ul class="nav navbar-nav">
          <?php foreach($menu as $k=>$v){?>
                <li class="<?php echo $k==(seg(1)?seg(1):'index')?'active ':'';?>bt" ><a href="?/<?php echo $k;?>/" ><?php echo $v;?></a></li>
          <?php }?>
        </ul>
       <!--  </div> -->
    </nav>

    
    <div id="contentView">
      <ul class="nav nav-pills">
        <?php $controller = seg(1); foreach($tabCell[$controller] as $k=>$v){?>
          <li role="presentation" class="<?php echo $k==(seg(2)?seg(2):'index')?'active ':''?>"><a href="?/<?php echo $controller.'/'.$k?>/" ><?php echo $v;?></a></li>
        <?php }?>
      </ul>
      <div class="viewDetail">
        <?php echo $al_content;?>
        <p style="color:red;margin-top:10px;">
          <?php foreach($err as $e=>$r) {
                echo '字段'.$e.$r.' . ';
          }
              echo $msg;
          ?>
        </p>
      </div>
  </div> <!-- /container -->
    
</body>
</html>
