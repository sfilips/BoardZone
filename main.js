const year = document.getElementById('year');
if (year) year.textContent = new Date().getFullYear();

// Jednoduché přepínání tématu
const themeBtn = document.getElementById('themeBtn');
themeBtn?.addEventListener('click', () => {
    const root = document.documentElement;
    const isDark = getComputedStyle(root).getPropertyValue('--bg').trim() === '#0b1220';
    if (isDark) {
        root.style.setProperty('--bg', '#f8fafc');
        root.style.setProperty('--panel', '#ffffff');
        root.style.setProperty('--text', '#0b1220');
        root.style.setProperty('--muted', '#475569');
        document.querySelector('meta[name="theme-color"]').setAttribute('content', '#f8fafc');
    } else {
        root.style.setProperty('--bg', '#0b1220');
        root.style.setProperty('--panel', '#0f172a');
        root.style.setProperty('--text', '#e5e7eb');
        root.style.setProperty('--muted', '#9ca3af');
        document.querySelector('meta[name="theme-color"]').setAttribute('content', '#0ea5e9');
    }
});
