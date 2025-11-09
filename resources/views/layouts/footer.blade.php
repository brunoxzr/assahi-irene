
    <footer class="relative overflow-hidden bg-gradient-to-b from-[#faf8f4] via-[#f3f1ed] to-[#ece9e4] text-[#1a1a1a] py-20">
    <!-- Textura e Kanji -->
    <div class="absolute inset-0 flex justify-center items-center opacity-[0.03] pointer-events-none">
        <span class="text-[12rem] text-[#b98b30]" style="font-family:'Noto Serif JP', serif;">和</span>
    </div>

    <div class="absolute inset-0 opacity-[0.04] pointer-events-none">
        <svg viewBox="0 0 100 100" class="w-full h-full" preserveAspectRatio="xMidYMid slice">
        <defs>
            <pattern id="footer-pattern-light" x="0" y="0" width="30" height="30" patternUnits="userSpaceOnUse">
            <path d="M15 0 L30 15 L15 30 L0 15 Z" stroke="#b98b30" stroke-width="0.2" fill="none"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#footer-pattern-light)" />
        </svg>
    </div>

    <!-- Linha superior -->
    <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-[#b98b30]/40 to-transparent"></div>

    <!-- Conteúdo -->
    <div class="relative z-10 max-w-5xl mx-auto text-center px-6">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
        <img src="assets/imgs/Logotipo-Assahi-App-Fundos-Branco-Claros-05-scaled.png"
            alt="Logotipo Assahi"
            class="w-40 opacity-90 hover:opacity-100 transition-all duration-700 drop-shadow-md">
        </div>

        <!-- Nome -->
        <h3 class="text-[#b98b30] uppercase tracking-[4px] mb-3 text-sm md:text-base font-semibold"
            style="font-family:'Cormorant Garamond', serif;">
        Assahi — Gastronomia Oriental & Eventos
        </h3>

        <!-- Texto -->
        <p class="text-[#444] text-sm md:text-base mb-2">
        Inaugurado em <span class="text-[#b98b30] font-medium">17 de maio de 2025</span> — Assaí (PR)
        </p>
        <p class="text-[#777] text-xs md:text-sm italic mb-6">
        Aberto de terça a domingo • Praça de alimentação • +250 pessoas • Estacionamento gratuito
        </p>

        <!-- Divisor -->
        <div class="mx-auto mb-6 w-24 h-[1px] bg-gradient-to-r from-transparent via-[#b98b30]/60 to-transparent"></div>

        <!-- Frase -->
        <p class="text-[#444] text-sm md:text-base italic mb-3">
        “Onde a tradição encontra o acolhimento.”
        </p>
        <p class="text-[#777] text-xs md:text-sm mb-10">
        Desenvolvido com dedicação e apreço pela cultura oriental.
        </p>

        <!-- Ícones -->
        <div class="flex justify-center gap-8 mb-12">
        <a href="https://www.instagram.com/assahioficial" target="_blank"
            class="text-[#b98b30] hover:text-[#d19b2f] transition-transform transform hover:scale-110">
            <i class="fab fa-instagram text-2xl"></i>
        </a>
        <a href="https://www.facebook.com/profile.php?id=61572400480912" target="_blank"
            class="text-[#b98b30] hover:text-[#d19b2f] transition-transform transform hover:scale-110">
            <i class="fab fa-facebook text-2xl"></i>
        </a>
        </div>

        <!-- Botão -->
        <a href="/"
        class="inline-block px-8 py-3 text-[#b98b30] border border-[#b98b30]/50 rounded-full text-xs uppercase tracking-[3px]
                hover:bg-[#b98b30]/10 hover:border-[#b98b30]/70 transition-all duration-500">
        Voltar ao Início
        </a>
    </div>

    <!-- Rodapé inferior -->
    <div class="mt-14 text-center text-xs text-[#777] relative z-10">
        © 2025 Assahi Gastronomia Oriental & Eventos
    </div>

    <!-- Linha e sombra inferior -->
    <div class="absolute bottom-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-[#b98b30]/40 to-transparent"></div>
    <div class="absolute bottom-0 left-0 w-full h-[6px] bg-gradient-to-r from-[#b98b30]/10 via-transparent to-[#b98b30]/10 blur-sm"></div>
    </footer>



    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenuBtn.classList.toggle('open');
            mobileMenu.classList.toggle('open');
        });

        // Close mobile menu on link click
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenuBtn.classList.remove('open');
                mobileMenu.classList.remove('open');
            });
        });

        // Header sticky scroll effect
        const header = document.querySelector('.header-sticky');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scroll');
            } else {
                header.classList.remove('scroll');
            }
        });

        // Scroll fade-in animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.scroll-fade-in').forEach(element => {
            observer.observe(element);
        });

        // Form submission
        function handleSubmit(event) {
            event.preventDefault();
            const successMessage = document.getElementById('successMessage');
            document.getElementById('contactForm').style.display = 'none';
            successMessage.classList.remove('hidden');
        }

        // Smooth scroll behavior for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>

</html>
