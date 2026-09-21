document.addEventListener('DOMContentLoaded',()=>{
    const searchInput=document.getElementById('roleSearch');
    const deputiFilter=document.getElementById('deputiFilter');
    const selectAll=document.getElementById('selectAllUsers');
    const checkboxes=[...document.querySelectorAll('[data-user-checkbox]')];
    const rows=[...document.querySelectorAll('[data-user-row]')];
    const noResult=document.getElementById('noUserResult');
    const bulkRoleSelect=document.getElementById('bulkRoleSelect');
    const bulkAssignButton=document.getElementById('bulkAssignButton');
    const selectedInfo=document.getElementById('selectedInfo');
    const selectedCount=document.getElementById('selectedCount');

    const filterUsers=()=>{
        const search=searchInput.value.trim().toLowerCase();
        const deputi=deputiFilter.value.toLowerCase();
        let visibleCount=0;

        rows.forEach(row=>{
            const name=row.dataset.name;
            const email=row.dataset.email;
            const rowDeputi=row.dataset.deputi;

            const matchSearch=!search||name.includes(search)||email.includes(search);
            const matchDeputi=!deputi||rowDeputi===deputi;
            const visible=matchSearch&&matchDeputi;

            row.classList.toggle('hidden',!visible);

            if(visible) visibleCount++;
        });

        noResult.classList.toggle('hidden',visibleCount>0);
        updateSelectAll();
    };

    const updateSelected=()=>{
        const selected=checkboxes.filter(checkbox=>checkbox.checked);

        selectedCount.textContent=selected.length;
        selectedInfo.classList.toggle('hidden',selected.length===0);
        selectedInfo.classList.toggle('flex',selected.length>0);

        bulkAssignButton.disabled=selected.length===0||!bulkRoleSelect.value;

        updateSelectAll();
    };

    const updateSelectAll=()=>{
        const visibleCheckboxes=checkboxes.filter(checkbox=>!checkbox.closest('[data-user-row]').classList.contains('hidden'));

        if(visibleCheckboxes.length===0){
            selectAll.checked=false;
            selectAll.indeterminate=false;
            return;
        }

        const checkedVisible=visibleCheckboxes.filter(checkbox=>checkbox.checked);

        selectAll.checked=checkedVisible.length===visibleCheckboxes.length;
        selectAll.indeterminate=checkedVisible.length>0&&checkedVisible.length<visibleCheckboxes.length;
    };

    const getRoleClass=role=>{
        if(role==='Platform Administrator'){
            return 'bg-violet-100 text-violet-600 dark:bg-violet-950/60 dark:text-violet-400';
        }

        if(role==='Event Organizer'){
            return 'bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400';
        }

        if(role==='Event Officer'){
            return 'bg-emerald-100 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400';
        }

        return 'bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300';
    };

    const addRoleBadge=(row,role)=>{
        const roleContainer=row.querySelector('[data-role-container]');
        const existingRole=[...roleContainer.querySelectorAll('[data-role-badge]')]
            .some(badge=>badge.dataset.roleBadge===role);

        if(existingRole) return;

        const noRole=roleContainer.querySelector('[data-no-role]');

        if(noRole) noRole.remove();

        const badge=document.createElement('span');

        badge.dataset.roleBadge=role;
        badge.className=`inline-flex items-center gap-1.5 rounded-lg px-2.5 py-1.5 text-xs font-semibold ${getRoleClass(role)}`;

        badge.innerHTML=`
            <i data-lucide="shield" class="size-3.5"></i>
            <span>${role}</span>
            <button type="button" title="Remove Role" class="ml-0.5 flex size-4 items-center justify-center rounded-full transition hover:bg-black/10">
                <i data-lucide="x" class="size-3"></i>
            </button>
        `;

        roleContainer.appendChild(badge);

        if(window.lucide){
            lucide.createIcons();
        }
    };

    searchInput.addEventListener('input',filterUsers);
    deputiFilter.addEventListener('change',filterUsers);

    checkboxes.forEach(checkbox=>{
        checkbox.addEventListener('change',updateSelected);
    });

    selectAll.addEventListener('change',()=>{
        const visibleCheckboxes=checkboxes.filter(checkbox=>!checkbox.closest('[data-user-row]').classList.contains('hidden'));

        visibleCheckboxes.forEach(checkbox=>{
            checkbox.checked=selectAll.checked;
        });

        updateSelected();
    });

    bulkRoleSelect.addEventListener('change',updateSelected);

    bulkAssignButton.addEventListener('click',()=>{
        const role=bulkRoleSelect.value;
        const selectedCheckboxes=checkboxes.filter(checkbox=>checkbox.checked);

        if(!role||selectedCheckboxes.length===0) return;

        selectedCheckboxes.forEach(checkbox=>{
            const row=checkbox.closest('[data-user-row]');
            addRoleBadge(row,role);
            checkbox.checked=false;
        });

        bulkRoleSelect.value='';
        selectAll.checked=false;

        updateSelected();

        /*
        BACKEND LATER:

        const userIds=selectedCheckboxes.map(checkbox=>checkbox.value);

        fetch('/admin/roles/bulk',{
            method:'POST',
            headers:{
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content
            },
            body:JSON.stringify({
                user_ids:userIds,
                role_name:role
            })
        });
        */
    });

    filterUsers();
    updateSelected();
});
