<?php

namespace AbstractFactory\Render;

use AbstractFactory\Render\TemplateRender;
use AbstractFactory\Engine\Twing;

class TwingRender implements TemplateRender 
{
    public function render(string $templateString, array $arguments = []): string
    {
        return Twing::render($templateString,$arguments);
    }
}