<?php

namespace Blog;

return [
    'controllers' => [#controllers cirados
        'factories' => [
        ]
    ],
    'router' => [#rotas urls
    ],
    'view_manager' => [
        'tamplate_path_stack' => [#aponta para a view
            'blog' => __DIR__ . "/../view"
        ]
    ]
];
