<?php
require_once __DIR__ . '/vendor/autoload.php';

// IMPORTACIONES de nombres con namespace
use AbstractFactory\Client\Page;
use AbstractFactory\Factory\PHPTemplateFactory;
use AbstractFactory\Factory\TwigTemplateFactory;

$page = new Page('Sample page', 'This is the body.');

echo "Testing actual rendering with the PHPTemplate factory:\n";
echo $page->render(new PHPTemplateFactory());

echo "\n\n";

echo "Testing actual rendering with the TwigTemplate factory:\n";
echo $page->render(new TwigTemplateFactory());