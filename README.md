# Ayrton
Ayrton es una aplicación web desarrollada en Laravel con plantillas Blade, diseñada para mejorar la gestión del tiempo y la productividad de los usuarios mediante un enfoque basado en tareas, desafíos automáticos y análisis del rendimiento. Inspirada en la disciplina y velocidad de Ayrton Senna, esta herramienta busca optimizar la organización personal y profesional.

## 🚀 Características Principales

### 📌 Módulo de Tareas
- Creación, edición y eliminación de tareas.
- Asignación de prioridades y categorización.
- Organización en listas personalizadas.

### ⏳ Módulo de Priorización
- Reconocimiento de tareas urgentes e importantes.
- Algoritmo inteligente para sugerir prioridades.
- Integración con recordatorios y deadlines.

### 🔔 Módulo de Recordatorios
- Notificaciones y alertas personalizadas.
- Establecimiento de fechas límite.
- Sincronización con el calendario interno.

### 📅 Módulo de Calendario
- Vista semanal y mensual de tareas y eventos.
- Agregado y gestión de eventos importantes.
- Sincronización con otros módulos de productividad.

### 🏆 Módulo de Desafíos
- Seguimiento automático de streaks de productividad.
- Logros desbloqueables según la constancia del usuario.
- Motivación mediante notificaciones y premios virtuales.

### 📲 Módulo de Notificaciones
- Recordatorios automáticos según la actividad del usuario.
- Confirmaciones de eventos, pagos y tareas completadas.
- Notificaciones en tiempo real.

### 💳 Módulo de Pasarela de Pagos
- Procesamiento de pagos con tarjetas de crédito y débito.
- Creación y almacenamiento de métodos de pago.
- Historial de pagos y generación automática de facturas electrónicas.
- Reembolsos y gestión de disputas.

### 🛠️ Módulo de Gestión de Usuarios
- Creación y administración de cuentas de usuario.
- Gestión de permisos y roles dentro de la aplicación.
- Registro de actividad y estadísticas personales.

## 🔧 Tecnologías Utilizadas

- **Framework Backend:** Laravel 12
- **Frontend:** Plantillas Blade,Tailwind CSS
- **Base de Datos:** PostgreSQL
- **Autenticación y Seguridad:** Laravel Breeze / Sanctum
- **Pasarela de Pagos:** Stripe / MercadoPago

## 📜 Instalación y Configuración en Local

### 1️⃣ Clonar el Repositorio
```bash
git clone https://github.com/tu-usuario/ayrton.git
cd ayrton
```

### 2️⃣ Configurar el Entorno
Renombra el archivo de configuración `.env.example` a `.env`:
```bash
composer install
cp .env.example .env
```
Genera la clave de aplicación de Laravel:
```bash
php artisan key:generate
```

### 3️⃣ Configurar la Base de Datos
Edita el archivo `.env` y ajusta la configuración de la base de datos:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=Ayrton
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

Luego, ejecuta las migraciones y los seeders:
```bash
php artisan migrate --path=database/migrations/2025_03_18_192603_create_roles_table.php
php artisan migrate --path=database/migrations/2025_03_18_180108_create_users_table.php
php artisan migrate --path=database/migrations/2025_03_18_194230_create_pqrs_table.php
php artisan migrate --path=database/migrations/2025_03_18_193638_create_plans_table.php
php artisan migrate --path=database/migrations/2025_03_18_195030_create_payments_table.php
php artisan migrate --path=database/migrations/2025_03_18_195902_create_challenges_table.php
php artisan migrate --path=database/migrations/2025_03_18_200438_create_rankings_table.php
php artisan migrate --path=database/migrations/2025_03_18_200707_create_vouchers_table.php
php artisan migrate --path=database/migrations/2025_03_18_192931_create_tasks_table.php
php artisan migrate --path=database/migrations/2025_03_18_203517_create_user_pqr_table.php
php artisan migrate --path=database/migrations/2025_03_18_204502_create_user_task_table.php
php artisan migrate --path=database/migrations/2025_03_18_205352_create_payment_user_table.php
php artisan migrate --path=database/migrations/2025_03_18_210831_create_challenge_task_table.php
php artisan migrate --path=database/migrations/2025_03_18_211351_create_challenge_ranking_table.php
php artisan migrate --seed

```

### 4️⃣ Iniciar el Servidor
Ejecuta el siguiente comando para iniciar la aplicación:
```bash
php artisan serve
```
La aplicación estará disponible en `http://127.0.0.1:8000`

## 🤝 Contribuciones

Si deseas contribuir a **Ayrton**, sigue estos pasos:
1. Haz un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature-nueva-funcionalidad`).
3. Realiza tus cambios y haz un commit (`git commit -m "Descripción del cambio"`).
4. Sube tus cambios (`git push origin feature-nueva-funcionalidad`).
5. Abre un Pull Request.

## 🏅 Licencia

Este proyecto está bajo la **Licencia MIT**, lo que significa que puedes usarlo, modificarlo y distribuirlo libremente.

## 📩 Contacto

Si tienes dudas o sugerencias, contáctame:
📧 Email: caceresgabriel305@gmail.com
