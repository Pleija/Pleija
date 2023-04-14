<?php

class TryExtension extends SpecialPage
{
    public function execute($subPage)
    {
        /** @var OutputPage $wgOut */
        global $wgOut;
        $wgOut->addModules('ext.TryExtension');
    }
}