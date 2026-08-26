// ── char counter ──────────────────────────────────────────────
function updateCharCount() {
    const field = document.getElementById('noteField');
    const count = document.getElementById('charCount');
    count.textContent = `${field.value.length} / 300`;
}

// ── alarm toggle ──────────────────────────────────────────────
function toggleAlarm(checkbox) {
    const fields = document.getElementById('alarmFields');
    if (checkbox.checked) {
        fields.classList.remove('inVisible');
    } else {
        fields.classList.add('inVisible');
    }
}

// ── remove existing alarm ─────────────────────────────────────
function removeAlarm() {
    document.getElementById('existingAlarm').style.display = 'none';
    // showToast('Reminder removed');
}

// ── save ──────────────────────────────────────────────────────
function savePin() {
    const note        = document.getElementById('noteField').value;
    const board       = document.getElementById('boardSelect').value;
    const alarmOn     = document.getElementById('alarmToggle').checked;
    const eventName   = document.getElementById('eventName').value;
    const remindDate  = document.getElementById('reminderDate').value;

    // basic validation
    if (alarmOn) {
        if (!eventName.trim()) {
            highlight('eventName');
            showToast('Please enter an event name', true);
            return;
        }
        if (!remindDate) {
            highlight('reminderDate');
            showToast('Please pick a reminder date', true);
            return;
        }
    }

    // simulate save
    if (alarmOn && remindDate) {
        const d = new Date(remindDate);
        const formatted = d.toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
        document.getElementById('existingAlarmText').textContent = `Reminder set for ${formatted}`;
        document.getElementById('existingAlarm').style.display = 'flex';
        document.getElementById('alarmToggle').checked = false;
        document.getElementById('alarmFields').classList.remove('visible');
    }

    showToast('Changes saved ✓');
}


// ── close ─────────────────────────────────────────────────────

function editor(element) {
    element.classList.add("view");
}

function closeEditor(event) {
    if (event) {
        event.stopPropagation();
    }

    let cover = null;
    if (event && event.currentTarget) {
        cover = event.currentTarget.closest('.editor-cover');
    }

    if (!cover) {
        cover = document.querySelector('.editor-cover');
    }

    if (cover) {
        cover.classList.remove('view');
    }
}


// ── toast ─────────────────────────────────────────────────────
function showToast(msg, isError = false) {
    const toast = document.getElementById('toast');
    const toastMsg = document.getElementById('toastMsg');
    const icon = toast.querySelector('i');
    toastMsg.textContent = msg;
    icon.className = isError ? 'bi bi-exclamation-circle-fill' : 'bi bi-check-circle-fill';
    icon.style.color = isError ? '#C0392B' : '#1D9E75';
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 2800);
}

// ── field highlight on error ──────────────────────────────────
function highlight(id) {
    const el = document.getElementById(id);
    el.style.borderColor = '#C0392B';
    el.focus();
    setTimeout(() => el.style.borderColor = '', 2000);
}

// ── board select: handle "create new" ─────────────────────────
document.getElementById('boardSelect').addEventListener('change', function() {
    if (this.value === 'new') {
        const name = prompt('Board name:');
        if (name) {
            const opt = new Option(`📁 ${name}`, name.toLowerCase().replace(/\s+/g, '_'), true, true);
            this.insertBefore(opt, this.lastElementChild);
            showToast(`Board "${name}" created`);
        } else {
            this.value = 'owambe';
        }
    }
});