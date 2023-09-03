<?php

    require_once "../controllers/verif_session.php";

    if(isset($_POST['n_nome_ev'])){
        require '../assets/db/connect.php';
        
        $nome_evento = $_POST["n_nome_ev"];
        $descricao = $_POST["n_descricao"];
        $data_inicio = $_POST["n_data_inicio"];
        $data_fim = $_POST["n_data_fim"];
        $cep = $_POST["n_cep"];
        $rua = $_POST["n_rua"];
        $bairro = $_POST["n_bairro"];
        $cidade = $_POST["n_cidade"];
        $estado = $_POST["n_estado"];
        
        echo "sim";

        if(isset($_FILES["n_img"])){

            $img_evento = $_FILES['n_img'];

            /* Declaração do novo caminho da imagem e criação do uniqid() para mudar o local da imagem, 
            do local temporário ao source do servidor */
            $pasta = "../assets/img/img_eventos/";
            $novoNomeImg = uniqid();
            $extensaoImg = strtolower(pathinfo($img_evento['name'], PATHINFO_EXTENSION));
    
            /* Condições caso o upload sofra um erro, caso a extensão seja a errada, ou, caso a imagem seja muito pesada */
            if($img_evento['error']){
    
                ?>
                <script>
                    alert("Falha ao enviar o arquivo...");
                    javascript:history.back();
                </script>
                <?php
                die();
            }
    
            if($extensaoImg != 'jpg' && $extensaoImg != 'png'){
                ?>
                <script>
                    alert("Extensão não permitida...(Somente .jpg ou .png)");
                    javascript:history.back();
                </script>
                <?php
                die();
            }
    
            if($img_evento['size'] > 4194304){
                ?>
                <script>
                    alert("Arquivo maior que 4MB...");
                    javascript:history.back();
                </script>
                <?php
                die();
            }

            /* Concatenando o novo caminho da imagem. */
            $path_img = $pasta . $novoNomeImg . "." . $extensaoImg;    
            move_uploaded_file($img_evento['tmp_name'], $path_img);

        }else{
            $path_img = "../assets/img/img_eventos/generico.png";
        }

        mysqli_query($conexao, "INSERT INTO 
        `eventos`(`nome_ev`, `descricao`, `data_inicio`, `data_fim`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `path_img`, `usuario_id`) 
        VALUES ('$nome_evento','$descricao','$data_inicio','$data_fim','$cep','$rua','$bairro',
        '$cidade','$estado','$path_img','".$_SESSION['id']."')");

        ?>
        <script>
            alert("Cadastrado com sucesso!");
            window.location.replace("../views/perfil.php?id=<?php echo $_SESSION['id']; ?>");
        </script>
        <?php

        mysqli_close($conexao);
    }
?>