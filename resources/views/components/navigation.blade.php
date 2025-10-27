<nav class="fixed inset-x-0 top-0 z-50" x-data="{ mobileMenuOpen: false, scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 12; })">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative mx-auto mt-3 h-14 sm:h-16 rounded-full transition-all duration-500 ease-out"
             :class="scrolled && 'scale-[1.002] translate-y-0.5'"
             style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0.18) 25%, rgba(255, 255, 255, 0.12) 50%, rgba(255, 255, 255, 0.08) 75%, rgba(255, 255, 255, 0.05) 100%); border: 1px solid rgba(255, 255, 255, 0.18); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08), 0 4px 16px rgba(0, 0, 0, 0.04), inset 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 -1px 0 rgba(255, 255, 255, 0.1); backdrop-filter: blur(24px) saturate(200%); -webkit-backdrop-filter: blur(24px) saturate(200%);">
            
            <!-- Animated gradient overlay -->
            <div class="absolute inset-0 rounded-full opacity-60 transition-opacity duration-500"
                 style="background: linear-gradient(45deg, rgba(26, 115, 232, 0.05) 0%, rgba(26, 115, 232, 0.02) 25%, rgba(255, 255, 255, 0.08) 50%, rgba(26, 115, 232, 0.02) 75%, rgba(26, 115, 232, 0.05) 100%); background-size: 200% 200%; animation: glassMorphGradient 8s ease-in-out infinite;"></div>
            
            <div class="relative z-10 flex h-full items-center justify-between px-3 sm:px-4">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="group flex items-center gap-2">
                    <div class="grid h-9 w-9 place-items-center rounded-x">
                        <img src="{{ asset('images/black-logo.png') }}" alt="HyperScale Logo" class="w-full h-full object-contain" />
                    </div>
                    <span class="hidden sm:inline-block text-[17px] font-semibold tracking-tight transition-colors duration-300"
                          style="color: #1f2937; text-shadow: 0 0 10px rgba(255, 255, 255, 0.9), 0 1px 3px rgba(255, 255, 255, 0.8);">
                        HyperScale
                    </span>
                </a>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center gap-1">
                    @foreach([
                        ['href' => 'home', 'label' => 'Beranda'],
                        ['href' => 'about', 'label' => 'Tentang'],
                        ['href' => 'services', 'label' => 'Layanan'],
                        ['href' => 'contact', 'label' => 'Kontak']
                    ] as $link)
                        @php $isActive = request()->routeIs($link['href']); @endphp
                        <a href="{{ route($link['href']) }}"
                           class="relative isolate rounded-full px-4 py-1.5 text-sm font-medium transition-all duration-300 hover:scale-105"
                           style="{{ $isActive ? 'color: #1a73e8; text-shadow: 0 0 20px rgba(26, 115, 232, 0.5), 0 1px 3px rgba(255, 255, 255, 0.8);' : 'color: #374151; text-shadow: 0 0 10px rgba(255, 255, 255, 0.9), 0 1px 2px rgba(255, 255, 255, 0.5);' }}">
                            <span class="absolute inset-0 z-0 rounded-full transition-all duration-300 will-change-transform {{ $isActive ? 'opacity-100 scale-100' : 'opacity-0 scale-95' }}"
                                  style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.8) 50%, rgba(255, 255, 255, 0.7) 100%); border: 1px solid rgba(26, 115, 232, 0.3); box-shadow: 0 4px 16px rgba(26, 115, 232, 0.15), inset 0 1px 0 rgba(255, 255, 255, 1), inset 0 -1px 0 rgba(255, 255, 255, 0.5); backdrop-filter: blur(12px) saturate(150%); -webkit-backdrop-filter: blur(12px) saturate(150%);"></span>
                            <span class="absolute inset-0 z-0 rounded-full transition-all duration-300 will-change-transform opacity-0 hover:opacity-100"
                                  style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.5) 50%, rgba(255, 255, 255, 0.4) 100%); border: 1px solid rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);"></span>
                            <span class="relative">{{ $link['label'] }}</span>
                        </a>
                    @endforeach
                </div>

                <!-- CTA + Mobile Toggle -->
                <div class="flex items-center gap-2">
                    @auth
                        <div class="hidden sm:flex items-center gap-3">
                            <a href="{{ route('dashboard') }}"
                               class="inline-flex items-center justify-center rounded-full px-4 py-1.5 text-sm font-semibold text-white transition-all duration-300 hover:scale-105 hover:-translate-y-0.5 group"
                               style="background: linear-gradient(135deg, rgba(26, 115, 232, 0.9) 0%, rgba(26, 115, 232, 0.8) 50%, rgba(26, 115, 232, 0.9) 100%); border: 1px solid rgba(26, 115, 232, 0.3); box-shadow: 0 8px 24px rgba(26, 115, 232, 0.2), 0 4px 12px rgba(26, 115, 232, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.2); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
                                <i class="fas fa-th-large mr-2"></i>
                                <span class="relative z-10">Dashboard</span>
                            </a>
                            <div class="flex items-center gap-2">
                                @if(Auth::user()->avatar)
                                    <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full border-2 border-white shadow">
                                @else
                                    <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold text-sm">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                @endif
                                <span class="text-sm font-medium text-black">{{ Auth::user()->name }}</span>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                   class="inline-flex items-center justify-center rounded-full px-4 py-1.5 text-sm font-semibold text-white transition-all duration-300 hover:scale-105 hover:-translate-y-0.5 group"
                                   style="background: linear-gradient(135deg, rgba(239, 68, 68, 0.9) 0%, rgba(220, 38, 38, 0.9) 100%); border: 1px solid rgba(239, 68, 68, 0.3); box-shadow: 0 8px 24px rgba(239, 68, 68, 0.2), 0 4px 12px rgba(239, 68, 68, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.2); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    <span class="relative z-10">Logout</span>
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                           class="hidden sm:inline-flex items-center justify-center rounded-full px-4 py-1.5 text-sm font-semibold text-white transition-all duration-300 hover:scale-105 hover:-translate-y-0.5 group"
                           style="background: linear-gradient(135deg, rgba(26, 115, 232, 0.9) 0%, rgba(26, 115, 232, 0.8) 50%, rgba(26, 115, 232, 0.9) 100%); border: 1px solid rgba(26, 115, 232, 0.3); box-shadow: 0 8px 24px rgba(26, 115, 232, 0.2), 0 4px 12px rgba(26, 115, 232, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.2); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
                            <span class="relative z-10">Login</span>
                            <div class="absolute inset-0 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                 style="background: linear-gradient(135deg, rgba(26, 115, 232, 0.4) 0%, rgba(26, 115, 232, 0.2) 100%); filter: blur(8px); transform: scale(1.2);"></div>
                        </a>
                    @endauth

                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen"
                            class="md:hidden grid h-9 w-9 place-items-center rounded-full transition-all duration-300 hover:scale-110 active:scale-95 relative z-20"
                            style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.2) 100%); border: 1px solid rgba(255, 255, 255, 0.25); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.4);">
                        <div class="relative h-4 w-5">
                            <span class="hamburger-line absolute block h-0.5 w-5 rounded-full transition-all duration-300"
                                  :class="mobileMenuOpen ? 'translate-y-1.5 rotate-45 bg-blue-600' : 'translate-y-0 rotate-0 bg-gray-900'"
                                  style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);"></span>
                            <span class="hamburger-line absolute top-1.5 block h-0.5 w-5 rounded-full transition-all duration-300"
                                  :class="mobileMenuOpen ? 'opacity-0 scale-0' : 'opacity-100 scale-100 bg-gray-900'"
                                  style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);"></span>
                            <span class="hamburger-line absolute block h-0.5 w-5 rounded-full transition-all duration-300"
                                  :class="mobileMenuOpen ? '-translate-y-1 -rotate-45 bg-blue-600' : 'translate-y-3 rotate-0 bg-gray-900'"
                                  style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);"></span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-2 scale-95"
                 x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 transform -translate-y-2 scale-95"
                 @click.outside="mobileMenuOpen = false"
                 class="absolute left-0 right-0 top-[calc(100%+12px)] mx-auto w-full rounded-2xl p-3 md:hidden"
                 style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.35) 0%, rgba(255, 255, 255, 0.25) 50%, rgba(255, 255, 255, 0.15) 100%); border: 1px solid rgba(255, 255, 255, 0.3); backdrop-filter: blur(24px) saturate(200%); -webkit-backdrop-filter: blur(24px) saturate(200%); box-shadow: 0 16px 48px rgba(0, 0, 0, 0.12), 0 8px 24px rgba(0, 0, 0, 0.08), inset 0 1px 0 rgba(255, 255, 255, 0.4), inset 0 -1px 0 rgba(255, 255, 255, 0.15);">
                <div class="space-y-1">
                    @foreach([
                        ['href' => 'home', 'label' => 'Beranda', 'icon' => 'fa-home'],
                        ['href' => 'about', 'label' => 'Tentang', 'icon' => 'fa-info-circle'],
                        ['href' => 'services', 'label' => 'Layanan', 'icon' => 'fa-server'],
                        ['href' => 'contact', 'label' => 'Kontak', 'icon' => 'fa-envelope']
                    ] as $link)
                        @php $isActive = request()->routeIs($link['href']); @endphp
                        <a href="{{ route($link['href']) }}" @click="mobileMenuOpen = false"
                           class="flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-medium transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] {{ !$isActive ? 'hover:bg-white/40' : '' }}"
                           style="{{ $isActive ? 'background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.9) 50%, rgba(255, 255, 255, 0.85) 100%); border: 1px solid rgba(26, 115, 232, 0.3); box-shadow: 0 4px 16px rgba(26, 115, 232, 0.12), 0 2px 8px rgba(0, 0, 0, 0.04), inset 0 1px 0 rgba(255, 255, 255, 1); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); color: #1a73e8; text-shadow: 0 0 10px rgba(26, 115, 232, 0.3);' : 'color: #374151; text-shadow: 0 0 8px rgba(255, 255, 255, 0.8);' }}">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-300"
                                 style="background: {{ $isActive ? 'linear-gradient(135deg, rgba(26, 115, 232, 0.15) 0%, rgba(26, 115, 232, 0.08) 100%)' : 'linear-gradient(135deg, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.3) 100%)' }}; border: 1px solid {{ $isActive ? 'rgba(26, 115, 232, 0.25)' : 'rgba(255, 255, 255, 0.4)' }}; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);">
                                <i class="fas {{ $link['icon'] }} text-sm transition-all duration-300"
                                   style="color: {{ $isActive ? '#1a73e8' : '#6b7280' }};"></i>
                            </div>
                            <span class="flex-1">{{ $link['label'] }}</span>
                            @if($isActive)
                                <div class="w-1.5 h-1.5 rounded-full"
                                     style="background: #1a73e8; box-shadow: 0 0 8px rgba(26, 115, 232, 0.5);"></div>
                            @endif
                        </a>
                    @endforeach
                </div>

                <!-- Mobile CTA Button -->
                <div class="pt-2 mt-2 border-t border-white/20">
                    @auth
                        <div class="mb-3 flex items-center gap-3 px-4 py-2">
                            @if(Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="w-10 h-10 rounded-full border-2 border-white shadow">
                            @else
                                <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-600">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <a href="{{ route('dashboard') }}" @click="mobileMenuOpen = false"
                           class="w-full flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-[15px] font-semibold text-white transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] group mb-2"
                           style="background: linear-gradient(135deg, rgba(26, 115, 232, 0.95) 0%, rgba(26, 115, 232, 0.85) 50%, rgba(26, 115, 232, 0.95) 100%); border: 1px solid rgba(26, 115, 232, 0.4); box-shadow: 0 8px 24px rgba(26, 115, 232, 0.25), 0 4px 12px rgba(26, 115, 232, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.25); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
                            <i class="fas fa-th-large text-sm"></i>
                            <span>Dashboard</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" @click="mobileMenuOpen = false"
                                class="w-full flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-[15px] font-semibold text-white transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] group"
                                style="background: linear-gradient(135deg, rgba(239, 68, 68, 0.95) 0%, rgba(220, 38, 38, 0.95) 100%); border: 1px solid rgba(239, 68, 68, 0.4); box-shadow: 0 8px 24px rgba(239, 68, 68, 0.25), 0 4px 12px rgba(239, 68, 68, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.25); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
                                <i class="fas fa-sign-out-alt text-sm"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" @click="mobileMenuOpen = false"
                           class="flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-[15px] font-semibold text-white transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] group"
                           style="background: linear-gradient(135deg, rgba(26, 115, 232, 0.95) 0%, rgba(26, 115, 232, 0.85) 50%, rgba(26, 115, 232, 0.95) 100%); border: 1px solid rgba(26, 115, 232, 0.4); box-shadow: 0 8px 24px rgba(26, 115, 232, 0.25), 0 4px 12px rgba(26, 115, 232, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.25); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
                            <i class="fas fa-sign-in-alt text-sm"></i>
                            <span>Login</span>
                            <i class="fas fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                        </a>
                    @endauth
                </div>
            </div>
            </div>
        </div>
    </div>
</nav>
