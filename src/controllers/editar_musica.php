<?php
    if(isset($_POST['a_titulo'])){
        require_once '../assets/db/connect.php';

        $result_musica = mysqli_query($conexao, "SELECT * FROM `musica` WHERE `id` = " . $_GET['id_musica']);
        $numero_result = mysqli_num_rows($result_musica);
        
        if($numero_result == 1){
            $titulo = $_POST["a_titulo"];
            $genero = $_POST["a_genero"];

            if(isset($_FILES["a_musica"])){
                $edit_musica = mysqli_fetch_array($result_musica);

                unlink($edit_musica[5]);

                $musica = $_FILES['a_musica'];

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

            }

            mysqli_query($conexao, "UPDATE `musica` 
            SET `titulo`='$titulo',`genero`='$genero',`path_msc`='$path_msc' WHERE `id` = " . $_SESSION['id']);

            ?>
            <script>
                alert("Atualizado com sucesso!");
                window.location.replace("../views/perfil.php?id=<?php echo $_SESSION['id']; ?>");
            </script>
            <?php

            mysqli_close($conexao);
        }
    }
?>  