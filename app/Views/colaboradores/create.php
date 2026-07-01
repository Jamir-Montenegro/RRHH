<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Colaborador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h3 class="mb-0">Registro de Colaborador</h3>

                </div>

                <div class="card-body">

                <?php if(isset($_GET['success'])): ?>

<div class="alert alert-success">

    Colaborador registrado correctamente.

</div>

<?php endif; ?>

                    <form action="" method="POST">

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Documento</label>

                                <input
                                    type="text"
                                    name="documento"
                                    class="form-control"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Edad</label>

                                <input
                                    type="number"
                                    name="edad"
                                    class="form-control"
                                    min="18"
                                    max="80"
                                    required>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Nombre</label>

                                <input
                                    type="text"
                                    name="nombre"
                                    class="form-control"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Apellido</label>

                                <input
                                    type="text"
                                    name="apellido"
                                    class="form-control"
                                    required>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Sexo</label>

                                <select
                                    name="sexo"
                                    class="form-select"
                                    required>

                                    <option value="">Seleccione...</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Nacionalidad</label>

                                <select
                                    name="nacionalidad_id"
                                    class="form-select"
                                    required>

                                    <option value="">Seleccione...</option>

                                    <?php foreach($nacionalidades as $nacionalidad): ?>

                                        <option value="<?= $nacionalidad['id']; ?>">

                                            <?= $nacionalidad['nombre']; ?>

                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Tipo de Sangre</label>

                                <select
                                    name="tipo_sangre_id"
                                    class="form-select"
                                    required>

                                    <option value="">Seleccione...</option>

                                    <?php foreach($tiposSangre as $tipo): ?>

                                        <option value="<?= $tipo['id']; ?>">

                                            <?= $tipo['tipo']; ?>

                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Ruta</label>

                                <select
                                    name="ruta_id"
                                    class="form-select"
                                    required>

                                    <option value="">Seleccione...</option>

                                    <?php foreach($rutas as $ruta): ?>

                                        <option value="<?= $ruta['id']; ?>">

                                            <?= $ruta['nombre']; ?>

                                        </option>

                                    <?php endforeach; ?>

                                </select>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Correo Electrónico</label>

                                <input
                                    type="email"
                                    name="correo"
                                    class="form-control"
                                    placeholder="correo@empresa.com"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Celular</label>

                                <input
                                    type="text"
                                    name="celular"
                                    class="form-control"
                                    placeholder="6000-0000"
                                    required>

                            </div>

                        </div>

                        <hr>

                        <div class="d-grid">

                            <button
                                type="submit"
                                class="btn btn-success btn-lg">

                                Guardar Colaborador

                            </button>

                        </div>

                    </form>

                </div>

                <div class="card-footer text-center text-muted">

                    © 2026 iTECH Contrataciones

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>