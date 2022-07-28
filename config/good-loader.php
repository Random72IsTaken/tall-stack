<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Loading Font
     |--------------------------------------------------------------------------
     |
     | Provide the name of the font you're using, so that the sentence won't
     | load until that font is loaded at least.
     |
     */

    'font' => env('GOOD_LOADER_FONT', 'Mulish'),


    /*
     |--------------------------------------------------------------------------
     | Loading Sentence
     |--------------------------------------------------------------------------
     |
     | Customize the sentence which shows up at the center of the screen before
     | the page is completely loaded.
     |
     */

    'sentence' => env('GOOD_LOADER_SENTENCE', 'Loading...'),


    /*
     |--------------------------------------------------------------------------
     | Loading Transitions
     |--------------------------------------------------------------------------
     |
     | The time it takes to transition (fade) the `background` and the `sentence`.
     |
     */

    'transitions' => [
        'background' => env('GOOD_LOADER_TRANSITIONS_BACKGROUND', 1000),
        'sentence' => env('GOOD_LOADER_TRANSITIONS_SENTENCE', 300),
    ],


    /*
     |--------------------------------------------------------------------------
     | Loading Durations
     |--------------------------------------------------------------------------
     |
     | The time it takes for the `sentence` to start `animating`, as things are
     | still not loaded...
     |
     */

    'durations' => [
        'sentence-animating' => env('GOOD_LOADER_DURATIONS_SENTENCE_ANIMATING', 750),
    ],

];
