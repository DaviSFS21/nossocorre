<?php
    require_once "../assets/db/connect.php";

    if(isset($_GET['id_evento'])){
        $result_evento = mysqli_query($conexao, "SELECT * FROM `eventos` WHERE `id` = " . $_GET['id_evento']);
        $numero_result = mysqli_num_rows($result_evento);
        if($numero_result == 1){
            $edit_evento = mysqli_fetch_array($result_evento);
        }
    }else{
        ?>
            <script>
                alert("Este evento não foi encontrado...");
                window.location.replace("index.php"); 
            </script>
        <?php
    }

    if(isset($_POST['a_nome_ev'])){
        if($_SESSION['id'] == $edit_evento[11]){
            $id_evento = $_GET['id_evento'];
            $nome_evento = $_POST['a_nome_ev'];
            $descricao = $_POST['a_descricao'];
            $data_inicio = $_POST['a_data_inicio'];
            $data_fim = $_POST['a_data_fim'];
            $cep = $_POST['a_cep'];
            $rua = $_POST['a_rua'];
            $bairro = $_POST['a_bairro'];
            $cidade = $_POST['a_cidade'];
            $estado = $_POST['a_estado'];

            if(isset($_POST["confirm_img"])){

                $img_evento = $_FILES['a_img'];
    
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

                mysqli_query($conexao, "UPDATE `eventos` SET `path_img`='$path_img' WHERE `id` = $id_evento");
            }

            mysqli_query($conexao, "UPDATE `eventos` SET `nome_ev`='$nome_evento',`descricao`='$descricao',`data_inicio`='$data_inicio',
            `data_fim`='$data_fim',`cep`='$cep',`rua`='$rua',`bairro`='bairro',`cidade`='$cidade',`estado`='$estado' 
            WHERE `id` = $id_evento");

            ?>
                <script>
                    alert("Evento atualizado!");
                    window.location.replace("perfil.php");
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("Este evento não existe...");
                    window.location.replace("perfil.php");
                </script>
            <?php
        }
    }
?>