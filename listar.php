<?php

    try {
     $conexao = mysqli_connect("localhost","id10375087_luiz","luiz136136","id10375087_cadpessoa");
                               //Servidor do Banco, Usuario Banco, Senha Banco, Nome do Banco

      $query = "SELECT * FROM tb_pessoa ORDER BY cd_pessoa ASC";

      $resultado = mysqli_query($conexao, $query);

      $registro = array(
          'pessoa'=>array()
      );

      $i = 0;

      while($linha = mysqli_fetch_assoc($resultado)){
          $registro['pessoa'][$i] = array(
              'codigo' => $linha['cd_pessoa'],
              'nome' => $linha['nm_nome'],
              'idade' => $linha['nr_idade'],
              'sexo' => $linha['ds_sexo'],
              'endereco' => $linha['ds_endereco'],
              'cpf' => $linha['ds_cpf'],
              'foto' => $linha['uri_imagem']
          );
          $i++;
      }
      echo json_encode($registro);

  }catch (Exception $e){

      echo "Falha: " . $e;
}
