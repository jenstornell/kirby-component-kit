<?php
return function() {
    $image_url = u(ckit::assets() . '/showcase');
    $items = [
        (object)[
            'url' => '#',
            'title' => 'Case 1',
            'image_url' => $image_url . '/case1.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 2',
            'image_url' => $image_url . '/case2.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 3',
            'image_url' => $image_url . '/case3.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 4',
            'image_url' => $image_url . '/case4.jpg',
        ],
        (object)[
            'url' => '#',
            'title' => 'Case 5',
            'image_url' => $image_url . '/case5.jpg',
        ],
    ];
    return [
        'title' => 'Home',
        'items' => $items,
        'intro' => 'Cake tiramisu tootsie roll tiramisu bear claw dragée gummies. Danish candy canes chocolate soufflé lemon drops. Biscuit cookie tootsie roll gummies sesame snaps chupa chups.',
        'text' => 'Danish powder jelly-o. Gummi bears chupa chups macaroon jujubes. Tootsie roll jelly-o soufflé croissant.',
        'projects_url' => '#',
    ];
};