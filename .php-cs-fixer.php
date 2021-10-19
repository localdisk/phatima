<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/database/factories',
        __DIR__ . '/database/seeders',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
    ]);

$config = new PhpCsFixer\Config();

return $config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        '@PhpCsFixer:risky' => true,
        'single_blank_line_at_eof' => true,
        'no_alternative_syntax' => false,
        'blank_line_after_opening_tag' => false,
        'blank_line_before_statement' => [
            'statements' => [],
        ],
        'concat_space' => [
            'spacing' => 'one',
        ],
        'increment_style' => [
            'style' => 'post',
        ],
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],
        'no_superfluous_phpdoc_tags' => ['allow_mixed' => true],
        'ordered_class_elements' => false,
        'php_unit_internal_class' => false,
        'php_unit_test_class_requires_covers' => false,
        'full_opening_tag' => true,
        'echo_tag_syntax' => [
            'format' => 'short',
        ],
        'phpdoc_align' => [
            'align' => 'left',
        ],
        'phpdoc_separation' => false,
        'phpdoc_to_comment' => false,
        'phpdoc_var_without_name' => false,
        'single_blank_line_before_namespace' => false,
        'yoda_style' => false,
        'single_quote' => true,
        'array_syntax' => ['syntax' => 'short'],
        'list_syntax' => ['syntax' => 'short'],
        'function_typehint_space' => true,
        'binary_operator_spaces' => true,
        'no_spaces_around_offset' => true,
        'no_useless_else' => true,
        'single_line_comment_style' => [
            'comment_types' => [
                'hash',
            ],
        ],
        'braces' => false,
        'method_argument_space' => false,
        'return_type_declaration' => ['space_before' => 'none'],
        'no_unused_imports' => true,
        'class_attributes_separation' => [
            'elements' => [
                'const' => 'one',
                'method' => 'one',
                'property' => 'one',
            ],
        ],
        'no_blank_lines_after_phpdoc' => true,

    ])
    ->setFinder($finder);
