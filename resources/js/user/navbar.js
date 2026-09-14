document.addEventListener('DOMContentLoaded',()=>{
    const navbar=document.getElementById('navbar');

    if(!navbar||navbar.dataset.home!=='true')return;

    const updateNavbar=()=>{
        const scrolled=window.scrollY>20;

        navbar.classList.toggle('bg-white',scrolled);
        navbar.classList.toggle('border-slate-200',scrolled);
        navbar.classList.toggle('shadow-xl',scrolled);
        navbar.classList.toggle('shadow-slate-900/10',scrolled);
        navbar.classList.toggle('backdrop-blur-md',scrolled);

        navbar.classList.toggle('bg-transparent',!scrolled);
        navbar.classList.toggle('border-transparent',!scrolled);
        navbar.classList.toggle('shadow-none',!scrolled);
    };

    updateNavbar();
    window.addEventListener('scroll',updateNavbar);
});
