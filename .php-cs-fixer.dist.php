<?php


$finder = PhpCsFixer\Finder::create()
    ->exclude('content')
    ->exclude('kirby')
    ->exclude('node_modules')
    ->exclude('public')
    //->exclude('site/plugins')
    ->exclude('src')
    ->exclude('storage')
    ->exclude('vendor')
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true,
    ])
    ->setFinder($finder)
    ;
