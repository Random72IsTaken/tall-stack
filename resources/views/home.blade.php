<x-layouts.master bodyClasses="font-mulish">
    @push('fonts')
        <link rel="prefetch"
              href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    @endpush

    <div
         class="flex min-h-screen flex-col justify-center bg-neutral-50 py-8 transition dark:bg-slate-800 sm:py-12 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center">
            <div class="flex flex-col justify-around">
                <div class="space-y-6">
                    <button class="w-full"
                            type="button"
                            x-data="goodNight()"
                            x-bind="custom">
                        <x-home.application-logo class="mx-auto h-16 fill-indigo-600 dark:fill-amber-500" />
                    </button>

                    <a href="https://tallstack.dev"
                       target="_blank">
                        <h1
                            class="-mt-5 whitespace-pre-line text-center text-3xl font-extrabold tracking-wider text-neutral-600 hover:animate-pulse dark:text-neutral-50 sm:pb-2 sm:text-5xl">
                            T
                            A
                            L
                            L

                            S
                            T
                            A
                            C
                            K
                        </h1>
                    </a>

                    <div class="flex flex-col space-y-1 text-center sm:flex-row sm:space-y-0">
                        <x-home.link caption="TailwindCSS"
                                     link="https://tailwindcss.com" />
                        <x-home.link caption="Alpine.js"
                                     link="https://alpinejs.dev" />
                        <x-home.link caption="Livewire"
                                     link="https://laravel-livewire.com" />
                        <x-home.link caption="Laravel"
                                     link="https://laravel.com" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.master>
