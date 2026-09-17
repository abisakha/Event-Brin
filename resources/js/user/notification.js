document.addEventListener('DOMContentLoaded',()=>{
    const filters=document.querySelectorAll('.notification-filter');
    const mobileFilter=document.getElementById('mobileNotificationFilter');
    const items=document.querySelectorAll('[data-notification]');
    const empty=document.getElementById('notificationEmpty');

    const applyFilter=(filter)=>{
        let visible=0;

        items.forEach(item=>{
            const status=item.dataset.status;
            const show=filter==='all'||status===filter;

            item.classList.toggle('hidden',!show);

            if(show)visible++;
        });

        if(empty){
            empty.classList.toggle('hidden',visible!==0);
        }
    };

    filters.forEach(button=>{
        button.addEventListener('click',()=>{
            const filter=button.dataset.filter;

            filters.forEach(item=>{
                item.classList.remove('bg-blue-600','text-white','font-semibold');
                item.classList.add('text-slate-600','font-medium');
            });

            button.classList.remove('text-slate-600','font-medium');
            button.classList.add('bg-blue-600','text-white','font-semibold');

            applyFilter(filter);

            if(mobileFilter){
                mobileFilter.value=filter;
            }
        });
    });

    if(mobileFilter){
        mobileFilter.addEventListener('change',()=>{
            applyFilter(mobileFilter.value);
        });
    }
});
