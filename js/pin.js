/* ── Toggle (Fabrics / Styles) ── */
const fabricBtn  = document.getElementById('fabricToggle');
const styleBtn   = document.getElementById('styleToggle');
const indicator  = document.getElementById('toggleIndicator');
const filterWrap = document.getElementById('filterContainer');

const fabricFilters = ['All Items','Ankara','Lace','Linen','Adire','Silk','Damask'];
const styleFilters  = ['All Styles','Gowns','Suits','Traditional','Corporate','Kaftans','Outerwear'];

function positionIndicator(btn) {
    indicator.style.left  = btn.offsetLeft + 'px';
    indicator.style.width = btn.offsetWidth + 'px';
}

function buildFilters(list) {
    filterWrap.innerHTML = '';
    list.forEach((f, i) => {
        const btn = document.createElement('button');
        btn.className = 'btn btn-fade rounded-5 fs-7 filter-chip' + (i === 0 ? ' fade-r' : '');
        btn.textContent = f;
        btn.addEventListener('click', () => {
            filterWrap.querySelectorAll('.filter-chip').forEach(b => b.classList.remove('fade-r'));
            btn.classList.add('fade-r');
        });
        filterWrap.appendChild(btn);
    });
}

fabricBtn.addEventListener('click', () => {
    fabricBtn.classList.add('active');
    styleBtn.classList.remove('active');
    positionIndicator(fabricBtn);
    buildFilters(fabricFilters);
});

styleBtn.addEventListener('click', () => {
    styleBtn.classList.add('active');
    fabricBtn.classList.remove('active');
    positionIndicator(styleBtn);
    buildFilters(styleFilters);
});

/* Set initial indicator position after layout */
window.addEventListener('load', () => positionIndicator(fabricBtn));
window.addEventListener('resize', () => {
    const active = document.querySelector('.toggle-btn.active');
    if (active) positionIndicator(active);
});

/* ── Filter chip clicks (initial render) ── */
filterWrap.querySelectorAll('.filter-chip').forEach(chip => {
    chip.addEventListener('click', () => {
        filterWrap.querySelectorAll('.filter-chip').forEach(b => b.classList.remove('fade-r'));
        chip.classList.add('fade-r');
    });
});

/* ── Button press micro-interaction ── */
document.addEventListener('mousedown', e => {
    if (e.target.closest('button')) e.target.closest('button').style.transform = 'scale(0.96)';
});
document.addEventListener('mouseup', () => {
    document.querySelectorAll('button').forEach(b => b.style.transform = '');
});