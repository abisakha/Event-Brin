const modal=document.getElementById('registrationModal');
const detailButtons=document.querySelectorAll('.registration-detail');
const closeModal=document.getElementById('closeRegistrationModal');

if(modal&&detailButtons.length){
    const modalName=document.getElementById('modalName');
    const modalEmail=document.getElementById('modalEmail');
    const modalOrganization=document.getElementById('modalOrganization');
    const modalDate=document.getElementById('modalDate');
    const modalStatus=document.getElementById('modalStatus');

    const openModal=(button)=>{
        modalName.textContent=button.dataset.name;
        modalEmail.textContent=button.dataset.email;
        modalOrganization.textContent=button.dataset.organization;
        modalDate.textContent=button.dataset.date;
        modalStatus.textContent=button.dataset.status;
        modalStatus.className='inline-flex rounded-md py-1 ps-2 pe-2 text-xs font-medium';

        if(button.dataset.status==='Confirmed'){
            modalStatus.classList.add('bg-sky-100','text-sky-600','dark:bg-sky-950/60','dark:text-sky-400');
        }else if(button.dataset.status==='Pending'){
            modalStatus.classList.add('bg-amber-100','text-amber-600','dark:bg-amber-950/60','dark:text-amber-400');
        }else{
            modalStatus.classList.add('bg-slate-100','text-slate-500','dark:bg-slate-800','dark:text-slate-400');
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    };

    const hideModal=()=>{
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    };

    detailButtons.forEach((button)=>{
        button.addEventListener('click',()=>openModal(button));
    });

    closeModal?.addEventListener('click',hideModal);

    modal.addEventListener('click',(e)=>{
        if(e.target===modal)hideModal();
    });

    document.addEventListener('keydown',(e)=>{
        if(e.key==='Escape'&&!modal.classList.contains('hidden'))hideModal();
    });
}
