<?php

namespace BS3ShortcodeHandlers\Handlers;

use BS3ShortcodeHandlers\Helpers\FormatHelper;
use BS3ShortcodeHandlers\Parsers\DataAttrParser;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

final class ContainerHandler
{

    public function __invoke(ShortcodeInterface $shortcode)
    {
        $attributeParser = new DataAttrParser();
        $formatHelper = new FormatHelper();

        $atts = array(
            "fluid" => $shortcode->getParameter('fluid', false),
            "xclass" => $shortcode->getParameter('xclass', false),
            "data" => $shortcode->getParameter('data', false)
        );

        $class = ($atts['fluid'] == 'true') ? 'container-fluid' : 'container';
        $class .= ($atts['xclass']) ? ' ' . $atts['xclass'] : '';

        $dataProps = $attributeParser($atts['data']);

        return sprintf('<div class="%s"%s>%s</div>', $formatHelper->esc_attr($class), ($dataProps) ? ' ' . $dataProps : '', $shortcode->getContent());
    }
}
