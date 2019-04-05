# Laravel CMS

## Requerimientos

- PHP >= 7.1.3 con las siguientes extensiones:  
OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, y JSON
- [Composer](https://getcomposer.org/doc/00-intro.md)
- MySQL >= 5.7.7

## Instalación

1. Descargar el proyecto de Git
2. Copiar todos los archivos a la carpeta del proyecto donde se quiera utilizar
3. En la raíz del proyecto ejecutar `composer create-project`
4. Crear la base de datos y configurar la conexión en el archivo `.env`
5. En la raíz del proyecto ejecutar `php artisan gp:auth` y escribir `y` o `yes` a todos los mensajes
6. Para poder ingresar al administrador deberás ingresar a tu base de datos, copiar el email de algún usuario y usarlo como `username` para logearte con contraseña `secret`
