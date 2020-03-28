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
        <h1 class="center">Consulta</h1>
        <div class="center <?php echo $this->claseMensaje; ?>"><?php echo $this->mensaje; ?></div>
        <table>
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody id="tbody-alumnos">
                <?php

                include_once 'models/alumno.php';
                foreach ($this->alumnos as $row) {

                    $alumno = new Alumno();
                    $alumno = $row;
                ?>
                    <tr id="fila-<?php echo $alumno->matricula; ?>">
                        <td><?php echo $alumno->matricula ?></td>
                        <td><?php echo $alumno->nombre ?></td>
                        <td><?php echo $alumno->apellido ?></td>
                        <td><a href="<?php echo constant('URL') . 'consulta/verAlumno/' . $alumno->matricula ?>">Editar</a></td>
                        <!--<td><a href="<?php echo constant('URL') . 'consulta/eliminarAlumno/' . $alumno->matricula ?>">Eliminar</a></td>-->
                        <td><button class="bEliminar" data-matricula="<?php echo $alumno->matricula; ?>">Eliminar</button></td>
                    </tr>
                <?php

                }

                ?>




            </tbody>
        </table>


    </section>
    <?php require_once 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
</body>

</html>