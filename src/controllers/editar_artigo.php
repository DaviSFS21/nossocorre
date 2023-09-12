<?php
    require_once "../assets/db/connect.php";

    if(isset($_GET['id_artigo'])){
        $result_artigo = mysqli_query($conexao, "SELECT * FROM `artigos` WHERE `id` = " . $_GET['id_artigo']);
        $numero_result = mysqli_num_rows($result_artigo);
        if($numero_result == 1){
            $edit_artigo = mysqli_fetch_array($result_artigo);
        }
    }else{
        ?>
            <script>
                alert("Este evento não foi encontrado...");
                window.location.replace("index.php"); 
            </script>
        <?php
    }

    if(isset($_POST['a_titulo'])){
        if($_SESSION['id'] == $edit_artigo[6]){
            $id_artigo = $_GET['id_artigo'];
            $titulo = $_POST['a_titulo'];
            $subtitulo = $_POST['a_subtitulo'];
            $texto = $_POST['a_texto'];

            if(isset($_FILES["a_img"])){

                $img_artigo = $_FILES['a_img'];
    
                /* Declaração do novo caminho da imagem e criação do uniqid() para mudar o local da imagem, 
                do local temporário ao source do servidor */
                $pasta = "../assets/media/img_artigos/";
                $novo_nome_img = uniqid();
                $extensao_img = strtolower(pathinfo($img_artigo['name'], PATHINFO_EXTENSION));
        
                /* Condições caso o upload sofra um erro, caso a extensão seja a errada, ou, caso a imagem seja muito pesada */
                if($img_artigo['error']){
        
                    ?>
                    <script>
                        alert("Falha ao enviar o arquivo...");
                        javascript:history.back();
                    </script>
                    <?php
                    die();
                }
        
                if($extensao_img != 'jpg' && $extensao_img != 'png'){
                    ?>
                    <script>
                        alert("Extensão não permitida...(Somente .jpg ou .png)");
                        javascript:history.back();
                    </script>
                    <?php
                    die();
                }
        
                if($img_artigo['size'] > 4194304){
                    ?>
                    <script>
                        alert("Arquivo maior que 4MB...");
                        javascript:history.back();
                    </script>
                    <?php
                    die();
                }

                unlink($_GET['url_img']);
    
                /* Concatenando o novo caminho da imagem. */
                $path_img = $pasta . $novo_nome_img . "." . $extensao_img;    
                move_uploaded_file($img_artigo['tmp_name'], $path_img);

                mysqli_query($conexao, "UPDATE `artigos` SET `path_img`='$path_img' WHERE `id` = $id_artigo");
            }

            mysqli_query($conexao, "UPDATE `artigos` SET `titulo`='$titulo',`subtitulo`='$subtitulo',`texto`='$texto'
            WHERE `id` = $id_artigo");

            ?>
                <script>
                    alert("Artigo atualizado!");
                    window.location.replace("perfil.php");
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("Este artigo não existe...");
                    window.location.replace("perfil.php");
                </script>
            <?php
        }
    }
?>