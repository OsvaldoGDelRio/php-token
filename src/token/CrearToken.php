<?php
namespace src\token;
use const NOMBRE_SESION_TOKEN;

class CrearToken
{
	public function obtener(): string
	{
        $this->borrarToken();
        
        return $this->crearToken();
	}

    private function borrarToken(): void
    {
        $_SESSION[NOMBRE_SESION_TOKEN] = '';
    }

    private function crearToken(): string
    {
        $r = bin2hex(random_bytes(25));
        $_SESSION[NOMBRE_SESION_TOKEN] = $r;
        return $r;
    }
}