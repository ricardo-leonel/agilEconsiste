<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(empty($_SESSION['user'])){
	header('Location: ../index.php?sessao=true');
}
include_once '../controllers/UserController.php';
$_controller = new UserController();
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

	<!-- Init plugins -->
	<script type="text/javascript" src="../resources/js/main.js"></script>
	<!-- Core js functions -->
	<script type="text/javascript" src="../resources/js/datatable.js"></script>
	<!-- Init plugins only for page -->
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

					<!--   <h3>Usuário</h3>-->                    

                   <?php include_once 'headerBody.php';?>

                </div>
				<!-- End .heading-->

				<!-- Build page from here: -->
				<div class="row">

					<div class="col-lg-12">

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
															<?php
																$listaUsuario = $_controller->listarAction();
																foreach ($listaUsuario as $value){

																	echo "<option value='.$value[0][\"id\"].'>".$value[0]["nome"]."</option>";
																}

															?>
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
													<?php
													$listaUsuario = $_controller->listarAction();
													foreach ($listaUsuario as $value){
														$status = "";
														if($value[0]['status'] == 2)
														{
															$status = "<a class=\"icomoon-icon-checkmark\">";
														}else{
															$status = "<a class=\"icomoon-icon-close\">";
														}
														echo "<tr align=\"center\">";
														echo "<td>".$value[0]["nome"]."</td>
															<td>".$value[0]["usuario"]."</td>
															<td>".$value[0]["email"]."</td>
															<td>".$status."</a>
															</td>
															<td><a class=\"icomoon-icon-pencil-4\"></a> <a
																class=\"brocco-icon-trashcan\"></a></td>";
														echo "</tr>";
													}

													?>




												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End .panel -->

					</div>
					<!-- End .span6 -->
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