<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Perfil Laboral</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Registro de Perfil Laboral</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label class="form-label">Colaborador</label>

<select name="colaborador_id" class="form-select" required>

<option value="">Seleccione...</option>

<?php foreach($colaboradores as $c): ?>

<option value="<?= $c['id']; ?>">

<?= $c['colaborador']; ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">Código Empleado</label>

<input
type="text"
name="codigo_empleado"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Salario</label>

<input
type="number"
step="0.01"
name="salario"
class="form-control"
required>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">Planilla</label>

<select
name="planilla_id"
class="form-select">

<option value="">Seleccione...</option>

<?php foreach($planillas as $planilla): ?>

<option value="<?= $planilla['id']; ?>">

<?= $planilla['nombre']; ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Ocupación</label>

<select
name="ocupacion_id"
class="form-select">

<option value="">Seleccione...</option>

<?php foreach($ocupaciones as $ocupacion): ?>

<option value="<?= $ocupacion['id']; ?>">

<?= $ocupacion['nombre']; ?>

</option>

<?php endforeach; ?>

</select>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">Fecha Inicio</label>

<input
type="date"
name="fecha_inicio"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">Fecha Fin</label>

<input
type="date"
name="fecha_fin"
class="form-control">

</div>

</div>

<div class="mb-3">

<label class="form-label">Motivo de Baja</label>

<textarea
name="motivo_baja"
class="form-control"></textarea>

</div>

<button
class="btn btn-success">

Guardar Perfil

</button>

<a href="index.php" class="btn btn-secondary">

Volver

</a>

</form>

</div>

</div>

</div>

</body>

</html>