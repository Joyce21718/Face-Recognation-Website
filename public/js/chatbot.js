document.addEventListener('DOMContentLoaded', () => {
    // Initialize Scroll Animations
    AOS.init({ once: true, duration: 800, offset: 50 });
});

// Sticky Navbar Compaction Logic
window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 30) {
        nav.classList.add('py-2', 'shadow-2xl', 'bg-slate-950/90');
        nav.classList.remove('py-4');
    } else {
        nav.classList.add('py-4');
        nav.classList.remove('py-2', 'shadow-2xl', 'bg-slate-950/90');
    }
});

// Responsive Hamburger Navigation Controls
const menuToggle = document.getElementById("menuToggle");
const mobileMenu = document.getElementById("mobileMenu");
const menuIcon = document.getElementById("menuIcon");

if (menuToggle) {
    menuToggle.addEventListener("click", () => {
        const isOpen = mobileMenu.classList.contains("mobile-menu-active");
        if (isOpen) {
            forceCloseMobileNavbar();
        } else {
            mobileMenu.classList.add("mobile-menu-active");
            menuIcon.classList.remove("fa-bars");
            menuIcon.classList.add("fa-xmark", "rotate-90");
        }
    });
}

function forceCloseMobileNavbar() {
    if (mobileMenu) {
        mobileMenu.classList.remove("mobile-menu-active");
        menuIcon.classList.remove("fa-xmark", "rotate-90");
        menuIcon.classList.add("fa-bars");
    }
}

document.querySelectorAll(".mobile-item").forEach(item => {
    item.addEventListener("click", forceCloseMobileNavbar);
});

// Modal Lifecycle Window Triggers
function openChatModal() {
    const modal = document.getElementById('chatModal');
    const container = document.getElementById('chatModalContainer');
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
    setTimeout(() => {
        container.classList.remove('scale-95');
        container.classList.add('scale-100');
    }, 10);
}

function closeChatModal() {
    const modal = document.getElementById('chatModal');
    const container = document.getElementById('chatModalContainer');
    container.classList.remove('scale-100');
    container.classList.add('scale-95');
    document.body.classList.remove('overflow-hidden');
    setTimeout(() => { modal.classList.add('hidden'); }, 150);
}

function clickSuggest(text) {
    const input = document.getElementById('modalChatInput');
    if (input) {
        input.value = text;
        sendModalMessage();
    }
}

// Clean Streaming Text Typographer Engine
function typeEffect(element, text, speed = 8, callback) {
    let i = 0;
    element.innerHTML = "";

    let processedText = text.replace(/\*\*(.*?)\*\*/g, '<strong class="text-white font-semibold">$1</strong>');
    let currentString = "";
    let isTag = false;
    const container = document.getElementById('modalChatContainer');

    function typing() {
        if (i < processedText.length) {
            let char = processedText.charAt(i);
            if (char === '<') isTag = true;
            currentString += char;
            if (char === '>') isTag = false;

            if (!isTag) {
                element.innerHTML = currentString;
                if (container) container.scrollTop = container.scrollHeight;
            }
            i++;
            setTimeout(typing, speed);
        } else {
            if (callback) callback();
        }
    }
    typing();
}

// Automated Keyword Validation Strategy and Reply Matrix
function sendModalMessage() {
    const input = document.getElementById('modalChatInput');
    const container = document.getElementById('modalChatContainer');

    if (!input || !container) return;

    const userQuery = input.value.trim();
    if (userQuery === '') return;

    // Generate User Speech Bubble Dom Element
    const userWrapper = document.createElement('div');
    userWrapper.className = "flex justify-end w-full tracking-wide";
    userWrapper.innerHTML = `
        <div class="bg-brandDeepBlue text-white p-3.5 rounded-2xl rounded-tr-none max-w-[85%] text-sm shadow-md leading-relaxed break-words">
            ${userQuery.replace(/</g, "&lt;").replace(/>/g, "&gt;")}
        </div>
    `;
    container.appendChild(userWrapper);

    const queryCleaned = userQuery.toLowerCase();
    input.value = '';
    container.scrollTop = container.scrollHeight;

    // Instantiation of Asynchronous Loading State Dot System
    const typingIndicator = document.createElement('div');
    typingIndicator.id = "ai-typing-indicator";
    typingIndicator.className = "flex gap-3 items-start max-w-[85%]";
    typingIndicator.innerHTML = `
        <div class="w-7 h-7 rounded-lg bg-slate-800 border border-slate-700 flex items-center justify-center text-brandCyan text-xs flex-shrink-0 mt-0.5">
            <i class="fa-solid fa-robot animate-pulse"></i>
        </div>
        <div class="bg-slate-950 border border-slate-800 p-3.5 rounded-2xl rounded-tl-none text-slate-400 flex items-center gap-1.5 shadow-sm">
            <span class="w-2 h-2 bg-brandCyan/60 rounded-full animate-bounce" style="animation-delay: 0ms"></span>
            <span class="w-2 h-2 bg-brandCyan/60 rounded-full animate-bounce" style="animation-delay: 150ms"></span>
            <span class="w-2 h-2 bg-brandCyan/60 rounded-full animate-bounce" style="animation-delay: 300ms"></span>
        </div>
    `;
    container.appendChild(typingIndicator);
    container.scrollTop = container.scrollHeight;

    setTimeout(() => {
        const indicator = document.getElementById('ai-typing-indicator');
        if (indicator) indicator.remove();

        let replyText = "Thank you for reaching out! For specific setup configurations or deployment questions, please click the **'Launch Demo'** button above to coordinate directly with our support engineers.";

        if (/\b(hello|hi|hey|greetings|good morning|good afternoon|good evening)\b/.test(queryCleaned)) {
            replyText = "Hello! Welcome to GateVerify. 👋 How can I assist you today? You can ask me regarding system workflow configurations, security protocols, hardware guidelines, or deployment inquiries.";
        }
        else if (/\b(glass|glasses|hair|makeup|cap|hat|change|look|face|appearance|gupit|hitsura|mukha|nawong|usab)\b/.test(queryCleaned)) {
            replyText = "Even if your hairstyle, makeup, or accessories change, our system will still recognize you! GateVerify uses advanced **deep geometric mapping** (face-api.js) to pinpoint bone-structure data nodes, ensuring accurate access logs even with new haircuts, glasses, or cosmetics.";
        }
        else if (/\b(camera|hardware|device|cctv|ip|stream|rtsp|usb|webcam|spec|requirements|kailangan|kinahanglan)\b/.test(queryCleaned)) {
            replyText = "GateVerify is completely **hardware-agnostic**! There is no need to purchase overpriced, specialized scanning kiosks. The system functions excellently using standard 1080p USB webcams or by integrating seamlessly into your existing security CCTV IP setups using standard RTSP feeds.";
        }
        else if (/\b(privacy|safe|secure|data|law|gdpr|comply|compliance|storage|leak|luwas|ligtas)\b/.test(queryCleaned)) {
            replyText = "Data absolute integrity is guaranteed. GateVerify employs a zero-risk **Zero Image Storage Architecture**. Visual references are instantly translated into unique, encrypted 128-digit mathematical matrix arrays, and original imagery is immediately destroyed to enforce complete localized compliance.";
        }
        else if (/\b(price|cost|how much|buy|payment|subscribe|plan|pricing|tier|tagpila|magkano|presyo)\b/.test(queryCleaned)) {
            replyText = "We offer flexible, tier-based subscription packages scaled directly to your company or institution's user enrollment base. To receive a comprehensive, itemized quotation customized for your perimeter needs, please click the **'Launch Demo'** button.";
        }
        else if (/\b(how it works|workflow|feature|features|what can it do|system|details|paano|unsaon|trabaho|himo)\b/.test(queryCleaned)) {
            replyText = "GateVerify acts as an end-to-end access management infrastructure. Core functionalities include: **Real-Time Automated Turnstile Relays**, **Instant Automated SMS Alerts** to guardians/parents, a centralized web **Administrative Monitoring Console**, and on-the-fly **Temporary Visitor QR Pass Generation**.";
        }
        else if (/\b(demo|test|try|free|walkthrough|live|sulay|subok)\b/.test(queryCleaned)) {
            replyText = "Want to experience GateVerify live? Click the **'Launch Demo'** action menu in the upper-right area, fill out your basic institution details, and our technical onboarding division will arrange an active live system walkthrough for you!";
        }

        // Construct Response Component Bubble
        const botWrapper = document.createElement('div');
        botWrapper.className = "flex gap-3 items-start max-w-[88%] sm:max-w-[85%]";
        const dynamicTargetId = `typing-target-${Date.now()}`;

        botWrapper.innerHTML = `
            <div class="w-7 h-7 rounded-lg bg-slate-800 border border-slate-700 flex items-center justify-center text-brandCyan text-xs flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-robot"></i>
            </div>
            <div id="${dynamicTargetId}" class="bg-slate-950 border border-slate-800 p-3.5 rounded-2xl rounded-tl-none text-slate-300 leading-relaxed shadow-sm min-h-[44px]">
            </div>
        `;

        container.appendChild(botWrapper);
        const targetDiv = document.getElementById(dynamicTargetId);
        if (targetDiv) typeEffect(targetDiv, replyText, 8);

    }, 750);
}