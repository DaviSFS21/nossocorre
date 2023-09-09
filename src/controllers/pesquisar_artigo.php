<?php
    require_once "../assets/db/connect.php";

    if(isset($_GET['search'])){
        $search = $_GET['search'];

        $result_pesq = mysqli_query($conexao, "SELECT * FROM `artigos` WHERE `titulo` LIKE '%$search%'");
        $numero_result = mysqli_num_rows($result_pesq);

        if($numero_result == 0){
            echo "<h2>Não foram encontrados artigos com este nome!</h2>";
        }else{
            for ($i = 1; $i <= $numero_result; $i++) {
                $vetor_artigos = mysqli_fetch_array($result_pesq);
                echo "
            <div>
                <img src=" . $vetor_artigos[5] . " height=250px> 
                <p>ID: " . $vetor_artigos[0] . "</p>
                <p>Nome do evento: " . $vetor_artigos[1] . "</p>
                <p>Descrição: " . $vetor_artigos[2] . "</p>
                <p>Início: " . $vetor_artigos[3] . "</p>
            </div>
            <hr>
                ";
            }
        }
    }else{
        $result_pesq = mysqli_query($conexao, "SELECT * FROM `artigos`");
        $numero_result = mysqli_num_rows($result_pesq);

        if($numero_result == 0){
            echo "<h2>Não foram encontrados artigos com este nome!</h2>";
        }else{
            for ($i = 1; $i <= $numero_result; $i++) {
                $vetor_artigos = mysqli_fetch_array($result_pesq);
                echo "
            <div>
                <img src=" . $vetor_artigos[4] . " height=250px> 
                <p>ID: " . $vetor_artigos[0] . "</p>
                <p>Título: " . $vetor_artigos[1] . "</p>
                <p>Subtítulo: " . $vetor_artigos[2] . "</p>
                <p>" . $vetor_artigos[3] . "</p>
            </div>
            <hr>
                ";
            }
        }
    }
?>