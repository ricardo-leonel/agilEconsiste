<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(empty($_SESSION['user'])){
        header('Location: ../index.php?sessao=true');
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>AgilEconsiste</title>


    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />
    <!-- Text -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> 
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->

    <!-- Core stylesheets do not remove -->
    <link id="bootstrap" href="../resources/css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../resources/css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css" />
    <link href="../resources/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
    <link href="../resources/css/icons.css" rel="stylesheet" type="text/css" />



    <!-- Plugins stylesheets -->
    <link href="../resources/plugins/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
    <link href="../resources/plugins/misc/fullcalendar/fullcalendar.css"  rel="stylesheet" type="text/css" />
    <link href="../resources/plugins/misc/search/tipuesearch.css"  type="text/css" rel="stylesheet" />

    <link href="../resources/plugins/forms/uniform/uniform.default.css"  type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="../resources/css/main.css"  rel="stylesheet" type="text/css" />

    <!-- Custom stylesheets ( Put your own changes here ) -->
    <link href="../resources/css/custom.css"  rel="stylesheet" type="text/css" />

    <!--[if IE 8]><link href="../resources/css/ie8.css"  rel="stylesheet" type="text/css" /><![endif]-->
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="../resources/js/libs/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="../resources/js/libs/respond.min.js"></script>
    <![endif]-->
    
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/icons/address-book-blue.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

    <!-- Load modernizr first -->
  <script type="text/javascript" src="../resources/js/libs/modernizr.js"/>"></script>
  
    <!-- Le javascript
    ================================================== -->
    <!-- Important plugins put in all pages -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../resources/js/bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="../resources/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="../resources/js/libs/jRespond.min.js"></script>

    <!-- Charts plugins -->
    <script type="text/javascript" src="../resources/plugins/charts/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="../resources/plugins/charts/flot/jquery.flot.grow.js"></script>
    <script type="text/javascript" src="../resources/plugins/charts/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="../resources/plugins/charts/flot/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="../resources/plugins/charts/flot/jquery.flot.tooltip_0.4.4.js"></script>
    <script type="text/javascript" src="../resources/plugins/charts/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="../resources/plugins/charts/sparkline/jquery.sparkline.min.js"></script><!-- Sparkline plugin -->
    <script type="text/javascript" src="../resources/plugins/charts/knob/jquery.knob.js"></script><!-- Circular sliders and stats -->

    <!-- Misc plugins -->
    <script type="text/javascript" src="../resources/plugins/misc/fullcalendar/moment.min.js"></script><!-- Calendar plugin -->
    <script type="text/javascript" src="../resources/plugins/misc/fullcalendar/fullcalendar.min.js"></script><!-- Calendar plugin -->
    <!--<script type="text/javascript" src="../resources/plugins/misc/fullcalendar/lang-all.js"></script> --><!-- Calendar plugin -->

    <script type="text/javascript" src="../resources/plugins/misc/qtip/jquery.qtip.min.js"></script><!-- Custom tooltip plugin -->
    <script type="text/javascript" src="../resources/plugins/misc/totop/jquery.ui.totop.min.js"></script> <!-- Back to top plugin -->

    <!-- Search plugin -->
    <script type="text/javascript" src="../resources/plugins/misc/search/tipuesearch_set.js"></script>
    <script type="text/javascript" src="../resources/plugins/misc/search/tipuesearch_data.js"></script><!-- JSON for searched results -->
    <script type="text/javascript" src="../resources/plugins/misc/search/tipuesearch.js"></script>

    <!-- Form plugins -->
    <script type="text/javascript" src="../resources/plugins/forms/uniform/jquery.uniform.min.js"></script>

    <!-- Init plugins -->
    <script type="text/javascript" src="../resources/js/main.js"></script><!-- Core js functions -->
    <script type="text/javascript" src="../resources/js/dashboard.js"></script><!-- Init plugins only for page -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3560057-23', 'auto');
  ga('send', 'pageview');

</script>

    </head>
      
    <body>
    <!-- loading animation -->
   <?php include_once 'menuUp.php';?>

    <div id="wrapper">
    	<?php include_once 'menuLeft.php';?>
        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Home</h3>                    

                   <?php include_once 'headerBody.php';?>

                </div><!-- End .heading-->

                <!-- Build page from here: -->
            <!--    <div class="row">

                    <div class="col-lg-8">
                        <div class="centerContent">
                  
                            <ul class="bigBtnIcon">
                                <li>
                                    <a href="dashboard#" title="Projetos" class="tipB">
                                        <span class="icon icomoon-icon-database"></span>
                                        <span class="txt">Projetos</span>
                                        <span class="notification">5</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard#">
                                        <span class="icon icomoon-icon-support"></span>
                                        <span class="txt">Chamados</span>
                                        <span class="notification blue">12</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard#" title="Coment&aacuterios" class="pattern tipB">
                                        <span class="icon icomoon-icon-bubbles-2"></span>
                                        <span class="txt">Coment&aacuterio</span>
                                        <span class="notification green">23</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard#">
                                        <span class="icon icomoon-icon-users"></span>
                                        <span class="txt">Líderes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard#">
                                        <span class="icon icomoon-icon-history"></span>
                                        <span class="txt">Agendar</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard#">
                                        <span class="icon icomoon-icon-meter-fast"></span>
                                        <span class="txt">Progresso</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="centerContent">
                            <div dir="ltr" class="circle-stats">
                                
                                <div class="circular-item tipB" title="Sla Vencendo">
                                    <span class="icon icomoon-icon-fire"></span>
                                    <input type="text" value="62" class="redCircle" />
                                </div>

                                <div class="circular-item tipB" title="Projetos em andamento">
                                    <span class="icon icomoon-icon-busy"></span>
                                    <input type="text" value="12" class="blueCircle" />
                                </div>

                                <div class="circular-item tipB" title="% Chamados Atendidos">
                                    <span class="icon icomoon-icon-target-2"></span>
                                    <input type="text" value="94" class="greenCircle" />
                                </div>

                            </div>
                        </div>

                    </div>

                </div>


                <div class="row">

                    <div class="col-lg-8">
                        <div class="panel panel-default calendar gradient">
                            <div class="panel-heading">
                                <h4>
                                    <span class="icon16 icomoon-icon-calendar"></span>
                                    <span>Agenda</span>
                                </h4>
                            </div>
                            <div class="panel-body noPad"> 
                                <div id="calendar">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">

                        <div class="todo">
                            <h4>Notas a fazer<a href="dashboard#" class="icon tip" title="Adicionar Nota"><span class="icon16 icomoon-icon-plus"></span></a></h4>
                            <ul>
                                <li class="clearfix">
                                    <div class="txt">
                                        Fix some bugs
                                        <span class="by badge">Admin</span>
                                        <span class="date label label-danger">Today</span>
                                    </div>
                                    <div class="controls">
                                        <a href="dashboard#" title="Editar Nota" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="dashboard#" title="Remover Nota" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Add post about birds
                                        <span class="by badge">Julia</span>
                                        <span class="date label label-success">Tomorrow</span>
                                    </div>
                                    <div class="controls">
                                        <a href="dashboard#" title="Editar Nota" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="dashboard#" title="Remover Nota" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Remove some items
                                        <span class="by badge">Admin</span>
                                        <span class="date label label-success">Tomorrow</span>
                                    </div>
                                    <div class="controls">
                                        <a href="dashboard#" title="Editar Nota" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="dashboard#" title="Remover Nota" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Staff party
                                        <span class="by badge">Admin</span>
                                        <span class="date label label-info">08.08.2012</span>
                                    </div>
                                    <div class="controls">
                                        <a href="dashboard#" title="Editar Nota" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="dashboard#" title="Remover Nota" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Shedule backup
                                        <span class="by badge">Steve</span>
                                        <span class="date label label-info">08.08.2012</span>
                                    </div>
                                    <div class="controls">
                                        <a href="dashboard#" title="Editar Nota" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="dashboard#" title="Remover Nota" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>-->
                
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->
    </body>
</html>