<?php

namespace BS3ShortcodeHandlers\Handlers;

use BS3ShortcodeHandlers\Helpers\FormatHelper;
use BS3ShortcodeHandlers\Parsers\DataAttrParser;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

final class AlertHandler
{

    public function __invoke(ShortcodeInterface $shortcode)
    {
        $attributeParser = new DataAttrParser();
        $formatHelper = new FormatHelper();

        $atts = array(
            "type" => $shortcode->getParameter('type', false),
            "dismissable" => $shortcode->getParameter('dismissable', false),
            "xclass" => $shortcode->getParameter('xclass', false),
            "data" => $shortcode->getParameter('data', false)
        );

        $class = 'alert';
        $class .= ($atts['type']) ? ' alert-' . $atts['type'] : ' alert-success';
        $class .= ($atts['dismissable'] == 'true') ? ' alert-dismissable' : '';
        $class .= ($atts['xclass']) ? ' ' . $atts['xclass'] : '';

        $dismissable = ($atts['dismissable']) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' : '';

        $dataProps = $attributeParser($atts['data']);

        return sprintf('<div class="%s"%s>%s%s</div>',
            $formatHelper->esc_attr($class),
            ($dataProps) ? ' ' . $dataProps : '',
            $dismissable,
            $shortcode->getContent());
    }
}
