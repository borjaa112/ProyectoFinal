# Agencia Hotelera

Agencia hotelera es una aplicación web la cual permite tanto publicar como reservar habitaciones de hoteles.

Existen 4 tipos de usuarios:

 - Hotel
 - Cliente
 - Administrador
 - Invitado


## Instalación

Para realizar la instalación es imprescindible tener instalado composer en el equipo donde vamos a realizar el despliegue.

Una vez instalado y dentro de la carpeta contenedora del proyecto se deberán instalar las dependencias mediante el siguiente comando:

    composer install
   Esto realizará una instalación las dependencias.

Una vez instaladas las dependencias se deberá establecer conexión con la base de datos, esto se realiza mediante el archivo **.env**

**Ejemplo de configuración:**

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=agencia_hotelera
	DB_USERNAME=root
	DB_PASSWORD=

Una vez establecida la conexión con nuestro gestor de bases de datos se deberá realizar el volcado de los datos, el cual se hará mediante el siguiente comando:

    php artisan migrate:fresh

Por último y una vez realizadas las migraciones para servir el contenido mediante el navegador se podrá realizar mediante el siguiente comando:

    php artisan serve

Esto nos dará una ruta local donde poder usar la aplicación web.

## Usuario administrador

El usuario administrador se creará junto a las migraciones su cuenta por defecto será la siguiente:

    correo: admin@admin.com
    contraseña: 1234
