/* ── Filter chips ── */
const filterMap = {
    'all':      null,
    'unread':   null,   // handled separately
    'orders':   'order',
    'messages': 'message',
    'escrow':   'escrow',
    'promos':   'promo',
};

document.querySelectorAll('.filter-chip').forEach(chip => {
    chip.addEventListener('click', () => {
        document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
        chip.classList.add('active');
        applyFilter(chip.dataset.filter);
    });
});

function applyFilter(filter) {
    const cards = document.querySelectorAll('.notif-card');
    let visible = 0;

    cards.forEach(card => {
        let show = true;
        if (filter === 'unread') {
            show = card.dataset.read === '0';
        } else if (filter && filterMap[filter]) {
            show = card.dataset.type === filterMap[filter];
        }
        card.closest('.notif-card').style.display = show ? '' : 'none';
        if (show) visible++;
    });

    // hide empty groups
    document.querySelectorAll('.notif-group').forEach(group => {
        const anyVisible = [...group.querySelectorAll('.notif-card')]
            .some(c => c.style.display !== 'none');
        group.style.display = anyVisible ? '' : 'none';
    });

    document.getElementById('emptyState').style.display = visible === 0 ? 'block' : 'none';
}

/* ── Mark notification as read on click ── */
document.querySelectorAll('.notif-card').forEach(card => {
    card.addEventListener('click', () => markRead(card));
});

function markRead(card) {
    card.classList.remove('unread');
    card.dataset.read = '1';
    const dot = card.querySelector('.unread-dot');
    if (dot) dot.remove();
    updateUnreadCount();
    // wire to: fetch('/api/notifications/read', { method:'POST', body: JSON.stringify({ id: card.dataset.id }) });
}

/* ── Mark all as read ── */
document.getElementById('markAllBtn').addEventListener('click', () => {
    document.querySelectorAll('.notif-card.unread').forEach(markRead);
});

/* ── Dismiss ── */
function dismissNotif(btn, e) {
    e.stopPropagation();
    const card = btn.closest('.notif-card');
    card.style.transition = 'opacity .2s, transform .2s';
    card.style.opacity = '0';
    card.style.transform = 'translateX(12px)';
    setTimeout(() => {
        card.remove();
        checkEmpty();
        updateUnreadCount();
    }, 200);
    // wire to: fetch('/api/notifications/dismiss', { method:'POST', body: JSON.stringify({ id: card.dataset.id }) });
}

function checkEmpty() {
    document.querySelectorAll('.notif-group').forEach(group => {
        if (!group.querySelector('.notif-card')) group.remove();
    });
    const remaining = document.querySelectorAll('.notif-card').length;
    document.getElementById('emptyState').style.display = remaining === 0 ? 'block' : 'none';
}

function updateUnreadCount() {
    const count = document.querySelectorAll('.notif-card.unread').length;
    const badge = document.querySelector('.unread-badge');
    const subtitle = document.querySelector('.page-subtitle');

    if (badge) {
        if (count > 0) { badge.textContent = count; }
        else { badge.remove(); }
    }
    if (subtitle) {
        subtitle.textContent = count > 0
            ? `You have ${count} unread notification${count > 1 ? 's' : ''}`
            : "You're all caught up";
    }
}