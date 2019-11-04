<?php

require_once 'config/funçoes.php';
//se o POST der vazio, ele retorna falso então não deixa cadastrar o produto, dá mensagem de erro
if($_POST) {
    //salvando o arquivo de imagem
    $nomeImg = $_FILES['imgProduto']['name'];
    $localTmp = $_FILES['imgProduto']['tmp_name'];
    $dataAtual = date("(d-m-y)");
    $caminhoSalvo = 'img/'.$dataAtual.$nomeImg;
    $deuCertoImagem = move_uploaded_file($localTmp, $caminhoSalvo);
    echo cadastrarProduto($_POST["nomeProduto"],$_POST["descProduto"], $_POST["qtdProduto"],$caminhoSalvo,$_POST["precoProduto"]);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <?php include_once("header.php"); ?>
    <main class="container">
        <div class="row">
            <div class="col-12 d-flex">
                <form action="" method="post" enctype="multipart/form-data" class="col-lg-4 bg-secondary">
                  <div class="col-12 bg-secondary m-3">
                    <h1>Cadastro de produto</h1>
                  </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nomeProduto" placeholder="Nome do produto" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="descProduto" placeholder="Descrição do produto" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="qtdProduto" placeholder="Quantidade do produto" required>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="imgProduto" placeholder="Imagem do produto" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="precoProduto" placeholder="Preço do produto"required>
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar produto</button>

                </form>
                <div class="container d-flex justify-content-start col-6">
                      <div class="row d-flex justify-content-center p-4 col-12">
                        <h4>Todos os Produtos</h4>
                      <?php if(isset($produtos)&&$produtos != []){
                         foreach ($produtos as $produto){?>
                           <div class="row col-12">
                             <table class="table table-hover">
                               <thead>
                                 <tr>
                                   <th>Nome</th>
                                   <th>Preço</th>
                                   <th>Descriçao</th>
                                   <th>Quantidade</th>
                             </tr>
                           </thead>
                             <tbody>
                               <tr>
                          <td><a href="pagina-produto.php?id=<?php echo $produto['id'] ?>"><?php echo $produto['nomeProduto']; ?></a></td>
                          <td>R$<?php echo $produto['precoProduto']; ?></td>
                          <td><?php echo $produto['descProduto']; ?></td>
                          <td><?php echo $produto['qtdProduto']; ?></td>
                        </tr>
                        </tbody>
                  </table>
                </div>
                    <?php } ?>
                  <?php }else{?>
                    <h2>Não há produtos mencionados!</h2>
                  <?php } ?>
                </div>
            </div>
        </div>

          </div>

        </div>
    </main>
</body>
</html>
