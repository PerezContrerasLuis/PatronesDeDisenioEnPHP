<?php
namespace AbstractFactory\Template;

use AbstractFactory\Template\BasePageTemplate;

class PhpPageTemplate extends BasePageTemplate
{
    public function getTemplateString(): string
    {
        $renderedTitle = $this->titleTemplate->getTemplateString();

        return <<<HTML
        <div class="page">
            $renderedTitle
            <article class="content">{{content}}</article>
        </div>
        HTML;
    }
    
}