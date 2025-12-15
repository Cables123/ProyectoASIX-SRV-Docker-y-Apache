# ProyectoASIX-SRV-Docker-y-Apache
Proyecto de Servicios de CFGS ASIR de montaje de servicios Apache + Docker

## Atencion!

Esto es un proyecto de ASIR (*Administración de Sistemas en Red*).
Este proyecto es para el aprendizaje de Docker y servidores web, así que puede haber, y habrá, errores, agujeros de seguridad y vulnerabilidades.
Todo lo que se vea aquí no tendría que ser usado como tutorial, ni plantilla, ni ejemplo.

## Claves del Proyecto

- Dockerfile y Docker Compose
Creación de imágenes personalizadas con Dockerfile y, a su vez, orquestación de varios contenedores de Dockerfile.

- Apache y Webs
Configuración de un servicio web usando "Apache Web Server", configuración httpd, htaccess, módulos, etc.


## Prueba tu mismo el proyecto!

Descargar version beta 0.1:
```bash
wget https://github.com/Cables123/ProyectoASIX-SRV-Docker-y-Apache/releases/download/beta/dockerprojecte-beta-0.1.2.zip
```
Extraer Imagen:
```bash
unzip ./dockerprojecte-beta-0.1.zip
cd ./dockerprojecte-beta-0.1/
```

> Puede que necesites una apliacion como unzip.
> ejemplo: sudo apt-get install unzip 

Construir imagen y arrancar:
```bash
docker compose up -d
```


## Retos y Practicas
Este proyecto también contaba con unos retos y prácticas que he hecho en un 
[pdf que podéis ver clicando aquí.](https://github.com/Cables123/ProyectoASIX-SRV-Docker-y-Apache/blob/main/Practicas%20y%20Retos/ASIX_Servicios_Docker%20i%20Apache_VRR.pdf)

### Uso de inteligencia artificial (IA)

>Este **proyecto usa inteligencia artificial** para el diseño de la página web (index.php's), también para comentar y refinar el código, principalmente el PHP.
>También es de destacar que para algunas configuraciones he sido ayudado también por inteligencia artificial, pero todo ha sido probado, estudiado y testeado, ya que recuerden que esto es un proyecto de aprendizaje y no algo que tendría que ser usado en producción.

