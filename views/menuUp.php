<?php

include_once '../controllers/Session.php';

$sessao = new Session();

?>
<div id="qLoverlay"></div>
    <div id="qLbar"></div>
        
    <div id="header">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="vHome.php"><img src="../resources/images/logo-econsiste.png" style="padding-top: 6px;padding-right: 10px;"/></a>
            </div> 
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <?php
                        if($sessao->get("perfil") == 1) {
                            ?>
                            <li class="dropdown">
                                <a href="dashboard#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="icon16 icomoon-icon-cog"></span><span class="txt"> Administração</span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="menu">
                                        <ul>
                                            <li><a href="vAdminUser.php"><span
                                                        class="icon16 icomoon-icon-user-2"></span>Usu&aacuterio</a></li>
                                            <li><a href="vAdminCliente.php"><span
                                                        class="icon16 icomoon-icon-attachment"></span>Cadatro de Cliente</a>
                                            </li>
                                      <!--      <li><a href="dashboard#"><span class="icon16 icomoon-icon-file"></span>Jornada
                                                    de Trabalho</a></li>-->
                                 <!--           <li><a href="dashboard#"><span
                                                        class="icon16  icomoon-icon-mail-send"></span>Configura&ccedil&otildees
                                                    de E-mail</a></li>
                                            <li><a href="dashboard#"><span class="icon16  icomoon-icon-support"></span>Importa&ccedil&atildeo
                                                    de Chamado</a></li>
                                            <li><a href="dashboard#"><span class="icon16 icomoon-icon-coin"></span>Or&ccedilamento</a>
                                            </li>
                                            <li><a href="dashboard#"><span class="icon16 icomoon-icon-folder"></span>Base
                                                    de Contratos</a></li>
                                            <li><a href="dashboard#"><span class="icon16   icomoon-icon-command"></span>Workflow
                                                    de Chamado</a></li> -->
                                            <li><a href="vAdminEmpresa.php"><span
                                                        class="icon16 icomoon-icon-office"></span>Empresa</a></li>
                                      <!--      <li><a href="dashboard#"><span class="icon16  icomoon-icon-calendar"></span>Feriados</a>
                                            </li>
                                            <li><a href="dashboard#"><span class="icon16  icomoon-icon-cone"></span>Kambam</a>
                                            </li>
                                            <li><a href="dashboard#"><span
                                                        class="icon16 icomoon-icon-insert-template"></span>Scrum</a>
                                            </li>
-->
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        }
                    ?>
                 <!--   <li class="dropdown">
                        <a href="dashboard#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="icon16 icomoon-icon-envelop"></span><span class="txt">Mensagens</span><span class="notification">8</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="menu">
                                <ul class="messages">    
                                    <li class="header"><strong>Mensagens</strong></li>
                                    <li>
                                       <span class="icon"><span class="icon16 icomoon-icon-user-plus"></span></span>
                                        <span class="name"><a data-toggle="modal" href="dashboard#myModal1"><strong>Sammy Morerira</strong></a><span class="time">35 min ago</span></span>
                                        <span class="msg">I have question about new function ...</span>
                                    </li>
                                    <li>
                                       <span class="icon avatar"><img src="../resources/images/avatar.jpg" alt="" /></span>
                                        <span class="name"><a data-toggle="modal" href="dashboard#myModal1"><strong>George Michael</strong></a><span class="time">1 hour ago</span></span>
                                        <span class="msg">I need to meet you urgent please call me ...</span>
                                    </li>
                                    <li>
                                        <span class="icon"><span class="icon16 icomoon-icon-envelop"></span></span>
                                        <span class="name"><a data-toggle="modal" href="dashboard#myModal1"><strong>Ivanovich</strong></a><span class="time">1 day ago</span></span>
                                        <span class="msg">I send you my suggestion, please look and ...</span>
                                    </li>
                                    <li class="view-all"><a href="dashboard#">View all messages <span class="icon16 icomoon-icon-arrow-right-8"></span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                </ul>
              
                <ul class="nav navbar-right usernav">
               <!--     <li class="dropdown">
                        <a href="dashboard#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="icon16 icomoon-icon-bell"></span><span class="notification">3</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="menu">
                                <ul class="notif">
                                    <li class="header"><strong>Notifica&ccedil&atildeo</strong></li>
                                    <li>
                                        <a href="dashboard#">
                                            <span class="icon"><span class="icon16 icomoon-icon-user-plus"></span></span>
                                            <span class="event">1 User is registred</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard#">
                                            <span class="icon"><span class="icon16 icomoon-icon-bubble-3"></span></span>
                                            <span class="event">Jony add 1 comment</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard#">
                                            <span class="icon"><span class="icon16 icomoon-icon-new"></span></span>
                                            <span class="event">admin Julia added post with a long description</span>
                                        </a>
                                    </li>
                                    <li class="view-all"><a href="dashboard#">Ver todas as notifica&ccedil&atildeo <span class="icon16 icomoon-icon-arrow-right-8"></span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                    <li class="dropdown">
                        <a href="dashboard#" class="dropdown-toggle avatar" data-toggle="dropdown">
                            <img src="../resources/images/avatar.jpg" alt="" class="image" />
                            <span class="txt"><?php echo $sessao->get('Nome'); ?></span>
                       <!--     <b class="caret"></b> -->
                        </a>
                       <!-- <ul class="dropdown-menu">
                            <li class="menu">
                                <ul>
                                    <li><a href="dashboard#"><span class="icon16 icomoon-icon-user-plus"></span>Editar Perfil</a></li>
                                </ul>
                            </li>
                        </ul>-->
                    </li>
                    <li><a href="../controllers/LoginController.php?acao=logout"><span class="icon16 icomoon-icon-exit"></span><span class="txt"> Sair</span></a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </nav><!-- /navbar --> 

    </div><!-- End #header -->