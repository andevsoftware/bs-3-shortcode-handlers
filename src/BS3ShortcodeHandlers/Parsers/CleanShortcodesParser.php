<?php

namespace BS3ShortcodeHandlers\Parsers;

final class CleanShortcodesParser
{

    public function __invoke($content)
    {
        $array = array(
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']',
            ']<br>' => ']'
        );

        $content = strtr($content, $array);
        return $content;
    }
}
