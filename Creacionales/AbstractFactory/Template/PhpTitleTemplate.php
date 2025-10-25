<?php

namespace AbstractFactory\Template;

use AbstractFactory\Template\TitleTemplate;

class PhpTitleTemplate implements TitleTemplate
{
    public function getTemplateString(): string
    {
        return "<h1> {{title}} </h1>";
    }
}