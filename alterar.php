<?php

  try {
   $conexao = mysqli_connect("localhost","id10375087_luiz","luiz136136","id10375087_cadpessoa");
                             //Servidor do Banco, Usuario Banco, Senha Banco, Nome do Banco

   $codigo = $_POST['codigo'];
   $nome = $_POST['nome'];
   $idade = $_POST['idade'];
   $sexo = $_POST['sexo'];
   $endereco = $_POST['endereco'];
   $cpf = $_POST['cpf'];


    if($_FILES['foto']['name'] != ''){
        $test = explode('.', $_FILES['foto']['name']);
        $extensao = end($test);
    if($extensao == "jpg" || $extensao == "png") {
        $nome = rand(100, 9999).'.'.$extensao;
        $local = 'foto/'.$nome;
        move_uploaded_file($_FILES['foto']['tmp_name'], $local);
    }
}

    $query = "UPDATE tb_pessoa SET
    nm_nome = '$nome',
    nr_idade = '$idade',
    ds_sexo = '$sexo',
    ds_endereco = '$endereco',
    ds_cpf = '$cpf',
    uri_imagem = '$local'
    WHERE cd_pessoa = $codigo";

    mysqli_query($conexao, $query);
    echo "Registro alterado";

    } catch (Exception $e) {
           echo "Erro ao deletar: ".$e;
}

?>
