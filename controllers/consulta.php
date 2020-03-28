<?php

class Consulta extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->alumnos = [];
        $this->view->mensaje = "";
        $this->view->claseMensaje = "";
    }

    public function render()
    {
        //$alumnos = $this->model->get();
        $this->view->alumnos = $this->model->get();
        $this->view->render('consulta/index');
    }

    function verAlumno($param = null)
    {
        $idAlumno = $param[0];
        $alumno = $this->model->getById($idAlumno);
        session_start();
        $_SESSION['id_verAlumno'] = $alumno->matricula;

        $this->view->alumno = $alumno;
        $this->view->render('consulta/detalle');
    }

    function actualizarAlumno()
    {
        session_start();
        $matricula = $_SESSION['id_verAlumno'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        unset($_SESSION['id_verAlumno']);



        if ($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido])) {
            $alumno = new Alumno();
            $alumno->matricula = $matricula;
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;
            $this->view->alumno = $alumno;
            $this->view->mensaje = "Alumno actualizado de forma correcta";
            $this->view->claseMensaje = "exito";
        } else {
            $this->view->mensaje = "Ha ocurrido un error al actualizar";
            $this->view->claseMensaje = "error";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarAlumno($param = null)
    {

        $matricula = $param[0];

        if ($this->model->delete($matricula)) {
            /*$this->view->mensaje = "Alumno eliminado de forma correcta";*/
            $this->view->claseMensaje = "exito";
            $mensaje = "Alumno eliminado de forma correcta";
        } else {
            /*$this->view->mensaje = "Ha ocurrido un error al eliminar";*/
            $this->view->claseMensaje = "error";
            $mensaje = "Ha ocurrido un error al eliminar";
        }
        //$this->render();
        echo $mensaje;
    }
}
