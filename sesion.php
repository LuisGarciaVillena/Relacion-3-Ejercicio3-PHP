<?php
session_start();

if (!isset($_SESSION['a'])) {
    $_SESSION['a'] = 0;
}

if (!isset($_SESSION['b'])) {
    $_SESSION['b'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcion = $_POST["opcion"];

    switch ($opcion) {
        case 'a_incrementar':
            $_SESSION['a']++;
            break;
        case 'a_decrementar':
            $_SESSION['a']--;
            break;
        case 'b_incrementar':
            $_SESSION['b']++;
            break;
        case 'b_decrementar':
            $_SESSION['b']--;
            break;
        case 'borrar_sesion':
            session_destroy();
            header("Location: sesion.php");
            exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesión</title>
</head>
<body>
    <p>Valor de a: <?php echo $_SESSION['a']; ?></p>
    <p>Valor de b: <?php echo $_SESSION['b']; ?></p>

    <form action="sesion.php" method="post">
        <label for="opcion">Selecciona una opción:</label>
        <select id="opcion" name="opcion">
            <option value="a_incrementar">Incrementar a</option>
            <option value="a_decrementar">Decrementar a</option>
            <option value="b_incrementar">Incrementar b</option>
            <option value="b_decrementar">Decrementar b</option>
            <option value="borrar_sesion">Borrar Sesión</option>
        </select>
        <button type="submit">Aplicar</button>
    </form>
</body>
</html>