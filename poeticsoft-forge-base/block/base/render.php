<?php

/**
 * - $attributes: atributos del bloque
 * - $content: contenido interno, si aplica
 * - $block: array con info completa del bloque
 */

defined('ABSPATH') || exit;

echo '<div
  id="' . $attributes['blockId'] . '"
  class="wp-block-poeticsoft-base"
>
    BASE
</div>';
