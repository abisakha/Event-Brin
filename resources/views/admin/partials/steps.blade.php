@php
    $step=$currentStep??1;
@endphp

<div class="mb-6 rounded-xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:gap-3">
        <div class="flex min-w-0 items-center gap-3">
            <div @class([
                'flex size-8 shrink-0 items-center justify-center rounded-full text-xs font-bold transition',
                'bg-blue-600 text-white'=>$step>=1,
                'border border-slate-200 bg-slate-50 text-slate-500 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-400'=>$step<1
            ])>1</div>
            <div class="min-w-0">
                <p @class([
                    'whitespace-nowrap text-sm font-semibold',
                    'text-blue-600 dark:text-blue-400'=>$step>=1,
                    'text-slate-500 dark:text-slate-400'=>$step<1
                ])>Basic Information</p>
                <p class="whitespace-nowrap text-xs text-slate-400">Survey event details</p>
            </div>
        </div>

        <div @class([
            'hidden h-px flex-1 sm:block',
            'bg-blue-300 dark:bg-blue-800'=>$step>=2,
            'bg-slate-200 dark:bg-slate-700'=>$step<2
        ])></div>

        <div class="flex min-w-0 items-center gap-3">
            <div @class([
                'flex size-8 shrink-0 items-center justify-center rounded-full text-xs font-bold transition',
                'bg-blue-600 text-white'=>$step>=2,
                'border border-slate-200 bg-slate-50 text-slate-500 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-400'=>$step<2
            ])>2</div>
            <div class="min-w-0">
                <p @class([
                    'whitespace-nowrap text-sm font-semibold',
                    'text-blue-600 dark:text-blue-400'=>$step>=2,
                    'text-slate-500 dark:text-slate-400'=>$step<2
                ])>Questions</p>
                <p class="whitespace-nowrap text-xs text-slate-400">Add survey questions</p>
            </div>
        </div>

        <div @class([
            'hidden h-px flex-1 sm:block',
            'bg-blue-300 dark:bg-blue-800'=>$step>=3,
            'bg-slate-200 dark:bg-slate-700'=>$step<3
        ])></div>

        <div class="flex min-w-0 items-center gap-3">
            <div @class([
                'flex size-8 shrink-0 items-center justify-center rounded-full text-xs font-bold transition',
                'bg-blue-600 text-white'=>$step>=3,
                'border border-slate-200 bg-slate-50 text-slate-500 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-400'=>$step<3
            ])>3</div>
            <div class="min-w-0">
                <p @class([
                    'whitespace-nowrap text-sm font-semibold',
                    'text-blue-600 dark:text-blue-400'=>$step>=3,
                    'text-slate-500 dark:text-slate-400'=>$step<3
                ])>Review & Publish</p>
                <p class="whitespace-nowrap text-xs text-slate-400">Review survey details</p>
            </div>
        </div>
    </div>
</div>
