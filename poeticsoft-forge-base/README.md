# Poeticsoft Forge Base

[![PHP Version](https://img.shields.io/badge/php-%3E%3D7.4-8892bf.svg)](https://php.net)
[![WordPress](https://img.shields.io/badge/wordpress-%3E%3D5.8-0073aa.svg)](https://wordpress.org)
[![License](https://img.shields.io/badge/license-GPL--3.0--or--later-blue.svg)](https://www.gnu.org/licenses/gpl-3.0.html)

Módulo base esencial para el ecosistema **Poeticsoft Forge**. Este plugin actúa como el cimiento técnico para todos los módulos secundarios, proporcionando la interfaz de integración con el motor central **Poeticsoft Heart**.

## 🏗️ Arquitectura

Este plugin sigue los principios de la **Arquitectura Poeticsoft**:
- **Inyección de Dependencias**: Recibe el motor `Engine` a través de un contrato formal.
- **Patrón Singleton**: Garantiza una única instancia del módulo en ejecución.
- **Estándar PSR-12**: Código limpio, legible y profesional.

## ⚙️ Requisitos

Este módulo **no funciona de forma independiente**. Requiere:
1. [Poeticsoft Heart](https://github.com/albertomoralpoeticsoft/poeticsoft-heart) (Plugin Núcleo) activado.
2. PHP 7.4 o superior.
3. Composer para la gestión de dependencias.

## 🚀 Instalación

1. Clona el repositorio en tu carpeta de plugins de WordPress:
   ```bash
   git clone [https://github.com/albertomoralpoeticsoft/poeticsoft-forge-base.git](https://github.com/albertomoralpoeticsoft/poeticsoft-forge-base.git)