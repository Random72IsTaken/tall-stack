@php
$positionClasses = match (config('good-night.switcher-position')) {
    'top-right' => 'top-5 right-5',
    'top-left' => 'top-5 left-5',
    'bottom-left' => 'bottom-5 left-5',
    'bottom-right' => 'bottom-5 right-5',
};
@endphp

<!-- Good Night Switcher -->
<div
    x-data="goodNight()"
    x-bind="switcher"
>
    <!-- Icons -->
    <div class="relative w-8 h-8">
        <!-- Sun -->
        <div
            class="absolute inset-0 m-auto w-full h-full"
            x-cloak
            x-show="shown && !isNight"
            x-transition
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-full w-full fill-primary-600 dark:fill-dark-primary-500 stroke-primary-600 dark:stroke-dark-primary-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
                />
            </svg>
        </div>

        <!-- Moon -->
        <div
            class="absolute inset-0 m-auto w-full h-full"
            x-cloak
            x-show="shown && isNight"
            x-transition
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-full w-full fill-primary-600 dark:fill-dark-primary-500 stroke-primary-600 dark:stroke-dark-primary-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                />
            </svg>
        </div>
    </div>

    @include('good-night::partials.good-night-script')

    <!-- Good Night Script -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('goodNight', () => ({
                shown: false,

                init() {
                    this.$nextTick(() => {
                        window.goodNightInitializer();
                        this.shown = true;
                    });
                },
                get isNight() {
                    return this.$store.goodNightMode === 'dark';
                },

                switcher: {
                    'class': "absolute {{ $positionClasses }}",
                    ['x-cloak']() {},
                    ['x-show']() {
                        return this.shown;
                    },
                    ['x-transition']() {},
                    ['x-on:click']() {
                        window.goodNightToggler(this.$store.goodNightMode);
                    },
                },
            }));
        });
    </script>
</div>
