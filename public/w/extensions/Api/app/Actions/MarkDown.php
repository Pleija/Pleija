<?php

namespace App\Actions;

use ErrorPageError;

class MarkDown extends \Action
{

    public function getName(): string
    {
        return "md";
        // TODO: Implement getName() method.
    }

    /**
     * @throws \MWException
     */
    public function show()
    {
        // Create local instances of the context variables we need, to simplify later code.
        $out = $this->getOutput();
        $request = $this->getRequest();

        // The view is the same for the main page and the talk page, so if we're on the
        // talk page then we need to change $Title to point to the subject page instead.
        $title = $this->page->getTitle();
        if ( $title->isTalkPage() ) {
            $title = $title->getSubjectPage();
        }

        // Set page title.
        $out->setPageTitle( 'Example Page Title' );

        // Get some parameters from the URL.
        $param = $request->getIntOrNull( 'example_param' );

        // Do some internal stuff to generate the content (placed in $output).
        $output = "{{hello}}";

        // Output the results.
        //$out->addHTML( $output );
        // or
        $out->addWikiTextAsContent( $output );
    }
}
