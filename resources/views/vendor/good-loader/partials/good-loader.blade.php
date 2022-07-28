<!-- Good Loader -->
<div class="fixed z-[99] grid h-full w-full items-center bg-white transition-opacity"
     style="transition-duration: {{ config('good-loader.transitions.background') }}ms;"
     x-data="{}"
     x-init="$nextTick(() => {
         clearTimeout(window.goodLoader);

         const $sentence = document.getElementById('good-loader-sentence');

         $sentence.classList.add('prevent-animating');
         $sentence.classList.add('opacity-0');

         $el.classList.add('opacity-0');

         setTimeout(() => {
            $el.classList.add('invisible');
         }, {{ config('good-loader.transitions.background') }});
     });">
    <!-- Background -->
    <div id="good-loader-background"
         class="fixed z-[98] h-full w-full bg-white transition-opacity"
         style="transition-duration: {{ config('good-loader.transitions.sentence') }}ms;">
    </div>

    <!-- Sentence -->
    <div id="good-loader-sentence"
         class="text-center text-xl opacity-0 transition-opacity"
         style="transition-duration: {{ config('good-loader.transitions.sentence') }}ms;">
        {{ config('good-loader.sentence') }}
    </div>

    <!-- Script -->
    <script>
        setTimeout(() => {
            document.fonts.load('1.25rem "{{ config('good-loader.font') }}"').then(() => {
                window.goodLoader = setTimeout(() => {
                    if (document.readyState !== 'complete') {
                        const $background = document.getElementById('good-loader-background');
                        const $sentence = document.getElementById('good-loader-sentence');

                        $background.classList.add('opacity-0');

                        setTimeout(() => {
                            $sentence.classList.remove('opacity-0');
                        }, {{ config('good-loader.transitions.sentence') }});

                        setTimeout(() => {
                            if (!$sentence.classList.contains('prevent-animating')) {
                                $sentence.classList.add('animate-pulse');
                            }
                        }, {{ config('good-loader.durations.sentence-animating') }});
                    }
                }, 750);
            });
        }, 0);
    </script>
</div>
