# Sistema de Recursos Humanos (RRHH) Parcial Practico

## Descripción

Sistema desarrollado en PHP utilizando el patrón de arquitectura MVC para la gestión de colaboradores y perfiles laborales.

El sistema permite registrar colaboradores, asignar perfiles laborales, generar reportes, verificar la integridad de los registros mediante firma digital con OpenSSL y exportar la información a Excel.

---

## Tecnologías Utilizadas

- PHP 8.x
- MySQL
- WampServer
- PDO
- Bootstrap 5
- OpenSSL
- PhpSpreadsheet
- Composer

---

## Funcionalidades

- Registro de colaboradores.
- Registro de perfil laboral.
- Catálogos:
  - Nacionalidades
  - Tipo de sangre
  - Planillas
  - Ocupaciones
  - Rutas
- Reporte general de empleados.
- Firma digital utilizando OpenSSL.
- Verificación de integridad de los registros.
- Exportación del reporte a Excel.

---

## Estructura del Proyecto

```
RRHH/
│
├── app/
│   ├── Config/
│   ├── Controllers/
│   ├── Models/
│   ├── Utils/
│   ├── Validators/
│   └── Views/
│
├── keys/
│   ├── private.pem
│   └── public.pem
│
├── vendor/
│
├── colaboradores.php
├── perfil.php
├── reporte.php
├── exportar_excel.php
├── index.php
│
├── composer.json
└── README.md
```

---

## Requisitos

- PHP 8 o superior
- MySQL
- WampServer o XAMPP
- Composer
- OpenSSL habilitado

---

## Instalación

1. Clonar o copiar el proyecto en:

```
C:\wamp64\www\RRHH
```

2. Crear la base de datos en MySQL.

3. Importar el archivo SQL.

4. Instalar las dependencias:

```bash
composer install
```

5. Verificar que existan las llaves RSA:

```
keys/private.pem
keys/public.pem
```

6. Ejecutar el proyecto desde:

```
http://localhost/RRHH
```

---

## Autor

**Jamir Montenegro**

Universidad de Panamá

Desarollo de software VII

2026
