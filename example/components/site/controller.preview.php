<?php
return function() {
    return [
        'site_title' => 'Home',
        'title' => 'Title tag',
        'meta_description' => 'Fruitcake lollipop gummi bears danish dragée wafer powder topping jelly-o. Candy caramels tart halvah. Wafer jelly-o oat cake.',
        'lang' => 'en',
        'copyright' => 'Copyright 2012 Kirby',
        'menu' => [
            (object)[
                'url' => '#',
                'title' => 'Item 1',
                'class' => ' is-active',
            ],
            (object)[
                'url' => '#',
                'title' => 'Item 2',
                'class' => ' active',
            ],
            (object)[
                'url' => '#',
                'title' => 'Item 3',
                'class' => ' active',
            ],
        ],
    ];
};