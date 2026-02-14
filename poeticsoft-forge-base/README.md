# Poeticsoft Forge Base

Plugin hijo del ecosistema Poeticsoft Heart que implementa un panel de administración básico.

## Requisitos

- WordPress 5.8 o superior
- PHP 7.4 o superior
- **Poeticsoft Heart** (plugin base requerido)

## Características

- ✅ Implementa la interfaz `ModuleInterface` de Poeticsoft Heart
- ✅ Se registra automáticamente con el Engine de Heart
- ✅ Panel de administración básico con dashboard
- ✅ Muestra información del sistema y módulos registrados
- ✅ Arquitectura extensible para agregar más funcionalidades

## Instalación

1. Asegúrate de tener instalado y activado el plugin **Poeticsoft Heart**
2. Sube la carpeta `poeticsoft-forge-base` al directorio `/wp-content/plugins/`
3. Activa el plugin desde el panel de administración de WordPress

## Uso

Una vez activado, encontrarás un nuevo menú "Forge" en el panel de administración de WordPress con las siguientes opciones:

- **Dashboard**: Vista general del sistema y módulos registrados

## Desarrollo

### Estructura de Archivos

```
poeticsoft.forge.base/
├── poeticsoft-forge-base/
│   ├── class/
│   │   └── Forge/
│   │       └── Base.php
│   ├── languages/
│   ├── composer.json
│   ├── poeticsoft-forge-base.php
│   └── README.md
├── .gitignore
└── poeticsoft.forge.base.code-workspace
```

### Agregar Nuevas Funcionalidades

Para agregar nuevas páginas al panel de administración, edita el método `register_admin_menu()` en `class/Forge/Base.php`:

```php
add_submenu_page(
    'poeticsoft-forge',
    'Nueva Página',
    'Nueva Página',
    'manage_options',
    'poeticsoft-forge-nueva',
    [$this, 'render_nueva_pagina']
);
```

## Licencia

GPL-3.0-or-later

## Autor

Poeticsoft Team - [https://poeticsoft.com/team](https://poeticsoft.com/team)
