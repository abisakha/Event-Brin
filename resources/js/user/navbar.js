
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

document.addEventListener('DOMContentLoaded',()=>{
    const wrapper=document.getElementById('eventSearchWrapper');
    const input=document.getElementById('eventSearchInput');
    const suggestion=document.getElementById('eventSearchSuggestion');
    const items=document.querySelectorAll('[data-event-suggestion]');
    const empty=document.getElementById('eventSearchEmpty');
    const count=document.getElementById('eventSuggestionCount');

    if(!wrapper||!input||!suggestion)return;

    const showSuggestions=()=>{
        const keyword=input.value.trim().toLowerCase();
        let total=0;

        items.forEach(item=>{
            const title=item.dataset.title||'';
            const match=title.includes(keyword);

            item.classList.toggle('hidden',!match);

            if(match){
                total++;
            }
        });

        if(count){
            count.textContent=total;
        }

        if(empty){
            empty.classList.toggle('hidden',total>0);
        }

        suggestion.classList.remove('hidden');
    };

    const hideSuggestions=()=>{
        suggestion.classList.add('hidden');
    };

    input.addEventListener('focus',showSuggestions);
    input.addEventListener('click',showSuggestions);
    input.addEventListener('input',showSuggestions);

    document.addEventListener('click',event=>{
        if(!wrapper.contains(event.target)){
            hideSuggestions();
        }
    });

    input.addEventListener('keydown',event=>{
        if(event.key==='Escape'){
            hideSuggestions();
            input.blur();
        }
    });
});
