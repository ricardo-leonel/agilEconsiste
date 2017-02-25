<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AgilEconsiste</title>
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="Supr admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
    <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, masonry, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
    <meta name="application-name" content="Supr admin template" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Force IE9 to render in normla mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Le styles -->
    <link href="resources/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="resources/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
    <link href="resources/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="resources/plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="resources/plugins/misc/pnotify/jquery.pnotify.default.css" type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="resources/css/main.css" rel="stylesheet" type="text/css" /> 

    <!--[if IE 8]><link href="resources/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="resources/js/libs/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="resources/js/libs/respond.min.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="resources/images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="resources/images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="resources/images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="resources/images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="resources/images/apple-touch-icon-57-precomposed.png" />

    <script type="text/javascript" src="resources/js/libs/modernizr.js"></script>

    </head>
      
    <body class="loginPage">

    <div class="container">

        <div id="header">

            <div class="row">

                <div class="navbar">
                    <div class="container">
                        <a class="navbar-brand" href="dashboard.html"><img src="../resources/images/logo-econsiste.png" style="padding-top: 6px;padding-right: 10px;"/></a>
                    </div>
                </div><!-- /navbar -->

            </div><!-- End .row -->

        </div><!-- End #header -->

    </div><!-- End .container -->    

    <div class="container">

        <div class="loginContainer">
            <form class="form-horizontal" action="controllers/LoginController.php" id="loginForm" role="form" method="POST">
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="username">Usuário:</label>
                    <div class="col-lg-12">
                        <input id="username" type="text" name="username" class="form-control" value="" placeholder="Entre com seu Usuário ...">
                        <span class="icon16 icomoon-icon-user right gray marginR10"></span>
                    </div>
                </div><!-- End .form-group  -->
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="password">Senha:</label>
                    <div class="col-lg-12">
                        <input id="password" type="password" name="password" value="" class="form-control">
                        <input name="acao" type="hidden" id="acao" value="logar">
                        <span class="icon16 icomoon-icon-lock right gray marginR10"></span>
                        <span class="forgot help-block"><a href="index.html#">Esqueceu a Senha</a></span>
                    </div>
                </div><!-- End .form-group  -->
                <div class="form-group">
                    <div class="col-lg-12 clearfix form-actions">
                        <div class="checkbox left">
                            <label><input type="checkbox" id="keepLoged" value="Value" class="styled" name="logged" /> Me mantenha logado</label>
                        </div>
                        <button type="submit" class="btn btn-info right" id="loginBtn"><span class="icon16 icomoon-icon-enter white"></span> Logar</button>
                    </div>
                </div><!-- End .form-group  -->
            </form>
        </div>

    </div><!-- End .container -->

    <!-- Le javascript
    ================================================== -->
    <script  type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="resources/plugins/forms/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="resources/plugins/forms/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="resources/plugins/misc/pnotify/jquery.pnotify.min.js"></script>

     <script type="text/javascript">
        // document ready function
        $(document).ready(function() {

            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : sParameterName[1];
                    }
                }
            };
            var sessao = getUrlParameter('sessao');
            if(sessao == "true"){
                $.pnotify({
                    type: 'success',
                    title: 'Sessão',
                    text: 'Sessão expirada',
                    icon: 'picon icon16 iconic-icon-check-alt white',
                    opacity: 0.95,
                    history: false,
                    sticker: false
                });
            }
            var logout = getUrlParameter('logout');
            if(logout == "true"){
                $.pnotify({
                    type: 'notice',
                    title: 'Logout',
                    text: 'Logout efetuado com sucesso',
                    icon: 'picon icon16 iconic-icon-check-alt white',
                    opacity: 0.95,
                    history: false,
                    sticker: false
                });
            }

            //------------- Options for Supr - admin tempalte -------------//
            var supr_Options = {
                rtl:false//activate rtl version with true
            }
            //rtl version
            if(supr_Options.rtl) {
                localStorage.setItem('rtl', 1);
                $('#bootstrap').attr('href', 'resources/css/bootstrap/bootstrap.rtl.min.css');
                $('#bootstrap-responsive').attr('href', 'resources/css/bootstrap/bootstrap-responsive.rtl.min.css');
                $('body').addClass('rtl');
                $('#sidebar').attr('id', 'sidebar-right');
                $('#sidebarbg').attr('id', 'sidebarbg-right');
                $('.collapseBtn').addClass('rightbar').removeClass('leftbar');
                $('#content').attr('id', 'content-one')
            } else {localStorage.setItem('rtl', 0);}
            
            $("input, textarea, select").not('.nostyle').uniform();
            $("#loginForm").validate({
                submitHandler: function(form) {

                        $.ajax({
                            url: 'controllers/LoginController.php',
                            type: 'post',
                            dataType: 'json',
                            data: $('form#loginForm').serialize(),
                            success: function(data) {
                                if(data == "erro"){
                                    $.pnotify({
                                        type: 'error',
                                        title: 'Login',
                                        text: 'Login Inválido',
                                        icon: 'picon icon16 iconic-icon-check-alt white',
                                        opacity: 0.95,
                                        history: false,
                                        sticker: false
                                    });
                                }else{
                                    document.location='../views/vHome.php';
                                }
                            }
                        });

                },
                rules: {
                    username: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }  
                },
                messages: {
                    username: {
                        required: "Preenchimento Obrigatório",
                        minlength: "Login deve ter mais de 4 caracteres."
                    },
                    password: {
                        required: "Preenchimento Obrigatório",
                        minlength: "Senha de ter mais de 6 digitos."
                    }
                }   
            });
        });
    </script> 
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3560057-23', 'suggeelson.com');
  ga('send', 'pageview');

</script>
    </body>
</html>
