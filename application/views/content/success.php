<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SCW Editing</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">


    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/custom-styles.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url();?>assets/css/sweetalert.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Merriweather:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>

     
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">SCW</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="<?php echo base_url();?>#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url();?>#order">Revise</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url();?>#about">About</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name"><?php 
                        if($transactionSuccessful)
                        {echo "Success!";} 
                        else
                            {echo "Something went wrong!";}?></span>
                        <hr class="star-light">
                        <div class="col-xs-6 col-xs-offset-3">
                            <?php echo $charge_message?>
                        </div>
                        <?php if ($file_errors != ""){
                            echo "<div class=\"col-xs-6 col-xs-offset-3\">";
                            echo "There were some file errors:<br>";
                            echo $file_errors;
                            echo "<br>Please send in your essay and (include your name as the subject) directly to scwediting@gmail.com";
                            echo "</div>";
                            }?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>No Rush Period</h3>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Feedback within 24 hours</h3>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Essays are never shared or sold</h3>
                    </div>
                </div>
                <div class="row">Questions or Concerns? Email us at scwediting@gmail.com</div>
            </div>

        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; SCW Editing
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    

</body>

</html>
