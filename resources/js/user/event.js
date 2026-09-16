

document.addEventListener('DOMContentLoaded',()=>{
    const toggle=document.getElementById('mobileFilterToggle');
    const content=document.getElementById('mobileFilterContent');
    const icon=document.getElementById('mobileFilterIcon');

    if(!toggle||!content)return;

    toggle.addEventListener('click',()=>{
        const isOpen=!content.classList.contains('hidden');

        content.classList.toggle('hidden',isOpen);
        toggle.setAttribute('aria-expanded',String(!isOpen));

        if(icon){
            icon.classList.toggle('rotate-180',!isOpen);
        }
    });
});