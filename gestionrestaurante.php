<?php
session_start();
require("Menu.php");
if ($_POST['dia'] && $_POST['fecha']) {
    $menu = new Menu($_POST['dia'], $_POST['fecha'], [], [], []);
    $_SESSION['menu'] = serialize($menu);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú del día</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <h1>RESTAURANTE</h1>
    </header>
    <section>
        <nav></nav>
        <main class="carta">
            <?php
            if (!$_POST) {
                echo '<h1 class="centrado">Configuración del menú del día</h1><br>
                    <form action="gestionrestaurante.php" method="post">
                        <table>
                            <tr>
                                <td>Día de la semana:</td>
                                <td><input type="text" name="dia"></td>
                            </tr>
                            <tr>
                                <td>Fecha:</td>
                                <td><input type="text" name="fecha"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="enviar" value="Diseñar menú"></td>
                            </tr>
                        </table>
                    </form>';
            } else {
                if (!$_POST['confeccionar']) {
                    $menu = unserialize($_SESSION['menu']);
                    echo '<h1 class="centrado">Menú del ' . $menu->getDia() . ', ' . $menu->getFecha() . '</h1>
                        <form action="gestionrestaurante.php" method="post">
                            <h3>Primeros platos</h3>';
                    if ($_POST['addprimero'] && $_POST['primero']) {
                        $menu->addPrimerosPlatos($_POST['primero']);
                    }
                    $menu->imprimirPrimerosPlatos();
                    echo '<input type="text" name="primero">
                            <input type="submit" name="addprimero" value="Añadir">
                            <h3>Segundos platos</h3>';
                    if ($_POST['addsegundo'] && $_POST['segundo']) {
                        $menu->addSegundosPlatos($_POST['segundo']);
                    }
                    $menu->imprimirSegundosPlatos();
                    echo '<input type="text" name="segundo">
                            <input type="submit" name="addsegundo" value="Añadir">
                            <h3>Postres</h3>';
                    if ($_POST['addpostre'] && $_POST['postre']) {
                        $menu->addPostres($_POST['postre']);
                    }
                    $menu->imprimirPostres();
                    echo '<input type="text" name="postre">
                            <input type="submit" name="addpostre" value="Añadir"><br><br>
                            <input type="submit" name="confeccionar" value="Confeccionar carta">
                        </form>';
                    $_SESSION['menu'] = serialize($menu);
                } else {
                    $menu = unserialize($_SESSION['menu']);
                    echo '<img src="cabecera.jpg" alt="cabecera">
                        <div class="centrado">
                            <h1>Menú del día</h1>
                            <h2>' . $menu->getDia() . ', ' . $menu->getFecha() . '</h2><br>
                            <h3>Primeros platos</h3>';
                    echo $menu->imprimirPrimerosPlatos();
                    echo '<h3>Segundos platos</h3>';
                    echo $menu->imprimirSegundosPlatos();
                    echo '<h3>Postres</h3>';
                    echo $menu->imprimirPostres();
                    echo '</div>
                        <img src="pie.jpg" alt="pie">';
                }
            }
            ?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>

</html>