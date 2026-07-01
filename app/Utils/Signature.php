<?php

class Signature
{
    private static $privateKey = __DIR__ . '/../../keys/private.pem';
    private static $publicKey = __DIR__ . '/../../keys/public.pem';

    public static function firmar($datos)
    {
        $privateKey = openssl_pkey_get_private(
            file_get_contents(self::$privateKey)
        );

        if (!$privateKey) {
            return false;
        }

        openssl_sign(
            $datos,
            $firma,
            $privateKey,
            OPENSSL_ALGO_SHA256
        );

        return base64_encode($firma);
    }

   public static function verificar($datos, $firma)
{
    if (empty($firma)) {
        return false;
    }

    $publicKey = openssl_pkey_get_public(
        file_get_contents(self::$publicKey)
    );

    return openssl_verify(
        $datos,
        base64_decode($firma),
        $publicKey,
        OPENSSL_ALGO_SHA256
    ) === 1;
}
}