Para ejecutar el contenedor es necesario tener instalado composer (Se puede instalar desde la raíz del proyecto "laravel test" con el comando "-composer install")
Luego para correr y ejecutar los contenedores correr el comando
"docker-compose build"
"docker-compose up -d"

Consideraciones:
- para acceder al perfil desde url es necesario seguir el formato: http://localhost:8080/profile y acontinuación pegar el resto de la url con los parametros dados, aquí un ejemplo:
http://localhost:8080/profile?nombre=Juan&apellidos=Perez&telefono=123456&correo=juan@ejemplo.com&imagen=https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png

- Para la creación del perfil y carga de la imagen diseñé una pestaña desde la que se puede acceder por url: http://localhost:8080/profile/create
o a travez de la barra de navegación dando click en "Profile" y acontinuación en "Create Profile".
- El guardado se hace de manera automática verificando cuando se entre a un perfil verificando todos los datos y si no existe el registro se guardará
- El servicio de envio de mensajes lo dispuse desde el botón "Send Email" el cual ejecutara el servicio especificado.