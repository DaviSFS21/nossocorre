<?php
    if(isset($_POST['n_titulo'])){
        require '../assets/db/connect.php';
        
        $titulo = $_POST["n_titulo"];
        $genero = $_POST["n_genero"];

        if(isset($_FILES["n_musica"])){

            $musica = $_FILES['n_musica'];

            /* Declaração do novo caminho da imagem e criação do uniqid() para mudar o local da imagem, 
            do local temporário ao source do servidor */
            $pasta = "../assets/media/musica/";
            $novo_nome_msc = uniqid();
            $extensao_msc = strtolower(pathinfo($musica['name'], PATHINFO_EXTENSION));
    
            /* Condições caso o upload sofra um erro, caso a extensão seja a errada, ou, caso a imagem seja muito pesada */
            if($musica['error']){
    
                ?>
                <script>
                    alert("Falha ao enviar o arquivo...");
                    javascript:history.back();
                </script>
                <?php
                die();
            }
    
            if($extensao_msc != 'mp3' && $extensao_msc != 'm4a'){
                ?>
                <script>
                    alert("Extensão não permitida...(Somente .mp3 ou .m4a)<?php echo $extensao_msc; ?>");
                    javascript:history.back();
                </script>
                <?php
                die();
            }
    
            if($musica['size'] > 8388608){
                ?>
                <script>
                    alert("Arquivo maior que 8MB...");
                    javascript:history.back();
                </script>
                <?php
                die();
            }

            /* Concatenando o novo caminho da imagem. */
            $path_msc = $pasta . $novo_nome_msc . "." . $extensao_msc;    
            move_uploaded_file($musica['tmp_name'], $path_msc);

        }else{
            ?>
            <script>
                alert("Você precisa inserir uma música...");
                javascript:history.back();
            </script>
            <?php
            die();
        }

        mysqli_query($conexao, "INSERT INTO 
        `musica`(`titulo`, `data_lanc`, `genero`, `artista`, `path_msc`,`usuario_id`) 
        VALUES ('$titulo',(CURDATE()),'$genero',,'".$_SESSION['nome']."''$path_msc','".$_SESSION['id']."')");

        ?>
        <script>
            alert("Cadastrado com sucesso!");
            window.location.replace("../views/perfil.php?id=<?php echo $_SESSION['id']; ?>");
        </script>
        <?php

        mysqli_close($conexao);
    }
?>