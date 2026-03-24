
<div>
    <!-- Imagem do Produto Hero -->
        
    {{-- <section style="background-image: url('{{ asset('images/hero.jpg') }}')" class="h-[60dvh] object-cover bg-cover">
    Hero Icons    
    </section> --}}

    <header class="relative bg-gray-900 h-125 flex items-center overflow-hidden">
        <!-- Imagem de Fundo (Simulando public/images/hero.jpg) -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero.jpg') }}" 
                 class="w-full h-full object-cover opacity-60" 
                 alt="Background Hero">
        </div>
        
        <!-- Overlay Gradiente -->
        <div class="absolute inset-0 bg-linear-to-r from-blue-500 via-blue-500/40 to-transparent z-10"></div>

        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-xl">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6">
                    O som do <span class="text-indigo-400">futuro</span>, hoje.
                </h1>
                <p class="text-lg text-gray-300 mb-8">
                    Auriculares com tecnologia de ponta, isolamento acústico premium e conforto inigualável.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#" class="px-8 py-4 bg-white text-indigo-600 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/30">
                        Comprar Agora
                    </a>
                    <a href="#" class="px-8 py-4 bg-white/10 backdrop-blur text-white border border-white/20 rounded-xl font-bold hover:bg-white/20 transition">
                        Ver Coleção
                    </a>
                </div>
            </div>
        </div>
    </header>
     <!-- 4. Carousel de Produtos -->
    <section class="py-12 bg-gray-50 overflow-hidden" x-data="{
        activeSlide: 0,
        slides: [
            { id: 1, name: 'Produto Premium A', price: '49.99€', category: 'Eletrónicos', img: 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=400&q=80' },
            { id: 2, name: 'Relógio Elegance', price: '129.00€', category: 'Acessórios', img: 'https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=400&q=80' },
            { id: 3, name: 'Auriculares Wireless', price: '89.50€', category: 'Áudio', img: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=400&q=80' },
            { id: 4, name: 'Câmara Retro', price: '199.99€', category: 'Fotografia', img: 'https://images.unsplash.com/photo-1526170315870-ef6d82f583ad?auto=format&fit=crop&w=400&q=80' },
            { id: 5, name: 'Coluna Bluetooth', price: '55.00€', category: 'Áudio', img: 'https://images.unsplash.com/photo-1589003020619-47a698a8a341?auto=format&fit=crop&w=400&q=80' }
        ],
        scrollTo(index) {
            const container = this.$refs.container;
            const card = container.firstElementChild;
            const style = window.getComputedStyle(card);
            const margin = parseFloat(style.marginRight) || 0;
            const cardWidth = card.offsetWidth + margin;
            
            container.scrollTo({
                left: index * cardWidth,
                behavior: 'smooth'
            });
            this.activeSlide = index;
        },
        updateActiveSlide() {
            const container = this.$refs.container;
            if (!container.firstElementChild) return;
            const cardWidth = container.firstElementChild.offsetWidth;
            this.activeSlide = Math.round(container.scrollLeft / cardWidth);
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Destaques da Semana</h2>
                    <p class="text-gray-500 mt-2">Explore os nossos produtos mais populares.</p>
                </div>
                <div class="hidden sm:flex space-x-2">
                    <button @click="scrollTo(activeSlide > 0 ? activeSlide - 1 : slides.length - 1)" 
                            class="p-2 rounded-full border border-gray-200 bg-white hover:bg-gray-50 transition shadow-sm focus:outline-none">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button @click="scrollTo(activeSlide < slides.length - 1 ? activeSlide + 1 : 0)" 
                            class="p-2 rounded-full border border-gray-200 bg-white hover:bg-gray-50 transition shadow-sm focus:outline-none">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            <div x-ref="container" 
                 @scroll.debounce.100ms="updateActiveSlide()"
                 class="flex space-x-6 overflow-x-auto no-scrollbar snap-x snap-mandatory pb-4">
                <template x-for="(product, index) in slides" :key="product.id">
                    <div class="flex-none w-72 snap-start">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                            <div class="relative aspect-square overflow-hidden bg-gray-200">
                                <img :src="product.img" :alt="product.name" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute top-3 left-3">
                                    <span class="bg-white/90 backdrop-blur px-2 py-1 rounded-lg text-xs font-bold text-indigo-600 uppercase tracking-wider" x-text="product.category"></span>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="font-bold text-gray-900 text-lg mb-1" x-text="product.name"></h3>
                                <p class="text-indigo-600 font-bold text-xl mb-4" x-text="product.price"></p>
                                <button class="w-full bg-gray-900 text-white py-2 rounded-xl hover:bg-indigo-600 transition duration-300 font-medium text-sm">
                                    Adicionar ao Carrinho
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
    <section class="py-8">
        <h2 class="font-semibold text-xl">Lista de produtos</h2>

        <div>

        </div>
    </section>
</div>