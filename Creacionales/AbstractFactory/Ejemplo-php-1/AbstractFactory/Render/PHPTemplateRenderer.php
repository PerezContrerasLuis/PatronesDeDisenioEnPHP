<?php

namespace AbstractFactory\Render;

use AbstractFactory\Render\TemplateRender;

class PHPTemplateRenderer implements TemplateRender
{
    public function render(string $templateString, array $arguments = []): string
    {
        $replaced = $templateString;

        foreach ($arguments as $key => $value) {
            $replaced = str_replace("{{" . $key . "}}", $value, $replaced);
            $replaced = str_replace("<?= $" . $key . " ?>", $value, $replaced);
        }

        return $replaced;
    }
}
