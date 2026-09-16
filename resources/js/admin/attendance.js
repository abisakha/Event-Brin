import {createIcons,icons} from 'lucide';

document.addEventListener('DOMContentLoaded',()=>{
    const formModal=document.getElementById('attendanceFormModal');
    const openFormButton=document.getElementById('openAttendanceForm');
    const closeFormButton=document.getElementById('closeAttendanceForm');
    const cancelFormButton=document.getElementById('cancelAttendanceForm');
    const attendanceForm=document.getElementById('attendanceForm');

    const modalTitle=document.getElementById('attendanceModalTitle');
    const modalDescription=document.getElementById('attendanceModalDescription');
    const modalIcon=document.getElementById('attendanceModalIcon');
    const submitText=document.getElementById('attendanceSubmitText');
    const submitIcon=document.getElementById('attendanceSubmitIcon');

    const nameInput=document.getElementById('attendanceName');
    const emailInput=document.getElementById('attendanceEmail');
    const organizationInput=document.getElementById('attendanceOrganization');
    const statusInput=document.getElementById('attendanceStatus');
    const timeInput=document.getElementById('attendanceTime');

    const tableBody=document.getElementById('attendanceTableBody');
    const mobileList=document.getElementById('attendanceMobileList');

    const presentCount=document.getElementById('totalPresentCount');
    const absentCount=document.getElementById('totalAbsentCount');
    const registeredCount=document.getElementById('totalRegisteredCount');

    const deleteModal=document.getElementById('deleteAttendanceModal');
    const deleteName=document.getElementById('deleteAttendanceName');
    const cancelDelete=document.getElementById('cancelDeleteAttendance');
    const confirmDelete=document.getElementById('confirmDeleteAttendance');

    let formMode='create';
    let editingId=null;
    let originalStatus=null;

    let selectedDeleteId=null;
    let selectedDeleteStatus=null;

    const escapeHtml=(value)=>{
        const element=document.createElement('div');
        element.textContent=value;
        return element.innerHTML;
    };

    const formatTime=(value)=>{
        if(!value)return '--:--';

        const [hour,minute]=value.split(':');
        const hourNumber=Number(hour);
        const period=hourNumber>=12?'PM':'AM';
        const displayHour=hourNumber%12||12;

        return `${String(displayHour).padStart(2,'0')}:${minute} ${period}`;
    };

    const toTimeInput=(value)=>{
        if(!value||value==='--:--')return '';

        const match=value.match(/^(\d{1,2}):(\d{2})\s(AM|PM)$/i);

        if(!match)return '';

        let hour=Number(match[1]);
        const minute=match[2];
        const period=match[3].toUpperCase();

        if(period==='PM'&&hour!==12)hour+=12;
        if(period==='AM'&&hour===12)hour=0;

        return `${String(hour).padStart(2,'0')}:${minute}`;
    };

    const syncTimeField=()=>{
        if(statusInput.value==='Absent'){
            timeInput.value='';
            timeInput.disabled=true;
        }else{
            timeInput.disabled=false;
        }
    };

    const openModal=()=>{
        formModal?.classList.remove('hidden');
        formModal?.classList.add('flex');
        document.body.classList.add('overflow-hidden');

        setTimeout(()=>{
            nameInput?.focus();
        },100);
    };

    const closeModal=()=>{
        formModal?.classList.add('hidden');
        formModal?.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');

        attendanceForm?.reset();

        formMode='create';
        editingId=null;
        originalStatus=null;

        if(timeInput)timeInput.disabled=false;
    };

    const openCreateModal=()=>{
        formMode='create';
        editingId=null;
        originalStatus=null;

        attendanceForm?.reset();

        modalTitle.textContent='Add Attendance Manually';
        modalDescription.textContent='Add participant attendance without check-in scanning.';
        submitText.textContent='Add Attendance';

        modalIcon.innerHTML='<i data-lucide="user-plus" class="size-5"></i>';
        submitIcon.setAttribute('data-lucide','user-plus');

        statusInput.value='Present';
        timeInput.disabled=false;

        createIcons({icons});
        openModal();
    };

    const openEditModal=(item)=>{
        formMode='edit';
        editingId=item.dataset.attendanceId;
        originalStatus=item.dataset.attendanceStatus;

        modalTitle.textContent='Update Attendance';
        modalDescription.textContent='Update participant information and attendance status.';
        submitText.textContent='Update Attendance';

        modalIcon.innerHTML='<i data-lucide="square-pen" class="size-5"></i>';
        submitIcon.setAttribute('data-lucide','save');

        nameInput.value=item.dataset.attendanceName||'';
        emailInput.value=item.dataset.attendanceEmail||'';
        organizationInput.value=item.dataset.attendanceOrganization||'';

        statusInput.value=item.dataset.attendanceStatus==='present'?'Present':'Absent';
        timeInput.value=toTimeInput(item.dataset.attendanceTime);

        syncTimeField();

        createIcons({icons});
        openModal();
    };

    const openDeleteModal=(item)=>{
        selectedDeleteId=item.dataset.attendanceId;
        selectedDeleteStatus=item.dataset.attendanceStatus;

        deleteName.textContent=`"${item.dataset.attendanceName}"`;

        deleteModal?.classList.remove('hidden');
        deleteModal?.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    };

    const closeDeleteModal=()=>{
        selectedDeleteId=null;
        selectedDeleteStatus=null;

        deleteModal?.classList.add('hidden');
        deleteModal?.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    };

    const statusBadge=(status)=>{
        if(status==='Present'){
            return `
                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 py-1 ps-3 pe-3 text-xs font-medium text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">
                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                    Present
                </span>
            `;
        }

        return `
            <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 py-1 ps-3 pe-3 text-xs font-medium text-amber-600 dark:bg-amber-950/60 dark:text-amber-400">
                <span class="size-1.5 rounded-full bg-amber-500"></span>
                Absent
            </span>
        `;
    };

    const createDesktopRow=(attendance)=>{
        const row=document.createElement('tr');

        row.dataset.attendanceItem='';
        row.dataset.attendanceId=attendance.id;
        row.dataset.attendanceName=attendance.name;
        row.dataset.attendanceEmail=attendance.email;
        row.dataset.attendanceOrganization=attendance.organization;
        row.dataset.attendanceTime=attendance.time;
        row.dataset.attendanceStatus=attendance.status.toLowerCase();

        row.className='group border-b border-slate-200 transition last:border-b-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60';

        row.innerHTML=`
            <td class="max-w-56 p-4">
                <p class="truncate text-sm font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">
                    ${escapeHtml(attendance.name)}
                </p>
            </td>

            <td class="max-w-64 p-4">
                <p class="truncate text-sm text-slate-500 dark:text-slate-400">
                    ${escapeHtml(attendance.email)}
                </p>
            </td>

            <td class="max-w-72 p-4">
                <p class="truncate text-sm text-slate-500 dark:text-slate-400">
                    ${escapeHtml(attendance.organization)}
                </p>
            </td>

            <td class="p-4 text-sm text-slate-500 dark:text-slate-400">
                ${attendance.time}
            </td>

            <td class="p-4">
                ${statusBadge(attendance.status)}
            </td>

            <td class="p-4">
                <div class="flex items-center justify-center gap-1">
                    <button type="button" data-attendance-edit="${attendance.id}" title="Edit Attendance" class="flex size-9 items-center justify-center rounded-lg text-blue-600 transition hover:bg-blue-50 hover:text-blue-700 active:scale-95 dark:text-blue-400 dark:hover:bg-blue-950/60">
                        <i data-lucide="square-pen" class="size-4"></i>
                    </button>

                    <button type="button" data-attendance-delete="${attendance.id}" title="Delete Attendance" class="flex size-9 items-center justify-center rounded-lg text-red-500 transition hover:bg-red-50 hover:text-red-600 active:scale-95 dark:text-red-400 dark:hover:bg-red-950/40">
                        <i data-lucide="trash-2" class="size-4"></i>
                    </button>
                </div>
            </td>
        `;

        return row;
    };

    const createMobileCard=(attendance)=>{
        const card=document.createElement('article');

        card.dataset.attendanceItem='';
        card.dataset.attendanceId=attendance.id;
        card.dataset.attendanceName=attendance.name;
        card.dataset.attendanceEmail=attendance.email;
        card.dataset.attendanceOrganization=attendance.organization;
        card.dataset.attendanceTime=attendance.time;
        card.dataset.attendanceStatus=attendance.status.toLowerCase();

        card.className='group p-4 transition hover:bg-slate-50 dark:hover:bg-slate-800/60';

        card.innerHTML=`
            <div class="flex items-start justify-between gap-3">
                <div class="min-w-0 flex-1">
                    <h2 class="truncate font-semibold text-slate-900 transition group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">
                        ${escapeHtml(attendance.name)}
                    </h2>

                    <p class="mt-1 truncate text-sm text-slate-500 dark:text-slate-400">
                        ${escapeHtml(attendance.email)}
                    </p>
                </div>

                ${statusBadge(attendance.status)}
            </div>

            <div class="mt-4 grid gap-3 text-sm text-slate-500 dark:text-slate-400 sm:grid-cols-2">
                <div class="flex items-start gap-2">
                    <i data-lucide="building-2" class="mt-0.5 size-4 shrink-0"></i>
                    <span>${escapeHtml(attendance.organization)}</span>
                </div>

                <div class="flex items-center gap-2">
                    <i data-lucide="clock-3" class="size-4 shrink-0"></i>
                    <span>${attendance.time}</span>
                </div>
            </div>

            <div class="mt-4 flex items-center gap-2 border-t border-slate-100 pt-3 dark:border-slate-800">
                <button type="button" data-attendance-edit="${attendance.id}" class="inline-flex items-center gap-2 rounded-lg bg-blue-50 py-2 ps-3 pe-3 text-xs font-semibold text-blue-600 transition hover:bg-blue-100 active:scale-95 dark:bg-blue-950/50 dark:text-blue-400 dark:hover:bg-blue-950">
                    <i data-lucide="square-pen" class="size-4"></i>
                    <span>Edit</span>
                </button>

                <button type="button" data-attendance-delete="${attendance.id}" class="inline-flex items-center gap-2 rounded-lg bg-red-50 py-2 ps-3 pe-3 text-xs font-semibold text-red-500 transition hover:bg-red-100 hover:text-red-600 active:scale-95 dark:bg-red-950/30 dark:text-red-400 dark:hover:bg-red-950/50">
                    <i data-lucide="trash-2" class="size-4"></i>
                    <span>Delete</span>
                </button>
            </div>
        `;

        return card;
    };

    const updateCountersAfterCreate=(status)=>{
        const present=Number(presentCount?.textContent||0);
        const absent=Number(absentCount?.textContent||0);
        const registered=Number(registeredCount?.textContent||0);

        if(status==='Present'&&presentCount){
            presentCount.textContent=present+1;
        }

        if(status==='Absent'&&absentCount){
            absentCount.textContent=absent+1;
        }

        if(registeredCount){
            registeredCount.textContent=registered+1;
        }
    };

    const updateCountersAfterDelete=(status)=>{
        const present=Number(presentCount?.textContent||0);
        const absent=Number(absentCount?.textContent||0);
        const registered=Number(registeredCount?.textContent||0);

        if(status==='present'&&presentCount){
            presentCount.textContent=Math.max(present-1,0);
        }

        if(status==='absent'&&absentCount){
            absentCount.textContent=Math.max(absent-1,0);
        }

        if(registeredCount){
            registeredCount.textContent=Math.max(registered-1,0);
        }
    };

    const updateCountersAfterEdit=(oldStatus,newStatus)=>{
        if(oldStatus===newStatus.toLowerCase())return;

        let present=Number(presentCount?.textContent||0);
        let absent=Number(absentCount?.textContent||0);

        if(oldStatus==='present'){
            present=Math.max(present-1,0);
            absent+=1;
        }else{
            absent=Math.max(absent-1,0);
            present+=1;
        }

        if(presentCount)presentCount.textContent=present;
        if(absentCount)absentCount.textContent=absent;
    };

    const removeEmptyState=()=>{
        document.getElementById('attendanceEmptyDesktop')?.remove();
        document.getElementById('attendanceEmptyMobile')?.remove();
    };

    const createEmptyStateIfNeeded=()=>{
        const items=document.querySelectorAll('[data-attendance-item]');

        if(items.length>0)return;

        if(tableBody){
            tableBody.innerHTML=`
                <tr id="attendanceEmptyDesktop">
                    <td colspan="6" class="p-10 text-center">
                        <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                            <i data-lucide="user-x" class="size-5"></i>
                        </div>

                        <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">
                            No attendance found
                        </h3>

                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                            No participant attendance is available.
                        </p>
                    </td>
                </tr>
            `;
        }

        if(mobileList){
            mobileList.innerHTML=`
                <div id="attendanceEmptyMobile" class="p-10 text-center">
                    <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-slate-100 text-slate-400 dark:bg-slate-800">
                        <i data-lucide="user-x" class="size-5"></i>
                    </div>

                    <h3 class="mt-4 font-semibold text-slate-900 dark:text-white">
                        No attendance found
                    </h3>

                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                        No participant attendance is available.
                    </p>
                </div>
            `;
        }

        createIcons({icons});
    };

    openFormButton?.addEventListener('click',openCreateModal);
    closeFormButton?.addEventListener('click',closeModal);
    cancelFormButton?.addEventListener('click',closeModal);

    statusInput?.addEventListener('change',syncTimeField);

    attendanceForm?.addEventListener('submit',(event)=>{
        event.preventDefault();

        const attendance={
            id:formMode==='edit'?editingId:`manual-${Date.now()}`,
            name:nameInput.value.trim(),
            email:emailInput.value.trim(),
            organization:organizationInput.value.trim(),
            status:statusInput.value,
            time:statusInput.value==='Absent'?'--:--':formatTime(timeInput.value)
        };

        if(!attendance.name||!attendance.email||!attendance.organization){
            return;
        }

        removeEmptyState();

        if(formMode==='create'){
            tableBody?.appendChild(createDesktopRow(attendance));
            mobileList?.appendChild(createMobileCard(attendance));

            updateCountersAfterCreate(attendance.status);
        }else{
            const oldDesktop=document.querySelector(`tr[data-attendance-item][data-attendance-id="${editingId}"]`);
            const oldMobile=document.querySelector(`article[data-attendance-item][data-attendance-id="${editingId}"]`);

            if(oldDesktop){
                oldDesktop.replaceWith(createDesktopRow(attendance));
            }

            if(oldMobile){
                oldMobile.replaceWith(createMobileCard(attendance));
            }

            updateCountersAfterEdit(originalStatus,attendance.status);
        }

        closeModal();
        createIcons({icons});

        /*
        BACKEND LATER:

        if(formMode==='create'){
            POST attendance
        }else{
            PUT/PATCH attendance
        }
        */
    });

    document.addEventListener('click',(event)=>{
        const editButton=event.target.closest('[data-attendance-edit]');
        const deleteButton=event.target.closest('[data-attendance-delete]');

        if(editButton){
            const id=editButton.dataset.attendanceEdit;

            const item=document.querySelector(
                `[data-attendance-item][data-attendance-id="${id}"]`
            );

            if(item){
                openEditModal(item);
            }

            return;
        }

        if(deleteButton){
            const id=deleteButton.dataset.attendanceDelete;

            const item=document.querySelector(
                `[data-attendance-item][data-attendance-id="${id}"]`
            );

            if(item){
                openDeleteModal(item);
            }
        }
    });

    cancelDelete?.addEventListener('click',closeDeleteModal);

    confirmDelete?.addEventListener('click',()=>{
        if(!selectedDeleteId)return;

        document.querySelectorAll(
            `[data-attendance-item][data-attendance-id="${selectedDeleteId}"]`
        ).forEach((item)=>{
            item.remove();
        });

        updateCountersAfterDelete(selectedDeleteStatus);

        closeDeleteModal();
        createEmptyStateIfNeeded();

        /*
        BACKEND LATER:
        DELETE attendance dari database.
        */
    });

    formModal?.addEventListener('click',(event)=>{
        if(event.target===formModal){
            closeModal();
        }
    });

    deleteModal?.addEventListener('click',(event)=>{
        if(event.target===deleteModal){
            closeDeleteModal();
        }
    });

    document.addEventListener('keydown',(event)=>{
        if(event.key!=='Escape')return;

        if(formModal&&!formModal.classList.contains('hidden')){
            closeModal();
        }

        if(deleteModal&&!deleteModal.classList.contains('hidden')){
            closeDeleteModal();
        }
    });
});
