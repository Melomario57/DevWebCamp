# DevWebCamp

Plataforma web para la gestión y registro de asistentes a DevWebCamp, un evento de desarrollo web. La aplicación permite consultar la información pública del evento, explorar la agenda y los ponentes, completar el registro y administrar el contenido desde un panel privado.

## Tecnologías

- **Frontend:** HTML5, JavaScript, Sass y componentes de interfaz con SweetAlert2 y Swiper.
- **Backend:** PHP 8 con arquitectura MVC, Composer, PHPMailer, PHP Dotenv e Intervention Image.
- **Base de datos:** MySQL mediante `mysqli`.
- **Build:** Gulp para compilar estilos, JavaScript y optimizar imágenes en `public/build`.

## Características

- Página pública del evento, paquetes y conferencias/workshops.
- Registro de usuarios y asistentes, confirmación de cuenta y recuperación de contraseña.
- Flujo de inscripción gratuita o con pago y generación de boleto virtual.
- Consulta de agenda, eventos por horario, ponentes y regalos mediante endpoints JSON.
- Panel administrativo con dashboard y gestión CRUD de ponentes, eventos y regalos.
- Consulta de asistentes registrados.
- Carga y procesamiento de imágenes para los recursos del evento.

## Instalación

### Requisitos

- PHP 8 o superior con MySQLi habilitado.
- MySQL 5.7+ o MariaDB.
- Composer.
- Node.js y npm.
- XAMPP, Laragon o un servidor PHP equivalente.

### Pasos

1. Clona el repositorio y entra en la carpeta del proyecto:

   ```bash
   git clone <URL_DEL_REPOSITORIO>
   cd DevWebCamp
   ```

2. Instala las dependencias de PHP y Node.js:

   ```bash
   composer install
   npm install
   ```

3. Crea una base de datos MySQL para el proyecto e importa el esquema y los datos iniciales disponibles en tu entorno.

4. Crea el archivo `includes/.env` con las credenciales de conexión:

   ```env
   DB_HOST=localhost
   DB_USER=root
   DB_PASS=
   DB_NAME=devwebcamp
   ```

5. Genera los recursos iniciales de estilos e imágenes:

   ```bash
   npx gulp css
   npx gulp imagenes
   ```

   Durante el desarrollo, deja Gulp observando cambios y compilando también el JavaScript con:

   ```bash
   npm run dev
   ```

6. Configura el servidor local para apuntar a `public/` como directorio público. En XAMPP o Laragon, inicia Apache y MySQL y abre la URL local asignada al proyecto.

## Estructura principal

```text
controllers/  Controladores MVC y endpoints de la API
models/       Modelos y acceso a datos
views/        Vistas públicas, de autenticación, registro y administración
classes/      Clases auxiliares
includes/     Bootstrap de la aplicación, funciones y conexión a MySQL
public/       Punto de entrada y recursos públicos compilados
src/          JavaScript, Sass e imágenes fuente
```
