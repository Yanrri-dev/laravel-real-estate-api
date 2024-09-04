---
title: My Project
language_tabs:
  - shell: Shell
  - http: HTTP
  - javascript: JavaScript
  - ruby: Ruby
  - python: Python
  - php: PHP
  - java: Java
  - go: Go
toc_footers: []
includes: []
search: true
code_clipboard: true
highlight_theme: darkula
headingLevel: 2
generator: "@tarslib/widdershins v4.0.23"

---

# My Project

Base URLs:

# Authentication

- HTTP Authentication, scheme: bearer

# Sample APIs

## GET Find pet by ID

GET /pet/{petId}

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|petId|path|string| yes |pet ID|

> Response Examples

```json
{
  "code": 0,
  "data": {
    "name": "Hello Kitty",
    "photoUrls": [
      "http://dummyimage.com/400x400"
    ],
    "id": 3,
    "category": {
      "id": 71,
      "name": "Cat"
    },
    "tags": [
      {
        "id": 22,
        "name": "Cat"
      }
    ],
    "status": "sold"
  }
}
```

> 400 Response

```json
{
  "code": 0,
  "message": "string"
}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|
|400|[Bad Request](https://tools.ietf.org/html/rfc7231#section-6.5.1)|none|Inline|
|404|[Not Found](https://tools.ietf.org/html/rfc7231#section-6.5.4)|none|Inline|

### Responses Data Schema

HTTP Status Code **200**

|Name|Type|Required|Restrictions|Title|description|
|---|---|---|---|---|---|
|» code|integer|true|none||status code|
|» data|[Pet](#schemapet)|true|none||pet details|
|»» id|integer(int64)|true|none||Pet ID|
|»» category|[Category](#schemacategory)|true|none||group|
|»»» id|integer(int64)|false|none||Category ID|
|»»» name|string|false|none||Category Name|
|»» name|string|true|none||name|
|»» photoUrls|[string]|true|none||image URL|
|»» tags|[[Tag](#schematag)]|true|none||tag|
|»»» id|integer(int64)|false|none||Tag ID|
|»»» name|string|false|none||Tag Name|
|»» status|string|true|none||Pet Sales Status|

#### Enum

|Name|Value|
|---|---|
|status|available|
|status|pending|
|status|sold|

HTTP Status Code **400**

|Name|Type|Required|Restrictions|Title|description|
|---|---|---|---|---|---|
|» code|integer|true|none||none|
|» message|string|true|none||none|

HTTP Status Code **404**

|Name|Type|Required|Restrictions|Title|description|
|---|---|---|---|---|---|
|» code|integer|true|none||none|
|» message|string|true|none||none|

## DELETE Deletes a pet

DELETE /pet/{petId}

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|petId|path|string| yes |Pet id to delete|
|api_key|header|string| no |none|

> Response Examples

```json
{
  "code": 0
}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

HTTP Status Code **200**

|Name|Type|Required|Restrictions|Title|description|
|---|---|---|---|---|---|
|» code|integer|true|none||none|

## POST Add a new pet to the store

POST /pet

> Body Parameters

```yaml
name: Hello Kitty
status: sold

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|body|body|object| no |none|
|» name|body|string| yes |Pet Name|
|» status|body|string| yes |Pet Sales Status|

> Response Examples

```json
{
  "code": 0,
  "data": {
    "name": "Hello Kitty",
    "photoUrls": [
      "http://dummyimage.com/400x400"
    ],
    "id": 3,
    "category": {
      "id": 71,
      "name": "Cat"
    },
    "tags": [
      {
        "id": 22,
        "name": "Cat"
      }
    ],
    "status": "sold"
  }
}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|201|[Created](https://tools.ietf.org/html/rfc7231#section-6.3.2)|none|Inline|

### Responses Data Schema

HTTP Status Code **201**

|Name|Type|Required|Restrictions|Title|description|
|---|---|---|---|---|---|
|» code|integer|true|none||none|
|» data|[Pet](#schemapet)|true|none||pet details|
|»» id|integer(int64)|true|none||Pet ID|
|»» category|[Category](#schemacategory)|true|none||group|
|»»» id|integer(int64)|false|none||Category ID|
|»»» name|string|false|none||Category Name|
|»» name|string|true|none||name|
|»» photoUrls|[string]|true|none||image URL|
|»» tags|[[Tag](#schematag)]|true|none||tag|
|»»» id|integer(int64)|false|none||Tag ID|
|»»» name|string|false|none||Tag Name|
|»» status|string|true|none||Pet Sales Status|

#### Enum

|Name|Value|
|---|---|
|status|available|
|status|pending|
|status|sold|

## PUT Update an existing pet

PUT /pet

> Body Parameters

```json
{}
```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|body|body|object| no |none|

> Response Examples

```json
{
  "code": 0,
  "data": {
    "name": "Hello Kitty",
    "photoUrls": [
      "http://dummyimage.com/400x400"
    ],
    "id": 3,
    "category": {
      "id": 71,
      "name": "Cat"
    },
    "tags": [
      {
        "id": 22,
        "name": "Cat"
      }
    ],
    "status": "sold"
  }
}
```

> 404 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|
|404|[Not Found](https://tools.ietf.org/html/rfc7231#section-6.5.4)|none|Inline|
|405|[Method Not Allowed](https://tools.ietf.org/html/rfc7231#section-6.5.5)|none|Inline|

### Responses Data Schema

HTTP Status Code **200**

|Name|Type|Required|Restrictions|Title|description|
|---|---|---|---|---|---|
|» code|integer|true|none||none|
|» data|[Pet](#schemapet)|true|none||pet details|
|»» id|integer(int64)|true|none||Pet ID|
|»» category|[Category](#schemacategory)|true|none||group|
|»»» id|integer(int64)|false|none||Category ID|
|»»» name|string|false|none||Category Name|
|»» name|string|true|none||name|
|»» photoUrls|[string]|true|none||image URL|
|»» tags|[[Tag](#schematag)]|true|none||tag|
|»»» id|integer(int64)|false|none||Tag ID|
|»»» name|string|false|none||Tag Name|
|»» status|string|true|none||Pet Sales Status|

#### Enum

|Name|Value|
|---|---|
|status|available|
|status|pending|
|status|sold|

## GET Finds Pets by status

GET /pet/findByStatus

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|status|query|string| yes |Status values that need to be considered for filter|

> Response Examples

```json
{
  "code": 0,
  "data": [
    {
      "name": "Hello Kitty",
      "photoUrls": [
        "http://dummyimage.com/400x400"
      ],
      "id": 3,
      "category": {
        "id": 71,
        "name": "Cat"
      },
      "tags": [
        {
          "id": 22,
          "name": "Cat"
        }
      ],
      "status": "sold"
    },
    {
      "name": "White Dog",
      "photoUrls": [
        "http://dummyimage.com/400x400"
      ],
      "id": 3,
      "category": {
        "id": 71,
        "name": "Dog"
      },
      "tags": [
        {
          "id": 22,
          "name": "Dog"
        }
      ],
      "status": "sold"
    }
  ]
}
```

> 400 Response

```json
{
  "code": 0
}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|
|400|[Bad Request](https://tools.ietf.org/html/rfc7231#section-6.5.1)|none|Inline|

### Responses Data Schema

HTTP Status Code **200**

|Name|Type|Required|Restrictions|Title|description|
|---|---|---|---|---|---|
|*anonymous*|[[Pet](#schemapet)]|false|none||none|
|» id|integer(int64)|true|none||Pet ID|
|» category|[Category](#schemacategory)|true|none||group|
|»» id|integer(int64)|false|none||Category ID|
|»» name|string|false|none||Category Name|
|» name|string|true|none||name|
|» photoUrls|[string]|true|none||image URL|
|» tags|[[Tag](#schematag)]|true|none||tag|
|»» id|integer(int64)|false|none||Tag ID|
|»» name|string|false|none||Tag Name|
|» status|string|true|none||Pet Sales Status|

#### Enum

|Name|Value|
|---|---|
|status|available|
|status|pending|
|status|sold|

HTTP Status Code **400**

|Name|Type|Required|Restrictions|Title|description|
|---|---|---|---|---|---|
|» code|integer|true|none||none|

# Auth

## POST login

POST /api/auth/login

Método para registrar un nuevo usuario y obtener un token válido

> Body Parameters

```yaml
name: Nicolas Rojas
email: nrojas@lacasadejuana.cl
password: "123456"

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|body|body|object| no |none|
|» name|body|string| no |none|
|» email|body|string| yes |none|
|» password|body|string| yes |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## POST register

POST /api/auth/register

Método para hacer login y obtener un token de acceso.

> Body Parameters

```yaml
email: nrojas@lacasadejuana.cl
password: "123456"
name: Nicolás Rojas

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|body|body|object| no |none|
|» email|body|string| yes |none|
|» password|body|string| yes |none|
|» name|body|string| yes |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## POST Me

POST /api/auth/me

> Body Parameters

```yaml
{}

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|Content-Type|header|string| yes |none|
|body|body|object| no |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

# Personas

## GET List Personas

GET /api/personas

Se listan todos las perosnas en la base de datos

Se acepta filtrar por pagina, nombre, email

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|page|query|string| no |none|
|nombre|query|string| no |none|
|email|query|string| no |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## POST Create persona

POST /api/personas

Crear una nueva persona

Se válidan los campos nombre, email y telefono

> Body Parameters

```yaml
nombre: Nicolas Rojas
email: niko.rojass.p@gmail.com
telefono: +56 9 67765614

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|body|body|object| no |none|
|» nombre|body|string| yes |none|
|» email|body|string| yes |none|
|» telefono|body|string| yes |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## GET Read persona

GET /api/personas/1

Obtener los datos de una persona en particular

> Body Parameters

```yaml
{}

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|Content-Type|header|string| yes |none|
|body|body|object| no |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## PUT Update persona

PUT /api/personas/1

Actualizar los datos de una persona

Se pueden actualizar todos los campos o algunos si así se desea

> Body Parameters

```yaml
email: niko.rojass.p@gmail.co.nz
telefono: "+56967765614"
nombre: Nicolás Rojas

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|body|body|object| no |none|
|» email|body|string| yes |none|
|» telefono|body|string| no |none|
|» nombre|body|string| no |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## DELETE Delete persona

DELETE /api/personas/3

Borrar una persona de la base de datos

> Body Parameters

```yaml
{}

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|Content-Type|header|string| yes |none|
|body|body|object| no |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

# Propiedades

## GET List propiedades

GET /api/propiedades

Lista de todos las propiedades disponibles

Se puede filtrar por pagina, ciudad y precio

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|page|query|string| no |none|
|ciudad|query|string| yes |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## POST Create propiedad

POST /api/propiedades

Agregar una nueva propiedad

> Body Parameters

```yaml
direccion: Av Bernardo O'Higgins 201
ciudad: Santiago
precio: "3500"
descripcion: test

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|body|body|object| no |none|
|» direccion|body|string| yes |none|
|» ciudad|body|string| yes |none|
|» precio|body|string| yes |none|
|» descripcion|body|string| yes |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## GET Read propiedad

GET /api/propiedades/3

Ver los datos de una propiedad

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## PUT Update propiedad

PUT /api/propiedades/1

Actualizar una propiedad

Se puede actualizar uno o todos sus campos

> Body Parameters

```yaml
precio: "2300"
descripcion: test update

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|body|body|object| no |none|
|» precio|body|string| no |none|
|» descripcion|body|string| yes |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## DELETE Delete propiedad

DELETE /api/propiedades/1

Borrar una propiedad

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

# Solicitud Visitas

## GET List  solicitud visitas

GET /api/solicitud_visitas

Lista de todas las solicitudes de visistas, incluye la persona y la propiedad a la cual corresponde

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## POST Create solicitud visita

POST /api/solicitud_visitas

Crea una nueva solicitud de visitas

> Body Parameters

```yaml
persona_id: "1"
propiedad_id: "1"
fecha_visita: 2024-09-01
comentarios: ""

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|body|body|object| no |none|
|» persona_id|body|string| yes |none|
|» propiedad_id|body|string| yes |none|
|» fecha_visita|body|string| yes |none|
|» comentarios|body|string| yes |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## GET Read solicitud visita

GET /api/solicitud_visitas/3

Obtiene los datos de una solicitud con la propiedad y personas asociada

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## PUT Update solicitud visita

PUT /api/solicitud_visitas/5

Actualiza los datos de una solicitud

> Body Parameters

```yaml
{}

```

### Params

|Name|Location|Type|Required|Description|
|---|---|---|---|---|
|body|body|object| no |none|

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

## DELETE Delete solicitud visita

DELETE /api/solicitud_visitas/4

Borra una solicitud de visita

> Response Examples

> 200 Response

```json
{}
```

### Responses

|HTTP Status Code |Meaning|Description|Data schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|none|Inline|

### Responses Data Schema

# Data Schema

<h2 id="tocS_Tag">Tag</h2>

<a id="schematag"></a>
<a id="schema_Tag"></a>
<a id="tocStag"></a>
<a id="tocstag"></a>

```json
{
  "id": 1,
  "name": "string"
}

```

### Attribute

|Name|Type|Required|Restrictions|Title|Description|
|---|---|---|---|---|---|
|id|integer(int64)|false|none||Tag ID|
|name|string|false|none||Tag Name|

<h2 id="tocS_Category">Category</h2>

<a id="schemacategory"></a>
<a id="schema_Category"></a>
<a id="tocScategory"></a>
<a id="tocscategory"></a>

```json
{
  "id": 1,
  "name": "string"
}

```

### Attribute

|Name|Type|Required|Restrictions|Title|Description|
|---|---|---|---|---|---|
|id|integer(int64)|false|none||Category ID|
|name|string|false|none||Category Name|

<h2 id="tocS_Pet">Pet</h2>

<a id="schemapet"></a>
<a id="schema_Pet"></a>
<a id="tocSpet"></a>
<a id="tocspet"></a>

```json
{
  "id": 1,
  "category": {
    "id": 1,
    "name": "string"
  },
  "name": "doggie",
  "photoUrls": [
    "string"
  ],
  "tags": [
    {
      "id": 1,
      "name": "string"
    }
  ],
  "status": "available"
}

```

### Attribute

|Name|Type|Required|Restrictions|Title|Description|
|---|---|---|---|---|---|
|id|integer(int64)|true|none||Pet ID|
|category|[Category](#schemacategory)|true|none||group|
|name|string|true|none||name|
|photoUrls|[string]|true|none||image URL|
|tags|[[Tag](#schematag)]|true|none||tag|
|status|string|true|none||Pet Sales Status|

#### Enum

|Name|Value|
|---|---|
|status|available|
|status|pending|
|status|sold|

