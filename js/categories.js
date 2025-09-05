document.querySelectorAll('.toggle').forEach(el => {
el.addEventListener('click', () => {
    const subMenu = el.nextElementSibling;
    if (subMenu && subMenu.tagName === 'UL') {
    subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
    }
});
});
