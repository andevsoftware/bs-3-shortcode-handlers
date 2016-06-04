<?php

namespace BS3ShortcodeHandlers\Handlers;

use BS3ShortcodeHandlers\Helpers\FormatHelper;
use BS3ShortcodeHandlers\Parsers\DataAttrParser;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

final class ResponsiveHandler
{

    public function __invoke(ShortcodeInterface $shortcode)
    {
        $attributeParser = new DataAttrParser();
        $formatHelper = new FormatHelper();

        $atts = array(
            "visible" => $shortcode->getParameter('visible', false),
            "hidden" => $shortcode->getParameter('hidden', false),
            "block" => $shortcode->getParameter('block', false),
            "inline" => $shortcode->getParameter('inline', false),
            "inline_block" => $shortcode->getParameter('inline_block', false),
            "xclass" => $shortcode->getParameter('xclass', false),
            "data" => $shortcode->getParameter('data', false)
        );

        $class = '';
        if ($atts['visible']) {
            $visible = explode(' ', $atts['visible']);
            foreach ($visible as $v):
                $class .= "visible-$v ";
            endforeach;
        }
        if ($atts['hidden']) {
            $hidden = explode(' ', $atts['hidden']);
            foreach ($hidden as $h):
                $class .= "hidden-$h ";
            endforeach;
        }
        if ($atts['block']) {
            $block = explode(' ', $atts['block']);
            foreach ($block as $b):
                $class .= "visible-$b-block ";
            endforeach;
        }
        if ($atts['inline']) {
            $inline = explode(' ', $atts['inline']);
            foreach ($inline as $i):
                $class .= "visible-$i-inline ";
            endforeach;
        }
        if ($atts['inline_block']) {
            $inline_block = explode(' ', $atts['inline_block']);
            foreach ($inline_block as $ib):
                $class .= "visible-$ib-inline ";
            endforeach;
        }
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
