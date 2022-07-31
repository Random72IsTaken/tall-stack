<!-- Good Night Script -->
<script>
    document.addEventListener('alpine:init', () => {
        const goodNightInitializer = () => {
            const $html = document.documentElement;
            const defaultMode = "{{ config('good-night.default-mode') }}";

            if (defaultMode === 'dark') {
                $html.classList.add('dark');
                Alpine.store('goodNightMode', 'dark');
            } else {
                $html.classList.remove('dark');
                Alpine.store('goodNightMode', 'light');
            }
        };

        const goodNightToggler = (previousMode, onClick) => {
            Alpine.store('goodNightMode', previousMode === 'dark' ? 'light' : 'dark');

            document.documentElement.classList.toggle('dark');

            if (onClick && onClick instanceof Function) onClick();
        };

        window.goodNightInitializer = goodNightInitializer;
        window.goodNightToggler = goodNightToggler;
    });
</script>
