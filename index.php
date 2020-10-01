<?php

try {

    // data source name
    $dsn = "mysql:host=localhost;dbname=sakila";

    $opts = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    // PHP Data Object
    $conexao = new PDO($dsn, "root", "@MySQL_dev_2020", $opts);

    // Preparated Statement
    $stmt = $conexao->prepare("SELECT * FROM film");
    $stmt->execute();

} catch(PDOException $ex) {

    //echo $ex->getCode();
    echo $ex->getMessage();

} catch(Exception $e) {

    echo $e->getMessage();
}
?>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <td>Titulo do Filme:</th>
            <td>Ano de Lançamento:</th>
        </tr>
    </thead>
    <tbody>
        <?php while($filme = $stmt->fetchObject()): ?>
        <tr>
            <td> <?= $filme->film_id ?> </td>
            <td> <?= $filme->title  ?> </td>
            <td> <?= $filme->release_year  ?> </td>
        </tr>
        <?php endwhile ?>
    </tbody>
</table>








