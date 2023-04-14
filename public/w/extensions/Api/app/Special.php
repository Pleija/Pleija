<?php

namespace App;

use MWException;
use OutputPage;
use SpecialPage;

class Special extends SpecialPage
{
    function __construct() {
        parent::__construct( 'Api' );
    }

    /**
     * @throws MWException
     */
    public function execute($subPage)
    {
        /** @var OutputPage $wgOut */
        global $wgOut;
        //$wgOut->addModules('ext.Api');

        $request = $this->getRequest();
        $output = $this->getOutput();
        $this->setHeaders();

        # Get request data from, e.g.
        $param = $request->getText( 'param' );

        # Do stuff
        # ...
        $wikitext = 'Hello world!';
        $output->addWikiTextAsInterface( $wikitext );

        $mwoOut = $this->getOutput();
        $mwoOut->setPageTitle('Manage Invite Codes');

    }
}
