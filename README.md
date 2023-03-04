# Prueba técnica para Hays

## Requerimientos

Los requerimientos se pueden leer en
el [PDF que me enviaron](public/Prueba%20técnica%20-%20Senior%20PHP%20Symfony-Laravel.pdf).

## Descripción

### Tecnologías

El proyecto se ha desarrollado con Laravel 10 y PHP 8.2, usando Composer.
La base de datos es MySQL 8.0.

Los tests se han desarrollado con PHPUnit y Pest.

El frontend y assets se procesan con Vite.

### Librerias

Como librerias externas se han usado:

- TailwindCSS
- AlpineJS
- Laravel Pint (custom PHP CS Fixer)

> Para usar pint: `sail ./vendor/bin/pint`

### API

Se ofrece documentation de la API con la specification OpenAPI usando el
comando `./vendor/bin/sail artisan l5-swagger:generate`

Para ver la documentación, se puede acceder a `/api/documentation` en el navegador.

### Problemas encontrados

#### OpenAPI

La libreria que se usa para generar la documentación de la API es bastante escasa en información, por lo que la
implementación no es muy buena.

### Soluciones Alternativas

## Instalación y uso

1. Clonar el repositorio
2. Crear un fichero `.env` a partir del `.env.example`
3. Usar Laravel Sail para levantar el proyecto - `./vendor/bin/sail up`
4. Ejecutar los tests - `./vendor/bin/sail artisan test`
