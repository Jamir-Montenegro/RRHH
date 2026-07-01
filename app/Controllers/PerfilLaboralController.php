<?php

require_once __DIR__ . '/../Models/PerfilLaboral.php';

class PerfilLaboralController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new PerfilLaboral();
    }

    public function crear()
    {
        // Guardar cuando se envía el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($this->modelo->guardar($_POST)) {

                header("Location: perfil.php?success=1");
                exit;

            } else {

                echo "Error al guardar el perfil laboral.";
            }
        }

        // Cargar datos para los combos
        $colaboradores = $this->modelo->obtenerColaboradores();
        $planillas = $this->modelo->obtenerPlanillas();
        $ocupaciones = $this->modelo->obtenerOcupaciones();

        require_once __DIR__ . '/../Views/perfiles/create.php';
    }

    public function reporte()
{
    $empleados = $this->modelo->obtenerReporte();

    require_once __DIR__ . '/../Views/reportes/index.php';
}
}