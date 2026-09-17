document.addEventListener('DOMContentLoaded',()=>{
    const modal=document.getElementById('deleteSurveyModal');
    const openButton=document.getElementById('openDeleteSurvey');
    const cancelButton=document.getElementById('cancelDeleteSurvey');
    const confirmButton=document.getElementById('confirmDeleteSurvey');

    const surveyContent=document.getElementById('surveyContent');
    const emptyState=document.getElementById('surveyEmptyState');

    if(!modal||!openButton)return;

    const openModal=()=>{
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    };

    const closeModal=()=>{
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    };

    openButton.addEventListener('click',openModal);

    cancelButton?.addEventListener('click',closeModal);

    confirmButton?.addEventListener('click',()=>{
        surveyContent?.classList.add('hidden');
        emptyState?.classList.remove('hidden');

        closeModal();
    });

    modal.addEventListener('click',(event)=>{
        if(event.target===modal){
            closeModal();
        }
    });

    document.addEventListener('keydown',(event)=>{
        if(event.key==='Escape'&&!modal.classList.contains('hidden')){
            closeModal();
        }
    });
});
