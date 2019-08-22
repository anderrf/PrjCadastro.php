<?php

  try {
   $conexao = mysqli_connect("localhost","id10375087_luiz","luiz136136","id10375087_cadpessoa");
                             //Servidor do Banco, Usuario Banco, Senha Banco, Nome do Banco

    $codigo = $_POST['codigo'];

    $query = "SELECT * FROM tb_pessoa WHERE cd_pessoa = $codigo";

    $resultado = mysqli_query($conexao, $query);

    while($linha = mysqli_fetch_assoc($resultado)){

        $registro = array(
            'pessoa' => array(
              'codigo' => $linha['cd_pessoa'],
              'nome' => $linha['nm_nome'],
              'idade' => $linha['nr_idade'],
              'sexo' => $linha['ds_sexo'],
              'endereco' => $linha['ds_endereco'],
              'cpf' => $linha['ds_cpf'],
              'foto' => $linha['uri_imagem'],
            )

        );
    }
    echo json_encode($registro);

}catch (Exception $e){

    echo "Falha: " . $e;
