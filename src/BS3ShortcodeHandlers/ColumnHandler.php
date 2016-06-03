<?php

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

return function (ShortcodeInterface $s) {

    $atts = array(
        "lg" => $s->getParameter('lg', false),
        "md" => $s->getParameter('md', false),
        "sm" => $s->getParameter('sm', false),
        "xs" => $s->getParameter('xs', false),
        "offset_lg" => $s->getParameter('offset_lg', false),
        "offset_md" => $s->getParameter('offset_md', false),
        "offset_sm" => $s->getParameter('offset_sm', false),
        "offset_xs" => $s->getParameter('offset_xs', false),
        "pull_lg" => $s->getParameter('pull_lg', false),
        "pull_md" => $s->getParameter('pull_md', false),
        "pull_sm" => $s->getParameter('pull_sm', false),
        "pull_xs" => $s->getParameter('pull_xs', false),
        "push_lg" => $s->getParameter('push_lg', false),
        "push_md" => $s->getParameter('push_md', false),
        "push_sm" => $s->getParameter('push_sm', false),
        "push_xs" => $s->getParameter('push_xs', false),
        "xclass" => $s->getParameter('xclass', false)
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

    return sprintf('<div class="%s">%s</div>', trim($class), $s->getContent());

};
