<?php

return [
    '__name' => 'lib-html5',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/lib-html5.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-html5' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [],
        'optional' => [
            [
                'lib-validator' => NULL
            ]
        ],
        'composer' => [
            'masterminds/html5' => '^2.0'
        ]
    ],
    'autoload' => [
        'classes' => [
            'LibHtml5\\Library' => [
                'type' => 'file',
                'base' => 'modules/lib-html5/library'
            ]
        ],
        'files' => []
    ],
    'libValidator' => [
        'filters' => [
            'html' => 'LibHtml5\\Library\\Filter::html'
        ]
    ]
];
