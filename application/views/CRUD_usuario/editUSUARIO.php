<!DOCTYPE html>
<html>
    <head>
        <title>UNIFUNDING</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css" >
        <link rel="stylesheet" href="/assets/css/estilo.css">
    </head>
    <body> 
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">     
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/usuario/">UNIFUNDING</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li ><a href="/usuario/">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Módulos de Usuário<b class="caret"></b></a> 
                            <ul class="dropdown-menu">
                                <li><a href="#">Administrativo</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Usuário Público</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Gestor de Programas</a></li> 
                                <li class="divider"></li>
                                <li><a href="#">Avaliador de Projetos</a></li> 
                                <li class="divider"></li>
                                <li><a href="#">Financiador Acadêmico</a></li> 
                            </ul>   
                        </li>
                        <li class="active"><a href="/usuario/consultar">Listar usuários</a></li>
                        <li><a href="#">Usuários Online</a></li>
                        <li><a href="#">Usuários Excluídos</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Digite um usuário a ser buscado">
                        </div>
                        <button type="submit" class="btn btn-default">Procurar Usuário</button>
                    </form>
                </div>
            </div>
        </nav> <!-- Fim da barra de navehação superior-->
        <!-- Inicio de um CRUD --> 
        <div id="main" class="container-fluid">
            <h3 class="page-header">Inserir Usuário</h3>
            
            <form action="/usuario/alterar/" method="POST">
                 <?php
                    if(isset($usuario)){
                        foreach ($usuario->result() as $user) {
                ?>
                <!-- area de campos do form -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <input name="login" class="form-control" type="hidden" class="form-control" id="campo1" value='<?php echo $user->login; ?>'>
                        <label for="campo3">Digite seu email:</label>
                        <input name="email" type="text" class="form-control" id="campo3" value='<?php echo $user->email; ?>'>
                        
                    </div>

                    <div class="form-group col-md-3">
                        <fieldset>
                            <legend>Confirmação de Senha </legend>
                            <input name="senha" class="form-control" type="password" placeholder="Senha" id="password" required value='<?php echo $user->senha; ?>'><br>
                            <input name="senha" class="form-control" type="password" placeholder="Confirme Senha" id="confirm_password" required value='<?php echo $user->senha; ?>'>
                        </fieldset>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="campo4">Digite a categoria do usuário:</label>
                        <input name="categoria" type="text" class="form-control" id="campo4" value='<?php echo $user->categoria; ?>'>
                    </div>
                   
                    <div class="form-group col-md-3">
                        <h3>Localização</h3>
                            <label><span>País:</span>
                                <input class="form-control" name="pais" id="pais" value='<?php echo $user->pais; ?>'></input>
                            </label>
                            <label><span>Estado:</span>
                                <input class="form-control" name="estado" id="estado" value='<?php echo $user->estado; ?>'></input>
                            </label>
                            <label><span>Cidade:</span>
                                <input class="form-control" name="cidade" id="cidade" value='<?php echo $user->cidade; ?>'></input>
                            </label>
                            <label><span>Endereço:</span>
                                <input class="form-control" name="endereco" id="bairro" value='<?php echo $user->endereco; ?>'></input>
                            </label>
                            <br />
                            <label>
                     </div>
                    <?php
                        }
                    }
                    ?>
            </div>
                <!-- Fim de todos os campos do form -->
                <hr/>
                <div id="actions" class="row">
                    <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Atualizar Usuário</button>
                            <a href="/usuario/" class="btn btn-default">Cancelar registro</a>
                    </div>
                </div>
                    </div>
                </div>
                <!-- Nova linha de campos-->
            </form>
                    
                    <div class="form-group col-md-4">
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#bairro').multiselect({
                                    maxHeight: 10000
                                });
                            });
                        </script>
                        
                    </div>

                    <!-- Aqui está a criação da parte de baixo do site, footer -->
                    <footer>	
                        <div class="container">
                            <div class="row">                       
                                <div id="linksImportantes" class="col-xs-12 col-sm-3 col-md-3">		
                                    <h4> Para novas ideias de projetos e/ou sugestões:</h4>
                                    <ul>                                                   
                                        <li><a href="#">facebook.com/gsilvaborges</a></li>
                                    </ul>
                                </div> <!-- Aqui em cima CRUD de links que podem ser armazenados e retirados -->
                                <div id="redesSociais" class="col-xs-12 col-sm-3 col-md-3">
                                    <h4> Contate-nos</h4>
                                    <ul>
                                        <li> <a href="#">unifei.edu.br</a></li>
                                        <li><a href="#">UNIFEI/Google+</a></li> 
                                    </ul>
                                </div> <!-- Redes Sociais -->
                                <div id="logoFooter" class="col-xs-12 col-sm-3 col-md-3 col-sm-offset-3 col-md-offset-3"> 
                                    <h2>Crowdfunding UNIFEI</h2>
                                </div> <!-- Logo abaixo foi feito o rodapé da Outlet -->
                            </div>
                        </div> 
                    </footer>
                    <div class="copyright">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>&copy; Desenvolvedor Guilherme Borges.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </body>
                    </html>