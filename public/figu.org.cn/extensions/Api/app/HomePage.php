<?php

namespace App;

class HomePage
{

    public function __construct()
    {

    }

    /**
     * @param \Parser &$parser
     * @param string $value
     * @param mixed ...$args
     */
    public static function Render(\Parser &$parser, string $value, ...$args)
    {
        $output = <<<EOT
MediaWiki:Index.css
EOT;

        $title = $parser->getTitle();
        $options = $parser->Options();
        //$options->enableLimitReport(false);
        // die($p->parse($output, $title, $options)->getText());
        return [$parser->getFreshParser()->parse(\CSS::CSSRender($parser, $output), $title, $options)->getText(), 'isHtml' => true];

        //return $parser->parse($output );
        //[ $output, 'noparse' => false, 'isHTML' => false ];
        //[$output, 'noparse' => true, 'isHTML' => true];
    }

}
