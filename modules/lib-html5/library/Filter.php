<?php
/**
 * Filter
 * @package lib-html5
 * @version 0.0.1
 */

namespace LibHtml5\Library;

use Masterminds\HTML5;

class Filter
{
    private static function processDom(&$dom, $options) {
        $children = $dom->childNodes;

        foreach($children as $child) {
            $tag = strtolower($child->nodeName);
            if($tag === '#text')
                continue;

            if (!isset($options[$tag])){
                $dom->removeChild($child);
                continue;
            }

            $attrs = $child->attributes;
            if($attrs->length) {
                for($i=0; $i<$attrs->length; $i++) {
                    $attr = $attrs->item($i);

                    if(!in_array($attr->name, $options[$tag])) {
                        $child->removeAttribute($attr->name);
                    }
                }
            }

            self::processDom($child, $options);
        }
    }

    static function html($value, $options, $object, $field, $filters){
        if(!$value)
            return null;

        $html = new HTML5();
        $dom  = $html->loadHTMLFragment($value);
        $children = $dom->childNodes;
        $options = (array)$options;

        self::processDom($dom, $options);

        $result = $html->saveHTML($dom);

        return $result;
    }
}
