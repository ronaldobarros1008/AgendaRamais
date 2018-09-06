<?php

//require_once 'classes/Usuarios.php';
function __autoload($class) {
    require_once 'classes/' . $class . '.php';
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ramais Agenda</title>        
        <link href="css/bootstrap.min.css" rel="stylesheet">        
    </head>
    <body onload="document.form.reset()>
        <div class="container">
            <header>                
                <div class="well">
                    <h1 class="text-center">Agenda de Ramais  <span class="text-primary">Ronaldo Barros</span></h1>
                </div>
            </header>

            <div style="margin: 100px 0; text-align: center">
                <?php
                $pessoa = new PessoasDAO();

                // Cadastro de Pessoa
                if (isset($_POST['cadastrar'])):

                    $nome = $_POST['nome'];
                    $ramal = $_POST['ramal'];
                    $email = $_POST['email'];

                    $pessoa->setNome($nome);
                    $pessoa->setRamal($ramal);
                    $pessoa->setEmail($email);

                    if ($pessoa->insert()) {

                        echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Incluido com sucesso!!! </div>';
                    } else {
                        echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Erro ao alterar!!! </div>';
                    }
                endif;

                //exclusao de Pessoa
                if (isset($_POST['excluir_ui'])) {

                    $id = $_POST['id_ui'];

                    $pessoa->delete($id);
                }

                // Alterar 
                if (isset($_POST['alterar'])) {
                    $id = $_POST['id_uii'];
                    $nome = $_POST['nome'];
                    $ramal = $_POST['ramal'];
                    $email = $_POST['email'];

                    $pessoa->setNome($nome);
                    $pessoa->setRamal($ramal);
                    $pessoa->setEmail($email);

                    $pessoa->update($id);
                }
                ?>

                <legend>Formulário Cadastrar</legend>
                <form class="form-inline" method="post" name="form">
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-user"></span>
                        <input name="nome" type="text" class="form-control" required >
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-phone-alt"></span>
                        <input name="ramal" id="fone" type="text" class="form-control" required >
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-envelope">@</span>
                        <input name="email" type="email" class="form-control" required>
                    </div>

                    <input name="cadastrar" type="submit" class="btn btn-success" value="Cadastrar">
                </form>
            </div>
            <!-- Fim form cadastrar -->       


            <!-- Inicio da tabela -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">
                        <th>Nome</th>
                        <th>Ramal</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pessoa->findAll() as $key => $value) { ?>          
                        <tr>
                            <td> <?php echo $value->nome; ?> </td>
                            <td> <?php echo $value->ramal; ?> </td>
                            <td> <?php echo $value->email; ?> </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="load_modal('<?php echo $value->nome; ?>', '<?php echo $value->ramal; ?>', '<?php echo $value->email; ?>', <?php echo $value->id; ?>);">
                                    Alterar</button>                            
                                <form class="form_excluir" method="post" style="float: left; margin: 0 15px;">
                                    <input name="id_ui" type="hidden" value="<?php echo $value->id; ?>"/>
                                    <button name="excluir_ui" type="submit" onclick="fn_excluir();" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>                    
                    <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

            <!-- Modal para alterar Usuário -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Alterando Usuário</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline" method="post">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                    <input id="text_nome" name="nome" type="text" class="form-control" required value="" >
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                    <input id="text_ramal" name="ramal" type="text" class="form-control" >
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input id="text_email" name="email" type="email" class="form-control">
                                </div>

                                <input id="id_uii" name="id_uii" type="hidden" value=""/>
                                <input name="alterar" type="submit" class="btn btn-warning" value="Alterar">
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- fim Modal -->          

        </div>    

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>
    <script src="js/mask.js"></script>

</body>
</html>
