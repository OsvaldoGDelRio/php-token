<?php
namespace src\token;
use const NOMBRE_SESION_TOKEN;

class RevisarToken
{
    public function validar(string $token): bool
    {
        return hash_equals($_SESSION[NOMBRE_SESION_TOKEN], $token);
    }
}