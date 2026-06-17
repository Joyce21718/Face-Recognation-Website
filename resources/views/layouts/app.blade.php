<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'Automated Entrance Verification Interface')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brandDeepBlue: '#2563EB',
                        brandCyan: '#06B6D4',
                        brandLightBlue: '#38BDF8',
                        brandBg: '#0F172A',
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>
</head>

<body
    class="bg-brandBg text-slate-100 font-sans overflow-x-hidden antialiased selection:bg-brandCyan/30 selection:text-white">

    <div class="glow-accent top-[-50px] left-[-50px] animate-pulse-slow"></div>
    <div class="glow-accent top-[40vh] right-[-100px] opacity-70 animate-pulse-slow" style="animation-delay: 1.5s;">
    </div>

    <nav class="glass-nav fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-4 h-20 flex items-center">
        <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 flex items-center justify-between">

            <div class="flex items-center space-x-3 group cursor-pointer">
                <div
                    class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brandDeepBlue to-brandCyan flex items-center justify-center shadow-lg shadow-brandDeepBlue/20 group-hover:scale-105 transition-transform">
                    <i class="fa-solid fa-door-open text-lg text-white"></i>
                </div>
                <span
                    class="text-xl font-bold tracking-wider bg-clip-text text-transparent bg-gradient-to-r from-white via-slate-100 to-brandLightBlue">
                    GateVerify
                </span>
            </div>

            <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-300">
                <a href="#hero" class="hover:text-brandCyan transition-colors duration-200">Home</a>
                <a href="#features" class="hover:text-brandCyan transition-colors duration-200">Features</a>
                <a href="#how-it-works" class="hover:text-brandCyan transition-colors duration-200">System Flow</a>
                <a href="#preview" class="hover:text-brandCyan transition-colors duration-200">Control Panel</a>
                <a href="#benefits" class="hover:text-brandCyan transition-colors duration-200">Benefits</a>

                <button onclick="openChatModal()"
                    class="text-brandCyan hover:text-cyan-300 flex items-center gap-2 focus:outline-none transition-colors duration-200 font-semibold bg-brandCyan/5 hover:bg-brandCyan/10 px-3 py-1.5 rounded-lg border border-brandCyan/10">
                    <i class="fa-solid fa-robot animate-pulse"></i> Support AI
                </button>
            </div>

            <div class="flex items-center gap-4">
                <a href="#cta"
                    class="hidden md:inline-flex bg-brandDeepBlue hover:bg-blue-600 px-5 py-2.5 rounded-xl font-semibold text-sm text-white transition-all duration-200 shadow-lg shadow-blue-500/20 hover:shadow-blue-500/30 hover:-translate-y-0.5">
                    Launch Demo
                </a>

                <button id="menuToggle"
                    class="md:hidden text-slate-200 text-2xl focus:outline-none p-2 hover:text-brandCyan transition-colors duration-200"
                    aria-label="Toggle Navigation Menu">
                    <i class="fa-solid fa-bars transition-transform duration-300" id="menuIcon"></i>
                </button>
            </div>
        </div>

        <div id="mobileMenu"
            class="absolute top-full left-0 w-full pointer-events-none opacity-0 -translate-y-4 invisible md:hidden bg-slate-950/95 backdrop-blur-2xl border-b border-slate-800/80 shadow-2xl transition-all duration-300 ease-in-out max-h-[calc(100vh-5rem)] overflow-y-auto">
            <div class="px-4 py-6 flex flex-col gap-2 text-slate-300 font-medium text-base">
                <a href="#hero"
                    class="mobile-item flex items-center hover:text-brandCyan hover:bg-slate-900/60 px-4 py-3.5 rounded-xl transition-all duration-200">
                    <i class="fa-solid fa-house text-sm w-6 opacity-70"></i> Home
                </a>
                <a href="#features"
                    class="mobile-item flex items-center hover:text-brandCyan hover:bg-slate-900/60 px-4 py-3.5 rounded-xl transition-all duration-200">
                    <i class="fa-solid fa-star text-sm w-6 opacity-70"></i> Features
                </a>
                <a href="#how-it-works"
                    class="mobile-item flex items-center hover:text-brandCyan hover:bg-slate-900/60 px-4 py-3.5 rounded-xl transition-all duration-200">
                    <i class="fa-solid fa-route text-sm w-6 opacity-70"></i> System Flow
                </a>
                <a href="#preview"
                    class="mobile-item flex items-center hover:text-brandCyan hover:bg-slate-900/60 px-4 py-3.5 rounded-xl transition-all duration-200">
                    <i class="fa-solid fa-sliders text-sm w-6 opacity-70"></i> Control Panel
                </a>
                <a href="#benefits"
                    class="mobile-item flex items-center hover:text-brandCyan hover:bg-slate-900/60 px-4 py-3.5 rounded-xl transition-all duration-200">
                    <i class="fa-solid fa-shield-heart text-sm w-6 opacity-70"></i> Benefits
                </a>

                <div class="border-t border-slate-800/60 my-2"></div>

                <button onclick="openChatModal(); forceCloseMobileNavbar();"
                    class="text-left text-brandCyan hover:bg-brandCyan/10 px-4 py-3.5 rounded-xl transition-all duration-200 flex items-center gap-2 font-semibold">
                    🤖 Support AI Chatbot
                </button>

                <a href="#cta"
                    class="mobile-item bg-brandDeepBlue hover:bg-blue-600 text-center py-3.5 mt-2 rounded-xl font-bold text-white transition-all duration-200 shadow-lg shadow-blue-600/20 block">
                    Launch Demo
                </a>
            </div>
        </div>
    </nav>

    <main class="pt-20 relative z-10 min-h-screen">
        @yield('content')
    </main>

    <footer
        class="bg-slate-950/80 border-t border-slate-900 text-xs text-slate-400 py-12 relative z-10 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-12">
            <div>
                <div class="flex items-center space-x-2 text-white font-bold text-sm mb-4">
                    <div class="w-6 h-6 rounded bg-brandCyan flex items-center justify-center text-xs">
                        <i class="fa-solid fa-barcode text-slate-950"></i>
                    </div>
                    <span>GateVerify Systems</span>
                </div>
                <p class="leading-relaxed text-slate-400 max-w-xs break-words">
                    Automated edge gate solutions optimized for localized database matching, terminal latency
                    reductions, and verified access clearance workflows.
                </p>
            </div>

            <div>
                <h5 class="text-slate-200 font-bold mb-4 uppercase tracking-wider text-[10px]">Framework Features</h5>
                <ul class="space-y-2.5">
                    <li><a href="#features" class="hover:text-brandCyan transition-colors duration-150">Verification
                            Nodes</a></li>
                    <li><a href="#preview" class="hover:text-brandCyan transition-colors duration-150">Command
                            Console</a></li>
                    <li><a href="#how-it-works" class="hover:text-brandCyan transition-colors duration-150">Match Logic
                            Profile</a></li>
                </ul>
            </div>

            <div>
                <h5 class="text-slate-200 font-bold mb-4 uppercase tracking-wider text-[10px]">System Safeguards</h5>
                <ul class="space-y-2.5">
                    <li><a href="#" class="hover:text-brandCyan transition-colors duration-150">Local Data Security</a>
                    </li>
                    <li><a href="#" class="hover:text-brandCyan transition-colors duration-150">SMS Pipeline Config</a>
                    </li>
                    <li><a href="#" class="hover:text-brandCyan transition-colors duration-150">Node Access Rules</a>
                    </li>
                </ul>
            </div>

            <div>
                <h5 class="text-slate-200 font-bold mb-4 uppercase tracking-wider text-[10px]">Connect with Us</h5>
                <div class="flex space-x-4 mb-4 text-base">
                    <a href="#" class="text-slate-400 hover:text-white transition-colors duration-150"
                        aria-label="Facebook Link"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors duration-150"
                        aria-label="Github Link"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors duration-150"
                        aria-label="Email Link"><i class="fa-solid fa-envelope"></i></a>
                </div>
                <p class="break-words">Support Line: network@gateverify.io</p>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 border-t border-slate-900 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-slate-500">
            <p>&copy; {{ date('Y') }} GateVerify Systems. All rights reserved.</p>
            <div class="flex space-x-6">
                <a href="#" class="hover:text-slate-400 transition-colors duration-150">Terms of Use</a>
                <a href="#" class="hover:text-slate-400 transition-colors duration-150">System Privacy</a>
            </div>
        </div>
    </footer>

    <div id="chatModal"
        class="fixed inset-0 z-50 overflow-y-auto hidden bg-slate-950/80 backdrop-blur-md flex items-center justify-center p-0 sm:p-4 transition-all duration-300">
        <div class="w-full h-full sm:h-[620px] sm:max-w-2xl bg-slate-900 border-0 sm:border border-slate-800/80 rounded-none sm:rounded-2xl shadow-2xl flex flex-col overflow-hidden transform scale-95 transition-all duration-300"
            id="chatModalContainer">

            <div
                class="bg-slate-950 border-b border-slate-800/60 p-4 sm:p-5 flex items-center justify-between flex-shrink-0">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brandDeepBlue to-brandCyan flex items-center justify-center text-white shadow-md flex-shrink-0">
                        <i class="fa-solid fa-robot text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold tracking-wider text-white uppercase">GateVerify Product Assistant
                        </h3>
                        <p class="text-[11px] text-emerald-400 flex items-center gap-1 mt-0.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Intelligent AI
                            Agent Node
                        </p>
                    </div>
                </div>
                <button onclick="closeChatModal()"
                    class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 text-slate-400 hover:text-white flex items-center justify-center transition-colors focus:outline-none"
                    aria-label="Close Chat">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="flex-1 p-4 sm:p-6 overflow-y-auto space-y-4 text-sm bg-slate-900/40 no-scrollbar scroll-smooth"
                id="modalChatContainer">
                <div class="flex gap-3 items-start max-w-[88%] sm:max-w-[85%] animate-fadeIn">
                    <div
                        class="w-7 h-7 rounded-lg bg-slate-800 border border-slate-700 flex items-center justify-center text-brandCyan text-xs flex-shrink-0 mt-0.5">
                        <i class="fa-solid fa-robot"></i>
                    </div>
                    <div
                        class="bg-slate-950 border border-slate-800 p-3.5 rounded-2xl rounded-tl-none text-slate-300 leading-relaxed shadow-sm">
                        Welcome to **GateVerify**! 👋 I am your automated product assistant. Feel free to ask me any
                        questions about our core system features, hardware requirements, local data privacy setups, or
                        framework tier pricing!
                    </div>
                </div>
            </div>

            <div
                class="px-4 py-3 bg-slate-950/60 border-t border-slate-800/40 flex items-center gap-2 flex-shrink-0 overflow-x-auto no-scrollbar whitespace-nowrap">
                <span
                    class="text-[10px] uppercase font-bold tracking-wider text-slate-500 flex-shrink-0 mr-1">Topics:</span>
                <button onclick="clickSuggest('How does the system work and what are its key features?')"
                    class="inline-block text-xs bg-slate-900 hover:bg-slate-800 border border-slate-800 text-slate-300 hover:text-brandCyan px-3 py-2 rounded-xl transition-all flex-shrink-0">💡
                    Features & Workflow</button>
                <button onclick="clickSuggest('Is my system data safe and secure?')"
                    class="inline-block text-xs bg-slate-900 hover:bg-slate-800 border border-slate-800 text-slate-300 hover:text-brandCyan px-3 py-2 rounded-xl transition-all flex-shrink-0">🔒
                    Privacy & Security</button>
                <button onclick="clickSuggest('What specific hardware or camera devices are required?')"
                    class="inline-block text-xs bg-slate-900 hover:bg-slate-800 border border-slate-800 text-slate-300 hover:text-brandCyan px-3 py-2 rounded-xl transition-all flex-shrink-0">📷
                    Hardware Specs</button>
                <button onclick="clickSuggest('How much do the implementation and subscription plans cost?')"
                    class="inline-block text-xs bg-slate-900 hover:bg-slate-800 border border-slate-800 text-slate-300 hover:text-brandCyan px-3 py-2 rounded-xl transition-all flex-shrink-0">💰
                    Pricing & Tiers</button>
            </div>

            <div
                class="p-3 sm:p-4 bg-slate-950 border-t border-slate-800/80 flex gap-2 sm:gap-3 flex-shrink-0 pb-safe-bottom">
                <input type="text" id="modalChatInput" onkeydown="if(event.key === 'Enter') sendModalMessage()"
                    placeholder="Ask a question about our system..."
                    class="flex-1 bg-slate-900 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brandCyan focus:ring-1 focus:ring-brandCyan/50 transition-all">
                <button onclick="sendModalMessage()"
                    class="bg-brandDeepBlue hover:bg-blue-600 text-white px-4 sm:px-6 py-3 rounded-xl font-bold text-sm transition-all shadow-lg shadow-blue-500/10 flex items-center justify-center gap-2 flex-shrink-0">
                    <span class="hidden sm:inline">Send</span> <i class="fa-solid fa-paper-plane text-xs"></i>
                </button>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/chatbot.js') }}"></script>
    @stack('scripts')
</body>

</html>