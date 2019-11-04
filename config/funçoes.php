<?php

    function cadastrarProduto($nomeProduto,$descProduto,$qtdProduto,$imgProduto,$precoProduto){

    $nomeArquivo = "produto.json";
    // Verificando se o arquivo existe.
    if(file_exists($nomeArquivo)){
       // Abrindo e pegando informações do arquivo json.
       $arquivo = file_get_contents($nomeArquivo);
       // Transformar o json em array (decode).
       $produtos = json_decode($arquivo,true);

            // Verificando se o arquivo, apesar de existir, está vazio.
            if($produtos==[]){

            // Adicionando novo produto na estrutura do array associativo. Se não existir produto, o id inicia em 1.
            $produtos[] = ["id"=>1,"nomeProduto"=>$nomeProduto, "descProduto"=>$descProduto, "qtdProduto"=>$qtdProduto, "imgProduto"=>$imgProduto, "precoProduto"=>$precoProduto];

                //Fechando if e abrindo else (caso o arquivo não esteja vazio, o id do produto será dinâmico e deve somar 1 ao último id cadastrado.
                }else{
                    // Função para percorrer o último produto do array associativo.
                    $ultimoProduto = end($produtos);
                    // Somando 1 ao último id encontrado.
                    $incrementandoId = $ultimoProduto["id"] + 1;

                    // var_dump($incrementandoId);
                    // exit;
                    // Na etiqueta id, coloco a variável que soma 1 a última posição.
                    $produtos[] = ["id"=>$incrementandoId,"nomeProduto"=>$nomeProduto,"descProduto"=>$descProduto, "qtdProduto"=>$qtdProduto, "imgProduto"=>$imgProduto, "precoProduto"=>$precoProduto];
                }

       // Colocando   arquivo alterado em formato json
       $json = json_encode($produtos);
       // Salvando os arquivos no produtos.json. Estrutura - primeiro nome do arquivo, depois o encode (variável que faz o encode).
       $deuCerto = file_put_contents($nomeArquivo,$json);

    }else{
        // Aqui declaramos a estrutura do array, vazio ainda, para depois adicionar elementos dentro dele (é possível já fazer tudo em uma linha, então ficaria: $produtos = [["nome"=>$nomeProduto, "preco"=>$precoProduto, "img"=>$imgProduto, "descricao"=>$descricaoProduto]];)
        $produtos = [];
        //faz o mesmo que array_push:
        // o nome da etiqueta tem que ser o mesmo que chamo lá no form; o nome da variável é a mesma definida na function
        $produtos[] = ["id"=>1,"nomeProduto"=>$nomeProduto, "descProduto"=>$descricaoProduto, "qtdProduto"=>$qtdProduto, "imgProduto"=>$imgProduto, "precoProduto"=>$precoProduto];
        // Tranformando o array associativo em json.
        $json = json_encode($produtos);
        // Salvando os arquivos no produtos.json.
        $deuCerto = file_put_contents($nomeArquivo,$json);

    }
}

?>
