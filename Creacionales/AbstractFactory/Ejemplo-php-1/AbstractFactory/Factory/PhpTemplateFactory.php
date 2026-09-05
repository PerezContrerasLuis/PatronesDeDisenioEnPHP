<?php

namespace AbstractFactory\Factory;

use AbstractFactory\Factory\TemplateFactory;
use AbstractFactory\Template\TitleTemplate;
use AbstractFactory\Template\PageTemplate;
use AbstractFactory\Render\TemplateRender;

use AbstractFactory\Template\PhpPageTemplate;
use AbstractFactory\Template\PhpTitleTemplate;
use AbstractFactory\Render\PHPTemplateRenderer;

class PhpTemplateFactory implements TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate
    {
        return new PhpTitleTemplate;
    }
    public function createPageTemplate(): PageTemplate
    {
        return new PhpPageTemplate($this->createTitleTemplate());
    }
    public function getRenderer(): TemplateRender
    {
        return new PHPTemplateRenderer();
    }
}