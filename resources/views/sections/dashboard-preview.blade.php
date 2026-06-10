<section id="preview" class="py-24">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Centralized Admin Command Console</h2>
            <p class="text-slate-400">A powerful, high-fidelity oversight view optimized for system administrators to manage verified entries and database matching logs.</p>
        </div>

        <!-- Dashboard Terminal View -->
        <div class="glass-card p-6 rounded-2xl max-w-4xl mx-auto shadow-2xl border border-slate-700/60" data-aos="zoom-in">
            <div id="tab-content" class="bg-slate-950 rounded-xl p-8 aspect-[16/9] flex flex-col justify-between border border-slate-900 transition-all duration-300">

                <!-- Header Metadata -->
                <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                    <div>
                        <h3 id="panel-title" class="text-xl font-bold text-brandLightBlue">Entrance Gate Control Panel</h3>
                        <p id="panel-desc" class="text-xs text-slate-400 mt-1">Real-time status over gate verification nodes, system metrics, and identity matching parameters.</p>
                    </div>
                    <span class="text-xs bg-brandCyan/10 text-brandCyan px-3 py-1 rounded-full border border-brandCyan/20 font-mono">
                        Role: ADMIN
                    </span>
                </div>

                <!-- Clean, Factual Status Metrics Grid -->
                <div id="panel-body" class="grid grid-cols-1 sm:grid-cols-3 gap-4 my-auto">
                    <!-- Metric 1: Entrance Gates Active -->
                    <div class="bg-slate-900 p-4 rounded-xl border border-slate-800 text-center">
                        <p class="text-xs text-slate-500 uppercase font-bold tracking-wider mb-1">Active Entry Nodes</p>
                        <p class="text-2xl font-black text-white">4</p>
                    </div>
                    <!-- Metric 2: SMS Pipelines Status -->
                    <div class="bg-slate-900 p-4 rounded-xl border border-slate-800 text-center">
                        <p class="text-xs text-slate-500 uppercase font-bold tracking-wider mb-1">SMS Gateway Status</p>
                        <p class="text-2xl font-black text-emerald-400">Ready</p>
                    </div>
                    <!-- Metric 3: System Match Latency -->
                    <div class="bg-slate-900 p-4 rounded-xl border border-slate-800 text-center">
                        <p class="text-xs text-slate-500 uppercase font-bold tracking-wider mb-1">Matching Latency</p>
                        <p class="text-2xl font-black text-brandCyan">14ms</p>
                    </div>
                </div>

                <!-- System Footer Status -->
                <div class="flex items-center justify-between text-xs text-slate-500 border-t border-slate-800 pt-4">
                    <div class="flex items-center space-x-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Identity Registry Database: Connected</span>
                    </div>
                    <span class="font-mono text-brandCyan">Secure Scanner Sync Active</span>
                </div>

            </div>
        </div>
    </div>
</section>