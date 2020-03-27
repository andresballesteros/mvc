<?php

class ErrorPagina extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "Error genérico";
        $this->view->render('error/index');

        //echo '<p>Error al cargar el recurso</p>';
    }
}
