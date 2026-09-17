@extends('admin.layouts.main')

@section('title','Survey Management - BRIN Event Management')

@section('content')
{{-- data dummy --}}
@php
    $questions=[
        ['id'=>1,'question'=>'How would you rate the overall relevance of the keynote topics? How would you rate the overall relevance of the keynote topics? How would you rate the overall relevance of the keynote topics?','type'=>'rating','responses'=>72],
        ['id'=>2,'question'=>'Please share your feedback about the keynote session.','type'=>'paragraph','responses'=>64],
        ['id'=>3,'question'=>'How would you rate the venue, facilities, and services?','type'=>'rating','responses'=>72],
        ['id'=>4,'question'=>'Please share any suggestions for improving future events.','type'=>'paragraph','responses'=>48],
        ['id'=>5,'question'=>'How satisfied are you with the overall event experience?','type'=>'rating','responses'=>68],
        ['id'=>6,'question'=>'Please share any additional comments or feedback.','type'=>'paragraph','responses'=>52]
    ];
@endphp

<section id="surveyContent" class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
        <div class="min-w-0 flex-1">
            <h1 class="text-shadow text-2xl font-bold text-slate-900 dark:text-white">Survey Management</h1>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">National Research Innovation Summit 2026 — Post-Event Feedback & Surveys</p>
        </div>

        <div class="flex shrink-0 flex-nowrap items-center gap-2">
            <a href="/admin/survey/create-survey" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white py-2.5 ps-4 pe-4 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">
                <i data-lucide="plus" class="size-4"></i>
                <span>Create Survey</span>
            </a>

            <a href="/admin/survey/create-survey" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white py-2.5 ps-4 pe-4 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">
                <i data-lucide="pencil" class="size-4"></i>
                <span>Edit Survey</span>
            </a>

            <a href="/admin/survey/responses" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md">
                <i data-lucide="chart-no-axes-column" class="size-4"></i>
                <span>View Responses</span>
            </a>

            <button id="openDeleteSurvey" type="button" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg border border-red-200 bg-white py-2.5 ps-4 pe-4 text-sm font-semibold text-red-500 shadow-sm transition hover:border-red-300 hover:bg-red-50 hover:text-red-600 active:scale-95 dark:border-red-900/60 dark:bg-slate-900 dark:text-red-400 dark:hover:bg-red-950/30">
                <i data-lucide="trash-2" class="size-4"></i>
                <span>Delete Survey</span>
            </button>
        </div>
    </div>

    <div class="mb-7 rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900 sm:p-6">
        <div class="mb-4 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-slate-900 dark:text-white">Response Rate Overview</h2>
            <span class="text-sm font-semibold text-blue-600 dark:text-blue-400">75% Complete</span>
        </div>

        <div class="h-2 overflow-hidden rounded-full bg-slate-100 dark:bg-slate-800">
            <div class="h-full w-3/4 rounded-full bg-blue-600"></div>
        </div>

        <div class="mt-4 flex flex-col gap-2 text-sm text-slate-500 sm:flex-row sm:items-center sm:gap-8 dark:text-slate-400">
            <p>Total Responses: <span class="font-semibold text-slate-900 dark:text-white">72</span></p>
            <p>Target Audience: <span class="font-semibold text-slate-900 dark:text-white">96 participants</span></p>
        </div>
    </div>

    <div>
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                Survey Questions
                <span class="text-slate-400">({{ count($questions) }})</span>
            </h2>
        </div>

        <div class="space-y-3">
            @foreach($questions as $question)
                <div class="group rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition hover:border-blue-200 hover:shadow-md dark:border-slate-800 dark:bg-slate-900 dark:hover:border-blue-800 sm:p-5">
                    <div class="flex items-start gap-4">
                        <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-sm font-bold text-blue-600 dark:bg-blue-950/50 dark:text-blue-400">
                            {{ $question['id'] }}
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between">
                                <div class="min-w-0">
                                    <h3 class="font-semibold leading-6 text-slate-900 dark:text-white">
                                        {{ $question['question'] }}
                                    </h3>

                                    <div class="mt-1.5 flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-slate-500 dark:text-slate-400">
                                        @if($question['type']==='rating')
                                            <span class="inline-flex items-center gap-1.5">
                                                <i data-lucide="star" class="size-3.5 text-amber-500"></i>
                                                Star Rating (1–5)
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5">
                                                <i data-lucide="align-left" class="size-3.5 text-blue-500"></i>
                                                Paragraph
                                            </span>
                                        @endif

                                        <span class="hidden size-1 rounded-full bg-slate-300 sm:block"></span>

                                        <span class="inline-flex items-center gap-1.5">
                                            <i data-lucide="message-square" class="size-3.5"></i>
                                            {{ $question['responses'] }} responses
                                        </span>
                                    </div>
                                </div>

                                <button type="button" class="flex size-9 shrink-0 items-center justify-center self-end rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-blue-600 md:self-start dark:hover:bg-slate-800 dark:hover:text-blue-400" aria-label="View question">
                                    <i data-lucide="chevron-right" class="size-5 transition group-hover:translate-x-0.5"></i>
                                </button>
                            </div>

                            @if($question['type']==='rating')
                                <div class="mt-4 flex items-center gap-1">
                                    @for($i=1;$i<=5;$i++)
                                        <div class="flex size-8 items-center justify-center rounded-lg bg-amber-50 text-amber-400 dark:bg-amber-950/30">
                                            <i data-lucide="star" class="size-4"></i>
                                        </div>
                                    @endfor
                                </div>
                            @else
                                <div class="mt-4 rounded-lg border border-dashed border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-800/60">
                                    <p class="text-sm text-slate-400">Participant paragraph response...</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- EMPTY STATE SETELAH DELETE --}}
<section id="surveyEmptyState" class="hidden p-4 sm:p-6 lg:p-8">
    <div class="flex min-h-96 items-center justify-center rounded-xl border border-dashed border-slate-300 bg-white p-6 text-center dark:border-slate-700 dark:bg-slate-900">
        <div class="max-w-md">
            <div class="mx-auto flex size-14 items-center justify-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400">
                <i data-lucide="clipboard-list" class="size-6"></i>
            </div>

            <h2 class="mt-4 text-lg font-bold text-slate-900 dark:text-white">No Survey Available</h2>

            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                This event does not currently have a survey. Create a new survey to collect participant feedback.
            </p>

            <a href="/admin/survey/create-survey" class="mt-5 inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white no-underline! transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                <i data-lucide="plus" class="size-4"></i>
                <span>Create Survey</span>
            </a>
        </div>
    </div>
</section>

{{-- DELETE SURVEY MODAL --}}
<div id="deleteSurveyModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="w-full max-w-md overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl dark:border-slate-700 dark:bg-slate-900">
        <div class="p-6 text-center">
            <div class="mx-auto flex size-14 items-center justify-center rounded-full bg-red-100 text-red-500 dark:bg-red-950/50 dark:text-red-400">
                <i data-lucide="trash-2" class="size-6"></i>
            </div>

            <h2 class="mt-4 text-lg font-bold text-slate-900 dark:text-white">
                Delete Survey?
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">
                Are you sure you want to delete the survey for
                <span class="font-semibold text-slate-700 dark:text-slate-200">
                    National Research Innovation Summit 2026
                </span>?
            </p>

            <div class="mt-4 rounded-lg bg-red-50 p-3 text-left dark:bg-red-950/20">
                <div class="flex items-start gap-2">
                    <i data-lucide="triangle-alert" class="mt-0.5 size-4 shrink-0 text-red-500"></i>

                    <p class="text-xs leading-5 text-red-600 dark:text-red-400">
                        All survey questions and response information related to this survey will no longer be displayed.
                    </p>
                </div>
            </div>

            <div class="mt-6 flex flex-col-reverse gap-2 sm:flex-row sm:justify-center">
                <button id="cancelDeleteSurvey" type="button" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">
                    Cancel
                </button>

                <button id="confirmDeleteSurvey" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg bg-red-500 py-2.5 ps-5 pe-5 text-sm font-semibold text-white transition hover:bg-red-600 active:scale-95">
                    <i data-lucide="trash-2" class="size-4"></i>
                    <span>Delete Survey</span>
                </button>

                {{--
                BACKEND LATER:

                <form action="{{ url('/admin/survey/'.$survey->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete Survey</button>
                </form>
                --}}
            </div>
        </div>
    </div>
</div>
@endsection
