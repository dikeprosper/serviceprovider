/* ── Sidebar active link on scroll ── */
const sections = document.querySelectorAll('.settings-section');
const navLinks = document.querySelectorAll('.sidebar-nav-item a');

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            navLinks.forEach(a => a.classList.remove('active'));
            const active = document.querySelector(`.sidebar-nav-item a[href="#${entry.target.id}"]`);
            if (active) active.classList.add('active');
        }
    });
}, { rootMargin: '-30% 0px -60% 0px' });

sections.forEach(s => observer.observe(s));

/* ── Smooth scroll for sidebar links ── */
navLinks.forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault();
        const target = document.querySelector(link.getAttribute('href'));
        if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
});

/* ── Payment channel selection ── */
document.querySelectorAll('.channel-option input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', () => {
        document.querySelectorAll('.channel-option').forEach(o => o.classList.remove('selected'));
        radio.closest('.channel-option').classList.add('selected');
    });
});

/* ── Copy referral code ── */
function copyCode(btn) {
    const code = btn.closest('.copy-box').querySelector('code').textContent.trim();
    navigator.clipboard.writeText(code).then(() => {
        const original = btn.innerHTML;
        btn.innerHTML = '<span class="material-symbols-outlined" style="font-size:.9rem;">check</span> Copied!';
        setTimeout(() => btn.innerHTML = original, 2000);
    });
}