<?php
declare(strict_types=1);
namespace tests;

use \PHPUnit\Framework\TestCase;
use src\token\CrearToken;
use src\token\RevisarToken;

define('NOMBRE_SESION_TOKEN', 'token');

class TokenTest extends TestCase
{
    public function testObtenerDevuelveStringConToken()
    {
        $token = new CrearToken;

        $this->assertIsString($token->obtener());
    }

    public function testNoPuedeHaberDosTokenIgualesCadaVezQueSeLlamaElMetodoObtener()
    {
        $token = new CrearToken;

        $this->assertNotEquals($token->obtener(), $token->obtener());
    }

    public function testElTokenDebeDeSerIgualEnSessionQueElPrimeroQueSeObtiene()
    {
        $token = new CrearToken;
        $this->assertEquals($token->obtener(), $_SESSION[NOMBRE_SESION_TOKEN]);
    }

    public function testLaComprobacionDevuelveFalsoSiNoPasa()
    {
        $token = new CrearToken;
        $token->obtener();
        $revisar = new RevisarToken;
        $this->assertFalse($revisar->validar('6t66t6t6t6t6t6t6t6t6t6t6t6t6t6t'));
    }

    public function testLaComprobacionDevuelveVeraderoSiPasa()
    {
        $token = new CrearToken;
        $token = $token->obtener();
        $revisar = new RevisarToken;
        $this->assertTrue($revisar->validar($token));
    }
}
