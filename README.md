# php-token
Solo otra clase para generar tokens en PHP para prevenir Cross-Site Request Forgery en formularios.

## Funcionamiento

Se genera un token (un string aleatorio) al mismo tiempo que este mismo se guarda en una variable de $_SESSION, una vez que se crear el token, este solo puede ser usado una sola vez, esto quiere decir que si se verifica el token, ya sea que pase la revisión o no, este será destruido con la nueva creación de otro. Así, se evita en lo posible que alguien pueda enviar formularios de forma remota. Estas dos clases bien implementadas evitarán que se pueda hacer. Su uso puede complicarse si no se hace un manejo adecuado de $_SESSION, o de cuando se crea y se destruye una sesión.  


### Instalación con composer

```shell
composer require osvaldogdelrio/php-token
```


### Requerimientos

Se requiere el uso de la constante definida NOMBRE_SESION_TOKEN para servir como $_SESSION[NOMBRE_SESION_TOKEN]

### Generar token

```php
$token = new CrearToken;
echo $token->obtener();
```

### Comprobar la validez del token

```php
$token = new RevisarToken;
/*
Devuelve true si son iguales, false si son distintos.
*/
var_dump($token->validar($_POST['token']));
```