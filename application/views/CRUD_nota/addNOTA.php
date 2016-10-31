<!DOCTYPE html>
<html>

<head>
    <title>UNIFUNDING</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/estilo.css">
</head>

<body>
    <!--Header-->
    <?php $this->load->view("CRUD_projeto/headerPROJETO");?>
    <!--Header-->
    <div class="section">
        <div class="container">
            <h3 class="page-header">Avaliar projeto</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href="<?php echo base_url('/avaliacao/cadastrar'); ?>">
                                    <li class="list-group-item list-group-item-info">Avaliar projeto</li>
                                </a>
                                <a href="<?php echo base_url('/avaliacao/consultar'); ?>">
                                    <li class="list-group-item">Consultar avaliações</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <!--Formulario de cadastro-->
                        <form action="<?php echo base_url('/avaliacao/avaliar'); ?>" method="POST" class="form-horizontal" role="form">
                            <!-- ID da avaliação -->
                            <input type="hidden" name="id_avaliacao" value="<?php echo $avaliacao->id ?>">
                            <!-- ID da avaliação -->
                            <!-- Informaçõse do projeto -->
                            <legend>Avaliação <?php echo $avaliacao->projetoNome ?></legend><br>
                            <label>Categoria do projeto: <?php echo $avaliacao->projetoCategoria ?></label><br>
                            <label>Avaliador: <?php echo $avaliacao->codAvaliador ?> | <?php echo $avaliacao->nomeAvaliador ?></label>
                            <!-- Informaçõse do projeto -->
                            <!--Critérios-->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Criterio</th>
                                        <th>Peso</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                 if(isset($criterios)){
                                    foreach ($criterios->result() as $criterio){
                                 ?>
                                    <tr>
                                        <td><?php echo $criterio->criterio ?></td>
                                        <td><?php echo $criterio->peso ?></td>
                                        <td>
                                            <input required name="id_criterio[]" type="hidden" value="<?php echo $criterio->id ?>">
                                            <input required name="nota_criterio[]" type="number" class="form-control" placeholder="Nota">
                                        </td>
                                    </tr>
                                <?php
                                    }
                                 }
                                ?>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td><input type="number" class="form-control" id="criterio" placeholder="Total"></td>
                                </tr>
                                </tbody>
                            </table>
                            <!--Critérios-->
                            <div class="form-group hidden-xs has-feedback">
                                <div class="col-sm-10">
                                    <label>Sugestões</label>
                                    <textarea required name="sugestoes" class="form-control" placeholder="Sugestões para melhoria" rows="5" style="resize:none;" maxlength="250"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar avaliação</button>
                        </form>
                        <!--Formulario de cadastro-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!--Footer-->
    <?php $this->load->view("footer");?>
    <!--Footer-->
</body>

</html>