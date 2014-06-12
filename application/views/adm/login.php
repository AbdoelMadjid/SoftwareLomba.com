<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Log in - Kicau Mania</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>public/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>public/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background:#2ECC71;">

    <div class="container">

    <div class="row" style="margin-top:20px">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form role="form" action="<?php echo base_url();?>login/verify" method="POST" >
              <fieldset>
              <img src="http://localhost/lomba/public/image/logo_header.png" class="text-center">
              <div class="well">
                <h2>Please Sign In</h2>
                <hr class="colorgraph">
                <div class="form-group">
                            <input type="text" name="username" id="email" class="form-control input-lg" placeholder="Email Address">
                </div>
                <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
                </div>
                <hr class="colorgraph">
                <div class="row">
                  <div class="col-xs-4 col-sm-4 col-md-4 pull-right">
                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
                  </div>
                </div>
              </fieldset>
              </div>
            </form>
      </div>
    </div>

</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>

</html>
