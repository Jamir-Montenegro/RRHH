<?php

require_once __DIR__ . '/../Models/Colaborador.php';

class ColaboradorController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Colaborador();
    }

   public function crear()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if ($this->modelo->guardar($_POST)) {

            header("Location: index.php?success=1");
            exit;

        }

    }

    $nacionalidades = $this->modelo->obtenerNacionalidades();
    $tiposSangre = $this->modelo->obtenerTiposSangre();
    $rutas = $this->modelo->obtenerRutas();

    require_once __DIR__ . '/../Views/colaboradores/create.php';
}

}