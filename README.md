# 🛒 Inventory API - Laravel 10

**API RESTful robusta y segura para la gestión de productos y categorías con autenticación JWT, control de roles y despliegue en la nube.**

![Laravel](https://img.shields.io/badge/Framework-Laravel%2010-red?logo=laravel)
![JWT](https://img.shields.io/badge/Auth-JWT-blue)
![DB](https://img.shields.io/badge/Database-MySQL%20%7C%20PostgreSQL-brightgreen)
![Deploy](https://img.shields.io/badge/Deployed-Render%20%7C%20Railway-orange)
![Status](https://img.shields.io/badge/API-Online-success)
![License](https://img.shields.io/github/license/tuusuario/inventory-api)

---

## 🚀 URL pública de la API

> **[https://inventory-api.onrender.com](https://inventory.taratasy.com)**  
> (Reemplaza por la URL real tras el deploy)

---

## 📝 Tabla de Contenido

- [Características](#características)
- [Instalación local](#instalación-local)
- [Seeders y datos de prueba](#seeders-y-datos-de-prueba)
- [Colección Postman & Swagger](#colección-postman--swagger)
- [Endpoints principales](#endpoints-principales)
- [Variables de entorno](#variables-de-entorno)
- [Decisiones de diseño y arquitectura](#decisiones-de-diseño-y-arquitectura)
- [Despliegue en la nube](#despliegue-en-la-nube)
- [Autor y licencia](#autor-y-licencia)

---

## 📂 Estructura del Proyecto

- `app/Http/Controllers`: Controladores bien organizados
- `app/Models`: Modelos Eloquent
- `routes/api.php`: Definición de rutas limpias
- Validación centralizada en controladores
- Uso de comentarios claros en lógica compleja

 ## 🏗️ Arquitectura

- Patrón **MVC** (Model-View-Controller) de Laravel.
- Separación clara de responsabilidades (Controladores, Modelos, Requests, Rutas).
- Uso de Eloquent ORM para acceso a datos.
- Middleware para autorización por roles.

## ✨ Características

- **Autenticación JWT** segura (`tymon/jwt-auth`)
- **Roles**: `admin` y `user` vía campo ENUM
- **Autorización granular** por middleware (solo admin puede crear/editar/borrar)
- **Gestión de productos y categorías**
- **Validaciones robustas** y mensajes de error claros
- **Seeders para pruebas rápidas**
- **Colección Postman y OpenAPI (Swagger)**
- **Despliegue gratuito y fácil** en Render, Railway o similar
- **Documentación clara para equipo o futuros desarrollos**

---

## 💻 Instalación local

> Sigue estos pasos para levantar el proyecto en tu máquina:

```bash
# 1. Clona el repositorio
git clone https://github.com/tuusuario/inventory-api.git
cd inventory-api

# 2. Instala dependencias
composer install

# 3. Copia el archivo de entorno y ajústalo
cp .env.example .env
# Edita .env y configura DB, APP_URL, etc.

# 4. Genera APP_KEY y JWT_SECRET
php artisan key:generate
php artisan jwt:secret

# 5. Migra y carga los seeders
php artisan migrate:fresh --seed

# 6. Inicia el servidor local
php artisan serve


---

## 📦 Endpoints

> Todos los endpoints requieren `Content-Type: application/json` y, salvo `/login` y `/register`, un JWT `Authorization: Bearer {token}`.

### 🟢 **Autenticación y Usuarios**

- **POST `/api/register`**  
  Registra nuevo usuario.
- **POST `/api/login`**  
  Autenticación y obtención de token JWT.
- **POST `/api/logout`**  
  Cierra sesión (requiere autenticación).

### 🟢 **Gestión de Productos**

- **GET `/api/products`**  
  Lista todos los productos.
- **GET `/api/products/{id}`**  
  Consulta detalle de un producto.
- **POST `/api/products`** *(Solo Admin)*  
  Crea un producto.
- **PUT `/api/products/{id}`** *(Solo Admin)*  
  Actualiza producto.
- **DELETE `/api/products/{id}`** *(Solo Admin)*  
  Elimina producto.

### 🟢 **Gestión de Categorías** *(opcional)*

- **GET `/api/categories`**
- **POST `/api/categories`** *(Solo Admin)*
- **PUT `/api/categories/{id}`** *(Solo Admin)*
- **DELETE `/api/categories/{id}`** *(Solo Admin)*

---
