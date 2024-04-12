<?php 
    include('conexao.php');

    if(!isset($_SESSION)) {
        session_start();
     }

    $categoria = $_GET['categoria'];
    
    $sql_todasEquipes = "SELECT nomeEquipe FROM equipes WHERE categoria = '$categoria'";
    $query_todasEquipes = $mysqli->query($sql_todasEquipes) or die($mysqli->error);
    ?>

    <option value="">Escolha uma Equipe</option>

    <?php
    while($select = $query_todasEquipes->fetch_assoc()) { 
        $name = $select['nomeEquipe'];
    ?>
    <option value="<?php echo $name ?>">
    <?php echo $name ?>
    </option>
    <?php } ?>