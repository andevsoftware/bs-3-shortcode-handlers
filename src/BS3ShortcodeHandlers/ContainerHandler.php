<?php

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

final class ContainerHandler
{

    public function __invoke(ShortcodeInterface $shortcode)
    {
        $atts = array(
            "fluid" => false,
            "xclass" => $shortcode->getParameter('xclass', false)
        );

        $class = ($atts['fluid'] == 'true') ? 'container-fluid' : 'container';
        $class .= ($atts['xclass']) ? ' ' . $atts['xclass'] : '';

        return sprintf('<div class="%s">%s</div>', trim($class), $shortcode->getContent());
    }
}
