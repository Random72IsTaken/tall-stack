@include('good-night::partials.good-night-script')

<!-- Custom Night Script -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('goodNight', () => ({
            init() {
                this.$nextTick(() => window.goodNightInitializer());
            },

            custom: {
                ['x-on:click']() {
                    window.goodNightToggler(this.$store.goodNightMode);
                },
            },
        }));
    });
</script>
