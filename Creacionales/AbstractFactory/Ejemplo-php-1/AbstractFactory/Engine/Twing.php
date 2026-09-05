<?php

namespace AbstractFactory\Engine;

class   Twing
{
    public static function render(string $templateString, array $arguments = []): string
    {
        // Simula reemplazo de estilo Twig
        $replaced = $templateString;

        foreach ($arguments as $key => $value) {
            $replaced = str_replace('{{' . $key . '}}', $value, $replaced);
        }

        return $replaced;
    }
}