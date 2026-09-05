<?php

namespace AbstractFactory\Factory;

use AbstractFactory\Factory\TemplateFactory;
use AbstractFactory\Template\TitleTemplate;
use AbstractFactory\Template\PageTemplate;
use AbstractFactory\Render\TemplateRender;
use AbstractFactory\Render\TwingRender;
use AbstractFactory\Template\TwingPageTemplate;
use AbstractFactory\Template\TwingTitleTemplate;

class TwigTemplateFactory implements TemplateFactory 
{
    public function createTitleTemplate(): TitleTemplate
    {
        return new TwingTitleTemplate();
    }
    public function createPageTemplate(): PageTemplate
    {
        return new TwingPageTemplate($this->createTitleTemplate());
    }
    public function getRenderer(): TemplateRender
    {
        return new TwingRender();
    }
}
