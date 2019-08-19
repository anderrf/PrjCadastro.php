<?php

  try {
   $conexao = mysqli_connect("localhost","id10375087_luiz","luiz136136","id10375087_cadpessoa");
                             //Servidor do Banco, Usuario Banco, Senha Banco, Nome do Banco

    $codigo = $_POST['codigo'];

    $query = "DELETE FROM tb_pessoa WHERE cd_pessoa = $codigo";

    mysqli_query($conexao, $query);

    echo "Registro removido com sucesso";

  } catch (\Exception $e) {
    echo "Erro ao deletar: " .$e;
  }

?>
