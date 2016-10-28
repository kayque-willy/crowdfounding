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
                        <li class="active"><a href="/usuario/">Home</a></li>
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
                        <li ><a href="/usuario/consultar">Listar usuários</a></li>
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
        <div class="wrapper" role="main">
            <div class="container">
                <div class="row">
                    <div id="conteudo" class="col-xs-12 col-sm-8 col-md-9">
                        <div class="artigo" role="article">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <a href="#" title="">
                                        <img src="https://lh3.googleusercontent.com/-VFDZo_k2Mtk/AAAAAAAAAAI/AAAAAAAAAAA/MEYfSQ8EF7I/photo.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <h2><a href="#">Usuário Público</a></h2>
                                    <p>
                                        Nome:  Guilherme Silva Borges
                                        Data Nascimento: 08/12/94
                                        Login: GuilhermeSB
                                        Senha: 171294
                                        CPF:   070.799.016-50
                                        País: BR -> Cidade: Itajubá -> Estado: MG -> Endereço: xxxxx
                                    </p>
                                    <a href="#">https://www.facebook.com/gsilvaborges</a>
                                </div>
                            </div>
                        </div>
                        <div class="artigo" role="article">
                            <div class="row">                                                 
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <a href="#" title="">  
                                        <img src="http://st2.depositphotos.com/1104517/9917/v/450/depositphotos_99176964-Vector-user-icon-of-man.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <h2><a href="#">Usuário Administrativo</a></h2>
                                    <p>
                                        Nome: Egon Muller
                                        Data Nascimento: 10/03/70
                                        Login: MullerEAD
                                        Senha: 5722588
                                        CPF:   050.678.020-22
                                        País: BR -> Cidade: Itajubá -> Estado: MG -> Endereço: xxxxx
                                    </p>
                                    <a href="#">https://www.facebook.com/egon.muller.9?fref=ts</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CRUD e-mail de noticias, Barra Lateral -->
                    <div id="sidebar" class="col-xs-12 col-sm-4 col-md-3"> 
                        <div class="widget"> 
                            <h3>Receba as novidades no E-mail</h3>
                            <form class="form" role="form">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail2">Entre com seu email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Entre com seu email"> 
                                </div>
                                <button type="submit" class="btn btn-success">Cadastrar </button>
                            </form>
                        </div>
                        <div class="widget">
                            <h3>Financiadores e Apoio</h3>
                            <ul>
                                <li><a href="">UNIFEI: unifei.edu.br</a></li>
                                <li><a href="">CATS: familiacats.com.br</a></li>
                            </ul>
                        </div>
                    </div>

                </div>	
            </div>			
        </div>
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
