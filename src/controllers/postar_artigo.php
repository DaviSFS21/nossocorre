<?php
    if(isset($_POST['n_titulo'])){
        require '../assets/db/connect.php';
        
        $titulo = $_POST["n_titulo"];
        $subtitulo = $_POST["n_subtitulo"];
        $texto = $_POST["n_texto"];

        if(isset($_FILES["n_img"])){

            $img_evento = $_FILES['n_img'];

            /* Declaração do novo caminho da imagem e criação do uniqid() para mudar o local da imagem, 
            do local temporário ao source do servidor */
            $pasta = "../assets/img/img_artigos/";
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
            $path_img = "../assets/img/img_artigos/generico.png";
        }

        mysqli_query($conexao, "INSERT INTO 
        `artigos`(`titulo`, `subtitulo`, `texto`, `path_img`, `data`,`usuario_id`) 
        VALUES ('$titulo','$subtitulo','$texto','$path_img',(CURDATE()),'".$_SESSION['id']."')");

        ?>
        <script>
            alert("Cadastrado com sucesso!");
            window.location.replace("../views/perfil.php?id=<?php echo $_SESSION['id']; ?>");
        </script>
        <?php

        mysqli_close($conexao);
    }
?>