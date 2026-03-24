<nav
x-data="{
scrolled: false,
mobileMenu: false,
init() {
    window.addEventListener('scroll', () => {
        this.scrolled = window.pageYOffset > 20;
    });
}
}"
:class="scrolled ? 'bg-white/80 backdrop-blur-sm' : 'bg-white'"
class="sticky top-0 z-50 transition-all duration-300 ease-in-out border border-gray-100 py-2.5">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between">

            {{-- Logotipo --}}
            <div class="shrink-0 flex items-center">
                <a href="#">eCommerce</a>
            </div>

            <div class="flex items-center gap-x-4 shrink-0">
                <flux:input as="button" size="sm" placeholder="Search..." icon="magnifying-glass" kbd="⌘K" />
                <flux:button size="sm" icon="shopping-cart" variant="ghost" iconVariant="outline"></flux:button>
                <flux:button size="sm" variant="ghost">Sign in</flux:button>
            </div>
        </div>

    </div>
</nav>
