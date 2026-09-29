document.addEventListener('DOMContentLoaded',()=>{
    const detailModal=document.getElementById('eventDetailModal');
    const deleteModal=document.getElementById('deleteEventModal');
    const deleteForm=document.getElementById('deleteEventForm');

    document.querySelectorAll('[data-event-view]').forEach(button=>{
        button.addEventListener('click',()=>{
            const registration=Number(button.dataset.eventRegistration);
            const quota=Number(button.dataset.eventQuota);
            const percent=quota>0?Math.min(100,Math.round((registration/quota)*100)):0;

            document.getElementById('detailName').textContent=button.dataset.eventName;
            document.getElementById('detailDate').textContent=button.dataset.eventDate;
            document.getElementById('detailLocation').textContent=button.dataset.eventLocation;
            document.getElementById('detailDescription').textContent=button.dataset.eventDescription||'-';
            document.getElementById('detailImage').src=button.dataset.eventImage;
            document.getElementById('detailRegistration').textContent=registration+' / '+quota;
            document.getElementById('detailRegistrationPercent').textContent=percent+'%';
            document.getElementById('detailRegistrationBar').style.width=percent+'%';
            document.getElementById('detailEditLink').href=button.dataset.eventEditUrl;

            const status=document.getElementById('detailStatus');
            const eventStatus=button.dataset.eventStatus;
            status.textContent=eventStatus.charAt(0).toUpperCase()+eventStatus.slice(1);
            status.className='rounded-full py-1 ps-3 pe-3 text-xs font-semibold';

            if(eventStatus==='published'){
                status.classList.add('bg-blue-100','text-blue-600','dark:bg-blue-950/60','dark:text-blue-400');
            }else if(eventStatus==='completed'){
                status.classList.add('bg-emerald-100','text-emerald-600','dark:bg-emerald-950/60','dark:text-emerald-400');
            }else{
                status.classList.add('bg-slate-100','text-slate-500','dark:bg-slate-800','dark:text-slate-400');
            }

            detailModal.classList.remove('hidden');
            detailModal.classList.add('flex');
        });
    });

    document.getElementById('closeEventDetail').addEventListener('click',()=>{
        detailModal.classList.add('hidden');
        detailModal.classList.remove('flex');
    });

    document.getElementById('closeEventDetailFooter').addEventListener('click',()=>{
        detailModal.classList.add('hidden');
        detailModal.classList.remove('flex');
    });

    document.querySelectorAll('[data-event-delete]').forEach(button=>{
        button.addEventListener('click',()=>{
            document.getElementById('deleteEventName').textContent=button.dataset.eventName;
            deleteForm.action=button.dataset.eventDeleteUrl;
            deleteModal.classList.remove('hidden');
            deleteModal.classList.add('flex');
        });
    });

    document.getElementById('cancelDeleteEvent').addEventListener('click',()=>{
        deleteModal.classList.add('hidden');
        deleteModal.classList.remove('flex');
    });

    document.querySelectorAll('[data-event-suggestion]').forEach(button=>{
        button.addEventListener('click',()=>{
            document.getElementById('eventSearchInput').value=button.dataset.eventName;
            document.getElementById('eventSearchForm').submit();
        });
    });
});
// akses di tolak
const searchInput=document.getElementById('eventSearchInput');
const eventItems=document.querySelectorAll('[data-event-item]');
const searchEmpty=document.getElementById('desktopEventSearchEmpty');

searchInput.addEventListener('input',()=>{
    const keyword=searchInput.value.trim().toLowerCase();
    let totalMatch=0;

    eventItems.forEach(item=>{
        const eventName=item.dataset.eventName||'';
        const eventLocation=item.dataset.eventLocation||'';
        const eventStatus=item.dataset.eventStatus||'';

        const match=
            eventName.includes(keyword)||
            eventLocation.includes(keyword)||
            eventStatus.includes(keyword);

        item.classList.toggle('hidden',!match);

        if(match){
            totalMatch++;
        }
    });

    searchEmpty.classList.toggle('hidden',totalMatch>0);
});
const errorToast=document.getElementById('errorToast');

if(errorToast){
    const closeErrorToast=document.getElementById('closeErrorToast');

    closeErrorToast.addEventListener('click',()=>{
        errorToast.remove();
    });

    setTimeout(()=>{
        errorToast.classList.add('opacity-0');
        errorToast.classList.add('transition','duration-300');

        setTimeout(()=>{
            errorToast.remove();
        },300);
    },15000);
}
