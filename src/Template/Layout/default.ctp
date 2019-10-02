<?php
//$userA = $this->request->Session()->read('Auth');
/* $app = new Ratchet\App('localhost', 80);
  $app->route('/chat', new MyChat);
  $app->route('/echo', new Ratchet\Server\EchoServer, array('*'));
  $app->run(); */

/*

 * $utype: são os acessos
 * 0 = aluno
 * 1 = professor
 * 2 = diretor de federação
 * 3 = admin geral sistema
  */
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
        $x = substr($_SERVER['HTTP_USER_AGENT'], 0, strlen($_SERVER['HTTP_USER_AGENT']));
        /* if (strpos($x, 'Firefox') != '')
          {
          echo '<style>'
          . '.row {'
          . '-moz-transform: scale(0.8);'
          . '}</style>';
          }
          else
          { */
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
// }
        ?>


        <meta name="author" content="Konfido">

        <title>Knockdown - Dashboard</title>
        <?= $this->Html->css('base.css') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('bootstrap-social.css') ?>
        <?= $this->Html->css('metisMenu.min.css') ?>
        <?= $this->Html->css('timeline.css') ?>
        <?= $this->Html->css('sb-admin-2.css') ?>



        <?= $this->Html->css('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css') ?>
        <?= $this->Html->css('https://cdn.datatables.net/responsive/2.2.0/css/responsive.dataTables.min.css') ?>
        <?= $this->Html->css('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css') ?>
        <?= $this->Html->css('https://cdn.datatables.net/responsive/2.2.0/css/responsive.bootstrap.min.css') ?>
        <?= $this->Html->css('https://cdn.datatables.net/colreorder/1.4.1/css/colReorder.dataTables.min.css') ?>
        <?= $this->Html->css('https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css') ?>

        <?= $this->Html->css('treeview.css') ?>
        <?= $this->Html->css('font-awesome.min.css') ?>

        <?= $this->Html->css('owl.carousel.min.css') ?>
        <?= $this->Html->css('owl.theme.default.min.css') ?>

        <?= $this->Html->css('bootstrap-datetimepicker.min.css') ?>


        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


        <!-- jQuery -->
        <?= $this->Html->script('jquery.min.js') ?>


        <!-- Bootstrap Core JavaScript -->
        <?= $this->Html->script('bootstrap.min.js') ?>

        <!-- datatable -->
        <?= $this->Html->script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') ?>
        <?= $this->Html->script('https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js') ?>
        <?= $this->Html->script('https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js') ?>
        <?= $this->Html->script('https://cdn.datatables.net/responsive/2.2.0/js/responsive.bootstrap.min.js') ?>
        <?= $this->Html->script('https://cdn.datatables.net/colreorder/1.4.1/js/dataTables.colReorder.min.js') ?>
        <?= $this->Html->script('https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js') ?>
        <?= $this->Html->script('https://cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js') ?>
        <?= $this->Html->script('https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js') ?>
        <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') ?>
        <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js') ?>
        <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js') ?>
        <?= $this->Html->script('https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js') ?>
        <?= $this->Html->script('https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js') ?>
        <!-- Morris Charts JavaScript -->

        <!--<?= $this->Html->script('raphael-min.js') ?>
        <?= $this->Html->script('morris.min.js') ?>
        <?= $this->Html->script('morris-data.js') ?>-->


        <!-- Custom Theme JavaScript -->
        <?= $this->Html->script('sb-admin-2.js') ?>
        <?= $this->Html->script('jquery.maskedinput.min.js') ?>
        <?= $this->Html->script('jquery.mask.js') ?>



        <!-- CHARTS -->
        <?= $this->Html->script('highcharts.js') ?>
        <?= $this->Html->script('exporting.js') ?>
        <?= $this->Html->script('offline-exporting.js') ?>

        <!-- OWL CARROUSSEL -->
        <?= $this->Html->script('owl.carousel.min.js') ?>


        <!-- Sorting 
        <?= $this->Html->script('jquery-latest.js') ?>
        <?= $this->Html->script('jquery.tablesorter.js') ?>-->
        <!-- Metis Menu Plugin JavaScript -->
        <?= $this->Html->script('metisMenu.min.js') ?>
        <?= $this->Html->script('round.js') ?>

        <?= $this->Html->script('bootstrap-datetimepicker.min.js') ?>
        <?= $this->Html->script('locales/bootstrap-datetimepicker.pt-BR.js') ?>
        <!--VALIDADORES -->
        <?php
        echo $this->Html->script('valida_cpf_cnpj.js')
        ?>

        <!-- editor WYSIWYG -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>



        <!-- Theme included stylesheets -->
        <link href="//cdn.quilljs.com/1.2.3/quill.snow.css" rel="stylesheet">
        <link href="//cdn.quilljs.com/1.2.3/quill.bubble.css" rel="stylesheet">

        <script>
            var xmlhttp;
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else
            {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            

        </script>

        <style>
            *
            {
                font-family: 'Roboto', sans-serif;
            }
            .prof
            {
                width: 55px; 
                height: 55px; 
                margin-left: 10px;
                margin-top: -40px;
            }
            .logo{
                width: auto; 
                height: 80px;
                margin-left: 110px; 
                margin-top: -10px;
            }
            @media(min-width:768px) {
                .prof
                {
                    width: 55px; 
                    height: 55px; 
                    margin-left: 35px; 
                    margin-top: -10px;
                }
                .logo{
                    width: auto; 
                    height: 62px; 
                    margin-left: 35px; 
                    margin-top: -10px;
                }
            }

        </style>

    </head>

    <body >

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'Dashboards', 'action' => 'index']) ?>"> <?= $this->Html->image('logo.png', ['class' => 'logo']) ?></a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                            <?php
                            /* if ($picx->isEmpty())
                              { */
                            echo $this->Html->image('defaultprof.jpg', ['class' => 'prof',]);
                            /* }
                              else
                              {
                              foreach ($picx as $px)
                              {
                              $desc = $px->description;
                              $utype = $px->type;
                              $archive = $px->archive;
                              }
                              echo '<img alt="' . $desc . '" src="data:' . $utype . ';base64,' . $archive . '" class="prof" />';
                              } */
                            ?> <i class="fa fa-caret-down"></i> 
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'aboutme', $uid]) ?>"><i class="fa fa-user fa-fw"></i> Ver Perfil</a>

                            <li class="divider"></li>
                            <li>

                                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'Dashboards', 'action' => 'index']) ?>"><i class="fa fa-home fa-fw"></i> In&iacute;cio</a>                            
                            </li>
                            <?php
                            if ($utype >= 1)
                            {
                                ?>
                                <li>

                                    <a href="#"><i class="fa fa-gears fa-fw"></i>&nbsp;Administração<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level" >                                        

                                        <li>
                                            <a href="#">Cadastros<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li>                                                
                                                    <?php
                                                    if ($utype >= 2)
                                                    {
                                                        echo $this->Html->link(__('Federações'), ['controller' => 'associations', 'action' => 'index']);
                                                    }
                                                    ?>
                                                </li>
                                                <li>                                                
                                                    <?php
                                                    if ($utype == 2)
                                                    {
                                                        echo $this->Html->link(__('Academias'), ['controller' => 'academies', 'action' => 'index']);
                                                    }
                                                    ?>
                                                </li>
                                                <li>

                                                    <?php
                                                    if ($utype >= 1)
                                                    {
                                                        echo $this->Html->link(__('Usuários'), ['controller' => 'Users', 'action' => 'index']);
                                                    }
                                                    ?>
                                                </li>
                                                <li>

                                                    <?php
                                                    if ($utype == 2)
                                                    {
                                                        echo $this->Html->link(__('Campeonatos'), ['controller' => 'championships', 'action' => 'index']);
                                                    }
                                                    ?>
                                                </li>
                                                <li>

                                                    <?php
                                                    if ($utype == 2)
                                                    {
                                                        echo $this->Html->link(__('Patrocinadores'), ['controller' => 'sponsors', 'action' => 'index']);
                                                    }
                                                    ?>
                                                </li>
                                                <li>

                                                    <?php
                                                    if ($utype == 2)
                                                    {
                                                        echo $this->Html->link(__('Regras'), ['controller' => 'rules', 'action' => 'index']);
                                                    }
                                                    ?>
                                                </li>
                                                <li>

                                                    <?php
                                                    if ($utype == 2)
                                                    {
                                                        echo $this->Html->link(__('Competições'), ['controller' => 'competitions', 'action' => 'index']);
                                                    }
                                                    ?>
                                                </li>

                                            </ul>
                                        </li>                                

                                    </ul>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>



                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <!--<div class="col-lg-12">
                        <h1 class="page-header"><?= $this->fetch('title') ?></h1>
                    </div>-->
                    <!-- /.col-lg-12 -->
                    <br>
                </div>
                <!-- /.row -->           


                <div class="row">
                    <div class="col-lg-12"> 
                        <?= $this->Flash->render() ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12"> 
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <footer style="color: #000">
            <div class="col-lg-12" align="center" >
                <span>&copy; <?= date('Y') ?> - Knockdown 1.0 - 
                    <a href="http://cakephp.org/" target="_blank" style="text-decoration: none">Desenvolvido em CakePHP</a>
                </span>
            </div>
        </footer>
    </body>
    <script>

        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],

            [{'header': 1}, {'header': 2}], // custom button values
            [{'list': 'ordered'}, {'list': 'bullet'}],
            [{'script': 'sub'}, {'script': 'super'}], // superscript/subscript
            [{'indent': '-1'}, {'indent': '+1'}], // outdent/indent
            [{'direction': 'rtl'}], // text direction

            [{'size': ['small', false, 'large', 'huge']}], // custom dropdown
            [{'header': [1, 2, 3, 4, 5, 6, false]}],

            [{'color': []}, {'background': []}], // dropdown with defaults from theme
            [{'font': []}],
            [{'align': []}],
            ['link', 'image', 'video'],
            ['clean']                                         // remove formatting button
        ];

        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow',
            placeholder: 'Escreva aqui...'
        });


        function desc(d)
        {
            //alert(d);
            // Populate hidden form on submit

            document.getElementById(d).value = quill.root.innerHTML;
            //return false;

        }

    </script>
</html>
