<?php
//Conexão
include_once '../../model/db_connect.php';
//Header
include_once '../../view/includes/header.php';

if(isset($_GET['user'])) {
    $idusuario = $_GET['user'];
}
?>

<link type="text/css" rel="stylesheet" href="stylecard.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="display: flex; justify-content: center; width: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Novo Usuário</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="../../model/dao/usuario/create.php" method="POST">
                            <input type="hidden" name="idusuario" value="<?php echo $idusuario?>">

                            <div class="form-group">
                                <label for="inputName">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Login</label>
                                <input type="text" class="form-control" id="login" name="login">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Senha</label>
                                <input type="text" class="form-control" id="senha" name="senha">
                            </div>

                            <div class="form-group">
                                <label for="estadolist">Estado: </label>
                                <select class="form-control custom-select" name="estadolist">
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="usertypelist">Selecione tipo de Usuário: </label>
                                <select class="form-control custom-select" name="usertypelist">
                                <option value="">-- Selecione --</option>


                                    <?php
                                $sql="SELECT * FROM TIPOUSUARIO";
                                $res=mysqli_query($connect, $sql);

                                while ($posicao=mysqli_fetch_row($res)) {
                                    $vnome=$posicao[1];
                                    $vid=$posicao[0];
                                    echo "<option value=$vid>$vnome</option>";
                                }
                            ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="usuariolista.php?user=<?php echo $dados['IDUSUARIO'] ?>"
                                        class="btn btn-secondary">Voltar</a>
                                    <input type="submit" value="Cadastrar" class="btn btn-success float-right"
                                        name="btn-cadastrar-usuario">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>

<?php
//Footer
include_once '../../view/includes/footer.php';
?>