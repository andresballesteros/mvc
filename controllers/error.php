<?php

class ErrorPagina extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "Hubo un error en la solicitud o no existe la página";
        $this->view->render('error/index');

        //echo '<p>Error al cargar el recurso</p>';
    }
}
