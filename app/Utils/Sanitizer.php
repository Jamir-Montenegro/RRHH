<?php

class Sanitizer
{
    public static function limpiarTexto($texto)
    {
        return htmlspecialchars(trim($texto), ENT_QUOTES, 'UTF-8');
    }

    public static function titulo($texto)
    {
        return ucwords(strtolower(trim($texto)));
    }

    public static function limpiarNumero($numero)
    {
        return preg_replace('/[^0-9]/', '', $numero);
    }

    public static function limpiarCorreo($correo)
    {
        return filter_var(trim($correo), FILTER_SANITIZE_EMAIL);
    }
}