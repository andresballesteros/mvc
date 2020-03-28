<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once 'views/header.php'; ?>
    <section>
        <h1 class="center">Nuevo</h1>

        <div class="center <?php echo $this->claseMensaje; ?>"><?php echo $this->mensaje; ?></div>

        <form action="<?php echo constant('URL') ?>nuevo/registrarAlumno" method="post">
            <p>
                <label for="matricula">Matrícula</label>
                <br>
                <input type="text" name="matricula" id="" required maxlength="10">
            </p>
            <p>
                <label for="nombre">Nombre</label>
                <br>
                <input type="text" name="nombre" id="" required maxlength="20">
            </p>
            <p>
                <label for="apellido">Apellido</label>
                <br>
                <input type="text" name="apellido" id="" required maxlength="20">
            </p>
            <p>
                <input type="submit" value="Registrar nuevo alumno">
            </p>
        </form>
    </section>
    <?php require_once 'views/footer.php'; ?>
</body>

</html>