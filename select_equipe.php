<?php 
    include('conexao.php');

    $genero = $_GET['genero'];
    $idade = $_GET['idade'];

    if($genero == "Feminino" && $idade > 14) {
        $sql_todasEquipes = "SELECT nomeEquipe FROM equipes WHERE categoria = '$genero'";
        $query_todasEquipes = $mysqli->query($sql_todasEquipes) or die($mysqli->error);
    } else if($genero == "Masculino" && $idade > 4 && $idade < 8) {
        $categoria = "Sub7";
    } else if($genero == "Masculino" && $idade > 7 && $idade < 10) {
        $categoria = "Sub9";
    } else if($genero == "Masculino" && $idade > 9 && $idade < 12) {
        $categoria = "Sub11";
    } else if($genero == "Masculino" && $idade > 11 && $idade < 14) {
        $categoria = "Sub13";
    } else if($genero == "Masculino" && $idade > 13 && $idade < 16) {
        $categoria = "Sub15";
    } else if($genero == "Masculino" && $idade > 15 && $idade < 18) {
        $categoria = "Sub17";
    } else if($genero == "Masculino" && $idade > 17 && $idade < 40) {
        $categoria = "Adulto";

        $sql_todasEquipes = "SELECT nomeEquipe FROM equipes WHERE categoria = 'Bronze' OR categoria = 'Prata' OR categoria = 'Ouro' ORDER BY nomeEquipe ASC";
        $query_todasEquipes = $mysqli->query($sql_todasEquipes) or die($mysqli->error);
    } else if($genero == "Masculino" && $idade > 39) {
        $categoria = "Veterano";
    }

    if($genero == "Masculino" && $categoria != "Adulto") {
        $sql_todasEquipes = "SELECT nomeEquipe FROM equipes WHERE categoria = '$categoria'";
        $query_todasEquipes = $mysqli->query($sql_todasEquipes) or die($mysqli->error);
    }

    while($select = $query_todasEquipes->fetch_assoc()) { 
        $name = $select['nomeEquipe'];
        ?>
    <option value="<?php echo $name ?>">
    <?php echo $name ?>
    </option>
    <?php } ?>