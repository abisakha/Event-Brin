lucide.createIcons();

    const themeBtn=document.getElementById('themeBtn');
    const themeIcon=document.getElementById('themeIcon');

    if(localStorage.theme==='dark'){
        document.documentElement.classList.add('dark');
        themeIcon.setAttribute('data-lucide','sun');
        lucide.createIcons();
    }

    themeBtn.addEventListener('click',()=>{

        document.documentElement.classList.toggle('dark');

        if(document.documentElement.classList.contains('dark')){
            localStorage.theme='dark';
            themeIcon.setAttribute('data-lucide','sun');
        }else{
            localStorage.theme='light';
            themeIcon.setAttribute('data-lucide','moon');
        }

        themeIcon.classList.add('rotate-180');

        setTimeout(()=>{
            themeIcon.classList.remove('rotate-180');
        },300);

        lucide.createIcons();

    });
