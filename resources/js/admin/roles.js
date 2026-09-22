document.addEventListener('DOMContentLoaded',()=>{
    const searchInput=document.getElementById('roleSearch');
    const clearSearch=document.getElementById('clearSearch');
    const suggestions=document.getElementById('searchSuggestions');
    const suggestionItems=[...document.querySelectorAll('[data-suggestion]')];
    const noSuggestion=document.getElementById('noSuggestion');
    const roleFilter=document.getElementById('roleFilter');
    const selectAll=document.getElementById('selectAllUsers');
    const checkboxes=[...document.querySelectorAll('[data-user-checkbox]')];
    const rows=[...document.querySelectorAll('[data-user-row]')];
    const noResult=document.getElementById('noUserResult');
    const bulkRoleSelect=document.getElementById('bulkRoleSelect');
    const bulkAssignButton=document.getElementById('bulkAssignButton');
    const selectedInfo=document.getElementById('selectedInfo');
    const selectedCount=document.getElementById('selectedCount');
    const modal=document.getElementById('roleConfirmModal');
    const modalTitle=document.getElementById('modalTitle');
    const modalMessage=document.getElementById('modalMessage');
    const modalIcon=document.getElementById('modalIcon');
    const modalCancel=document.getElementById('modalCancel');
    const modalConfirm=document.getElementById('modalConfirm');
    let confirmAction=null;

    const openModal=(type,title,message,action)=>{
        confirmAction=action;
        modalTitle.textContent=title;
        modalMessage.textContent=message;
        modalConfirm.textContent=type==='remove'?'Remove Role':'Assign Role';
        modalConfirm.className=type==='remove'?'rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-red-700':'rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700';
        modalIcon.className=type==='remove'?'mb-4 flex size-12 items-center justify-center rounded-full bg-red-100 text-red-600':'mb-4 flex size-12 items-center justify-center rounded-full bg-blue-100 text-blue-600';
        modalIcon.innerHTML=type==='remove'?'<i data-lucide="shield-x" class="size-6"></i>':'<i data-lucide="shield-check" class="size-6"></i>';
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        if(window.lucide) lucide.createIcons();
    };

    const closeModal=()=>{
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        confirmAction=null;
    };

    const updateSelectAll=()=>{
        const visible=checkboxes.filter(c=>!c.closest('[data-user-row]').classList.contains('hidden'));
        const checked=visible.filter(c=>c.checked);
        selectAll.checked=visible.length>0&&checked.length===visible.length;
        selectAll.indeterminate=checked.length>0&&checked.length<visible.length;
    };

    const updateSelected=()=>{
        const selected=checkboxes.filter(c=>c.checked);
        selectedCount.textContent=selected.length;
        selectedInfo.classList.toggle('hidden',selected.length===0);
        selectedInfo.classList.toggle('flex',selected.length>0);
        bulkAssignButton.disabled=selected.length===0||!bulkRoleSelect.value;
        updateSelectAll();
    };

    const filterUsers=()=>{
        const search=searchInput.value.trim().toLowerCase();
        const role=roleFilter.value.toLowerCase();
        let visibleCount=0;

        rows.forEach(row=>{
            const name=row.dataset.name??'';
            const email=row.dataset.email??'';
            const roles=(row.dataset.roles??'').split('|').filter(Boolean);
            const matchSearch=!search||name.includes(search)||email.includes(search);
            const matchRole=!role||(role==='no-role'?roles.length===0:roles.includes(role));
            const visible=matchSearch&&matchRole;
            row.classList.toggle('hidden',!visible);
            if(visible) visibleCount++;
        });

        noResult.classList.toggle('hidden',visibleCount>0);
        clearSearch.classList.toggle('hidden',search.length===0);
        updateSelectAll();
    };

    const updateSuggestions=()=>{
        const search=searchInput.value.trim().toLowerCase();
        if(!search){
            suggestions.classList.add('hidden');
            suggestionItems.forEach(item=>item.classList.remove('hidden'));
            return;
        }

        let count=0;
        suggestionItems.forEach(item=>{
            const visible=item.dataset.name.includes(search)||item.dataset.email.includes(search);
            item.classList.toggle('hidden',!visible);
            if(visible) count++;
        });

        noSuggestion.classList.toggle('hidden',count>0);
        suggestions.classList.remove('hidden');
    };

    searchInput.addEventListener('input',()=>{
        filterUsers();
        updateSuggestions();
    });

    searchInput.addEventListener('focus',()=>{
        if(searchInput.value.trim()) updateSuggestions();
    });

    suggestionItems.forEach(item=>{
        item.addEventListener('click',()=>{
            searchInput.value=item.dataset.value;
            suggestions.classList.add('hidden');
            filterUsers();
        });
    });

    clearSearch.addEventListener('click',()=>{
        searchInput.value='';
        suggestions.classList.add('hidden');
        searchInput.focus();
        filterUsers();
    });

    document.addEventListener('click',e=>{
        if(!searchInput.contains(e.target)&&!suggestions.contains(e.target)) suggestions.classList.add('hidden');
    });

    roleFilter.addEventListener('change',filterUsers);
    checkboxes.forEach(c=>c.addEventListener('change',updateSelected));

    selectAll.addEventListener('change',()=>{
        checkboxes.filter(c=>!c.closest('[data-user-row]').classList.contains('hidden')).forEach(c=>c.checked=selectAll.checked);
        updateSelected();
    });

    bulkRoleSelect.addEventListener('change',updateSelected);

    document.querySelectorAll('[data-assign-role-form]').forEach(form=>{
        form.addEventListener('submit',e=>{
            e.preventDefault();
            const select=form.querySelector('[data-role-select]');
            if(!select.value) return;
            const label=select.options[select.selectedIndex].dataset.label||select.options[select.selectedIndex].text;
            openModal('assign','Assign Access Role',`Tambahkan access role "${label}" kepada ${form.dataset.userName}?`,()=>form.submit());
        });
    });

    document.querySelectorAll('[data-remove-role-form]').forEach(form=>{
        form.addEventListener('submit',e=>{
            e.preventDefault();
            openModal('remove','Remove Access Role',`Hapus access role "${form.dataset.roleName}" dari ${form.dataset.userName}?`,()=>form.submit());
        });
    });

    bulkAssignButton.addEventListener('click',()=>{
        const role=bulkRoleSelect.value;
        const selected=checkboxes.filter(c=>c.checked);
        if(!role||!selected.length) return;

        const option=bulkRoleSelect.options[bulkRoleSelect.selectedIndex];
        const label=option.dataset.label||option.text;

        openModal('assign','Bulk Assign Access Role',`Tambahkan access role "${label}" kepada ${selected.length} user yang dipilih?`,async()=>{
            const oldHtml=bulkAssignButton.innerHTML;
            bulkAssignButton.disabled=true;
            bulkAssignButton.innerHTML='<span class="size-4 animate-spin rounded-full border-2 border-white border-t-transparent"></span><span>Assigning...</span>';

            try{
                for(const checkbox of selected){
                    const body=new URLSearchParams();
                    body.append('_token','{{ csrf_token() }}');
                    body.append('user_id',checkbox.value);
                    body.append('role_name',role);

                    const response=await fetch('{{ route('admin.roles.store') }}',{
                        method:'POST',
                        headers:{
                            'Content-Type':'application/x-www-form-urlencoded;charset=UTF-8',
                            'X-Requested-With':'XMLHttpRequest',
                            'Accept':'text/html,application/xhtml+xml'
                        },
                        body:body.toString()
                    });

                    if(!response.ok) throw new Error(`Assign gagal untuk user ${checkbox.value}`);
                }

                window.location.reload();
            }catch(error){
                console.error(error);
                alert('Bulk assign gagal. Periksa Console/Network untuk melihat response backend.');
                bulkAssignButton.innerHTML=oldHtml;
                updateSelected();
            }
        });
    });

    modalCancel.addEventListener('click',closeModal);
    modal.addEventListener('click',e=>{if(e.target===modal) closeModal();});
    modalConfirm.addEventListener('click',()=>{
        if(!confirmAction) return;
        const action=confirmAction;
        closeModal();
        action();
    });

    filterUsers();
    updateSelected();
    if(window.lucide) lucide.createIcons();
});
