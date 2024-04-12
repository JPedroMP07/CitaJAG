<?php 
    include('conexao.php');

    if(!isset($_SESSION)) {
        session_start();
     }
    
     if(!isset($_SESSION['usuario'])) {
        header("Location: inicio");
        die();
     }
    
     if(!($_SESSION['funcao'] == "arbitragem") && !($_SESSION['funcao'] == "admin")) {
        header("Location: inicio");
        die();
     }

    $categoria = $_GET['categoria'];
    
    $sql_todasEquipes = "SELECT nomeEquipe FROM equipes WHERE categoria = '$categoria'";
    $query_todasEquipes = $mysqli->query($sql_todasEquipes) or die($mysqli->error);
    ?>

    <option value="">Escolha a Equipe</option>

    <?php
    while($select = $query_todasEquipes->fetch_assoc()) { 
        $name = $select['nomeEquipe'];
    ?>
    <option value="<?php echo $name ?>">
    <?php echo $name ?>
    </option>
    <?php } ?>