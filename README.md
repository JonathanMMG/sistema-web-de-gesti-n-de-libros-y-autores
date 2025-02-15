# Sistema de Gestión de Libros y Autores

Este proyecto es una aplicación web desarrollada en PHP que permite gestionar libros y sus autores. La aplicación te permite registrar, actualizar, listar y eliminar libros, utilizando sesiones para el almacenamiento temporal de datos.

## Funcionalidades

- **Registro de Libros:** Formulario para registrar libros con campos para título, autor, precio y cantidad de ejemplares.
- **Actualización y Eliminación:** Edita o elimina libros existentes.
- **Listado de Libros:** Muestra todos los libros registrados en una tabla con opciones para editar o eliminar.
- **Menú de Navegación:** Facilita la navegación entre las diferentes secciones del sistema.
- **Validación y Seguridad:** Se validan los datos de entrada y se aplican técnicas de sanitización (por ejemplo, `htmlspecialchars`) para prevenir vulnerabilidades.

## Requisitos

- PHP 7.0 o superior.
- Un servidor web local (por ejemplo, Apache o Nginx). Puedes usar herramientas como [XAMPP](https://www.apachefriends.org/) o [WAMP](https://www.wampserver.com/).
- Opcional: [Visual Studio Code](https://code.visualstudio.com/) con las extensiones **PHP Server** y **PHP Debug** para mejorar tu flujo de trabajo.
Si usas la extensión PHP Server:
Haz clic derecho sobre el archivo index.php y selecciona "PHP Server: Serve project".
Accede a http://localhost:3000 (o el puerto que se indique) para ver la aplicación en acción.
Estructura del Proyecto
bash
Copiar
/LIBRERIA
│
├── index.php         # Página de inicio y configuración inicial
├── register.php      # Formulario de registro de libros
├── list.php          # Listado de libros con opciones de edición y eliminación
├── update.php        # Formulario para actualizar la información de un libro
├── delete.php        # Script para eliminar un libro
├── contact.php       # Página de contacto
├── header.php        # Menú de navegación común a todas las páginas
├── styles.css        # Archivo de estilos mejorado
└── README.md         # Este archivo
## USO
Inicio: Página principal con bienvenida e instrucciones básicas.
Registrar Libro: Accede al formulario para añadir un nuevo libro.
Listado de Libros: Visualiza todos los libros registrados y accede a opciones de edición o eliminación.

## AUTOR
[JONATHAN MIGUEL MORETA GUAMAN]
