# 📁 Frontend — Proyecto Vaquitas Respaldo

Este directorio contiene todo el código del lado del cliente (frontend) del proyecto. Está dividido en **dos zonas claramente separadas** según el tipo de usuario al que van dirigidas.

---

## 🗂️ Estructura de carpetas

```
Frontend/
├── zona_admin/       ← Panel de administración (uso interno)
├── zona_publica/     ← Interfaz pública (lo que ve el cliente)
└── README.md
```

---

## 🔐 `zona_admin` — Panel Administrativo

Esta carpeta contiene **toda la interfaz visual del backend**, es decir, las pantallas y componentes que usan los administradores y el equipo interno del proyecto.

### ¿Qué incluye?
- Dashboards de gestión y control
- Formularios de creación, edición y eliminación de datos
- Tablas de administración de registros
- Vistas de reportes e indicadores internos
- Cualquier pantalla que consuma endpoints protegidos o requiera autenticación de administrador

### ⚠️ Importante para colaboradores
> Esta zona **NO es pública**. Las rutas y componentes aquí desarrollados deben estar protegidos por autenticación. No expongas rutas de `zona_admin` sin control de acceso.

---

## 🌐 `zona_publica` — Interfaz del Cliente

Esta carpeta contiene **todo lo que ve y usa el cliente final**, es decir, la parte visible y accesible para cualquier usuario sin privilegios especiales.

### ¿Qué incluye?
- Página de inicio y landing pages
- Catálogo o listado de productos/servicios
- Flujos de registro, login y perfil de usuario
- Páginas informativas y de contacto
- Cualquier vista orientada al usuario final

### ✅ Importante para colaboradores
> Esta zona debe ser **rápida, accesible y amigable**. Prioriza la experiencia de usuario (UX), el rendimiento y la responsividad. Es la cara del proyecto hacia el mundo.

---

## 📌 Reglas generales para colaboradores

1. **No mezcles código** de `zona_admin` con `zona_publica`. Cada zona tiene su propio propósito y audiencia.
2. Si creas un componente **compartido** entre ambas zonas, crea una carpeta `/components/shared/` dentro de la zona correspondiente o propón una carpeta de utilidades común.
3. Nombra tus archivos y carpetas en **snake_case** para mantener consistencia con la estructura existente.
4. Antes de hacer un PR, asegúrate de que tus cambios **no rompen la otra zona**.
5. Consulta siempre el `Nota.txt` en la raíz del Frontend para notas adicionales del equipo.

---

## 🤝 ¿Dudas?

Si tienes preguntas sobre en qué zona debe ir tu código, pregúntale al equipo antes de crear nuevos archivos. Es mejor preguntar que tener que reorganizar después. 🐮
