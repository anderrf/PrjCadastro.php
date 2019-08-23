<?php

    try {
        $conecta = mysqli_connect("localhost","id10375087_luiz","luiz136136","id10375087_cadpessoa");
                                  //Servidor do Banco, Usuario Banco, Senha Banco, Nome do Banco

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

        $query = "insert into tb_pessoa values (null, '$nome', '$idade', '$sexo', '$endereco', '$cpf', '$local');";

        mysqli_query($conecta,$query);
        echo "Cadastro realizado com sucesso";
    } catch (Exception $e) {
        echo "Erro ao cadastrar: ".$e;
    }

?>
