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
<link id="bootstrap" href="../resources/css/bootstrap/bootstrap.css" rel="stylesheet"type="text/css" />
<link href="../resources/css/bootstrap/bootstrap-theme.css" rel="stylesheet"
	type="text/css" />
<link href="../resources/css/supr-theme/jquery.ui.supr.css" rel="stylesheet"
	type="text/css" />
<link href="../resources/css/icons.css" rel="stylesheet" type="text/css" />
<link href="../resources/plugins/misc/pnotify/jquery.pnotify.default.css" type="text/css" rel="stylesheet" />


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

<!--[if IE 8]><link href="css/ie8.css"  rel="stylesheet" type="text/css" /><![endif]-->

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->

<!--[if lt IE 9]>
      <script type="text/javascript" src="../resources/js/libs/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="../resources/js/libs/respond.min.js"></script>
    <![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="../resources/images/icons/address-book-blue.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="../resources/images/apple-touch-icon-144-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="../resources/images/apple-touch-icon-114-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="../resources/images/apple-touch-icon-72-precomposed.png" />
<link rel="apple-touch-icon-precomposed"
	href="../resources/images/apple-touch-icon-57-precomposed.png" />

<!-- Load modernizr first -->
<script type="text/javascript" src="../resources/js/libs/modernizr.js" />

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

					<!--                     <h3>Cliente</h3>                     -->

                   <?php include_once 'headerBody.php';?>

                </div>
				<!-- End .heading-->

				<!-- Build page from here: -->
				<div class="row">

					<div class="col-lg-12">

						<div class="panel panel-default">


							<div class="panel-group accordion" id="accordion1">
								<div class="panel panel-default" id="painelCadastroUser"
									style="display: none;">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="" data-toggle="collapse" data-parent="#accordion1"
												href=""> <span>Cadastro de Cliente</span>
											</a>
										</h4>
									</div>
									<div id="cadastroUser" class="panel-collapse collapse">
										<div class="panel-body">
											<form class="form-horizontal" action="../controllers/ClienteController.php" id="insertClienteForm" method="POST" role="form">
												<div class="form-group">
													<label class="col-lg-2 control-label" for="nome">Nome
														Completo:</label>
													<div class="col-lg-4">
														<input type="text" name="nome" class="form-control"
															placeholder="Nome Completo...." autofocus="autofocus">

													</div>
													<label class="col-lg-2 control-label" for="phone">CNPJ:</label>
													<div class="col-lg-4">
														<input type="text" name="cnpj" class="form-control mask"
															   placeholder="##.###.###/####-##" id="cnpj"><span
															class="help-block blue"></span>

													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label" for="phone">Inscrição
														Estadual:</label>
													<div class="col-lg-4">
														<input type="text" name="inscEst" class="form-control mask" id="inscEst">
															<span class="help-block blue"></span>

													</div>
													<label class="col-lg-2 control-label" for="phone">Endereço:</label>
													<div class="col-lg-4">
														<input type="text" name="endereco" class="form-control mask" id="endereco">
														<span class="help-block blue"></span>

													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label" for="phone">Cidade:</label>
													<div class="col-lg-4">
														<input type="text" class="form-control mask" name="cidade" id="cidade">
															<span class="help-block blue"></span>

													</div>
													<label class="col-lg-2 control-label" for="phone">Bairro:</label>
													<div class="col-lg-4">
														<input type="text" class="form-control mask" id="bairro" name="bairro">
														<span class="help-block blue"></span>

													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label" for="phone">UF:</label>
													<div class="col-lg-4">
														<input type="text" class="form-control mask" id="estado" name="estado">
															<span class="help-block blue"></span>

													</div>
													<label class="col-lg-2 control-label" for="phone">CEP:</label>
													<div class="col-lg-4">
														<input type="text" class="form-control mask" id="cep" name="cep"> <span
															class="help-block blue"></span>

													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label" for="phone">Telefone:</label>
													<div class="col-lg-4">
														<input type="text" class="form-control mask"
															id="mask-phone" name="telefone"> <span class="help-block blue"></span>

													</div>
													<label class="col-lg-2 control-label" for="email">Email:</label>
													<div class="col-lg-4">
														<div class="input-group">
															<span class="input-group-addon">@</span> <input
																type="text" class="form-control" placeholder="Email..." name="email">

														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label" for="radios">Ativo?</label>
													<div class="col-lg-9">
														<label class="radio-inline"> <input name="statusRadio"
															type="radio" id="SIM" value="SIM" checked="checked"> Sim
														</label> <label class="radio-inline"> <input name="statusRadio"
															type="radio" id="NAO" value="NAO"> Não </label>
													</div>
												</div>

												<div class="form-group">
													<div class="col-lg-offset-3 col-lg-9">
														<input name="acao" type="hidden" id="acao" value="inserir">
														<button type="button" class="btn btn-info" id="insertCliente">Salvar</button>
														<button type="button" class="btn btn-default">Limpar</button>
														<button type="button" class="btn btn-default"
															onclick="CollapsedCancel()">Cancelar</button>
													</div>
												</div>

											</form>
										</div>
									</div>
								</div>
								<div class="panel panel-default" id="painelUser">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="" data-toggle="collapse" data-parent="#accordion"
												href=""> Cliente </a>
										</h4>
									</div>
									<div id="usuarios" class="panel-collapse collapse in">
										<div class="panel-body noPad clearfix" style="padding: 10px;">
											<button type="button" class="btn btn-xs btn-info collapsed"
												data-toggle="collapse" onclick="Collapsed()">Novo</button>
											<table cellpadding="0" cellspacing="0" border="0" id="clienteTable"
												class="clienteTable display table table-bordered "
												width="100%" style="font-size: 13px;">
												<thead>
													<tr>
														<th>Nome</th>
														<th>CNPJ</th>
														<th>Cidade</th>
														<th>UF</th>
														<th>Telefone</th>
														<th>Email</th>
														<th>Ativo</th>
														<th>Ação</th>
													</tr>
												</thead>
											</table>
											<!-- Modal -->
											<div class="modal fade" id="detailClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document" style="margin-left: 20%">
													<div class="modal-content" style="width: 850px;">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">Detalhes de Cliente</h4>
														</div>
														<div class="modal-body" style="height: 285px;width: 850px;">
															<div class="form-group">
																<label class="col-lg-2 control-label" for="nome">Nome
																	Completo:</label>
																<div class="col-lg-4">
																	<input type="text" class="form-control" id="nomeModal" readonly
																		   placeholder="Nome Completo...." autofocus="autofocus">

																</div>
																<label class="col-lg-2 control-label" for="phone">CNPJ:</label>
																<div class="col-lg-4">
																	<input type="text" class="form-control mask"  id="cnpjModal" readonly
																		   placeholder="##.###.###/####-##" id="mask-cnpj"><span
																		class="help-block blue"></span>

																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-2 control-label" for="phone">Inscrição
																	Estadual:</label>
																<div class="col-lg-4">
																	<input type="text" class="form-control mask"  id="inscEstModal" readonly>
																	<span class="help-block blue"></span>

																</div>
																<label class="col-lg-2 control-label" for="phone">Endereço:</label>
																<div class="col-lg-4">
																	<input type="text" class="form-control mask" id="enderecoModal" readonly>
																	<span class="help-block blue"></span>

																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-2 control-label" for="phone">Cidade:</label>
																<div class="col-lg-4">
																	<input type="text" class="form-control mask" id="cidadeModal" readonly>
																	<span class="help-block blue"></span>

																</div>
																<label class="col-lg-2 control-label" for="phone">Bairro:</label>
																<div class="col-lg-4">
																	<input type="text" class="form-control mask" id="bairroModal" readonly>
																	<span class="help-block blue"></span>

																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-2 control-label" for="phone">UF:</label>
																<div class="col-lg-4">
																	<input type="text" class="form-control mask" id="estadoModal" readonly >
																	<span class="help-block blue"></span>

																</div>
																<label class="col-lg-2 control-label" for="phone">CEP:</label>
																<div class="col-lg-4">
																	<input type="text" class="form-control mask" id="cepModal" readonly > <span
																		class="help-block blue"></span>

																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-2 control-label" for="phone">Telefone:</label>
																<div class="col-lg-4">
																	<input type="text" class="form-control mask" readonly id="telefoneModal"
																		   id="mask-phone"> <span class="help-block blue" ></span>

																</div>
																<label class="col-lg-2 control-label" for="email">Email:</label>
																<div class="col-lg-4">
																	<div class="input-group">
																		<span class="input-group-addon">@</span> <input readonly id="emailModal"
																			type="text" class="form-control" placeholder="Email...">

																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
														</div>
													</div>
												</div>
											</div>
											<div class="modal fade" id="alterClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document" style="margin-left: 20%">
													<div class="modal-content" style="width: 850px;">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">Detalhes de Cliente</h4>
														</div>
														<form class="form-horizontal" action="controllers/ClienteController.php" id="alterFormClient" role="form" method="POST">
															<div class="modal-body" style="height: 345px;width: 850px;">
																<div class="form-group">
																	<label class="col-lg-2 control-label" for="nome">Nome
																		Completo:</label>
																	<div class="col-lg-4">
																		<input type="text" class="form-control" id="nomeModal2" name="nomeModal2"
																			   placeholder="Nome Completo...." autofocus="autofocus">

																	</div>
																	<label class="col-lg-2 control-label" for="phone">CNPJ:</label>
																	<div class="col-lg-4">
																		<input type="text" class="form-control mask"  id="cnpjModal2" name="cnpjModal2"
																			   placeholder="##.###.###/####-##" id="mask-cnpj"><span
																			class="help-block blue"></span>

																	</div>
																</div>
																<div class="form-group">
																	<label class="col-lg-2 control-label" for="phone">Inscrição
																		Estadual:</label>
																	<div class="col-lg-4">
																		<input type="text" class="form-control mask"  id="inscEstModal2" name="inscEstModal2" >
																		<span class="help-block blue"></span>

																	</div>
																	<label class="col-lg-2 control-label" for="phone">Endereço:</label>
																	<div class="col-lg-4">
																		<input type="text" class="form-control mask" id="enderecoModal2" name="enderecoModal2" >
																		<span class="help-block blue"></span>

																	</div>
																</div>
																<div class="form-group">
																	<label class="col-lg-2 control-label" for="phone">Cidade:</label>
																	<div class="col-lg-4">
																		<input type="text" class="form-control mask" id="cidadeModal2" name="cidadeModal2"  >
																		<span class="help-block blue"></span>

																	</div>
																	<label class="col-lg-2 control-label" for="phone">Bairro:</label>
																	<div class="col-lg-4">
																		<input type="text" class="form-control mask" id="bairroModal2" name="bairroModal2" >
																		<span class="help-block blue"></span>

																	</div>
																</div>
																<div class="form-group">
																	<label class="col-lg-2 control-label" for="phone">UF:</label>
																	<div class="col-lg-4">
																		<input type="text" class="form-control mask" id="estadoModal2" name="estadoModal2"  >
																		<span class="help-block blue"></span>

																	</div>
																	<label class="col-lg-2 control-label" for="phone">CEP:</label>
																	<div class="col-lg-4">
																		<input type="text" class="form-control mask" id="cepModal2" name="cepModal2"  > <span
																			class="help-block blue"></span>

																	</div>
																</div>
																<div class="form-group">
																	<label class="col-lg-2 control-label" for="phone">Telefone:</label>
																	<div class="col-lg-4">
																		<input type="text" class="form-control mask"  id="telefoneModal2" name="telefoneModal2"
																			   id="mask-phone"> <span class="help-block blue" ></span>

																	</div>
																	<label class="col-lg-2 control-label" for="email">Email:</label>
																	<div class="col-lg-4">
																		<div class="input-group">
																			<span class="input-group-addon">@</span> <input  id="emailModal2" name="emailModal2"
																															type="text" class="form-control" placeholder="Email...">

																		</div>
																	</div>
																</div>
																<div class="form-group" style="margin-left: 25%;">
																	<label class="col-lg-3 control-label" for="radios">Ativo?</label>
																	<div class="col-lg-9">
																		<label class="radio-inline">
																			<input name="statusRadio" type="radio"  value="2"> Sim
																		</label> <label class="radio-inline">
																			<input name="statusRadio" type="radio" value="1"> Não </label>
																	</div>
																</div>

															</div>
															<div class="modal-footer">
																<div class="form-group">
																	<input name="acao" type="hidden" id="acao" value="alterar">
																	<input name="id" type="hidden" id="id" value="">
																	<button type="button" class="btn btn-primary" id ="alterarCliente" >Alterar</button>
																	<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>

											<div class="modal fade" id="removeClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													<div class="modal-dialog" role="document" style="margin-left: 20%">
													<div class="modal-content" style="width: 263px;left: 50%;top: 50%;">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">Deseja remover esse cliente?</h4>
														</div>
														<div class="modal-body" >
															<form class="form-horizontal" action="controllers/ClienteController.php" id="removeFormClient" role="form" method="POST">
																<div class="form-group">
																	<input name="acao" type="hidden" id="acao" value="remover">
																	<input name="id" type="hidden" id="idRemove" value="">
																<button type="button" class="btn btn-primary" id ="removerCliente" >Remover</button>
																<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End .panel -->

					</div>



				</div>
				<!-- End .row -->
			</div>
			<!-- End contentwrapper -->
		</div>
		<!-- End #content -->

	</div>
	<!-- End #wrapper -->

	<!-- Le javascript
    ================================================== -->
	<!-- Important plugins put in all pages -->
	<script type="text/javascript"
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript"
		src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript"
		src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="../resources/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="../resources/js/libs/jRespond.min.js"></script>
	<script type="text/javascript" src="../resources/js/bootstrap/bootstrap.js"></script>
	<script type="text/javascript" src="../resources/plugins/forms/validate/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../resources/plugins/forms/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="../resources/plugins/misc/pnotify/jquery.pnotify.min.js"></script>
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
	<script type="text/javascript" src="../resources/plugins/charts/knob/jquery.knob.js"></script><!-- Circular sliders and stats -->
	<!-- JSON for searched results -->
	<script type="text/javascript" src="../resources/plugins/misc/search/tipuesearch.js"></script>
	<!-- Form plugins -->
	<script type="text/javascript"
			src="../resources/plugins/forms/uniform/jquery.uniform.min.js"></script>

	<!-- Table plugins -->

	<script src="../resources/plugins/tables/dataTables/jquery.dataTables.min.js"></script>
	<script type="text/javascript"
			src="../resources/plugins/tables/dataTables/TableTools.min.js"></script>
	<script type="text/javascript"
			src="../resources/plugins/tables/dataTables/ZeroClipboard.js"></script>
	<script type="text/javascript"
			src="../resources/plugins/tables/responsive-tables/responsive-tables.js"></script>
	<!-- Make tables responsive -->
	<script type="text/javascript" src="../resources/plugins/misc/animated-progress-bar/jquery.progressbar.js"></script>
	<!-- Init plugins -->
	<script type="text/javascript" src="../resources/js/main.js"></script>
	<script type="text/javascript" src="../resources/js/elements.js"></script><!-- Init plugins only for page -->
	<!-- Core js functions -->
	<script type="text/javascript" src="../resources/js/datatable.js"></script>
	<script type="text/javascript" src="../resources/js/functionCliente.js"></script>


	<!-- Init plugins only for page -->
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3560057-23', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>