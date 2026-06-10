@extends('layouts.app')

@section('title', 'Facial Authentication - Secure AI Face Recognition Management')

@section('content')

    @include('sections.hero')

    @include('sections.tech-stack')

    @include('sections.features')

    @include('sections.how-it-works')

    @include('sections.dashboard-preview')

    @include('sections.benefits')

    @include('sections.testimonials')

    @include('sections.cta')

@endsection

@push('scripts')
    <script>
        // Interactive Dashboard Tab Switch Logic
        const tabData = {
            admin: {
                title: "Admin Command Console",
                desc: "Global oversight over scanners, logs, nodes, and institutional permissions configurations.",
                stats: [
                    { name: "Active Terminals", val: "42" },
                    { name: "Incidents Flagged", val: "0" },
                    { name: "Network Load", val: "1.2%" }
                ]
            },
            student: {
                title: "Student Portal Portal",
                desc: "Access individual tracking profiles, attendance histories, and upcoming structural check validations.",
                stats: [
                    { name: "Class Attendance Rate", val: "96.4%" },
                    { name: "Late Violations", val: "1" },
                    { name: "Verified Logins", val: "184" }
                ]
            },
            teacher: {
                title: "Teacher Roster Grid",
                desc: "Manage class sections, generate immediate session verification reports, and process modifications parameters.",
                stats: [
                    { name: "Assigned Classrooms", val: "4" },
                    { name: "Automated Checkins", val: "1,240" },
                    { name: "Time Saved/Week", val: "4.5 Hrs" }
                ]
            },
            visitor: {
                title: "Visitor Validation Node",
                desc: "Monitor temporary invite paths, active generated token QR structures, and check-out tracking matrices.",
                stats: [
                    { name: "Active Passes Issued", val: "18" },
                    { name: "Awaiting Check-in", val: "3" },
                    { name: "Security Clearances", val: "100%" }
                ]
            }
        };

        function switchTab(role) {
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-brandDeepBlue', 'text-white', 'shadow-lg');
                btn.classList.add('bg-slate-800', 'text-slate-400');
            });

            const activeBtn = document.getElementById(`btn-${role}`);
            activeBtn.classList.add('bg-brandDeepBlue', 'text-white', 'shadow-lg');
            activeBtn.classList.remove('bg-slate-800', 'text-slate-400');

            const contentBox = document.getElementById('tab-content');
            contentBox.style.opacity = 0;

            setTimeout(() => {
                document.getElementById('panel-title').innerText = tabData[role].title;
                document.getElementById('panel-desc').innerText = tabData[role].desc;

                let bodyHtml = '';
                tabData[role].stats.forEach(stat => {
                    bodyHtml += `
                        <div class="bg-slate-900 p-4 rounded-xl border border-slate-800 text-center">
                            <p class="text-xs text-slate-500 uppercase font-bold tracking-wider mb-1">${stat.name}</p>
                            <p class="text-2xl font-black text-white">${stat.val}</p>
                        </div>
                    `;
                });
                document.getElementById('panel-body').innerHTML = bodyHtml;
                contentBox.style.opacity = 1;
            }, 200);
        }

        // Animated Numerical Counters Logic
        const counters = document.querySelectorAll('.counter');
        const speed = 150;

        const startCounters = () => {
            counters.forEach(counter => {
                const animate = () => {
                    const value = +counter.getAttribute('data-target');
                    const data = +counter.innerText.replace(/[+,%]/g, '');
                    const time = value / speed;
                    if (data < value) {
                        const nextValue = Math.ceil(data + time);
                        counter.innerText = nextValue + (counter.getAttribute('data-target').includes('+') ? '+' : counter.getAttribute('data-target').includes('%') ? '%' : '');
                        setTimeout(animate, 15);
                    } else {
                        counter.innerText = counter.getAttribute('data-target');
                    }
                }
                animate();
            });
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        if (counters.length > 0) {
            observer.observe(document.getElementById('benefits'));
        }
    </script>
@endpush