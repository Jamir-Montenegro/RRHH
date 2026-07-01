<?php

require_once __DIR__ . '/../../Utils/Signature.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Reporte de Empleados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-dark text-white">

            <h3>Reporte General de Empleados</h3>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>

                        <th>Código</th>
                        <th>Empleado</th>
                        <th>Ocupación</th>
                        <th>Planilla</th>
                        <th>Salario</th>
                        <th>Fecha Inicio</th>
                        <th>Estado</th>
                        <th>Integridad</th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($empleados as $e): ?>

                    <?php

                    // Debe ser exactamente igual que en PerfilLaboral::guardar()
                    $cadena = json_encode([
                        'codigo'    => trim($e['codigo_empleado']),
                        'salario'   => number_format((float)$e['salario'], 2, '.', ''),
                        'planilla'  => (int)$e['planilla_id'],
                        'ocupacion' => (int)$e['ocupacion_id'],
                        'fecha'     => $e['fecha_inicio']
                    ], JSON_UNESCAPED_UNICODE);

                    $firmaValida = Signature::verificar(
                        $cadena,
                        $e['firma_digital']
                    );

                    ?>

                    <tr>

                        <td><?= htmlspecialchars($e['codigo_empleado']) ?></td>

                        <td><?= htmlspecialchars($e['colaborador']) ?></td>

                        <td><?= htmlspecialchars($e['ocupacion']) ?></td>

                        <td><?= htmlspecialchars($e['planilla']) ?></td>

                        <td>$<?= number_format((float)$e['salario'],2) ?></td>

                        <td><?= htmlspecialchars($e['fecha_inicio']) ?></td>

                        <td>

                            <?php if($e['empleado_activo'] == 1): ?>

                                <span class="badge bg-success">
                                    Activo
                                </span>

                            <?php else: ?>

                                <span class="badge bg-danger">
                                    Inactivo
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <?php if(empty($e['firma_digital'])): ?>

                                <span class="badge bg-secondary">
                                    Sin Firma
                                </span>

                            <?php elseif($firmaValida): ?>

                                <span class="badge bg-success">
                                    ✅ Integridad Correcta
                                </span>

                            <?php else: ?>

                                <span class="badge bg-danger">
                                    ❌ Datos Alterados
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

           <a href="/RRHH/exportar_excel.php" class="btn btn-success">
    Exportar a Excel
</a>


            <a href="index.php" class="btn btn-secondary">

                Volver

            </a>

        </div>

    </div>

</div>

</body>

</html>