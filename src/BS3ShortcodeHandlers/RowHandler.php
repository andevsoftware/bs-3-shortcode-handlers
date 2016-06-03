<?php

namespace BS3ShortcodeHandlers;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

final class RowHandler
{

    function __invoke(ShortcodeInterface $shortcode)
    {

        $atts = array(
            "xclass" => $shortcode->getParameter('xclass', false)
        );

        $class = 'row';
        $class .= ($atts['xclass']) ? ' ' . $atts['xclass'] : '';

        return sprintf('<div class="%s">%s</div>', trim($class), $shortcode->getContent());
    }
}
