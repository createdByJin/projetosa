<?php
    $id_prod = $_POST["id-produto"];
    $desc_prod = $_POST["desc-prod"];
    $quant_prod = $_POST["quant-prod"];
    $categ_prod = $_POST["categoria"];
    
    include("../database/conection.php");
    session_start();

    if ($desc_prod == 0 || $categ_prod === "0" || $desc_prod == "" || $categ_prod === "0") {
            
        $_SESSION["tipo_mensagem"] = "danger";
        $_SESSION["titulo_mensagem"] = "FALHA";
        $_SESSION["mensagem"] = "Favor preencher todos os campos!";
    } else {
        $sql = "INSERT INTO produtos (id_produto, descricao, quantidade, categoria_id)"
                ."VALUES ($id_prod, '$desc_prod', $quant_prod, '$categ_prod')";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        $_SESSION["tipo_mensagem"] = "success";
        $_SESSION["titulo_mensagem"] = "SUCESSO";
        $_SESSION["mensagem"] = "Produto inserido com sucesso!";
    }

    header("location: ../novo-cadastro.php");
?>