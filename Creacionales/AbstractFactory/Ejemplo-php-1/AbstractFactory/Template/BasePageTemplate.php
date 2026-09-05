<?php

namespace AbstractFactory\Template;

use AbstractFactory\Template\PageTemplate;
use AbstractFactory\Template\TitleTemplate;

abstract class BasePageTemplate implements PageTemplate
{
    protected $titleTemplate;

    public function __construct(TitleTemplate $titleTemplate)
    {
        $this->titleTemplate = $titleTemplate;
    }

}


