<?php

namespace AbstractFactory\Factory;

use AbstractFactory\Render\TemplateRender;
use AbstractFactory\Template\PageTemplate;
use AbstractFactory\Template\TitleTemplate;


interface TemplateFactory 
{
    public function createTitleTemplate(): TitleTemplate;
    public function createPageTemplate(): PageTemplate;
    public function getRenderer(): TemplateRender;
}