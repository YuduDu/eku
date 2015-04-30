<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/static/css/bootstrapv3.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="static/default.css" rel="stylesheet" type="text/css" media="screen" />
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin"  method="POST"action=""  >
        <h2 class="form-signin-heading" >仓储</h2>
        <input type="text" value="" class="input-block-level" placeholder="Email address" name="Username" >
        <input type="password" value="" class="input-block-level" placeholder="Password" name="Password" >
        <!-- <label class="checkbox">
          <input type="checkbox" value="remember-me"> 记住我
        </label> -->
        <div class="form-group">
          <button type="submit" name="account_login" class="btn btn-default">登录</button>
        </div>
        <p><?php echo $msg;?></p>
      </form>

    </div> <!-- /container -->
 
  </body>
</html>
