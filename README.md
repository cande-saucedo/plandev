# PlanDev - Sistema Interno de Planeación Semanal y Seguimiento de Actividades Técnicas

## Descripción  
PlanDev es una aplicación diseñada para agilizar la planificación, asignación y seguimiento de actividades semanales del equipo de desarrollo. Facilita la visibilidad sobre las tareas de cada integrante, ayuda a evitar la sobrecarga de trabajo y permite generar reportes rápidos de avance técnico.
---
## Objetivo  
Optimizar la gestión semanal de tareas técnicas, mejorando la organización del equipo y facilitando la toma de decisiones basadas en datos reales de desempeño.
---
## Funcionalidades principales  
- **Planeación semanal por desarrollador:** Registro de tareas estimadas por proyecto.  
- **Asignación de tareas y prioridades:** Asignación y propuesta de tareas con prioridad alta/media/baja.  
- **Bitácora diaria:** Registro diario del trabajo realizado vinculado a tareas planificadas.  
- **Comparativo plan vs. real:** Visualización de tareas estimadas versus realizadas con análisis de desviaciones.  
- **Indicadores de carga de trabajo:** Monitorización de carga semanal para detectar sobreasignación o disponibilidad.  
- **Reportes automáticos:** Resúmenes semanales exportables en PDF o Excel.  
- **Historial y seguimiento por proyecto:** Trazabilidad y acumulado de tiempo invertido en proyectos.
---
## Tecnologías  
- PHP 8.1 o superior  
- Laravel 10+  
- MySQL 8.0+  
--

## Instalación  
1. Clona el repositorio  
git clone https://github.com/tuusuario/plandev.git
2. Ingresa al directorio
cd plandev

3. Instala las dependencias

composer install
npm install

4. Configura el archivo .env con tus credenciales de base de datos y otros parámetros.

5. Ejecuta las migraciones y seeders

6. Compila los assets

npm run dev
7. Inicia el servidor local
php artisan serve
Uso
•	Accede a la aplicación en http://localhost:8000
•	Inicia sesión con las credenciales.
Usuario: admin@tamaulipas.gob.mx
Contraseña: 12345678
•	Comienza a planear tus tareas semanales, registrar bitácoras y generar estadísticas por proyecto.
