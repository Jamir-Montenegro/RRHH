<?php

require_once __DIR__ . '/../Config/Database.php';

class Colaborador
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->conectar();
    }

    // Obtener todas las nacionalidades
    public function obtenerNacionalidades()
    {
        $sql = "SELECT * FROM cat_nacionalidades ORDER BY nombre";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los tipos de sangre
    public function obtenerTiposSangre()
    {
        $sql = "SELECT * FROM cat_tipo_sangre ORDER BY tipo";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todas las rutas
    public function obtenerRutas()
    {
        $sql = "SELECT * FROM cat_rutas ORDER BY nombre";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($datos)
{
    $sql = "INSERT INTO colaboradores
    (
        documento,
        nombre,
        apellido,
        edad,
        sexo,
        correo,
        celular,
        nacionalidad_id,
        tipo_sangre_id,
        ruta_id
    )
    VALUES
    (
        :documento,
        :nombre,
        :apellido,
        :edad,
        :sexo,
        :correo,
        :celular,
        :nacionalidad_id,
        :tipo_sangre_id,
        :ruta_id
    )";

    $stmt = $this->conexion->prepare($sql);

    return $stmt->execute([
        ':documento' => $datos['documento'],
        ':nombre' => $datos['nombre'],
        ':apellido' => $datos['apellido'],
        ':edad' => $datos['edad'],
        ':sexo' => $datos['sexo'],
        ':correo' => $datos['correo'],
        ':celular' => $datos['celular'],
        ':nacionalidad_id' => $datos['nacionalidad_id'],
        ':tipo_sangre_id' => $datos['tipo_sangre_id'],
        ':ruta_id' => $datos['ruta_id']
    ]);
}
}