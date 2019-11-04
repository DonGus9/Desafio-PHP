

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
    <?php include_once 'header.php'; ?>
    <body>
      <main>
          <div class="row mt-5">
              <a href="cadastro-produto.php"><button class="ml-3">Voltar para lista de produtos</button></a>
          </div>
          <div class="row mt-5">
              <?php if(isset($_GET['id'])){ ?>
                  <?php
                  foreach($produtos as $produto){
                      if($_GET["id"]==$produto["id"]){
                  ?>
                  <!-- Exibindo imagem do produto -->
                  <div class="col-5">
                      <img src="<?php echo $produto["imgProduto"];?>" class="img-fluid">
                  </div>
                  <!-- Exibindo detalhes do produto -->
                  <div class="col-7 pl-5">
                      <div class="row flex-column">
                          <h1><?php echo $produto["nomeProduto"];?></h1>
                          <p class="topico-produto">Descrição</p>
                          <h3 class="descricao-produto"><?php echo $produto["descProduto"];?></h3>
                      </div>
                      <div class="row">
                          <div class="col-6 pl-0">
                              <p class="topico-produto">Quantidade em estoque</p>
                              <h3 class="descricao-produto"><?php echo $produto["qtdProduto"];?></h3>
                          </div>
                          <div class="col-6 pl-0">
                              <p class="topico-produto">Preço</p>
                              <h3 class="descricao-produto-preco">R$ <?php echo $produto["precoProduto"];?></h3>
                          </div>
                      </div>
                  </div>
                  <!-- Fechando if -->
                  <?php } ?>
                  <!-- Fechando foreach -->
                  <?php } ?>
              <!-- Else do "if isset GET" -->
              <?php }else{?>
              <h2>Nenhum produto foi selecionado.</h2>
              <!-- Fechando else -->
              <?php } ?>

          </div>
      </main>
  </body>
</html>
