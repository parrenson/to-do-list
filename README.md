
# Guía Para Ejecutar El Proyecto

Esta guía te proporcionará los pasos necesarios para configurar y ejecutar este proyecto en tu máquina.

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalado lo siguiente en tu sistema:

- PHP 8.1+
- Composer

## Pasos a Seguir

Sigue estos pasos para configurar y ejecutar el proyecto:

### 1. Clonar el Repositorio

Clona el repositorio de tu proyecto desde GitHub

```bash
git clone https://github.com/parrenson/to-do-list.git
```

### 2. Cambiar Rama

Cambia la rama del repositorio de GitHub:

```bash
git checkout dev
```

### 3. Instalar Dependencias

Navega al directorio del proyecto clonado e instala las dependencias de PHP del proyecto:

```bash
cd project
composer install
```

### 4. Configuración De Variables De Entorno (.env)

Ejecuta el siguiente comando en la terminal:

- Para Linux y macOS
```bash
cp .env.example .env
```
- Para Windows
```bash
copy .env.example .env
```

### 5. Migraciones y Seeders

Para crear las migraciones de la DB ejecuta el comando:
```bash
php artisan migrate
```
Una vez terminado ejecuta:
```bash
php artisan db:seed --class=StateSeeder
```
