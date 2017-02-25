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


    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700'
          rel='stylesheet' type='text/css' />
    <!-- Text -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700'
          rel='stylesheet' type='text/css' />
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->

    <!-- Core stylesheets do not remove -->
    <link id="bootstrap" href="../resources/css/bootstrap/bootstrap.css" rel="stylesheet"
          type="text/css" />
    <link href="../resources/css/bootstrap/bootstrap-theme.css" rel="stylesheet"
          type="text/css" />
    <link href="../resources/css/supr-theme/jquery.ui.supr.css" rel="stylesheet"
          type="text/css" />
    <link href="../resources/css/icons.css" rel="stylesheet" type="text/css" />



    <!-- Plugins stylesheets -->
    <link href="../resources/plugins/misc/qtip/jquery.qtip.css" rel="stylesheet"
          type="text/css" />
    <link href="../resources/plugins/forms/uniform/uniform.default.css" type="text/css"
          rel="stylesheet" />
    <link href="../resources/plugins/tables/dataTables/jquery.dataTables.css"
          type="text/css" rel="stylesheet" />
    <link href="../resources/plugins/tables/dataTables/TableTools.css" type="text/css"
          rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="../resources/css/main.css" rel="stylesheet" type="text/css" />

    <!-- Custom stylesheets ( Put your own changes here ) -->
    <link href="../resources/css/custom.css" rel="stylesheet" type="text/css" />

    <!--[if IE 8]><link href="../resources/css/ie8.css"  rel="stylesheet" type="text/css" /><![endif]-->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="../resources/js/libs/excanvas.min.js"></script>
    <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script type="text/javascript" src="../resources/js/libs/respond.min.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/icons/address-book-blue.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed"
          href="images/apple-touch-icon-57-precomposed.png" />

    <!-- Load modernizr first -->
    <script type="text/javascript" src="../resources/js/libs/modernizr.js" />

    </script>

    <!-- Le javascript
    ================================================== -->
    <!-- Important plugins put in all pages -->
    <script type="text/javascript"
    src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script type="text/javascript"
            src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../resources/js/bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="../resources/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="../resources/js/libs/jRespond.min.js"></script>

    <!-- Charts plugins -->
    <script type="text/javascript"
            src="../resources/plugins/charts/sparkline/jquery.sparkline.min.js"></script>
    <!-- Sparkline plugin -->

    <!-- Misc plugins -->
    <script type="text/javascript"
            src="../resources/plugins/misc/nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript"
            src="../resources/plugins/misc/qtip/jquery.qtip.min.js"></script>
    <!-- Custom tooltip plugin -->
    <script type="text/javascript"
            src="../resources/plugins/misc/totop/jquery.ui.totop.min.js"></script>

    <!-- Search plugin -->
    <script type="text/javascript"
            src="../resources/plugins/misc/search/tipuesearch_set.js"></script>
    <script type="text/javascript"
            src="../resources/plugins/misc/search/tipuesearch_data.js"></script>
    <!-- JSON for searched results -->
    <script type="text/javascript" src="../resources/plugins/misc/search/tipuesearch.js"></script>

    <!-- Form plugins -->
    <script type="text/javascript"
            src="../resources/plugins/forms/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="../resources/plugins/forms/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="../resources/plugins/forms/select/select2.min.js"></script>
    <script type="text/javascript" src="../resources/plugins/forms/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../resources/plugins/forms/wizard/jquery.bbq.js"></script>
    <script type="text/javascript" src="../resources/plugins/forms/wizard/jquery.form.js"></script>

    <!-- Table plugins -->
    <script type="text/javascript"
            src="../resources/plugins/tables/dataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
            src="../resources/plugins/tables/dataTables/TableTools.min.js"></script>
    <script type="text/javascript"
            src="../resources/plugins/tables/dataTables/ZeroClipboard.js"></script>
    <script type="text/javascript"
            src="../resources/plugins/tables/responsive-tables/responsive-tables.js"></script>
    <!-- Make tables responsive -->
    <script type="text/javascript" src="../resources/plugins/forms/wizard/jquery.form.wizard.js"></script><!-- Init plugins only for page -->
    <!-- Init plugins -->
    <script type="text/javascript" src="../resources/js/main.js"></script>
    <!-- Core js functions -->
    <script type="text/javascript" src="../resources/js/datatable.js"></script>
    <!-- Init plugins only for page -->
    <script type="text/javascript" src="../resources/js/form-validation.js"></script>
    <!-- Core js functions -->
    <!-- Init plugins only for page -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-3560057-23', 'auto');
        ga('send', 'pageview');

    </script>

    <script type="text/javascript">

        function Collapsed(){
            $("#painelUser").css('display','none');
            $('#usuarios').collapse('hide');
            $("#painelCadastroUser").css('display','block');
            $('#cadastroUser').collapse('show');



        }

        function CollapsedCancel(){
            $("#painelUser").css('display','block');
            $('#usuarios').collapse('show');
            $("#painelCadastroUser").css('display','none');
            $('#cadastroUser').collapse('hide');

        }



    </script>

</head>

<body>
<!-- loading animation -->
<?php include_once 'menuUp.php';?>

<div id="wrapper">
    <?php include_once 'menuLeft.php';?>
    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper">
            <!--Content wrapper-->

            <div class="heading">

                <h3>Prospecção de Projetos</h3>

                <?php include_once 'headerBody.php';?>

            </div>
            <!-- End .heading-->

            <!-- Build page from here: -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="page-header">

                    </div>
                    <div style="margin-bottom: 20px;">
                        <ul id="myTab" class="nav nav-tabs pattern">
                            <li><a href="elements.html#prospectar" data-toggle="tab">Prospectar</a></li>
                            <li class="active"><a href="elements.html#abordagem" data-toggle="tab">Abordagem</a></li>
                            <li><a href="elements.html#necessidade" data-toggle="tab">Levantamento Necessidade</a></li>
                            <li><a href="elements.html#valEscopo" data-toggle="tab">Validação Escopo</a></li>
                            <li><a href="elements.html#aprenProp" data-toggle="tab">Apresentação Proposta</a></li>
                            <li><a href="elements.html#negocicao" data-toggle="tab">Negociação</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="prospectar">
                                <div class="panel panel-default gradient">
                                    <div class="panel-heading">


                                    </div>
                                    <div class="panel-body noPad clearfix">
                                        <form id="wizard" class="form-horizontal" role="form">
                                            <div class="msg"></div>
                                            <div class="wizard-steps clearfix"></div>

                                            <div class="step" id="account-details">
                                                <span class="step-info" data-num="1" data-text="Dados para Abordagem"></span>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="cliente">Nome do Cliente:</label>
                                                    <div class="col-lg-10">
                                                        <input id="cliente" name="cliente" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="cliente">Contato no Cliente:</label>
                                                    <div class="col-lg-10">
                                                        <input id="cliente" name="cliente" type="text" class="form-control" />
                                                    </div>
                                                </div><!-- End .form-group  -->
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="email">Email:</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="email1" name="email1" type="text" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="phone">Telefone de Contato:</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control mask" id="mask-phone">
                                                        <span class="help-block blue">(99) 9999-9999</span>
                                                    </div>
                                                </div><!-- End .form-group  -->
                                            </div>
                                            <div class="step" id="profile-details">
                                                <span class="step-info" data-num="2" data-text="Apresentação da Empresa"></span>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="hobies">Detalhes da Conversa:</label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control" id="aboutyou" rows="10"></textarea>
                                                    </div>
                                                </div><!-- End .form-group  -->
                                            </div>
                                            <div class="step submit_step" id="other-details">
                                                <span class="step-info" data-num="3" data-text="Outros Detalhes"></span>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label" for="hobies">Outros Detalhes:</label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control" id="aboutyou" rows="10"></textarea>
                                                    </div>
                                                </div><!-- End .form-group  -->

                                            </div>
                                            <div class="wizard-actions">
                                                <button class="btn btn-default pull-left" type="reset"> Back </button>
                                                <button class="btn btn-default pull-right" type="submit"> Next </button>
                                            </div><!-- End .form-group  -->
                                        </form>
                                    </div>
                                </div><!-- End .panel -->
                            </div>
                            <div class="tab-pane fade" id="abordagem">
                                <div class="panel panel-default">


                                    <div class="panel-group accordion" id="accordion1">
                                        <div class="panel panel-default" id="painelCadastroUser" style="display:none;">
                                            <div class="panel-heading">
                                                <h4 class="panel-title" >
                                                    <a class="" data-toggle="collapse" data-parent="#accordion1"
                                                       href=""> <span>Cadastro de Usuário</span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="cadastroUser" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <form class="form-horizontal" action="forms.html#"
                                                          role="form">
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="nome">Nome
                                                                Completo:</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Nome Completo...." autofocus="autofocus">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="select">Cliente:</label>
                                                            <div class="col-lg-4">
                                                                <select name="cliente" class="form-control">
                                                                    <option selected="selected"></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="usuario">Usuário:</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Usuário...">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="email">Email:</label>
                                                            <div class="col-lg-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">@</span> <input
                                                                        type="text" class="form-control" placeholder="Email...">

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- End .form-group  -->

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="password">Senha:</label>
                                                            <div class="col-lg-4">
                                                                <input type="password" class="form-control">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="confirmPassword">Confirmar
                                                                Senha:</label>
                                                            <div class="col-lg-4">
                                                                <input type="password" class="form-control">

                                                            </div>
                                                        </div>
                                                        <!-- End .form-group  -->


                                                        <div class="form-group">

                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label" for="radios">Ativo?</label>
                                                            <div class="col-lg-9">
                                                                <label class="radio-inline"> <input name="group1"
                                                                                                    type="radio" id="SIM" value="SIM" checked="checked"> Sim
                                                                </label> <label class="radio-inline"> <input name="group1"
                                                                                                             type="radio" id="NAO" value="NAO"> Não </label>
                                                            </div>
                                                        </div>

                                                        <!-- End .form-group  -->


                                                        <div class="form-group">
                                                            <div class="col-lg-offset-3 col-lg-9">
                                                                <button type="submit" class="btn btn-info">Salvar</button>
                                                                <button type="button" class="btn btn-default">Limpar</button>
                                                                <button type="button" class="btn btn-default" onclick="CollapsedCancel()">Cancelar</button>
                                                            </div>
                                                        </div>
                                                        <!-- End .form-group  -->

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="painelUser">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="" data-toggle="collapse" data-parent="#accordion"
                                                       href=""> Usuários </a>
                                                </h4>
                                            </div>
                                            <div id="usuarios" class="panel-collapse collapse in">
                                                <div class="panel-body noPad clearfix" style="padding: 10px;">
                                                    <button type="button" class="btn btn-xs btn-info collapsed" data-toggle="collapse" onclick="Collapsed()">Novo</button>
                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                           class="tableTools display table table-bordered "
                                                           width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Nome</th>
                                                            <th>Usuário</th>
                                                            <th>Email</th>
                                                            <th>Ativo</th>
                                                            <th>Ação</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr align="center">
                                                            <td>Ricardo Ferreira</td>
                                                            <td>rleonel</td>
                                                            <td>ricardo-leonel@uol.com.br</td>
                                                            <td><a class="icomoon-icon-checkmark"></a></td>
                                                            <td><a class="icomoon-icon-pencil-4"></a> <a
                                                                    class="brocco-icon-trashcan"></a></td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td>Ricardo Ferreira Leonel</td>
                                                            <td>rleonel2</td>
                                                            <td>ricardo-leonel2@uol.com.br</td>
                                                            <td><a class=" icomoon-icon-close"></a></td>
                                                            <td><a class="icomoon-icon-pencil-4"></a> <a
                                                                    class="brocco-icon-trashcan"></a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="necessidade">
                                <div class="panel panel-default">


                                    <div class="panel-group accordion" id="accordion1">
                                        <div class="panel panel-default" id="painelCadastroUser" style="display:none;">
                                            <div class="panel-heading">
                                                <h4 class="panel-title" >
                                                    <a class="" data-toggle="collapse" data-parent="#accordion1"
                                                       href=""> <span>Cadastro de Usuário</span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="cadastroUser" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <form class="form-horizontal" action="forms.html#"
                                                          role="form">
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="nome">Nome
                                                                Completo:</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Nome Completo...." autofocus="autofocus">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="select">Cliente:</label>
                                                            <div class="col-lg-4">
                                                                <select name="cliente" class="form-control">
                                                                    <option selected="selected"></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="usuario">Usuário:</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Usuário...">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="email">Email:</label>
                                                            <div class="col-lg-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">@</span> <input
                                                                        type="text" class="form-control" placeholder="Email...">

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- End .form-group  -->

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="password">Senha:</label>
                                                            <div class="col-lg-4">
                                                                <input type="password" class="form-control">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="confirmPassword">Confirmar
                                                                Senha:</label>
                                                            <div class="col-lg-4">
                                                                <input type="password" class="form-control">

                                                            </div>
                                                        </div>
                                                        <!-- End .form-group  -->


                                                        <div class="form-group">

                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label" for="radios">Ativo?</label>
                                                            <div class="col-lg-9">
                                                                <label class="radio-inline"> <input name="group1"
                                                                                                    type="radio" id="SIM" value="SIM" checked="checked"> Sim
                                                                </label> <label class="radio-inline"> <input name="group1"
                                                                                                             type="radio" id="NAO" value="NAO"> Não </label>
                                                            </div>
                                                        </div>

                                                        <!-- End .form-group  -->


                                                        <div class="form-group">
                                                            <div class="col-lg-offset-3 col-lg-9">
                                                                <button type="submit" class="btn btn-info">Salvar</button>
                                                                <button type="button" class="btn btn-default">Limpar</button>
                                                                <button type="button" class="btn btn-default" onclick="CollapsedCancel()">Cancelar</button>
                                                            </div>
                                                        </div>
                                                        <!-- End .form-group  -->

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="painelUser">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="" data-toggle="collapse" data-parent="#accordion"
                                                       href=""> Usuários </a>
                                                </h4>
                                            </div>
                                            <div id="usuarios" class="panel-collapse collapse in">
                                                <div class="panel-body noPad clearfix" style="padding: 10px;">
                                                    <button type="button" class="btn btn-xs btn-info collapsed" data-toggle="collapse" onclick="Collapsed()">Novo</button>
                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                           class="tableTools display table table-bordered "
                                                           width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Nome</th>
                                                            <th>Usuário</th>
                                                            <th>Email</th>
                                                            <th>Ativo</th>
                                                            <th>Ação</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr align="center">
                                                            <td>Ricardo Ferreira</td>
                                                            <td>rleonel</td>
                                                            <td>ricardo-leonel@uol.com.br</td>
                                                            <td><a class="icomoon-icon-checkmark"></a></td>
                                                            <td><a class="icomoon-icon-pencil-4"></a> <a
                                                                    class="brocco-icon-trashcan"></a></td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td>Ricardo Ferreira Leonel</td>
                                                            <td>rleonel2</td>
                                                            <td>ricardo-leonel2@uol.com.br</td>
                                                            <td><a class=" icomoon-icon-close"></a></td>
                                                            <td><a class="icomoon-icon-pencil-4"></a> <a
                                                                    class="brocco-icon-trashcan"></a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="valEscopo">
                                <div class="panel panel-default">


                                    <div class="panel-group accordion" id="accordion1">
                                        <div class="panel panel-default" id="painelCadastroUser" style="display:none;">
                                            <div class="panel-heading">
                                                <h4 class="panel-title" >
                                                    <a class="" data-toggle="collapse" data-parent="#accordion1"
                                                       href=""> <span>Cadastro de Usuário</span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="cadastroUser" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <form class="form-horizontal" action="forms.html#"
                                                          role="form">
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="nome">Nome
                                                                Completo:</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Nome Completo...." autofocus="autofocus">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="select">Cliente:</label>
                                                            <div class="col-lg-4">
                                                                <select name="cliente" class="form-control">
                                                                    <option selected="selected"></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="usuario">Usuário:</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Usuário...">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="email">Email:</label>
                                                            <div class="col-lg-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">@</span> <input
                                                                        type="text" class="form-control" placeholder="Email...">

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- End .form-group  -->

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="password">Senha:</label>
                                                            <div class="col-lg-4">
                                                                <input type="password" class="form-control">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="confirmPassword">Confirmar
                                                                Senha:</label>
                                                            <div class="col-lg-4">
                                                                <input type="password" class="form-control">

                                                            </div>
                                                        </div>
                                                        <!-- End .form-group  -->


                                                        <div class="form-group">

                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label" for="radios">Ativo?</label>
                                                            <div class="col-lg-9">
                                                                <label class="radio-inline"> <input name="group1"
                                                                                                    type="radio" id="SIM" value="SIM" checked="checked"> Sim
                                                                </label> <label class="radio-inline"> <input name="group1"
                                                                                                             type="radio" id="NAO" value="NAO"> Não </label>
                                                            </div>
                                                        </div>

                                                        <!-- End .form-group  -->


                                                        <div class="form-group">
                                                            <div class="col-lg-offset-3 col-lg-9">
                                                                <button type="submit" class="btn btn-info">Salvar</button>
                                                                <button type="button" class="btn btn-default">Limpar</button>
                                                                <button type="button" class="btn btn-default" onclick="CollapsedCancel()">Cancelar</button>
                                                            </div>
                                                        </div>
                                                        <!-- End .form-group  -->

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="painelUser">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="" data-toggle="collapse" data-parent="#accordion"
                                                       href=""> Usuários </a>
                                                </h4>
                                            </div>
                                            <div id="usuarios" class="panel-collapse collapse in">
                                                <div class="panel-body noPad clearfix" style="padding: 10px;">
                                                    <button type="button" class="btn btn-xs btn-info collapsed" data-toggle="collapse" onclick="Collapsed()">Novo</button>
                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                           class="tableTools display table table-bordered "
                                                           width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Nome</th>
                                                            <th>Usuário</th>
                                                            <th>Email</th>
                                                            <th>Ativo</th>
                                                            <th>Ação</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr align="center">
                                                            <td>Ricardo Ferreira</td>
                                                            <td>rleonel</td>
                                                            <td>ricardo-leonel@uol.com.br</td>
                                                            <td><a class="icomoon-icon-checkmark"></a></td>
                                                            <td><a class="icomoon-icon-pencil-4"></a> <a
                                                                    class="brocco-icon-trashcan"></a></td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td>Ricardo Ferreira Leonel</td>
                                                            <td>rleonel2</td>
                                                            <td>ricardo-leonel2@uol.com.br</td>
                                                            <td><a class=" icomoon-icon-close"></a></td>
                                                            <td><a class="icomoon-icon-pencil-4"></a> <a
                                                                    class="brocco-icon-trashcan"></a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="aprenProp">
                                <div class="panel panel-default">


                                    <div class="panel-group accordion" id="accordion1">
                                        <div class="panel panel-default" id="painelCadastroUser" style="display:none;">
                                            <div class="panel-heading">
                                                <h4 class="panel-title" >
                                                    <a class="" data-toggle="collapse" data-parent="#accordion1"
                                                       href=""> <span>Cadastro de Usuário</span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="cadastroUser" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <form class="form-horizontal" action="forms.html#"
                                                          role="form">
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="nome">Nome
                                                                Completo:</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Nome Completo...." autofocus="autofocus">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="select">Cliente:</label>
                                                            <div class="col-lg-4">
                                                                <select name="cliente" class="form-control">
                                                                    <option selected="selected"></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="usuario">Usuário:</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Usuário...">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="email">Email:</label>
                                                            <div class="col-lg-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">@</span> <input
                                                                        type="text" class="form-control" placeholder="Email...">

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- End .form-group  -->

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="password">Senha:</label>
                                                            <div class="col-lg-4">
                                                                <input type="password" class="form-control">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="confirmPassword">Confirmar
                                                                Senha:</label>
                                                            <div class="col-lg-4">
                                                                <input type="password" class="form-control">

                                                            </div>
                                                        </div>
                                                        <!-- End .form-group  -->


                                                        <div class="form-group">

                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label" for="radios">Ativo?</label>
                                                            <div class="col-lg-9">
                                                                <label class="radio-inline"> <input name="group1"
                                                                                                    type="radio" id="SIM" value="SIM" checked="checked"> Sim
                                                                </label> <label class="radio-inline"> <input name="group1"
                                                                                                             type="radio" id="NAO" value="NAO"> Não </label>
                                                            </div>
                                                        </div>

                                                        <!-- End .form-group  -->


                                                        <div class="form-group">
                                                            <div class="col-lg-offset-3 col-lg-9">
                                                                <button type="submit" class="btn btn-info">Salvar</button>
                                                                <button type="button" class="btn btn-default">Limpar</button>
                                                                <button type="button" class="btn btn-default" onclick="CollapsedCancel()">Cancelar</button>
                                                            </div>
                                                        </div>
                                                        <!-- End .form-group  -->

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="painelUser">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="" data-toggle="collapse" data-parent="#accordion"
                                                       href=""> Usuários </a>
                                                </h4>
                                            </div>
                                            <div id="usuarios" class="panel-collapse collapse in">
                                                <div class="panel-body noPad clearfix" style="padding: 10px;">
                                                    <button type="button" class="btn btn-xs btn-info collapsed" data-toggle="collapse" onclick="Collapsed()">Novo</button>
                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                           class="tableTools display table table-bordered "
                                                           width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Nome</th>
                                                            <th>Usuário</th>
                                                            <th>Email</th>
                                                            <th>Ativo</th>
                                                            <th>Ação</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr align="center">
                                                            <td>Ricardo Ferreira</td>
                                                            <td>rleonel</td>
                                                            <td>ricardo-leonel@uol.com.br</td>
                                                            <td><a class="icomoon-icon-checkmark"></a></td>
                                                            <td><a class="icomoon-icon-pencil-4"></a> <a
                                                                    class="brocco-icon-trashcan"></a></td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td>Ricardo Ferreira Leonel</td>
                                                            <td>rleonel2</td>
                                                            <td>ricardo-leonel2@uol.com.br</td>
                                                            <td><a class=" icomoon-icon-close"></a></td>
                                                            <td><a class="icomoon-icon-pencil-4"></a> <a
                                                                    class="brocco-icon-trashcan"></a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="negocicao">
                                <div class="panel panel-default">


                                    <div class="panel-group accordion" id="accordion1">
                                        <div class="panel panel-default" id="painelCadastroUser" style="display:none;">
                                            <div class="panel-heading">
                                                <h4 class="panel-title" >
                                                    <a class="" data-toggle="collapse" data-parent="#accordion1"
                                                       href=""> <span>Cadastro de Usuário</span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="cadastroUser" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <form class="form-horizontal" action="forms.html#"
                                                          role="form">
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="nome">Nome
                                                                Completo:</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Nome Completo...." autofocus="autofocus">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="select">Cliente:</label>
                                                            <div class="col-lg-4">
                                                                <select name="cliente" class="form-control">
                                                                    <option selected="selected"></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="usuario">Usuário:</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Usuário...">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="email">Email:</label>
                                                            <div class="col-lg-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">@</span> <input
                                                                        type="text" class="form-control" placeholder="Email...">

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- End .form-group  -->

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label" for="password">Senha:</label>
                                                            <div class="col-lg-4">
                                                                <input type="password" class="form-control">

                                                            </div>
                                                            <label class="col-lg-2 control-label" for="confirmPassword">Confirmar
                                                                Senha:</label>
                                                            <div class="col-lg-4">
                                                                <input type="password" class="form-control">

                                                            </div>
                                                        </div>
                                                        <!-- End .form-group  -->


                                                        <div class="form-group">

                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label" for="radios">Ativo?</label>
                                                            <div class="col-lg-9">
                                                                <label class="radio-inline"> <input name="group1"
                                                                                                    type="radio" id="SIM" value="SIM" checked="checked"> Sim
                                                                </label> <label class="radio-inline"> <input name="group1"
                                                                                                             type="radio" id="NAO" value="NAO"> Não </label>
                                                            </div>
                                                        </div>

                                                        <!-- End .form-group  -->


                                                        <div class="form-group">
                                                            <div class="col-lg-offset-3 col-lg-9">
                                                                <button type="submit" class="btn btn-info">Salvar</button>
                                                                <button type="button" class="btn btn-default">Limpar</button>
                                                                <button type="button" class="btn btn-default" onclick="CollapsedCancel()">Cancelar</button>
                                                            </div>
                                                        </div>
                                                        <!-- End .form-group  -->

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="painelUser">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="" data-toggle="collapse" data-parent="#accordion"
                                                       href=""> Usuários </a>
                                                </h4>
                                            </div>
                                            <div id="usuarios" class="panel-collapse collapse in">
                                                <div class="panel-body noPad clearfix" style="padding: 10px;">
                                                    <button type="button" class="btn btn-xs btn-info collapsed" data-toggle="collapse" onclick="Collapsed()">Novo</button>
                                                    <table cellpadding="0" cellspacing="0" border="0"
                                                           class="tableTools display table table-bordered "
                                                           width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Nome</th>
                                                            <th>Usuário</th>
                                                            <th>Email</th>
                                                            <th>Ativo</th>
                                                            <th>Ação</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr align="center">
                                                            <td>Ricardo Ferreira</td>
                                                            <td>rleonel</td>
                                                            <td>ricardo-leonel@uol.com.br</td>
                                                            <td><a class="icomoon-icon-checkmark"></a></td>
                                                            <td><a class="icomoon-icon-pencil-4"></a> <a
                                                                    class="brocco-icon-trashcan"></a></td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td>Ricardo Ferreira Leonel</td>
                                                            <td>rleonel2</td>
                                                            <td>ricardo-leonel2@uol.com.br</td>
                                                            <td><a class=" icomoon-icon-close"></a></td>
                                                            <td><a class="icomoon-icon-pencil-4"></a> <a
                                                                    class="brocco-icon-trashcan"></a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End .row -->

        </div>
        <!-- End contentwrapper -->
    </div>
    <!-- End #content -->

</div>
<!-- End #wrapper -->
</body>
</html>