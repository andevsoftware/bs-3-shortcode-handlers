<?php

namespace BS3ShortcodeHandlers\Handlers;

use BS3ShortcodeHandlers\Helpers\FormatHelper;
use BS3ShortcodeHandlers\Parsers\DataAttrParser;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

final class ColumnHandler
{

    public function __invoke(ShortcodeInterface $shortcode)
    {
        $attributeParser = new DataAttrParser();
        $formatHelper = new FormatHelper();

        $atts = array(
            "lg" => $shortcode->getParameter('lg', false),
            "md" => $shortcode->getParameter('md', false),
            "sm" => $shortcode->getParameter('sm', false),
            "xs" => $shortcode->getParameter('xs', false),
            "offset_lg" => $shortcode->getParameter('offset_lg', false),
            "offset_md" => $shortcode->getParameter('offset_md', false),
            "offset_sm" => $shortcode->getParameter('offset_sm', false),
            "offset_xs" => $shortcode->getParameter('offset_xs', false),
            "pull_lg" => $shortcode->getParameter('pull_lg', false),
            "pull_md" => $shortcode->getParameter('pull_md', false),
            "pull_sm" => $shortcode->getParameter('pull_sm', false),
            "pull_xs" => $shortcode->getParameter('pull_xs', false),
            "push_lg" => $shortcode->getParameter('push_lg', false),
            "push_md" => $shortcode->getParameter('push_md', false),
            "push_sm" => $shortcode->getParameter('push_sm', false),
            "push_xs" => $shortcode->getParameter('push_xs', false),
            "xclass" => $shortcode->getParameter('xclass', false),
            "data" => $shortcode->getParameter('data', false)
        );

        $class = '';
        $class .= ($atts['lg']) ? ' col-lg-' . $atts['lg'] : '';
        $class .= ($atts['md']) ? ' col-md-' . $atts['md'] : '';
        $class .= ($atts['sm']) ? ' col-sm-' . $atts['sm'] : '';
        $class .= ($atts['xs']) ? ' col-xs-' . $atts['xs'] : '';
        $class .= ($atts['offset_lg'] || $atts['offset_lg'] === "0") ? ' col-lg-offset-' . $atts['offset_lg'] : '';
        $class .= ($atts['offset_md'] || $atts['offset_md'] === "0") ? ' col-md-offset-' . $atts['offset_md'] : '';
        $class .= ($atts['offset_sm'] || $atts['offset_sm'] === "0") ? ' col-sm-offset-' . $atts['offset_sm'] : '';
        $class .= ($atts['offset_xs'] || $atts['offset_xs'] === "0") ? ' col-xs-offset-' . $atts['offset_xs'] : '';
        $class .= ($atts['pull_lg'] || $atts['pull_lg'] === "0") ? ' col-lg-pull-' . $atts['pull_lg'] : '';
        $class .= ($atts['pull_md'] || $atts['pull_md'] === "0") ? ' col-md-pull-' . $atts['pull_md'] : '';
        $class .= ($atts['pull_sm'] || $atts['pull_sm'] === "0") ? ' col-sm-pull-' . $atts['pull_sm'] : '';
        $class .= ($atts['pull_xs'] || $atts['pull_xs'] === "0") ? ' col-xs-pull-' . $atts['pull_xs'] : '';
        $class .= ($atts['push_lg'] || $atts['push_lg'] === "0") ? ' col-lg-push-' . $atts['push_lg'] : '';
        $class .= ($atts['push_md'] || $atts['push_md'] === "0") ? ' col-md-push-' . $atts['push_md'] : '';
        $class .= ($atts['push_sm'] || $atts['push_sm'] === "0") ? ' col-sm-push-' . $atts['push_sm'] : '';
        $class .= ($atts['push_xs'] || $atts['push_xs'] === "0") ? ' col-xs-push-' . $atts['push_xs'] : '';
        $class .= ($atts['xclass']) ? ' ' . $atts['xclass'] : '';

        $dataProps = $attributeParser( $atts['data'] );

        return sprintf('<div class="%s"%s>%s</div>', $formatHelper->esc_attr($class), ( $dataProps ) ? ' ' . $dataProps : '', $shortcode->getContent());
    }
}
