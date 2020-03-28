<?php

class Nuevo extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->claseMensaje = "";
    }

    public function render()
    {
        $this->view->render('nuevo/index');
    }

    function registrarAlumno()
    {
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $mensaje = "";


        if ($this->model->insert(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido])) {
            $mensaje =  'Alumno registrado';
            $this->view->claseMensaje = 'exito';
        } else {
            $mensaje = 'La matricula ya existe';
            $this->view->claseMensaje = 'error';
        }

        $this->view->mensaje = $mensaje;
        $this->render();
    }
}
