<!-- NAVBAR -->
<nav class="fixed top-0 left-0 right-0 z-[9999] transition-all duration-300" id="navbar">
  <div class="mx-auto">
    <div class="relative px-4">
      <!-- Background dengan glassmorphism effect -->
      <div class="absolute inset-0 bg-white/10 backdrop-blur-xl border-b border-white/20 shadow-lg"></div>
      
      <div class="relative flex justify-between items-center h-16 lg:h-20">
        
        <!-- LOGO -->
        <div class="flex items-center">
          <a href="/" class="flex items-center space-x-2 group">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center shadow-lg group-hover:shadow-blue-500/30 transition-shadow duration-300">
              <span class="text-white font-bold text-lg">{{ substr(env("APP_NAME"), 0, 1) }}</span>
            </div>
            <span class="text-2xl font-bold bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
              {{env("APP_NAME")}}
            </span>
          </a>
        </div>

        <!-- MENU DESKTOP -->
        <div class="hidden lg:flex items-center space-x-1">
          <a href="/" class="relative px-6 py-2.5 text-white/90 hover:text-white font-medium rounded-lg transition-all duration-300 group">
            <span class="relative z-10 flex items-center space-x-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
              </svg>
              <span>Home</span>
            </span>
            <span class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-cyan-400/20 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-300"></span>
          </a>
          
          <a href="/products" class="relative px-6 py-2.5 text-white/90 hover:text-white font-medium rounded-lg transition-all duration-300 group">
            <span class="relative z-10 flex items-center space-x-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
              </svg>
              <span>Catalog</span>
            </span>
            <span class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-cyan-400/20 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-300"></span>
          </a>
          
          <a href="/about" class="relative px-6 py-2.5 text-white/90 hover:text-white font-medium rounded-lg transition-all duration-300 group">
            <span class="relative z-10 flex items-center space-x-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              <span>About</span>
            </span>
            <span class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-cyan-400/20 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-300"></span>
          </a>
          
          @if (Auth::user() )
            <a href="/dashboard" class="relative px-6 py-2.5 text-white/90 text-white font-medium rounded-lg transition-all duration-300 group">
              <span class="relative z-10 flex items-center space-x-2">
                <i class="bi bi-speedometer"></i>
                <span>Dashboard</span>
              </span>
              <span class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-cyan-400/20 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-300"></span>
            </a>
            @else
            <a href="/login" class="relative px-6 py-2.5 text-white/90 text-white font-medium rounded-lg transition-all duration-300 group">
              <span class="relative z-10 flex items-center space-x-2">
                <i class="bi bi-person-lock"></i>
                <span>Log In</span>
              </span>
              <span class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-cyan-400/20 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-300"></span>
            </a>
          @endif
        </div>

        <!-- BUTTON MOBILE -->
        <div class="lg:hidden">
          <button id="menu-btn" class="relative w-10 h-10 flex items-center justify-center rounded-lg hover:bg-white/10 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500/50">
            <div class="space-y-1.5">
              <span class="block w-6 h-0.5 bg-white transition-all duration-300" id="line1"></span>
              <span class="block w-6 h-0.5 bg-white transition-all duration-300" id="line2"></span>
              <span class="block w-4 h-0.5 bg-white ml-auto transition-all duration-300" id="line3"></span>
            </div>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- MENU MOBILE -->
  <div id="mobile-menu" class="lg:hidden fixed inset-0 z-40 pointer-events-none">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm opacity-0 transition-opacity duration-300" id="overlay"></div>
    
    <!-- Menu Panel -->
    <div class="absolute right-0 top-0 h-full w-80 bg-gradient-to-b from-gray-900/95 to-gray-800/95 backdrop-blur-xl transform translate-x-full transition-transform duration-300 border-l border-white/10 shadow-2xl" id="menu-panel">
      <!-- Menu Items -->
      <div class="p-4 space-y-1">
        <a href="/" class="flex items-center space-x-3 px-4 py-3.5 rounded-lg text-white hover:bg-white/10 transition-all duration-200 group">
          <div class="p-2 rounded-lg bg-blue-500/20 group-hover:bg-blue-500/30 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
          </div>
          <span class="font-medium">Home</span>
        </a>
        
        <a href="/products" class="flex items-center space-x-3 px-4 py-3.5 rounded-lg text-white hover:bg-white/10 transition-all duration-200 group">
          <div class="p-2 rounded-lg bg-blue-500/20 group-hover:bg-blue-500/30 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
          </div>
          <span class="font-medium">Catalog</span>
          <span class="ml-auto px-2 py-1 text-xs bg-blue-500/30 text-blue-300 rounded-full">New</span>
        </a>
        
        <a href="/about" class="flex items-center space-x-3 px-4 py-3.5 rounded-lg text-white hover:bg-white/10 transition-all duration-200 group">
          <div class="p-2 rounded-lg bg-blue-500/20 group-hover:bg-blue-500/30 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <span class="font-medium">About</span>
        </a>
        
        <a href="/login" class="flex items-center space-x-3 px-4 py-3.5 rounded-lg text-white hover:bg-white/10 transition-all duration-200 group">
          <div class="p-2 rounded-lg bg-blue-500/20 group-hover:bg-blue-500/30 transition-colors duration-200">
            <div class="w-5 h-5 flex items-center justify-center">
              <i class="bi bi-person-lock"></i>
            </div>
          </div>
          <span class="font-medium">Login</span>
        </a>

      </div>
    </div>
  </div>
</nav>

<!-- JS -->
<script>
  // Element references
  const menuBtn = document.getElementById('menu-btn');
  const closeMenuBtn = document.getElementById('close-menu');
  const mobileMenu = document.getElementById('mobile-menu');
  const overlay = document.getElementById('overlay');
  const menuPanel = document.getElementById('menu-panel');
  const lines = [document.getElementById('line1'), document.getElementById('line2'), document.getElementById('line3')];
  const navbar = document.getElementById('navbar');

  // Toggle mobile menu
  function toggleMobileMenu() {
    const isOpen = mobileMenu.classList.contains('open');
    
    if (!isOpen) {
      // Open menu
      mobileMenu.classList.add('open');
      overlay.classList.remove('opacity-0');
      overlay.classList.add('opacity-100');
      menuPanel.classList.remove('translate-x-full');
      menuPanel.classList.add('translate-x-0');
      mobileMenu.classList.remove('pointer-events-none');
      
      // Animate hamburger to X
      lines[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
      lines[1].style.opacity = '0';
      lines[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
      lines[2].style.width = '24px';
    } else {
      // Close menu
      closeMobileMenu();
    }
  }

  function closeMobileMenu() {
    mobileMenu.classList.remove('open');
    overlay.classList.remove('opacity-100');
    overlay.classList.add('opacity-0');
    menuPanel.classList.remove('translate-x-0');
    menuPanel.classList.add('translate-x-full');
    setTimeout(() => {
      mobileMenu.classList.add('pointer-events-none');
    }, 300);
    
    // Reset hamburger
    lines[0].style.transform = 'none';
    lines[1].style.opacity = '1';
    lines[2].style.transform = 'none';
    lines[2].style.width = '16px';
  }

  // Event listeners
  menuBtn.addEventListener('click', toggleMobileMenu);
  closeMenuBtn?.addEventListener('click', closeMobileMenu);
  overlay.addEventListener('click', closeMobileMenu);

  // Navbar scroll effect
  let lastScroll = 0;
  window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll <= 0) {
      navbar.classList.remove('scrolled');
      return;
    }
    
    if (currentScroll > lastScroll && currentScroll > 100) {
      // Scroll down
      navbar.style.transform = 'translateY(-100%)';
    } else {
      // Scroll up
      navbar.style.transform = 'translateY(0)';
      if (currentScroll > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    }
    
    lastScroll = currentScroll;
  });

  // Close menu on escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeMobileMenu();
    }
  });
</script>

<style>
  /* Additional custom styles */
  #navbar.scrolled {
    background: rgba(15, 23, 42, 0.8);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }
  
  /* Smooth transitions */
  #navbar, #mobile-menu, #menu-panel, #overlay {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }
  
  /* Menu item hover effects */
  .menu-item::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 2px;
    background: linear-gradient(to right, #3b82f6, #06b6d4);
    transition: width 0.3s ease;
  }
  
  .menu-item:hover::after {
    width: 80%;
  }
</style>