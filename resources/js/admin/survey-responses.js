const modal=document.getElementById('surveyResponseModal');

if(modal){
    const modalName=document.getElementById('responseModalName');
    const modalDate=document.getElementById('responseModalDate');
    const modalRating=document.getElementById('responseModalRating');
    const questionCount=document.getElementById('responseQuestionCount');
    const answersContainer=document.getElementById('responseAnswers');
    const closeButton=document.getElementById('closeSurveyResponseModal');
    const closeFooter=document.getElementById('closeSurveyResponseFooter');

    const createStars=(value)=>{
        let stars='';

        for(let i=1;i<=5;i++){
            const active=i<=Number(value);

            stars+=`
                <span class="flex h-8 w-8 items-center justify-center rounded-lg ${active?'bg-amber-50 text-amber-500 dark:bg-amber-950/40':'bg-slate-100 text-slate-300 dark:bg-slate-800 dark:text-slate-600'}">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 ${active?'fill-current':''}" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                </span>
            `;
        }

        return stars;
    };

    const renderAnswers=(answers)=>{
        answersContainer.innerHTML='';

        answers.forEach((item,index)=>{
            const answer=item.type==='rating'
                ?`
                    <div class="mt-3 flex flex-wrap items-center gap-1.5">
                        ${createStars(item.answer)}
                        <span class="ms-2 text-sm font-semibold text-slate-700 dark:text-slate-300">${item.answer} / 5</span>
                    </div>
                `
                :`
                    <div class="mt-3 rounded-lg bg-slate-50 p-3 dark:bg-slate-800/70">
                        <p class="text-sm leading-6 text-slate-600 dark:text-slate-300"></p>
                    </div>
                `;

            answersContainer.insertAdjacentHTML('beforeend',`
                <div class="rounded-xl border border-slate-200 p-4 dark:border-slate-800">
                    <div class="flex items-start gap-3">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-xs font-bold text-blue-600 dark:bg-blue-950/50 dark:text-blue-400">
                            ${index+1}
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="question-text text-sm font-semibold leading-6 text-slate-900 dark:text-white"></p>
                            <p class="mt-1 text-xs text-slate-400">${item.type==='rating'?'Star Rating':'Paragraph'}</p>
                            ${answer}
                        </div>
                    </div>
                </div>
            `);

            const card=answersContainer.lastElementChild;
            card.querySelector('.question-text').textContent=item.question;

            if(item.type==='paragraph'){
                card.querySelector('.mt-3 p').textContent=item.answer;
            }
        });
    };

    const openModal=(button)=>{
        let answers=[];

        try{
            answers=JSON.parse(button.dataset.answers);
        }catch(error){
            console.error('Invalid survey response data:',error);
            return;
        }

        modalName.textContent=button.dataset.name;
        modalDate.textContent=button.dataset.date;
        modalRating.textContent=`${button.dataset.rating} / 5.0`;
        questionCount.textContent=`${answers.length} Questions`;

        renderAnswers(answers);

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    };

    const closeModal=()=>{
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    };

    document.addEventListener('click',(event)=>{
        const button=event.target.closest('.survey-response-detail');

        if(button){
            openModal(button);
            return;
        }

        if(event.target===modal){
            closeModal();
        }
    });

    closeButton?.addEventListener('click',closeModal);
    closeFooter?.addEventListener('click',closeModal);

    document.addEventListener('keydown',(event)=>{
        if(event.key==='Escape'&&!modal.classList.contains('hidden')){
            closeModal();
        }
    });
}
