<?php
namespace AbstractFactory\Render;

interface TemplateRender
{
    public function render(string $templateString, array $arguments = []): string;
}