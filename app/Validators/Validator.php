<?php

class Validator
{
    public static function validarCorreo($correo)
    {
        return filter_var($correo, FILTER_VALIDATE_EMAIL);
    }

    public static function validarEdad($edad)
    {
        return is_numeric($edad) && $edad >= 18 && $edad <= 80;
    }

    public static function validarTelefono($telefono)
    {
        return preg_match('/^[0-9]{8}$/', $telefono);
    }

    public static function validarDocumento($documento)
    {
        return !empty(trim($documento));
    }

    public static function validarTexto($texto)
    {
        return !empty(trim($texto));
    }
}