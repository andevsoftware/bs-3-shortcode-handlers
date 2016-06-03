<?php

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

return function (ShortcodeInterface $s) {

    $atts = array(
        "xclass" => $s->getParameter('xclass', false)
    );

    $class = 'row';
    $class .= ($atts['xclass']) ? ' ' . $atts['xclass'] : '';

    return sprintf('<div class="%s">%s</div>', trim($class), $s->getContent());

};
