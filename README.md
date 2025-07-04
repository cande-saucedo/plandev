# 🗓️ PlanDev - Sistema Interno de Planeación Semanal y Seguimiento de Actividades Técnicas

## 📘 Descripción  
**PlanDev** es una aplicación web diseñada para agilizar la planificación, asignación y seguimiento de actividades semanales del equipo de desarrollo.  
Facilita la visibilidad sobre las tareas de cada integrante, ayuda a evitar la sobrecarga de trabajo y permite generar reportes rápidos de avance técnico.

---

## 🎯 Objetivo  
Optimizar la gestión semanal de tareas técnicas, mejorando la organización del equipo y facilitando la toma de decisiones basadas en datos reales de desempeño.

---

## 🚀 Funcionalidades principales  
- 📅 **Planeación semanal por desarrollador**: Registro de tareas estimadas por proyecto.  
- 🔽 **Asignación de tareas y prioridades**: Definición de tareas con prioridad alta / media / baja.  
- 📝 **Bitácora diaria**: Registro diario del trabajo realizado vinculado a tareas planificadas.  
- ⚖️ **Comparativo plan vs. real**: Visualización de desviaciones entre tareas estimadas y realizadas.  
- 📊 **Indicadores de carga de trabajo**: Monitorización para detectar sobreasignación o disponibilidad.  
- 📈 **Reportes automáticos**: Generación de resúmenes exportables en PDF o Excel.  
- 🗂️ **Historial por proyecto**: Trazabilidad y acumulado de tiempo invertido en cada proyecto.

---

## 🛠️ Tecnologías utilizadas  
- **PHP** 8.1 o superior  
- **Laravel** 10+  
- **MySQL** 8.0+  
- **Node.js** y **NPM** para la gestión de assets frontend

---

## ⚙️ Instalación del proyecto

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

📂 Documentación del proyecto
Toda la documentación oficial del sistema se encuentra en el directorio documentacion/, el cual incluye:

📄 Requerimientos Funcionales: Documento que describe las funcionalidades del sistema, casos de uso y reglas de negocio.

🧪 Pruebas Automatizadas: Archivos que contienen los casos de prueba para validar el comportamiento de las funcionalidades principales.

👤 Manual de Usuario: Guía paso a paso para el uso general de la plataforma por parte de los usuarios finales.