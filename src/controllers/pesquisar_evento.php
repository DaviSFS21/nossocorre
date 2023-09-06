<?php
    require_once "../assets/db/connect.php";

    if(isset($_GET['search'])){
        $search = $_GET['search'];

        $result_pesq = mysqli_query($conexao, "SELECT * FROM `eventos` WHERE `nome_ev` LIKE '%$search%'");
        $numero_result = mysqli_num_rows($result_pesq);

        if($numero_result == 0){
            echo "<h2>Não foram encontrados eventos com este nome!</h2>";
        }else{
            for ($i = 1; $i <= $numero_result; $i++) {
                $vetor_eventos = mysqli_fetch_array($result_pesq);
                echo "
            <div>
                <img src=" . $vetor_eventos[10] . " height=250px> 
                <p>ID: " . $vetor_eventos[0] . "</p>
                <p>Nome do evento: " . $vetor_eventos[1] . "</p>
                <p>Descrição: " . $vetor_eventos[2] . "</p>
                <p>Início: " . $vetor_eventos[3] . "</p>
            </div>
            <hr>
                ";
            }
        }
    }
?>