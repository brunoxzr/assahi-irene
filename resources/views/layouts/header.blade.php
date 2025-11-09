
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assahi — Gastronomia Oriental & Eventos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&family=Cormorant+Garamond:wght@400;600;700&family=Inter:wght@400;500;600&display=swap');

        * {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f5f2 0%, #fafaf8 100%);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Cormorant Garamond', serif;
        }

        .hero-title {
            font-family: 'Noto Serif JP', serif;
            font-size: 3.5rem;
            font-weight: 700;
            letter-spacing: -1px;
            line-height: 1.1;
        }

        .washi-bg {
            position: relative;
            background: linear-gradient(135deg, #f5f5f2 0%, #fafaf8 50%, #f5f5f2 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .washi-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(219, 148, 35, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(237, 122, 0, 0.02) 0%, transparent 50%);
            pointer-events: none;
        }

        .button-golden {
            background: #ed7a00;
            color: white;
            padding: 0.875rem 2.25rem;
            border: 2px solid #ed7a00;
            border-radius: 4px;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(237, 122, 0, 0.2);
        }

        .button-golden:hover {
            background: transparent;
            color: #ed7a00;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(237, 122, 0, 0.3);
        }

        .divider-line {
            background: linear-gradient(90deg, transparent, #db9423, transparent);
            height: 1px;
            margin: 2rem 0;
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .scroll-fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .scroll-fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(219, 148, 35, 0.15);
        }

        .header-sticky {
            background: rgba(29, 29, 35, 0.95);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .header-sticky.scroll {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out;
        }

        .mobile-menu.open {
            max-height: 500px;
        }

        .menu-icon {
            display: flex;
            flex-direction: column;
            gap: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .menu-icon span {
            display: block;
            width: 25px;
            height: 2px;
            background: #f5f5f2;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .menu-icon.open span:nth-child(1) {
            transform: rotate(45deg) translate(10px, 10px);
        }

        .menu-icon.open span:nth-child(2) {
            opacity: 0;
        }

        .menu-icon.open span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        .restaurant-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            perspective: 1000px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .gallery-item {
            aspect-ratio: 4/3;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            background: #e8e8e5;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(219, 148, 35, 0.1) 0%, rgba(237, 122, 0, 0.1) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-text {
            color: #1d1d23;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }

            .restaurant-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<header class="header-sticky fixed top-0 w-full z-50 transition-all duration-500 backdrop-blur-md bg-[rgba(29,29,35,0.85)] border-b border-[rgba(255,255,255,0.08)] shadow-[0_2px_10px_rgba(0,0,0,0.15)]">
    <nav class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

        <!-- LOGO -->
        <a href="/" class="flex items-center gap-3 group">
        <img src="assets/imgs/Logotipo-Assahi-App-Fundos-Branco-Claros-05-scaled.png"
            alt="Assahi Logo"
            class="h-14 w-auto drop-shadow-[0_0_12px_rgba(219,148,35,0.3)] transition-all duration-300 group-hover:scale-105 group-hover:drop-shadow-[0_0_18px_rgba(219,148,35,0.5)]" />
        </a>

        <!-- MENU DESKTOP -->
        <div class="hidden md:flex items-center gap-8 font-medium tracking-wide">
        <a href="/" class="nav-link">Início</a>
        <a href="/contact-us" class="nav-link">Quem Somos</a>
        <a href="/#estrutura" class="nav-link">Estrutura</a>
        <a href="/#gastronomia" class="nav-link">Gastronomia</a>
        <a href="/#galeria" class="nav-link">Galeria</a>
        <a href="/contact-us" class="nav-link">Contato</a>
        </div>

        <!-- BOTÃO MENU MOBILE -->
        <button id="mobileMenuBtn" class="md:hidden flex flex-col justify-center items-center gap-[5px] focus:outline-none">
        <span class="block w-6 h-[2px] bg-[#f5f5f2] rounded transition-all duration-300"></span>
        <span class="block w-6 h-[2px] bg-[#f5f5f2] rounded transition-all duration-300"></span>
        <span class="block w-6 h-[2px] bg-[#f5f5f2] rounded transition-all duration-300"></span>
        </button>
    </nav>

    <!-- MENU MOBILE -->
    <div id="mobileMenu"
        class="hidden md:hidden flex flex-col bg-[#1d1d23] text-gray-200 text-center shadow-lg overflow-hidden transition-all duration-500">
        <a href="#inicio" class="mobile-link">Início</a>
        <a href="#quem-somos" class="mobile-link">Quem Somos</a>
        <a href="#estrutura" class="mobile-link">Estrutura</a>
        <a href="#gastronomia" class="mobile-link">Gastronomia</a>
        <a href="#galeria" class="mobile-link">Galeria</a>
        <a href="#contato" class="mobile-link">Contato</a>
    </div>
    </header>

    <!-- ESTILOS INLINE -->
    <style>
    .nav-link {
        color: #f5f5f2;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        position: relative;
    }
    .nav-link::after {
        content: "";
        position: absolute;
        width: 0%;
        height: 2px;
        bottom: -4px;
        left: 0;
        background-color: #db9423;
        transition: width 0.3s ease;
    }
    .nav-link:hover {
        color: #db9423;
    }
    .nav-link:hover::after {
        width: 100%;
    }

    .mobile-link {
        padding: 1rem 0;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.3s;
    }
    .mobile-link:hover {
        color: #db9423;
        background-color: rgba(255, 255, 255, 0.04);
    }
    </style>

    <!-- SCRIPT MENU MOBILE -->
    <script>
    const menuBtn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');
    const bars = menuBtn.querySelectorAll('span');

    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        bars[0].classList.toggle('rotate-45');
        bars[1].classList.toggle('opacity-0');
        bars[2].classList.toggle('-rotate-45');
    });

    // Fecha o menu ao clicar em um link
    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', () => {
        menu.classList.add('hidden');
        bars[0].classList.remove('rotate-45');
        bars[1].classList.remove('opacity-0');
        bars[2].classList.remove('-rotate-45');
        });
    });
    </script>
