# Documentación de Rutas 

## Introducción

Esta documentación describe las rutas disponibles en la aplicación para los recursos `libros`, `autores` y `géneros`. Cada recurso tiene rutas asociadas que permiten realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) utilizando los métodos HTTP correspondientes.

## Rutas de Recursos

Laravel proporciona una forma sencilla de definir rutas para operaciones CRUD mediante el uso de `Route::resource`. Esta función genera automáticamente las rutas necesarias para interactuar con un controlador de recursos.

### Libros

Controlador: `LibrosController`

```php
Route::resource('/libros', LibrosController::class);
```
GET	/libros	index	libros.index
GET	/libros/create	create	libros.create
POST	/libros	store	libros.store
GET	/libros/{libro}	show	libros.show
GET	/libros/{libro}/edit	edit	libros.edit
PUT/PATCH	/libros/{libro}	update	libros.update
DELETE	/libros/{libro}	destroy	libros.destroy
### Autores

Controlador: `AutoresController`

```php
Route::resource('/autores', AutorController::class);
```
Método HTTP	Ruta	Acción	Nombre de la Ruta
GET	/autores	index	autores.index
GET	/autores/create	create	autores.create
POST	/autores	store	autores.store
GET	/autores/{autor}	show	autores.show
GET	/autores/{autor}/edit	edit	autores.edit
PUT/PATCH	/autores/{autor}	update	autores.update
DELETE	/autores/{autor}	destroy	autores.destroy

### Generos

Controlador: `GenerosController`
```php
Route::resource('/generos', GeneroController::class);
```
Método HTTP	Ruta	Acción	Nombre de la Ruta
GET	/generos	index	generos.index
GET	/generos/create	create	generos.create
POST	/generos	store	generos.store
GET	/generos/{genero}	show	generos.show
GET	/generos/{genero}/edit	edit	generos.edit
PUT/PATCH	/generos/{genero}	update	generos.update
DELETE	/generos/{genero}	destroy	generos.destroy

![[RUTAS RESOURCE 1.png]]