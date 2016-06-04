<?php

namespace BS3ShortcodeHandlers\Parsers;

use BS3ShortcodeHandlers\Helpers\FormatHelper;

final class DataAttributesParser
{

    public function __invoke($data)
    {
        $formatHelper = new FormatHelper();

        $data_props = '';

        if ($data) {
            $data = explode('|', $data);

            foreach ($data as $d) {
                $d = explode(',', $d);
                $data_props .= sprintf('data-%s="%s" ', $formatHelper->esc_html($d[0]),
                    $formatHelper->esc_attr(trim($d[1])));
            }
        } else {
            $data_props = false;
        }
        return $data_props;
    }
}
