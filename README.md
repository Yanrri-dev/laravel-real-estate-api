
# API Real State

API para consultar propiedades , personas y solicitudes de visita en un real state

<!--- If we have only one group/collection, then no need for the "ungrouped" heading -->



## Endpoints

* [Auth](#auth)
    1. [login](#1-login)
    1. [register](#2-register)
    1. [Me](#3-me)
* [Personas](#personas)
    1. [List Personas](#1-list-personas)
    1. [Create persona](#2-create-persona)
    1. [Read persona](#3-read-persona)
    1. [Update persona](#4-update-persona)
    1. [Delete persona](#5-delete-persona)
* [Propiedades](#propiedades)
    1. [List propiedades](#1-list-propiedades)
    1. [Create propiedad](#2-create-propiedad)
    1. [Read propiedad](#3-read-propiedad)
    1. [Update propiedad](#4-update-propiedad)
    1. [Delete propiedad](#5-delete-propiedad)
* [Solicitud Visitas](#solicitud-visitas)
    1. [List  solicitud visitas](#1-list--solicitud-visitas)
    1. [Create solicitud visita](#2-create-solicitud-visita)
    1. [Read solicitud visita](#3-read-solicitud-visita)
    1. [Update solicitud visita](#4-update-solicitud-visita)
    1. [Delete solicitud visita](#5-delete-solicitud-visita)

--------



## Auth

Endpoints para autenticarse y obtener un token JWT para usar el resto de métodos.



### 1. login


Método para registrar un nuevo usuario y obtener un token válido


***Endpoint:***

```bash
Method: POST
Type: FORMDATA
URL: localhost:8000/api/auth/login
```



***Body:***

| Key | Value | Description |
| --- | ------|-------------|
| email | nrojas@lacasadejuana.cl |  |
| password | 123456 |  |



### 2. register


Método para hacer login y obtener un token de acceso.


***Endpoint:***

```bash
Method: POST
Type: FORMDATA
URL: localhost:8000/api/auth/register
```



***Body:***

| Key | Value | Description |
| --- | ------|-------------|
| email | nrojas@lacasadejuana.cl |  |
| password | 123456 |  |
| name | Nicolás Rojas |  |



### 3. Me



***Endpoint:***

```bash
Method: POST
Type: FORMDATA
URL: localhost:8000/api/auth/me
```


***Headers:***

| Key | Value | Description |
| --- | ------|-------------|
| Content-Type | application/json |  |



## Personas

CRUD de Personas



### 1. List Personas


Se listan todos las perosnas en la base de datos

Se acepta filtrar por pagina, nombre, email


***Endpoint:***

```bash
Method: GET
Type: 
URL: localhost:8000/api/personas
```



### 2. Create persona


Crear una nueva persona

Se válidan los campos nombre, email y telefono


***Endpoint:***

```bash
Method: POST
Type: FORMDATA
URL: localhost:8000/api/personas
```



***Body:***

| Key | Value | Description |
| --- | ------|-------------|
| nombre | Nicolas Rojas |  |
| email | niko.rojass.p@gmail.com |  |
| telefono | +56 9 67765614 |  |



### 3. Read persona


Obtener los datos de una persona en particular


***Endpoint:***

```bash
Method: GET
Type: FORMDATA
URL: localhost:8000/api/personas/1
```


***Headers:***

| Key | Value | Description |
| --- | ------|-------------|
| Content-Type | application/json |  |



### 4. Update persona


Actualizar los datos de una persona

Se pueden actualizar todos los campos o algunos si así se desea


***Endpoint:***

```bash
Method: PUT
Type: URLENCODED
URL: localhost:8000/api/personas/1
```



***Body:***


| Key | Value | Description |
| --- | ------|-------------|
| email | niko.rojass.p@gmail.co.nz |  |



### 5. Delete persona


Borrar una persona de la base de datos


***Endpoint:***

```bash
Method: DELETE
Type: FORMDATA
URL: localhost:8000/api/personas/3
```


***Headers:***

| Key | Value | Description |
| --- | ------|-------------|
| Content-Type | application/json |  |



## Propiedades

CRUD de Propiedades



### 1. List propiedades


Lista de todos las propiedades disponibles

Se puede filtrar por pagina, ciudad y precio


***Endpoint:***

```bash
Method: GET
Type: 
URL: localhost:8000/api/propiedades
```



***Query params:***

| Key | Value | Description |
| --- | ------|-------------|
| ciudad | Curico |  |



### 2. Create propiedad


Agregar una nueva propiedad


***Endpoint:***

```bash
Method: POST
Type: FORMDATA
URL: localhost:8000/api/propiedades
```



***Body:***

| Key | Value | Description |
| --- | ------|-------------|
| direccion | Av Bernardo O'Higgins 201 |  |
| ciudad | Santiago |  |
| precio | 3500 |  |
| descripcion | test |  |



### 3. Read propiedad


Ver los datos de una propiedad


***Endpoint:***

```bash
Method: GET
Type: 
URL: localhost:8000/api/propiedades/3
```



### 4. Update propiedad


Actualizar una propiedad

Se puede actualizar uno o todos sus campos


***Endpoint:***

```bash
Method: PUT
Type: URLENCODED
URL: localhost:8000/api/propiedades/1
```



***Body:***


| Key | Value | Description |
| --- | ------|-------------|
| descripcion | test update |  |



### 5. Delete propiedad


Borrar una propiedad


***Endpoint:***

```bash
Method: DELETE
Type: 
URL: localhost:8000/api/propiedades/1
```



## Solicitud Visitas

CRUD de solicitudes de visitas



### 1. List  solicitud visitas


Lista de todas las solicitudes de visistas, incluye la persona y la propiedad a la cual corresponde


***Endpoint:***

```bash
Method: GET
Type: 
URL: localhost:8000/api/solicitud_visitas
```



### 2. Create solicitud visita


Crea una nueva solicitud de visitas


***Endpoint:***

```bash
Method: POST
Type: FORMDATA
URL: localhost:8000/api/solicitud_visitas
```



***Body:***

| Key | Value | Description |
| --- | ------|-------------|
| persona_id | 1 |  |
| propiedad_id | 1 |  |
| fecha_visita | 2024-09-01 |  |
| comentarios |  |  |



### 3. Read solicitud visita


Obtiene los datos de una solicitud con la propiedad y personas asociada


***Endpoint:***

```bash
Method: GET
Type: 
URL: localhost:8000/api/solicitud_visitas/3
```



### 4. Update solicitud visita


Actualiza los datos de una solicitud


***Endpoint:***

```bash
Method: PUT
Type: FORMDATA
URL: localhost:8000/api/solicitud_visitas/5
```



### 5. Delete solicitud visita


Borra una solicitud de visita


***Endpoint:***

```bash
Method: DELETE
Type: 
URL: localhost:8000/api/solicitud_visitas/4
```



---
[Back to top](#api-real-state)

>Generated at 2024-09-04 13:26:55 by [docgen](https://github.com/thedevsaddam/docgen)
