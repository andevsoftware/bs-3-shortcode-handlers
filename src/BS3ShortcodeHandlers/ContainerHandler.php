<?php

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

return function (ShortcodeInterface $s) {

    $atts = array(
        "fluid" => false,
        "xclass" => $s->getParameter('xclass', false)
    );

    $class = ($atts['fluid'] == 'true') ? 'container-fluid' : 'container';
    $class .= ($atts['xclass']) ? ' ' . $atts['xclass'] : '';

    return sprintf('<div class="%s">%s</div>', trim($class), $s->getContent());

};
