<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Default Mode
     |--------------------------------------------------------------------------
     |
     | Determine the default dark/light mode that the app will start with.
     |
     | The default is `light` and is stored in `$store.goodNightMode`.
     |
     */

    'default-mode' => env('GOOD_NIGHT_DEFAULT', 'light'),


    /*
     |--------------------------------------------------------------------------
     | Switcher Enabled
     |--------------------------------------------------------------------------
     |
     | Decide whether to show or hide the corner dark-mode switcher in the page.
     |
     | Either way, the package won't work without `@goodNight` directive.
     |
     */

    'switcher-enabled' => env('GOOD_NIGHT_ENABLED', true),


    /*
     |--------------------------------------------------------------------------
     | Switcher Position
     |--------------------------------------------------------------------------
     |
     | Determine the position of the corner switcher button when shown in the page.
     |
     | Available positions are: top-right, top-left, bottom-left, bottom-right.
     |
     */

    'switcher-position' => env('GOOD_NIGHT_POSITION', 'top-right'),

];
