<?php

require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Utils/Signature.php';

class PerfilLaboral
{
    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->conectar();
    }

    public function obtenerColaboradores()
    {
        $sql = "SELECT
                    id,
                    CONCAT(nombre,' ',apellido) AS colaborador
                FROM colaboradores
                ORDER BY nombre, apellido";

        return $this->conexion
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPlanillas()
    {
        return $this->conexion
            ->query("SELECT * FROM cat_planillas ORDER BY nombre")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerOcupaciones()
    {
        return $this->conexion
            ->query("SELECT * FROM cat_ocupaciones ORDER BY nombre")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($datos)
    {
        // Cadena que será firmada (IMPORTANTE: mismo formato que en el reporte)
        $cadenaFirma = json_encode([
            'codigo'    => trim($datos['codigo_empleado']),
            'salario'   => number_format((float)$datos['salario'], 2, '.', ''),
            'planilla'  => (int)$datos['planilla_id'],
            'ocupacion' => (int)$datos['ocupacion_id'],
            'fecha'     => $datos['fecha_inicio']
        ], JSON_UNESCAPED_UNICODE);

        $firma = Signature::firmar($cadenaFirma);

        $sql = "INSERT INTO perfil_laboral
        (
            colaborador_id,
            codigo_empleado,
            ocupacion_id,
            planilla_id,
            salario,
            fecha_inicio,
            fecha_fin,
            cargo_activo,
            empleado_activo,
            motivo_baja,
            firma_digital
        )
        VALUES
        (
            :colaborador_id,
            :codigo_empleado,
            :ocupacion_id,
            :planilla_id,
            :salario,
            :fecha_inicio,
            :fecha_fin,
            :cargo_activo,
            :empleado_activo,
            :motivo_baja,
            :firma_digital
        )";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([

            ':colaborador_id'  => $datos['colaborador_id'],
            ':codigo_empleado' => trim($datos['codigo_empleado']),
            ':ocupacion_id'    => (int)$datos['ocupacion_id'],
            ':planilla_id'     => (int)$datos['planilla_id'],
            ':salario'         => number_format((float)$datos['salario'],2,'.',''),
            ':fecha_inicio'    => $datos['fecha_inicio'],
            ':fecha_fin'       => empty($datos['fecha_fin']) ? null : $datos['fecha_fin'],
            ':cargo_activo'    => empty($datos['fecha_fin']) ? 1 : 0,
            ':empleado_activo' => empty($datos['fecha_fin']) ? 1 : 0,
            ':motivo_baja'     => empty($datos['motivo_baja']) ? null : $datos['motivo_baja'],
            ':firma_digital'   => $firma

        ]);
    }

    public function obtenerReporte()
    {
        $sql = "SELECT

                    p.id,
                    p.codigo_empleado,
                    CONCAT(c.nombre,' ',c.apellido) AS colaborador,
                    o.nombre AS ocupacion,
                    pl.nombre AS planilla,

                    p.salario,
                    p.fecha_inicio,
                    p.fecha_fin,

                    p.empleado_activo,

                    p.firma_digital,

                    p.planilla_id,
                    p.ocupacion_id

                FROM perfil_laboral p

                INNER JOIN colaboradores c
                    ON c.id = p.colaborador_id

                INNER JOIN cat_planillas pl
                    ON pl.id = p.planilla_id

                INNER JOIN cat_ocupaciones o
                    ON o.id = p.ocupacion_id

                ORDER BY c.nombre,c.apellido";

        return $this->conexion
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }
}