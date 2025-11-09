<!DOCTYPE html>
<html lang="pt-BR">
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
<body>
    <header class="header-sticky fixed top-0 w-full z-50 transition-all duration-500 backdrop-blur-md bg-[rgba(29,29,35,0.85)] border-b border-[rgba(255,255,255,0.08)] shadow-[0_2px_10px_rgba(0,0,0,0.15)]">
    <nav class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

        <!-- LOGO -->
        <a href="#inicio" class="flex items-center gap-3 group">
        <img src="assets/imgs/Logotipo-Assahi-App-Fundos-Branco-Claros-05-scaled.png"
            alt="Assahi Logo"
            class="h-14 w-auto drop-shadow-[0_0_12px_rgba(219,148,35,0.3)] transition-all duration-300 group-hover:scale-105 group-hover:drop-shadow-[0_0_18px_rgba(219,148,35,0.5)]" />
        </a>

        <!-- MENU DESKTOP -->
        <div class="hidden md:flex items-center gap-8 font-medium tracking-wide">
        <a href="#inicio" class="nav-link">Início</a>
        <a href="#quem-somos" class="nav-link">Quem Somos</a>
        <a href="#estrutura" class="nav-link">Estrutura</a>
        <a href="#gastronomia" class="nav-link">Gastronomia</a>
        <a href="#galeria" class="nav-link">Galeria</a>
        <a href="#contato" class="nav-link">Contato</a>
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

    <!-- Hero Section -->
<section id="inicio" class="relative min-h-screen flex items-center justify-center">
  <!-- Imagem de fundo -->
  <div class="absolute inset-0">
    <img src="assets/imgs/IMG_8738-scaled.jpg" alt="Assahi Complexo Oriental"
         class="w-full h-full object-cover brightness-[0.55] saturate-125" />
    <!-- Overlay dourado translúcido -->
    <div class="absolute inset-0 bg-gradient-to-b from-[rgba(219,148,35,0.25)] via-[rgba(29,29,35,0.55)] to-[rgba(29,29,35,0.85)] mix-blend-multiply"></div>
  </div>

  <!-- Conteúdo -->
  <div class="relative z-10 text-center max-w-3xl px-6">
    <p class="tracking-[0.2em] uppercase text-[2rem] mb-3 font-medium"
       style="color:#db9423; font-family:'Cormorant Garamond', serif;">
       Bem-vindo(a)
    </p>
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-white drop-shadow-[0_3px_3px_rgba(0,0,0,0.7)] leading-tight"
        style="font-family:'Noto Serif JP', serif;">
        Visite o 1º Complexo de Gastronomia Oriental<br class="hidden md:block"/> Raiz do Brasil
    </h1>
    <p class="text-lg md:text-xl mb-8 text-gray-100 max-w-xl mx-auto leading-relaxed"
       style="font-family:'Inter', sans-serif;">
       Culinária, cultura e tradição em um só destino:<br/>
       Assahi Gastronomia Oriental & Eventos
    </p>

    <a href="#contato"
       class="bg-[#ed7a00] hover:bg-[#db9423] text-white font-semibold tracking-wide py-3 px-8 rounded-full shadow-lg transition-all duration-300 hover:scale-[1.03]">
       Fale Conosco
    </a>
  </div>

  <!-- Ícone de scroll -->
  <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce text-[#db9423]">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7-7-7m7 7V3" />
    </svg>
  </div>
</section>

    <!-- Quem Somos -->
    <section id="quem-somos" class="relative py-24 px-6 bg-gradient-to-b from-[#faf8f4] via-[#f7f5f1] to-[#f3f0eb] overflow-hidden">
    <!-- Textura japonesa de fundo -->
    <div class="absolute inset-0 opacity-[0.05] pointer-events-none">
        <svg viewBox="0 0 100 100" class="w-full h-full" preserveAspectRatio="xMidYMid slice">
        <defs>
            <pattern id="asanoha-quem" x="0" y="0" width="25" height="25" patternUnits="userSpaceOnUse">
            <path d="M12.5 0 L25 12.5 L12.5 25 L0 12.5 Z" stroke="#db9423" stroke-width="0.3" fill="none"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#asanoha-quem)" />
        </svg>
    </div>

    <!-- Conteúdo -->
    <div class="relative max-w-7xl mx-auto z-10">
        <!-- Título -->
        <div class="text-center mb-16">
        <h2 class="text-5xl md:text-6xl font-bold tracking-wide text-[#1d1d23]" style="font-family:'Cormorant Garamond', serif;">
            Quem Somos
        </h2>
        <div class="mt-4 flex justify-center">
            <div class="h-[2px] w-28 bg-gradient-to-r from-transparent via-[#db9423] to-transparent"></div>
        </div>
        <p class="text-sm text-gray-500 mt-3 italic">Tradição, autenticidade e acolhimento em cada detalhe.</p>
        </div>

        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-14 items-center">
        <!-- Texto -->
        <div class="text-[1.1rem] leading-relaxed text-[#3c3c3c]">
            <p class="mb-6">
            O <strong class="text-[#db9423]">Assahi</strong> é o primeiro complexo dedicado exclusivamente à gastronomia oriental no coração de Assaí (PR).
            Inaugurado em <strong>17 de maio de 2025</strong>, foi idealizado pelos fundadores <strong>Irene Yuko Kakubo Yamamoto</strong> e <strong>Paulo Kazuo Yamamoto</strong>,
            que transformaram um sonho em um espaço de cultura, sabor e convivência.
            </p>

            <p class="mb-6">
            Nosso espaço reúne mais de 10 empreendimentos que celebram a autenticidade, a tradição japonesa e a hospitalidade familiar —
            cada detalhe é pensado para oferecer uma experiência imersiva no mundo oriental.
            </p>

            <p>
            Com estacionamento gratuito, praça de alimentação, salão para até 250 pessoas e áreas instagramáveis,
            o Assahi se consolida como destino cultural e gastronômico de referência na região.
            </p>
        </div>

        <!-- Imagem estilizada -->
        <div class="relative flex justify-center">
            <div class="relative w-80 h-96 rounded-[60%_40%_60%_40%] border-[6px] border-[#db9423] overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,0.15)]">
            <img src="assets/imgs/chefes.png" alt="Fundadores do Assahi"
                class="w-full h-full object-cover transform scale-105 hover:scale-110 transition-transform duration-700 ease-out">
            <!-- brilho sutil -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#00000020] via-transparent to-transparent pointer-events-none"></div>
            </div>

            <!-- Detalhe dourado no canto -->
            <div class="absolute -bottom-6 -left-6 w-20 h-20 rounded-full border-2 border-[#db9423]/50 blur-sm"></div>
            <div class="absolute -top-6 -right-8 w-12 h-12 rounded-full bg-[#db9423]/10 blur-[6px]"></div>
        </div>
        </div>
    </div>

    <!-- Linha inferior caligráfica -->
    <div class="absolute bottom-0 left-0 w-full opacity-10 pointer-events-none">
        <svg viewBox="0 0 100 10" preserveAspectRatio="none" class="w-full h-8">
        <path d="M0 5 Q10 0, 20 5 T40 5 T60 5 T80 5 T100 5" fill="none" stroke="#db9423" stroke-width="0.8"/>
        </svg>
    </div>
    </section>

    <!-- Estrutura -->
    <section id="estrutura" class="relative py-24 px-6 bg-gradient-to-b from-[#f9f8f4] via-[#f5f3ef] to-[#f0ede9] overflow-hidden">
    <!-- Textura japonesa sutil -->
    <div class="absolute inset-0 opacity-[0.05] pointer-events-none">
        <svg viewBox="0 0 100 100" class="w-full h-full" preserveAspectRatio="xMidYMid slice">
        <defs>
            <pattern id="kikkou" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <path d="M10 0 L20 5 L20 15 L10 20 L0 15 L0 5 Z" stroke="#db9423" stroke-width="0.25" fill="none"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#kikkou)" />
        </svg>
    </div>

    <!-- Título -->
    <div class="relative text-center mb-16 z-10">
        <h2 class="text-5xl md:text-6xl font-bold text-[#1d1d23]" style="font-family:'Cormorant Garamond', serif;">
        Estrutura
        </h2>
        <div class="mt-3 flex justify-center">
        <div class="h-[2px] w-24 bg-gradient-to-r from-transparent via-[#db9423] to-transparent"></div>
        </div>
        <p class="text-sm text-gray-500 mt-3 italic">Ambientes pensados para viver a tradição com conforto e autenticidade.</p>
    </div>

    <!-- Cards -->
    <div class="relative z-10 max-w-7xl mx-auto grid md:grid-cols-2 lg:grid-cols-4 gap-10">
        <!-- Card -->
        <div class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_30px_rgba(0,0,0,0.05)] border border-[#db9423]/20 transition-all duration-500 hover:shadow-[0_8px_40px_rgba(219,148,35,0.15)] hover:-translate-y-2">
        <div class="relative">
            <div class="absolute top-0 left-0 w-full h-[5px] bg-gradient-to-r from-[#db9423]/80 via-[#ed7a00] to-transparent"></div>
        </div>
        <div class="p-8 flex flex-col items-center text-center">
            <div class="w-16 h-16 flex items-center justify-center rounded-xl mb-6 bg-gradient-to-br from-[#db9423] to-[#ed7a00] shadow-lg shadow-[#db9423]/20">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"></path>
            </svg>
            </div>
            <h3 class="text-2xl font-bold mb-3 text-[#1d1d23]" style="font-family:'Cormorant Garamond', serif;">
            Praça de Alimentação
            </h3>
            <p class="text-[#555] leading-relaxed">Mais de 10 empreendimentos com cardápios variados e diferenciados.</p>
        </div>
        </div>

        <!-- Card -->
        <div class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_30px_rgba(0,0,0,0.05)] border border-[#ed7a00]/20 transition-all duration-500 hover:shadow-[0_8px_40px_rgba(219,148,35,0.15)] hover:-translate-y-2">
        <div class="relative">
            <div class="absolute top-0 left-0 w-full h-[5px] bg-gradient-to-r from-[#ed7a00]/80 via-[#db9423] to-transparent"></div>
        </div>
        <div class="p-8 flex flex-col items-center text-center">
            <div class="w-16 h-16 flex items-center justify-center rounded-xl mb-6 bg-gradient-to-br from-[#ed7a00] to-[#db9423] shadow-lg shadow-[#ed7a00]/20">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a6 6 0 00-9-5.497A4 4 0 00-1 15v3h18z"></path>
            </svg>
            </div>
            <h3 class="text-2xl font-bold mb-3 text-[#1d1d23]" style="font-family:'Cormorant Garamond', serif;">
            Salão Família
            </h3>
            <p class="text-[#555] leading-relaxed">Espaço climatizado para até 250 pessoas, perfeito para eventos e reuniões.</p>
        </div>
        </div>

        <!-- Card -->
        <div class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_30px_rgba(0,0,0,0.05)] border border-[#db9423]/20 transition-all duration-500 hover:shadow-[0_8px_40px_rgba(219,148,35,0.15)] hover:-translate-y-2">
        <div class="relative">
            <div class="absolute top-0 left-0 w-full h-[5px] bg-gradient-to-r from-[#db9423]/80 via-[#ed7a00] to-transparent"></div>
        </div>
        <div class="p-8 flex flex-col items-center text-center">
            <div class="w-16 h-16 flex items-center justify-center rounded-xl mb-6 bg-gradient-to-br from-[#db9423] to-[#ed7a00] shadow-lg shadow-[#db9423]/20">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M17.778 8.222c-4.296-4.296-11.26-4.296-15.556 0A1 1 0 001.004 9.94c4.872-4.872 12.768-4.872 17.64 0a1 1 0 01-1.414 1.414zM14.364 11.864a1 1 0 011.415-1.415c2.05 2.05 2.05 5.366 0 7.415a1 1 0 01-1.415-1.414c1.222-1.222 1.222-3.205 0-4.586z" clip-rule="evenodd"></path>
            </svg>
            </div>
            <h3 class="text-2xl font-bold mb-3 text-[#1d1d23]" style="font-family:'Cormorant Garamond', serif;">
            Estacionamento Gratuito
            </h3>
            <p class="text-[#555] leading-relaxed">Acesso fácil e seguro com amplo espaço para seus veículos.</p>
        </div>
        </div>

        <!-- Card -->
        <div class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_30px_rgba(0,0,0,0.05)] border border-[#ed7a00]/20 transition-all duration-500 hover:shadow-[0_8px_40px_rgba(219,148,35,0.15)] hover:-translate-y-2">
        <div class="relative">
            <div class="absolute top-0 left-0 w-full h-[5px] bg-gradient-to-r from-[#ed7a00]/80 via-[#db9423] to-transparent"></div>
        </div>
        <div class="p-8 flex flex-col items-center text-center">
            <div class="w-16 h-16 flex items-center justify-center rounded-xl mb-6 bg-gradient-to-br from-[#ed7a00] to-[#db9423] shadow-lg shadow-[#ed7a00]/20">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
            </svg>
            </div>
            <h3 class="text-2xl font-bold mb-3 text-[#1d1d23]" style="font-family:'Cormorant Garamond', serif;">
            Áreas Instagramáveis
            </h3>
            <p class="text-[#555] leading-relaxed">Espaços cuidadosamente decorados para capturar memórias especiais.</p>
        </div>
        </div>
    </div>

    <!-- Linha decorativa inferior -->
    <div class="absolute bottom-0 left-0 w-full opacity-10 pointer-events-none">
        <svg viewBox="0 0 100 10" preserveAspectRatio="none" class="w-full h-8">
        <path d="M0 5 Q10 0, 20 5 T40 5 T60 5 T80 5 T100 5" fill="none" stroke="#db9423" stroke-width="0.8"/>
        </svg>
    </div>
    </section>


    <!-- Gastronomia & Eventos -->
    <section id="gastronomia" class="relative py-28 px-6 bg-gradient-to-b from-[#faf8f4] via-[#f6f3ef] to-[#f1eee9] overflow-hidden">
    <!-- Fundo com ondas japonesas -->
    <div class="absolute inset-0 opacity-[0.05] pointer-events-none">
        <svg viewBox="0 0 200 200" class="w-full h-full" preserveAspectRatio="xMidYMid slice">
        <defs>
            <pattern id="seigaiha2" x="0" y="0" width="40" height="20" patternUnits="userSpaceOnUse">
            <path d="M0 20 Q10 10 20 20 T40 20" stroke="#db9423" stroke-width="0.4" fill="none"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#seigaiha2)" />
        </svg>
    </div>

    <!-- Luz difusa dourada -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[70%] h-[150px] bg-gradient-to-b from-[#db9423]/25 to-transparent blur-[120px] opacity-40"></div>

    <!-- Conteúdo -->
    <div class="relative max-w-6xl mx-auto text-center z-10">
        <h2 class="text-5xl md:text-6xl font-bold mb-4 text-[#1d1d23]" style="font-family:'Cormorant Garamond', serif;">
        Gastronomia & Eventos
        </h2>
        <div class="flex justify-center mb-2">
        <div class="h-[2px] w-32 bg-gradient-to-r from-transparent via-[#db9423] to-transparent"></div>
        </div>
        <p class="text-sm text-gray-600 italic">Sabores que contam histórias, momentos que se transformam em arte.</p>

        <!-- Cards -->
        <div class="mt-20 grid md:grid-cols-3 gap-14">
        <!-- Card 1 -->
        <div class="group relative bg-white/90 backdrop-blur-sm border border-[#db9423]/20 rounded-3xl shadow-[0_8px_40px_rgba(0,0,0,0.06)] transition-all duration-700 hover:-translate-y-2 hover:shadow-[0_10px_50px_rgba(219,148,35,0.18)] overflow-hidden">
            <!-- Decoração superior -->
            <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#db9423] via-[#ed7a00] to-transparent"></div>

            <!-- Imagem -->
            <div class="relative h-60 overflow-hidden">
            <img src="assets/imgs/diatopla.jpg" alt="Festival Oriental" class="w-full h-full object-cover transform scale-105 group-hover:scale-110 transition-transform duration-700 ease-out rounded-b-[40%_40%_0_0]">
            <div class="absolute inset-0 bg-gradient-to-t from-[#00000040] to-transparent"></div>
            </div>

            <!-- Texto -->
            <div class="p-8">
            <h3 class="text-2xl font-bold mb-3 text-[#db9423]" style="font-family:'Cormorant Garamond', serif;">Festival Oriental</h3>
            <p class="text-[#444] leading-relaxed">Celebramos a riqueza da gastronomia oriental com pratos autênticos e técnicas japonesas ancestrais, unindo tradição e requinte.</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="group relative bg-white/90 backdrop-blur-sm border border-[#ed7a00]/20 rounded-3xl shadow-[0_8px_40px_rgba(0,0,0,0.06)] transition-all duration-700 hover:-translate-y-2 hover:shadow-[0_10px_50px_rgba(219,148,35,0.18)] overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#ed7a00] via-[#db9423] to-transparent"></div>

            <div class="relative h-60 overflow-hidden">
            <img src="assets/imgs/familia.jpg" alt="Noite da Família" class="w-full h-full object-cover transform scale-105 group-hover:scale-110 transition-transform duration-700 ease-out rounded-b-[40%_40%_0_0]">
            <div class="absolute inset-0 bg-gradient-to-t from-[#00000040] to-transparent"></div>
            </div>

            <div class="p-8">
            <h3 class="text-2xl font-bold mb-3 text-[#ed7a00]" style="font-family:'Cormorant Garamond', serif;">Noite da Família</h3>
            <p class="text-[#444] leading-relaxed">Momentos de união e afeto sob o brilho suave das lanternas, celebrando laços e sabores em um ambiente acolhedor e familiar.</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="group relative bg-white/90 backdrop-blur-sm border border-[#db9423]/20 rounded-3xl shadow-[0_8px_40px_rgba(0,0,0,0.06)] transition-all duration-700 hover:-translate-y-2 hover:shadow-[0_10px_50px_rgba(219,148,35,0.18)] overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#db9423] via-[#ed7a00] to-transparent"></div>

            <div class="relative h-60 overflow-hidden">
            <img src="assets/imgs/tradicao.jpg" alt="Sabor & Tradição" class="w-full h-full object-cover transform scale-105 group-hover:scale-110 transition-transform duration-700 ease-out rounded-b-[40%_40%_0_0]">
            <div class="absolute inset-0 bg-gradient-to-t from-[#00000040] to-transparent"></div>
            </div>

            <div class="p-8">
            <h3 class="text-2xl font-bold mb-3 text-[#db9423]" style="font-family:'Cormorant Garamond', serif;">Sabor & Tradição</h3>
            <p class="text-[#444] leading-relaxed">Cada prato honra séculos de cultura, reinterpretando receitas milenares com um toque contemporâneo e alma artesanal.</p>
            </div>
        </div>
        </div>

        <!-- Botão -->
        <div class="mt-16">
        <a href="#contato"
            class="inline-block px-10 py-4 text-[#db9423] border border-[#db9423]/50 rounded-full text-sm uppercase tracking-[3px]
            hover:bg-[#db9423]/10 hover:border-[#db9423]/70 transition-all duration-500">
            Reserve sua Experiência
        </a>
        </div>
    </div>

    <!-- Linha ondulada inferior -->
    <div class="absolute bottom-0 left-0 w-full opacity-10 pointer-events-none">
        <svg viewBox="0 0 100 10" preserveAspectRatio="none" class="w-full h-8">
        <path d="M0 5 Q10 0, 20 5 T40 5 T60 5 T80 5 T100 5" fill="none" stroke="#db9423" stroke-width="0.8"/>
        </svg>
    </div>
    </section>


    <!-- ========================== -->
    <!-- RESTAURANTES & LOJAS ASSAHI -->
    <!-- ========================== -->
    <section id="restaurantes" class="relative py-24 bg-[#faf8f4] overflow-hidden">

    <!-- Textura japonesa Asanoha -->
    <div class="absolute inset-0 opacity-[0.04] pointer-events-none">
        <svg viewBox="0 0 200 200" class="w-full h-full" preserveAspectRatio="xMidYMid slice">
        <defs>
            <pattern id="asanoha" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M20 0 L40 20 L20 40 L0 20 Z" stroke="#b9802a" stroke-width="0.4" fill="none"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#asanoha)" />
        </svg>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 z-10">
        <!-- Cabeçalho -->
        <h2 class="text-5xl md:text-6xl font-bold text-center mb-4 text-[#1d1d23]" style="font-family: 'Cormorant Garamond', serif;">
        Nossos Restaurantes & Lojas
        </h2>
        <div class="h-[2px] w-24 mx-auto bg-gradient-to-r from-transparent via-[#db9423] to-transparent mb-12"></div>

        <!-- Grade -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10">
        <!-- Card -->
        <a href="https://wa.me/554398708313" target="_blank" class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.08)] border border-[#db9423]/20 hover:scale-[1.02] transition-transform duration-500">
            <div class="h-48 bg-[#f9f7f3] overflow-hidden">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Hamada-Logotipo-1-1024x576.png" alt="Hamada" class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#1d1d23] mb-1 tracking-wide">Hamada</h3>
            <p class="text-[#666] text-sm">Porções e combinados de sushi, sashimi, temaki e barcas.</p>
            </div>
        </a>

        <a href="https://wa.me/5543996976065" target="_blank" class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.08)] border border-[#db9423]/20 hover:scale-[1.02] transition-transform duration-500">
            <div class="h-48 bg-[#f9f7f3] overflow-hidden">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Logo-Minoru-Site-1024x576.png" alt="Minoru" class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#1d1d23] mb-1 tracking-wide">Minoru</h3>
            <p class="text-[#666] text-sm">Pratos quentes orientais, obentôs e executivos.</p>
            </div>
        </a>

        <a href="https://wa.me/5543984187159" target="_blank" class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.08)] border border-[#db9423]/20 hover:scale-[1.02] transition-transform duration-500">
            <div class="h-48 bg-[#f9f7f3] overflow-hidden">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Mirai-Logotipos-04-1-1024x576.png" alt="Mirai Cafe" class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#1d1d23] mb-1 tracking-wide">Mirai Café</h3>
            <p class="text-[#666] text-sm">Cafeteria e restaurante com pratos quentes e sobremesas.</p>
            </div>
        </a>

        <a href="https://wa.me/5543991636328" target="_blank" class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.08)] border border-[#db9423]/20 hover:scale-[1.02] transition-transform duration-500">
            <div class="h-48 bg-[#f9f7f3] overflow-hidden">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Logo-Numata-Espetos-1-1024x576.png" alt="Numata Espetos" class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#1d1d23] mb-1 tracking-wide">Numata Espetos</h3>
            <p class="text-[#666] text-sm">Pratos quentes orientais, embalados e salgados fritos.</p>
            </div>
        </a>

        <a href="https://wa.me/5543991017618" target="_blank" class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.08)] border border-[#db9423]/20 hover:scale-[1.02] transition-transform duration-500">
            <div class="h-48 bg-[#f9f7f3] overflow-hidden">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Produtos-Shimada-1024x576.png" alt="Shimada" class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#1d1d23] mb-1 tracking-wide">Shimada</h3>
            <p class="text-[#666] text-sm">Produtos alimentícios orientais embalados à pronta entrega.</p>
            </div>
        </a>

        <a href="https://wa.me/5543998016776" target="_blank" class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.08)] border border-[#db9423]/20 hover:scale-[1.02] transition-transform duration-500">
            <div class="h-48 bg-[#f9f7f3] overflow-hidden">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Logotipo-Sato-Dorinku-07-06-1024x635.png" alt="Sato Dorinku" class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#1d1d23] mb-1 tracking-wide">Sato Dorinku</h3>
            <p class="text-[#666] text-sm">Bebidas em geral, sucos, saquês, drinks e snacks.</p>
            </div>
        </a>

        <a href="http://wa.me/998139780" target="_blank" class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.08)] border border-[#db9423]/20 hover:scale-[1.02] transition-transform duration-500">
            <div class="h-48 bg-[#f9f7f3] overflow-hidden">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Logotipo-Sumiya-1-1024x576.png" alt="Sumiya" class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#1d1d23] mb-1 tracking-wide">Sumiya</h3>
            <p class="text-[#666] text-sm">Pratos quentes nipônicos e coreanos, embalados.</p>
            </div>
        </a>

        <a href="https://wa.me/5543996482948" target="_blank" class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.08)] border border-[#db9423]/20 hover:scale-[1.02] transition-transform duration-500">
            <div class="h-48 bg-[#f9f7f3] overflow-hidden">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Temakeria-Logo-Site-1024x576.png" alt="Temakeria" class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#1d1d23] mb-1 tracking-wide">Temakeria</h3>
            <p class="text-[#666] text-sm">Produção e comércio de Temaki e Sashimi em geral.</p>
            </div>
        </a>

        <a href="https://wa.me/5543984444751" target="_blank" class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.08)] border border-[#db9423]/20 hover:scale-[1.02] transition-transform duration-500">
            <div class="h-48 bg-[#f9f7f3] overflow-hidden">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Logo-Acai-Assai-2-1024x576.png" alt="Açaí Assaí" class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#1d1d23] mb-1 tracking-wide">Açaí Assaí</h3>
            <p class="text-[#666] text-sm">Sobremesas de açaí, sorvete de matcha e sundaes.</p>
            </div>
        </a>

        <a href="https://wa.me/5543984469565" target="_blank" class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.08)] border border-[#db9423]/20 hover:scale-[1.02] transition-transform duration-500">
            <div class="h-48 bg-[#f9f7f3] overflow-hidden">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Amaoka-Presentes-Criativos_Prancheta-1-copia-2-1024x576.png" alt="Amaoka" class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#1d1d23] mb-1 tracking-wide">Amaoka</h3>
            <p class="text-[#666] text-sm">Produtos artesanais, cultura geek e souvenirs.</p>
            </div>
        </a>

        <a href="https://wa.me/5543999225820" target="_blank" class="group bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.08)] border border-[#db9423]/20 hover:scale-[1.02] transition-transform duration-500">
            <div class="h-48 bg-[#f9f7f3] overflow-hidden">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Maos-Criativas-Site-1-1024x576.png" alt="Mãos Criativas" class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="p-6 text-center">
            <h3 class="text-xl font-semibold text-[#1d1d23] mb-1 tracking-wide">Mãos Criativas</h3>
            <p class="text-[#666] text-sm">Artesanatos e mimos únicos.</p>
            </div>
        </a>
        </div>
    </div>
    </section>

    <!-- =========================== -->
    <!-- CARROSSEL ORIENTAL ASSAHI -->
    <!-- =========================== -->
    <section class="relative overflow-hidden bg-black">
    <!-- Swiper container -->
    <div class="swiper myAssahiSwiper">
        <div class="swiper-wrapper">

        <!-- 2️⃣ Confira o próximo evento -->
        <div class="swiper-slide relative">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Imagem-do-WhatsApp-de-2025-08-14-as-17.15.00_6f8a789b-scaled.jpg"
                class="w-full h-[480px] object-cover opacity-80" alt="Próximo Evento">
            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent flex flex-col items-center justify-center text-center px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-2 text-white">Confira o próximo evento</h2>
            <p class="text-gray-200 mb-5 text-lg">Dois palcos culturais com apresentações artísticas e entretenimento para toda a família.</p>
            <a href="https://forms.gle/Nau285NGuZT9wueP6" target="_blank"
                class="border border-white px-5 py-2 rounded-full hover:bg-white hover:text-black transition-all duration-300">
                Clique Aqui
            </a>
            </div>
        </div>

        <!-- 3️⃣ Fale com cada Restaurante -->
        <div class="swiper-slide relative">
            <img src="assets/imgs/IMG_20250814_165310_781.jpg"
                class="w-full h-[480px] object-cover opacity-80" alt="Contato Restaurantes">
            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent flex flex-col items-center justify-center text-center px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-2 text-white">Fale com cada Restaurante ou Loja direto pelo WhatsApp</h2>
            <p class="text-gray-200 mb-5 text-lg">Mais de 10 empreendimentos com pratos e cardápios variados todos os dias.</p>
            <a href="https://linktr.ee/assahioficial" target="_blank"
                class="border border-white px-5 py-2 rounded-full hover:bg-white hover:text-black transition-all duration-300">
                Clique aqui
            </a>
            </div>
        </div>

        <!-- 4️⃣ Pratos e Sushis -->
        <div class="swiper-slide relative">
            <img src="assets/imgs/Comidas-Assahi-1.png"
                class="w-full h-[480px] object-cover opacity-80" alt="Sushis e Pratos">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col items-center justify-center text-center px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-2 text-white">Sabores orientais em cada detalhe</h2>
            <p class="text-gray-200 mb-5 text-lg">A harmonia entre tradição japonesa e o toque contemporâneo do Assahi.</p>
            <a href="#restaurantes"
                class="border border-white px-5 py-2 rounded-full hover:bg-white hover:text-black transition-all duration-300">
                Conheça todos
            </a>
            </div>
        </div>

        <!-- 1️⃣ Faça seu evento conosco -->
        <div class="swiper-slide relative">
            <img src="assets/imgs/Imagem-do-WhatsApp-de-2025-08-14-as-17.15.04_e9eb27ae.jpg"
                class="w-full h-[480px] object-cover opacity-80" alt="Eventos Assahi">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col items-center justify-center text-center px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-2 text-white">Faça seu evento conosco</h2>
            <p class="text-gray-200 mb-5 text-lg">Consulte disponibilidade de horários e espaços exclusivos.</p>
            <a href="https://wa.me/5543974005233" target="_blank"
                class="border border-white px-5 py-2 rounded-full hover:bg-white hover:text-black transition-all duration-300">
                Whatsapp
            </a>
            </div>
        </div>

        </div>

        <!-- Paginação e setas -->
        <div class="swiper-pagination !bottom-4"></div>
        <div class="swiper-button-next text-white"></div>
        <div class="swiper-button-prev text-white"></div>
    </div>

    <!-- Importar Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        new Swiper(".myAssahiSwiper", {
        loop: true,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        effect: "slide",
        speed: 800,
        });
    </script>
    </section>



    <!-- Galeria / Carrossel Oriental Premium -->
    <section id="galeria" class="relative py-24 bg-gradient-to-b from-[#faf8f4] via-[#f7f4ef] to-[#f0ede9] overflow-hidden">
    <!-- Textura japonesa -->
    <div class="absolute inset-0 opacity-[0.05] pointer-events-none">
        <svg viewBox="0 0 200 200" class="w-full h-full" preserveAspectRatio="xMidYMid slice">
        <defs>
            <pattern id="asanoha" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M20 0 L40 20 L20 40 L0 20 Z" stroke="#db9423" stroke-width="0.4" fill="none"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#asanoha)" />
        </svg>
    </div>

    <!-- Cabeçalho -->
    <div class="relative text-center z-10 mb-12">
        <h2 class="text-5xl md:text-6xl font-bold text-[#1d1d23]" style="font-family:'Cormorant Garamond', serif;">
        Galeria
        </h2>
        <div class="h-[2px] w-24 mx-auto bg-gradient-to-r from-transparent via-[#db9423] to-transparent my-3"></div>
        <p class="text-sm italic text-gray-600">Tradição e harmonia em cada imagem.</p>
    </div>

    <!-- Carrossel -->
    <div class="relative max-w-6xl mx-auto overflow-hidden z-10">
        <div id="assahi-carousel" class="flex transition-transform duration-700 ease-out">
        <!-- Slides -->
        <template id="slide-template">
            <div class="min-w-full relative group">
            <img src="" alt="" class="w-full h-[420px] object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#00000070] via-transparent to-transparent"></div>
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 text-center">
                <span class="block text-[#db9423] text-4xl mb-1 opacity-70" style="font-family:'Noto Serif JP', serif;"></span>
                <span class="text-white text-lg font-medium tracking-widest"></span>
            </div>
            </div>
        </template>
        </div>

        <!-- Controles -->
        <button id="prevBtn" class="absolute left-2 top-1/2 -translate-y-1/2 bg-[#1d1d23]/40 hover:bg-[#1d1d23]/70 text-white rounded-full w-10 h-10 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button id="nextBtn" class="absolute right-2 top-1/2 -translate-y-1/2 bg-[#1d1d23]/40 hover:bg-[#1d1d23]/70 text-white rounded-full w-10 h-10 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
    </div>

    <!-- Indicadores -->
    <div class="mt-6 flex justify-center gap-3">
        <div class="w-3 h-3 bg-[#db9423] rounded-full opacity-80 animate-pulse"></div>
        <div class="w-3 h-3 bg-[#ed7a00]/60 rounded-full"></div>
        <div class="w-3 h-3 bg-[#db9423]/40 rounded-full"></div>
    </div>

    <!-- Script -->
    <script>
        const slides = [
        { img: "assets/imgs/12-3-scaled.jpg", kanji: "和", title: "Vista Interior" },
        { img: "assets/imgs/", kanji: "初", title: "Inauguração" },
        { img: "assets/imgs/", kanji: "空", title: "Vista Aérea" },
        { img: "assets/imgs/", kanji: "光", title: "Ambiente" },
        { img: "assets/imgs/", kanji: "花", title: "Detalhes" },
        { img: "assets/imgs/", kanji: "門", title: "Fachada" },
        ];

        const carousel = document.getElementById("assahi-carousel");
        const template = document.getElementById("slide-template").content;

        slides.forEach(s => {
        const clone = template.cloneNode(true);
        clone.querySelector("img").src = s.img;
        clone.querySelector("span:first-child").textContent = s.kanji;
        clone.querySelector("span:last-child").textContent = s.title;
        carousel.appendChild(clone);
        });

        let index = 0;
        const total = slides.length;
        const updateCarousel = () => carousel.style.transform = `translateX(-${index * 100}%)`;

        // Botões
        document.getElementById("nextBtn").onclick = () => { index = (index + 1) % total; updateCarousel(); };
        document.getElementById("prevBtn").onclick = () => { index = (index - 1 + total) % total; updateCarousel(); };

        // Auto-play suave
        setInterval(() => { index = (index + 1) % total; updateCarousel(); }, 7000);

        // Swipe touch (mobile)
        let startX = 0;
        carousel.addEventListener("touchstart", e => startX = e.touches[0].clientX);
        carousel.addEventListener("touchend", e => {
        const endX = e.changedTouches[0].clientX;
        if (startX - endX > 50) { index = (index + 1) % total; updateCarousel(); }
        else if (endX - startX > 50) { index = (index - 1 + total) % total; updateCarousel(); }
        });
    </script>
    </section>


    <section id="patrocinadores" class="relative bg-[#0c0c0f] py-24 overflow-hidden">
    <!-- Fundo japonês (padrão + linhas douradas) -->
    <div class="absolute inset-0 opacity-[0.06] pointer-events-none">
        <svg viewBox="0 0 100 100" class="w-full h-full" preserveAspectRatio="xMidYMid slice">
        <defs>
            <pattern id="asanoha-pattern" x="0" y="0" width="30" height="30" patternUnits="userSpaceOnUse">
            <path d="M15 0 L30 15 L15 30 L0 15 Z" stroke="#db9423" stroke-width="0.3" fill="none"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#asanoha-pattern)" />
        </svg>
    </div>
    <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-[#db9423]/40 to-transparent"></div>
    <div class="absolute bottom-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-[#db9423]/40 to-transparent"></div>

    <!-- Título -->
    <div class="text-center relative z-10 mb-16">
        <h2 class="text-4xl md:text-5xl font-semibold text-[#f5f5f2]" style="font-family: 'Cormorant Garamond', serif;">
        Patrocinadores <span class="text-[#db9423] font-bold">Platinum</span> Assahi
        </h2>
        <p class="text-gray-400 mt-4 text-sm md:text-base italic tracking-wide">
        Parceiros que transformam tradição em futuro.
        </p>
        <div class="mt-6 flex justify-center">
        <div class="h-[1px] w-40 bg-gradient-to-r from-transparent via-[#db9423]/70 to-transparent"></div>
        </div>
    </div>

    <!-- Logos -->
    <div class="relative z-10 max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 px-8">
        <div class="group bg-gradient-to-b from-[#141417] to-[#0d0d0f] border border-[#db9423]/20 rounded-2xl p-6
                    shadow-[0_0_15px_rgba(219,148,35,0.15)] hover:shadow-[0_0_25px_rgba(219,148,35,0.3)]
                    hover:border-[#db9423]/40 transition-all duration-700 flex justify-center items-center">
        <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Patrocinadores-07-1024x261.png" alt="Patrocinador 1"
            class="w-3/4 object-contain opacity-80 group-hover:opacity-100 transition-all duration-700">
        </div>

        <div class="group bg-gradient-to-b from-[#141417] to-[#0d0d0f] border border-[#db9423]/20 rounded-2xl p-6
                    shadow-[0_0_15px_rgba(219,148,35,0.15)] hover:shadow-[0_0_25px_rgba(219,148,35,0.3)]
                    hover:border-[#db9423]/40 transition-all duration-700 flex justify-center items-center">
        <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Patrocinadores-06-1024x216.png" alt="Patrocinador 2"
            class="w-3/4 object-contain opacity-80 group-hover:opacity-100 transition-all duration-700">
        </div>

        <div class="group bg-gradient-to-b from-[#141417] to-[#0d0d0f] border border-[#db9423]/20 rounded-2xl p-6
                    shadow-[0_0_15px_rgba(219,148,35,0.15)] hover:shadow-[0_0_25px_rgba(219,148,35,0.3)]
                    hover:border-[#db9423]/40 transition-all duration-700 flex justify-center items-center">
        <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Patrocinadores-09-1024x324.png" alt="Patrocinador 3"
            class="w-3/4 object-contain opacity-80 group-hover:opacity-100 transition-all duration-700">
        </div>

        <div class="group bg-gradient-to-b from-[#141417] to-[#0d0d0f] border border-[#db9423]/20 rounded-2xl p-6
                    shadow-[0_0_15px_rgba(219,148,35,0.15)] hover:shadow-[0_0_25px_rgba(219,148,35,0.3)]
                    hover:border-[#db9423]/40 transition-all duration-700 flex justify-center items-center">
        <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Patrocinadores-10-1024x451.png" alt="Patrocinador 4"
            class="w-3/4 object-contain opacity-80 group-hover:opacity-100 transition-all duration-700">
        </div>

        <div class="group bg-gradient-to-b from-[#141417] to-[#0d0d0f] border border-[#db9423]/20 rounded-2xl p-6
            shadow-[0_0_15px_rgba(219,148,35,0.15)] hover:shadow-[0_0_25px_rgba(219,148,35,0.3)]
            hover:border-[#db9423]/40 transition-all duration-700 flex justify-center items-center">
        <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Patrocinadores-05-1536x597.png" alt="Patrocinador 5"
            class="w-3/4 object-contain opacity-80 group-hover:opacity-100 transition-all duration-700">
        </div>

        <div class="group bg-gradient-to-b from-[#141417] to-[#0d0d0f] border border-[#db9423]/20 rounded-2xl p-6
            shadow-[0_0_15px_rgba(219,148,35,0.15)] hover:shadow-[0_0_25px_rgba(219,148,35,0.3)]
            hover:border-[#db9423]/40 transition-all duration-700 flex justify-center items-center">
        <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Patrocinadores-11.png" alt="Patrocinador 6"
            class="w-3/4 object-contain opacity-80 group-hover:opacity-100 transition-all duration-700">
        </div>

        <div class="group bg-gradient-to-b from-[#141417] to-[#0d0d0f] border border-[#db9423]/20 rounded-2xl p-6
            shadow-[0_0_15px_rgba(219,148,35,0.15)] hover:shadow-[0_0_25px_rgba(219,148,35,0.3)]
            hover:border-[#db9423]/40 transition-all duration-700 flex justify-center items-center">
        <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Patrocinadores-08-1536x420.png" alt="Patrocinador 7"
            class="w-3/4 object-contain opacity-80 group-hover:opacity-100 transition-all duration-700">
        </div>
    </div>





    <!-- Ondas douradas -->
    <div class="absolute bottom-0 left-0 right-0 opacity-10 pointer-events-none">
        <svg viewBox="0 0 100 20" preserveAspectRatio="none" class="w-full h-10">
        <path d="M0 10 Q5 0, 10 10 T20 10 T30 10 T40 10 T50 10 T60 10 T70 10 T80 10 T90 10 T100 10"
                fill="none" stroke="#db9423" stroke-width="1"/>
        </svg>
    </div>
    </section>



    <!-- ================================= -->
    <!-- LOCALIZAÇÃO E HORÁRIOS DE FUNCIONAMENTO -->
    <!-- ================================= -->
    <section id="localizacao" class="relative py-24 bg-gradient-to-b from-[#faf8f4] via-[#f7f4ef] to-[#f0ede9] overflow-hidden">

    <!-- Textura japonesa Asanoha -->
    <div class="absolute inset-0 opacity-[0.05] pointer-events-none">
        <svg viewBox="0 0 200 200" class="w-full h-full" preserveAspectRatio="xMidYMid slice">
        <defs>
            <pattern id="asanoha-loc" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M20 0 L40 20 L20 40 L0 20 Z" stroke="#db9423" stroke-width="0.4" fill="none"/>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#asanoha-loc)" />
        </svg>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 z-10">
        <!-- Título -->
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-4 text-[#1d1d23]" style="font-family:'Cormorant Garamond', serif;">
        <a href="https://maps.app.goo.gl/xYDqo4Wb5dCk5yZj6" target="_blank" class="hover:text-[#db9423] transition-colors">
            Localização e Horários de Funcionamento
        </a>
        </h2>
        <div class="h-[2px] w-24 mx-auto bg-gradient-to-r from-transparent via-[#db9423] to-transparent mb-10"></div>

        <p class="text-center text-gray-700 text-lg mb-10 font-light">
        • Clique abaixo para acessar horários:
        </p>

        <!-- Conteúdo -->
        <div class="grid md:grid-cols-2 gap-10 items-center">
        <!-- Imagem -->
        <div class="relative rounded-2xl overflow-hidden shadow-[0_5px_30px_rgba(0,0,0,0.1)] border border-[#db9423]/20">
            <a href="https://maps.app.goo.gl/xYDqo4Wb5dCk5yZj6" target="_blank">
            <img src="https://espacoassahi.com.br/wp-content/uploads/2025/08/Imagem-do-WhatsApp-de-2025-08-14-as-17.15.03_ece253ca.jpg"
                alt="Localização Assahi" class="w-full h-[380px] object-cover hover:scale-105 transition-transform duration-700 ease-out">
            </a>
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
            <p class="absolute bottom-3 left-1/2 -translate-x-1/2 text-center text-white text-sm italic px-4">
            Ficamos a apenas 400m do <strong>Castelo Japonês</strong>, principal ponto turístico de Assaí - PR.
            </p>
        </div>

        <!-- Mapa -->
        <div class="rounded-2xl overflow-hidden shadow-[0_5px_30px_rgba(0,0,0,0.08)] border border-[#db9423]/20">
            <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3352.4154922544367!2d-50.84931882497405!3d-23.37436565474839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94eb175a35dbcc55%3A0x9e98ce4638ff5606!2sAssahi%20Gastronomia%20Oriental%20e%20Eventos!5e1!3m2!1spt-BR!2sbr!4v1755890034503!5m2!1spt-BR!2sbr"
            width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        </div>
    </div>

    <!-- Divisor -->
    <div class="absolute bottom-0 left-0 w-full">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 700 10" preserveAspectRatio="none">
        <path d="M350,10L340,0h20L350,10z" fill="#db9423" opacity="0.8"/>
        </svg>
    </div>
    </section>


    <!-- ================================= -->
    <!-- CONHEÇA UM PEDACINHO DO JAPÃO NO BRASIL -->
    <!-- ================================= -->
    <section id="japao" class="relative bg-[#0f0f0f] text-white py-24 px-6 overflow-hidden">
    <!-- Luz de fundo -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#db9423]/20 via-transparent to-black/60"></div>

    <div class="relative max-w-5xl mx-auto text-center z-10">
        <h2 class="text-4xl md:text-5xl font-bold mb-8 tracking-wide" style="font-family:'Cormorant Garamond', serif;">
        Conheça um pedacinho do Japão no Brasil
        </h2>

        <!-- Vídeo -->
        <div class="relative rounded-2xl overflow-hidden shadow-[0_8px_40px_rgba(0,0,0,0.5)] border border-[#db9423]/30 max-w-4xl mx-auto">
        <iframe class="w-full h-[420px]"
                src="https://www.youtube.com/embed/bZuJQ1c1cCQ?autoplay=1&mute=1&loop=1&playlist=bZuJQ1c1cCQ&controls=1"
                title="Assahi - Conheça um pedacinho do Japão no Brasil"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
        </iframe>
        </div>
    </div>
    </section>



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
        <a href="#inicio"
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
