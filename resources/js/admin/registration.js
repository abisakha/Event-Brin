import {createIcons,icons} from 'lucide';

document.addEventListener('DOMContentLoaded',()=>{
    const filterForm=document.getElementById('registrationFilterForm');
    const searchInput=document.getElementById('registrationSearch');
    const statusFilter=document.getElementById('registrationStatusFilter');
    const organizationFilter=document.getElementById('registrationOrganizationFilter');
    const resetFilter=document.getElementById('resetRegistrationFilter');

    const tableBody=document.getElementById('registrationTableBody');
    const mobileList=document.getElementById('registrationMobileList');
    const emptyDesktop=document.getElementById('registrationEmptyDesktop');
    const emptyMobile=document.getElementById('registrationEmptyMobile');
    const visibleCount=document.getElementById('registrationVisibleCount');
    const totalCount=document.getElementById('registrationTotalCount');

    const formModal=document.getElementById('registrationFormModal');
    const openFormButton=document.getElementById('openRegistrationForm');
    const closeFormButton=document.getElementById('closeRegistrationForm');
    const cancelFormButton=document.getElementById('cancelRegistrationForm');
    const registrationForm=document.getElementById('registrationForm');

    const formTitle=document.getElementById('registrationFormTitle');
    const formDescription=document.getElementById('registrationFormDescription');
    const formIcon=document.getElementById('registrationFormIcon');
    const submitText=document.getElementById('registrationSubmitText');
    const submitIcon=document.getElementById('registrationSubmitIcon');

    const nameInput=document.getElementById('registrationName');
    const emailInput=document.getElementById('registrationEmail');
    const organizationInput=document.getElementById('registrationOrganization');
    const dateInput=document.getElementById('registrationDate');
    const registrationStatus=document.getElementById('registrationStatus');

    const detailModal=document.getElementById('registrationModal');
    const closeDetailButton=document.getElementById('closeRegistrationModal');
    const modalName=document.getElementById('modalName');
    const modalEmail=document.getElementById('modalEmail');
    const modalOrganization=document.getElementById('modalOrganization');
    const modalDate=document.getElementById('modalDate');
    const modalStatus=document.getElementById('modalStatus');
    const cancelRegistrationBtn=document.getElementById('cancelRegistrationBtn');
    const confirmTicketBtn=document.getElementById('confirmTicketBtn');

    const deleteModal=document.getElementById('deleteRegistrationModal');
    const deleteRegistrationName=document.getElementById('deleteRegistrationName');
    const cancelDeleteRegistration=document.getElementById('cancelDeleteRegistration');
    const confirmDeleteRegistration=document.getElementById('confirmDeleteRegistration');

    let formMode='create';
    let editingId=null;
    let detailId=null;
    let deletingId=null;

    const escapeHtml=(value)=>{
        const element=document.createElement('div');
        element.textContent=value;
        return element.innerHTML;
    };

    const formatRegistrationDate=(value)=>{
        if(!value)return '';

        const date=new Date(value);

        return new Intl.DateTimeFormat('en-US',{
            month:'short',
            day:'2-digit',
            year:'numeric',
            hour:'2-digit',
            minute:'2-digit',
            hour12:true
        }).format(date).replace(',','');
    };

    const toDatetimeLocal=(value)=>{
        if(!value)return '';

        const date=new Date(value);

        if(Number.isNaN(date.getTime()))return '';

        const year=date.getFullYear();
        const month=String(date.getMonth()+1).padStart(2,'0');
        const day=String(date.getDate()).padStart(2,'0');
        const hour=String(date.getHours()).padStart(2,'0');
        const minute=String(date.getMinutes()).padStart(2,'0');

        return `${year}-${month}-${day}T${hour}:${minute}`;
    };

    const currentDatetimeLocal=()=>{
        const date=new Date();
        const year=date.getFullYear();
        const month=String(date.getMonth()+1).padStart(2,'0');
        const day=String(date.getDate()).padStart(2,'0');
        const hour=String(date.getHours()).padStart(2,'0');
        const minute=String(date.getMinutes()).padStart(2,'0');

        return `${year}-${month}-${day}T${hour}:${minute}`;
    };

    const getRegistration=(id)=>{
        const item=document.querySelector(
            `tr[data-registration-item][data-registration-id="${id}"]`
        );

        if(!item)return null;

        return{
            id:item.dataset.registrationId,
            name:item.dataset.registrationName,
            email:item.dataset.registrationEmail,
            organization:item.dataset.registrationOrganization,
            date:item.dataset.registrationDate,
            status:item.dataset.registrationStatus
        };
    };

    const statusBadge=(status)=>{
        const normalized=status.toLowerCase();

        if(normalized==='confirmed'){
            return '<span class="rounded-full bg-sky-100 py-1 ps-3 pe-3 text-xs font-medium text-sky-600 dark:bg-sky-950/60 dark:text-sky-400">Confirmed</span>';
        }

        if(normalized==='pending'){
            return '<span class="rounded-full bg-amber-100 py-1 ps-3 pe-3 text-xs font-medium text-amber-600 dark:bg-amber-950/60 dark:text-amber-400">Pending</span>';
        }

        return '<span class="rounded-full bg-slate-100 py-1 ps-3 pe-3 text-xs font-medium text-red-400 dark:bg-slate-800 dark:text-slate-400">Cancelled</span>';
    };

    const createDesktopRow=(registration)=>{
        const row=document.createElement('tr');

        row.dataset.registrationItem='';
        row.dataset.registrationId=registration.id;
        row.dataset.registrationName=registration.name;
        row.dataset.registrationEmail=registration.email;
        row.dataset.registrationOrganization=registration.organization;
        row.dataset.registrationDate=registration.date;
        row.dataset.registrationStatus=registration.status.toLowerCase();

        row.className='group border-b border-slate-200 transition last:border-b-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60';

        row.innerHTML=`
            <td class="max-w-48 p-4">
                <p class="truncate text-sm font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">
                    ${escapeHtml(registration.name)}
                </p>
            </td>

            <td class="max-w-56 p-4">
                <p class="truncate text-sm text-slate-500 dark:text-slate-400">
                    ${escapeHtml(registration.email)}
                </p>
            </td>

            <td class="max-w-64 p-4">
                <p class="truncate text-sm text-slate-500 dark:text-slate-400">
                    ${escapeHtml(registration.organization)}
                </p>
            </td>

            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">
                ${escapeHtml(registration.date)}
            </td>

            <td class="p-4">
                ${statusBadge(registration.status)}
            </td>

            <td class="p-4">
                <div class="flex items-center justify-center gap-1">
                    <button type="button" data-registration-detail="${registration.id}" title="View Detail" class="flex size-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-slate-100 hover:text-slate-900 active:scale-95 dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-white">
                        <i data-lucide="eye" class="size-4"></i>
                    </button>

                    <button type="button" data-registration-edit="${registration.id}" title="Edit Registration" class="flex size-9 items-center justify-center rounded-lg text-blue-600 transition hover:bg-blue-50 hover:text-blue-700 active:scale-95 dark:text-blue-400 dark:hover:bg-blue-950/60">
                        <i data-lucide="square-pen" class="size-4"></i>
                    </button>

                    <button type="button" data-registration-delete="${registration.id}" title="Delete Registration" class="flex size-9 items-center justify-center rounded-lg text-red-500 transition hover:bg-red-50 hover:text-red-600 active:scale-95 dark:text-red-400 dark:hover:bg-red-950/40">
                        <i data-lucide="trash-2" class="size-4"></i>
                    </button>
                </div>
            </td>
        `;

        return row;
    };

    const createMobileCard=(registration)=>{
        const card=document.createElement('article');

        card.dataset.registrationItem='';
        card.dataset.registrationId=registration.id;
        card.dataset.registrationName=registration.name;
        card.dataset.registrationEmail=registration.email;
        card.dataset.registrationOrganization=registration.organization;
        card.dataset.registrationDate=registration.date;
        card.dataset.registrationStatus=registration.status.toLowerCase();

        card.className='p-4 transition hover:bg-slate-50 dark:hover:bg-slate-800/60';

        card.innerHTML=`
            <div class="flex items-start justify-between gap-3">
                <div class="min-w-0 flex-1">
                    <h2 class="truncate font-semibold text-slate-900 dark:text-white">
                        ${escapeHtml(registration.name)}
                    </h2>

                    <p class="mt-1 truncate text-sm text-slate-500 dark:text-slate-400">
                        ${escapeHtml(registration.email)}
                    </p>
                </div>

                ${statusBadge(registration.status)}
            </div>

            <div class="mt-4 space-y-2 text-sm text-slate-500 dark:text-slate-400">
                <div class="flex items-start gap-2">
                    <i data-lucide="building-2" class="mt-0.5 size-4 shrink-0"></i>
                    <span>${escapeHtml(registration.organization)}</span>
                </div>

                <div class="flex items-center gap-2">
                    <i data-lucide="calendar-days" class="size-4 shrink-0"></i>
                    <span>${escapeHtml(registration.date)}</span>
                </div>
            </div>

            <div class="mt-4 flex flex-wrap items-center gap-2 border-t border-slate-100 pt-3 dark:border-slate-800">
                <button type="button" data-registration-detail="${registration.id}" class="inline-flex items-center gap-2 rounded-lg bg-slate-100 py-2 ps-3 pe-3 text-xs font-semibold text-slate-600 transition hover:bg-slate-200 active:scale-95 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">
                    <i data-lucide="eye" class="size-4"></i>
                    <span>View</span>
                </button>

                <button type="button" data-registration-edit="${registration.id}" class="inline-flex items-center gap-2 rounded-lg bg-blue-50 py-2 ps-3 pe-3 text-xs font-semibold text-blue-600 transition hover:bg-blue-100 active:scale-95 dark:bg-blue-950/50 dark:text-blue-400 dark:hover:bg-blue-950">
                    <i data-lucide="square-pen" class="size-4"></i>
                    <span>Edit</span>
                </button>

                <button type="button" data-registration-delete="${registration.id}" class="inline-flex items-center gap-2 rounded-lg bg-red-50 py-2 ps-3 pe-3 text-xs font-semibold text-red-500 transition hover:bg-red-100 hover:text-red-600 active:scale-95 dark:bg-red-950/30 dark:text-red-400 dark:hover:bg-red-950/50">
                    <i data-lucide="trash-2" class="size-4"></i>
                    <span>Delete</span>
                </button>
            </div>
        `;

        return card;
    };

    const setDetailStatus=(status)=>{
        modalStatus.className='inline-flex rounded-md py-1 ps-2 pe-2 text-xs font-medium';

        if(status==='confirmed'){
            modalStatus.classList.add(
                'bg-sky-100',
                'text-sky-600',
                'dark:bg-sky-950/60',
                'dark:text-sky-400'
            );
            modalStatus.textContent='Confirmed';
            return;
        }

        if(status==='pending'){
            modalStatus.classList.add(
                'bg-amber-100',
                'text-amber-600',
                'dark:bg-amber-950/60',
                'dark:text-amber-400'
            );
            modalStatus.textContent='Pending';
            return;
        }

        modalStatus.classList.add(
            'bg-slate-100',
            'text-red-400',
            'dark:bg-slate-800',
            'dark:text-slate-400'
        );
        modalStatus.textContent='Cancelled';
    };

    const openFormModal=()=>{
        formModal.classList.remove('hidden');
        formModal.classList.add('flex');
        document.body.classList.add('overflow-hidden');

        setTimeout(()=>{
            nameInput.focus();
        },100);
    };

    const closeFormModal=()=>{
        formModal.classList.add('hidden');
        formModal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');

        registrationForm.reset();
        formMode='create';
        editingId=null;
    };

    const openCreateModal=()=>{
        formMode='create';
        editingId=null;

        registrationForm.reset();

        formTitle.textContent='Add Registration';
        formDescription.textContent='Add participant registration manually.';
        submitText.textContent='Add Registration';

        formIcon.innerHTML='<i data-lucide="user-plus" class="size-5"></i>';
        submitIcon.setAttribute('data-lucide','user-plus');

        registrationStatus.value='Confirmed';
        dateInput.value=currentDatetimeLocal();

        createIcons({icons});
        openFormModal();
    };

    const openEditModal=(id)=>{
        const registration=getRegistration(id);

        if(!registration)return;

        formMode='edit';
        editingId=id;

        formTitle.textContent='Update Registration';
        formDescription.textContent='Update participant registration information.';
        submitText.textContent='Update Registration';

        formIcon.innerHTML='<i data-lucide="square-pen" class="size-5"></i>';
        submitIcon.setAttribute('data-lucide','save');

        nameInput.value=registration.name;
        emailInput.value=registration.email;
        organizationInput.value=registration.organization;
        dateInput.value=toDatetimeLocal(registration.date);
        registrationStatus.value=
            registration.status.charAt(0).toUpperCase()+
            registration.status.slice(1);

        createIcons({icons});
        openFormModal();
    };

    const openDetailModal=(id)=>{
        const registration=getRegistration(id);

        if(!registration)return;

        detailId=id;

        modalName.textContent=registration.name;
        modalEmail.textContent=registration.email;
        modalOrganization.textContent=registration.organization;
        modalDate.textContent=registration.date;

        setDetailStatus(registration.status);

        detailModal.classList.remove('hidden');
        detailModal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    };

    const closeDetailModal=()=>{
        detailId=null;
        detailModal.classList.add('hidden');
        detailModal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    };

    const openDeleteModal=(id)=>{
        const registration=getRegistration(id);

        if(!registration)return;

        deletingId=id;
        deleteRegistrationName.textContent=`"${registration.name}"`;

        deleteModal.classList.remove('hidden');
        deleteModal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    };

    const closeDeleteModal=()=>{
        deletingId=null;
        deleteModal.classList.add('hidden');
        deleteModal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    };

    const replaceRegistration=(registration)=>{
        const desktop=document.querySelector(
            `tr[data-registration-item][data-registration-id="${registration.id}"]`
        );

        const mobile=document.querySelector(
            `article[data-registration-item][data-registration-id="${registration.id}"]`
        );

        desktop?.replaceWith(createDesktopRow(registration));
        mobile?.replaceWith(createMobileCard(registration));

        createIcons({icons});
    };

    const applyFilters=()=>{
        const search=searchInput.value.trim().toLowerCase();
        const status=statusFilter.value;
        const organization=organizationFilter.value;

        const desktopItems=document.querySelectorAll(
            'tr[data-registration-item]'
        );

        let desktopVisible=0;

        desktopItems.forEach((item)=>{
            const name=item.dataset.registrationName.toLowerCase();
            const email=item.dataset.registrationEmail.toLowerCase();
            const itemStatus=item.dataset.registrationStatus;
            const itemOrganization=item.dataset.registrationOrganization.toLowerCase();

            const searchMatch=
                search===''||
                name.includes(search)||
                email.includes(search);

            const statusMatch=
                status==='all'||
                itemStatus===status;

            let organizationMatch=true;

            if(organization!=='all'){
                organizationMatch=itemOrganization.includes(organization);
            }

            const visible=
                searchMatch&&
                statusMatch&&
                organizationMatch;

            item.classList.toggle('hidden',!visible);

            if(visible)desktopVisible++;
        });

        document.querySelectorAll(
            'article[data-registration-item]'
        ).forEach((item)=>{
            const name=item.dataset.registrationName.toLowerCase();
            const email=item.dataset.registrationEmail.toLowerCase();
            const itemStatus=item.dataset.registrationStatus;
            const itemOrganization=item.dataset.registrationOrganization.toLowerCase();

            const searchMatch=
                search===''||
                name.includes(search)||
                email.includes(search);

            const statusMatch=
                status==='all'||
                itemStatus===status;

            let organizationMatch=true;

            if(organization!=='all'){
                organizationMatch=itemOrganization.includes(organization);
            }

            const visible=
                searchMatch&&
                statusMatch&&
                organizationMatch;

            item.classList.toggle('hidden',!visible);
        });

        emptyDesktop.classList.toggle(
            'hidden',
            desktopVisible>0
        );

        emptyMobile.classList.toggle(
            'hidden',
            desktopVisible>0
        );

        visibleCount.textContent=desktopVisible;
    };

    const updateRegistrationStatus=(id,status)=>{
        const registration=getRegistration(id);

        if(!registration)return;

        registration.status=status;

        replaceRegistration(registration);
        applyFilters();

        if(detailId===id){
            setDetailStatus(status.toLowerCase());
        }

        /*
        BACKEND LATER:
        PATCH registration status.
        */
    };

    openFormButton.addEventListener('click',openCreateModal);
    closeFormButton.addEventListener('click',closeFormModal);
    cancelFormButton.addEventListener('click',closeFormModal);

    registrationForm.addEventListener('submit',(event)=>{
        event.preventDefault();

        const registration={
            id:formMode==='edit'
                ? editingId
                : `manual-${Date.now()}`,
            name:nameInput.value.trim(),
            email:emailInput.value.trim(),
            organization:organizationInput.value.trim(),
            date:formatRegistrationDate(dateInput.value),
            status:registrationStatus.value
        };

        if(
            !registration.name||
            !registration.email||
            !registration.organization||
            !registration.date
        ){
            return;
        }

        if(formMode==='create'){
            tableBody.appendChild(
                createDesktopRow(registration)
            );

            mobileList.appendChild(
                createMobileCard(registration)
            );

            totalCount.textContent=
                Number(totalCount.textContent)+1;

            /*
            BACKEND LATER:
            POST registration.
            */
        }else{
            replaceRegistration(registration);

            /*
            BACKEND LATER:
            PUT/PATCH registration.
            */
        }

        closeFormModal();
        createIcons({icons});
        applyFilters();
    });

    document.addEventListener('click',(event)=>{
        const detailButton=
            event.target.closest('[data-registration-detail]');

        const editButton=
            event.target.closest('[data-registration-edit]');

        const deleteButton=
            event.target.closest('[data-registration-delete]');

        if(detailButton){
            openDetailModal(
                detailButton.dataset.registrationDetail
            );
            return;
        }

        if(editButton){
            openEditModal(
                editButton.dataset.registrationEdit
            );
            return;
        }

        if(deleteButton){
            openDeleteModal(
                deleteButton.dataset.registrationDelete
            );
        }
    });

    closeDetailButton.addEventListener(
        'click',
        closeDetailModal
    );

    confirmTicketBtn.addEventListener('click',()=>{
        if(!detailId)return;

        updateRegistrationStatus(
            detailId,
            'Confirmed'
        );
    });

    cancelRegistrationBtn.addEventListener('click',()=>{
        if(!detailId)return;

        updateRegistrationStatus(
            detailId,
            'Cancelled'
        );
    });

    cancelDeleteRegistration.addEventListener(
        'click',
        closeDeleteModal
    );

    confirmDeleteRegistration.addEventListener('click',()=>{
        if(!deletingId)return;

        document.querySelectorAll(
            `[data-registration-item][data-registration-id="${deletingId}"]`
        ).forEach((item)=>{
            item.remove();
        });

        totalCount.textContent=Math.max(
            Number(totalCount.textContent)-1,
            0
        );

        closeDeleteModal();
        applyFilters();

        /*
        BACKEND LATER:
        DELETE registration.
        */
    });

    filterForm.addEventListener('submit',(event)=>{
        event.preventDefault();
        applyFilters();
    });

    searchInput.addEventListener(
        'input',
        applyFilters
    );

    statusFilter.addEventListener(
        'change',
        applyFilters
    );

    organizationFilter.addEventListener(
        'change',
        applyFilters
    );

    resetFilter.addEventListener('click',()=>{
        searchInput.value='';
        statusFilter.value='all';
        organizationFilter.value='all';

        applyFilters();
    });

    formModal.addEventListener('click',(event)=>{
        if(event.target===formModal){
            closeFormModal();
        }
    });

    detailModal.addEventListener('click',(event)=>{
        if(event.target===detailModal){
            closeDetailModal();
        }
    });

    deleteModal.addEventListener('click',(event)=>{
        if(event.target===deleteModal){
            closeDeleteModal();
        }
    });

    document.addEventListener('keydown',(event)=>{
        if(event.key!=='Escape')return;

        if(!formModal.classList.contains('hidden')){
            closeFormModal();
        }

        if(!detailModal.classList.contains('hidden')){
            closeDetailModal();
        }

        if(!deleteModal.classList.contains('hidden')){
            closeDeleteModal();
        }
    });

    applyFilters();
});
