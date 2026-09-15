@extends('admin.layouts.main')

@section('title','Survey Responses - BRIN Event Management')

@section('content')
@php
    $ratings=[
        ['label'=>'5 Stars (Excellent)','count'=>42,'width'=>'w-4/5'],
        ['label'=>'4 Stars (Very Good)','count'=>18,'width'=>'w-2/5'],
        ['label'=>'3 Stars (Good)','count'=>8,'width'=>'w-1/5'],
        ['label'=>'2 Stars (Fair)','count'=>3,'width'=>'w-16'],
        ['label'=>'1 Star (Poor)','count'=>1,'width'=>'w-1']
    ];

    $responses=[
        [
            'name'=>'Prof. Dr. Ir. Bambang Subiyanto',
            'date'=>'Oct 15, 2026',
            'rating'=>'5.0',
            'comment'=>'Keynotes were extremely insightful and well coordinated.',
            'answers'=>[
                ['question'=>'How would you rate the overall relevance of the keynote topics?','type'=>'rating','answer'=>5],
                ['question'=>'Please share your feedback about the keynote session.','type'=>'paragraph','answer'=>'The keynote topics were highly relevant and presented very clearly.'],
                ['question'=>'How would you rate the venue, facilities, and services?','type'=>'rating','answer'=>4],
                ['question'=>'Please share any additional comments or suggestions.','type'=>'paragraph','answer'=>'Overall, this was a very well organized event.']
            ]
        ],
        [
            'name'=>'Dr. Sri Hartini, M.T.',
            'date'=>'Oct 15, 2026',
            'rating'=>'4.0',
            'comment'=>'Great panels. Food and logistics can be improved.',
            'answers'=>[
                ['question'=>'How would you rate the overall relevance of the keynote topics?','type'=>'rating','answer'=>4],
                ['question'=>'Please share your feedback about the keynote session.','type'=>'paragraph','answer'=>'The speakers were informative and engaging.'],
                ['question'=>'How would you rate the venue, facilities, and services?','type'=>'rating','answer'=>4],
                ['question'=>'Please share any additional comments or suggestions.','type'=>'paragraph','answer'=>'The catering and registration flow can be improved.']
            ]
        ],
        [
            'name'=>'Yudi Suryadi, M.T.',
            'date'=>'Oct 16, 2026',
            'rating'=>'5.0',
            'comment'=>'Excellent technology integration sessions.',
            'answers'=>[
                ['question'=>'How would you rate the overall relevance of the keynote topics?','type'=>'rating','answer'=>5],
                ['question'=>'Please share your feedback about the keynote session.','type'=>'paragraph','answer'=>'Very useful for current research development.'],
                ['question'=>'How would you rate the venue, facilities, and services?','type'=>'rating','answer'=>5],
                ['question'=>'Please share any additional comments or suggestions.','type'=>'paragraph','answer'=>'I would like to see more technology sessions next year.']
            ]
        ]
    ];
@endphp

<section class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Survey Responses</h1>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">National Research Innovation Summit 2026 — Detailed Feedback Analysis</p>
        </div>
        <a href="/admin/survey" class="inline-flex w-fit items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white py-2.5 ps-4 pe-4 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:border-blue-700 dark:hover:bg-blue-950/40 dark:hover:text-blue-400">
            <i data-lucide="arrow-left" class="h-4 w-4"></i>
            Back to Management
        </a>
    </div>

    <div class="mb-6 grid gap-4 lg:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900 lg:col-span-2">
            <h2 class="font-semibold text-slate-900 dark:text-white">Overall Program Satisfaction <span class="text-sm font-normal text-slate-500 dark:text-slate-400">(Avg. 4.4 / 5.0)</span></h2>

            <div class="mt-5 space-y-3">
                @foreach($ratings as $rating)
                    <div class="grid items-center gap-2 sm:grid-cols-12">
                        <p class="text-xs text-slate-500 dark:text-slate-400 sm:col-span-3">{{ $rating['label'] }}</p>

                        <div class="sm:col-span-6">
                            <div class="h-2 overflow-hidden rounded-full bg-slate-100 dark:bg-slate-800">
                                <div class="{{ $rating['width'] }} h-full rounded-full bg-blue-600"></div>
                            </div>
                        </div>

                        <p class="text-xs font-semibold text-slate-700 dark:text-slate-300 sm:col-span-3">{{ $rating['count'] }} responses</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">
            <h2 class="font-semibold text-slate-900 dark:text-white">Key Metrics</h2>

            <div class="mt-4 divide-y divide-slate-100 dark:divide-slate-800">
                <div class="flex items-center justify-between gap-4 py-3 first:pt-0">
                    <span class="text-sm text-slate-500 dark:text-slate-400">Net Promoter Score (NPS)</span>
                    <span class="shrink-0 text-lg font-bold text-emerald-600 dark:text-emerald-400">+78</span>
                </div>

                <div class="flex items-center justify-between gap-4 py-3">
                    <span class="text-sm text-slate-500 dark:text-slate-400">Recommendation Rate</span>
                    <span class="shrink-0 text-lg font-bold text-blue-600 dark:text-blue-400">92.4%</span>
                </div>

                <div class="flex items-center justify-between gap-4 py-3 last:pb-0">
                    <span class="text-sm text-slate-500 dark:text-slate-400">Completion Rate</span>
                    <span class="shrink-0 text-lg font-bold text-slate-900 dark:text-white">98.2%</span>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <div class="hidden overflow-x-auto lg:block">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-left dark:border-slate-800 dark:bg-slate-950/40">
                        <th scope="col" class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Respondent</th>
                        <th scope="col" class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Submission Date</th>
                        <th scope="col" class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Overall Rating</th>
                        <th scope="col" class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Comments & Feedback</th>
                        <th scope="col" class="p-4 text-xs font-semibold text-slate-500 dark:text-slate-400">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($responses as $response)
                        <tr class="group border-b border-slate-200 transition last:border-b-0 hover:bg-slate-50 dark:border-slate-800 dark:hover:bg-slate-800/60">
                            <td class="max-w-64 p-4">
                                <p class="truncate text-sm font-semibold text-slate-900 group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">{{ $response['name'] }}</p>
                            </td>

                            <td class="p-4">
                                <p class="whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">{{ $response['date'] }}</p>
                            </td>

                            <td class="p-4">
                                <div class="inline-flex items-center gap-1.5">
                                    <i data-lucide="star" class="h-4 w-4 fill-amber-400 text-amber-400"></i>
                                    <span class="text-sm font-semibold text-slate-700 dark:text-slate-300">{{ $response['rating'] }}</span>
                                </div>
                            </td>

                            <td class="max-w-96 p-4">
                                <p class="truncate text-sm text-slate-500 dark:text-slate-400">{{ $response['comment'] }}</p>
                            </td>

                            <td class="p-4">
                                <button type="button"
                                    class="survey-response-detail inline-flex items-center gap-1 text-sm font-semibold text-blue-600 transition hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300"
                                    data-name="{{ $response['name'] }}"
                                    data-date="{{ $response['date'] }}"
                                    data-rating="{{ $response['rating'] }}"
                                    data-answers='@json($response["answers"])'>
                                    View
                                    <i data-lucide="chevron-right" class="h-4 w-4"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="divide-y divide-slate-200 lg:hidden dark:divide-slate-800">
            @foreach($responses as $response)
                <article class="p-4 sm:p-5">
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0 flex-1">
                            <h3 class="truncate font-semibold text-slate-900 dark:text-white">{{ $response['name'] }}</h3>
                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">{{ $response['date'] }}</p>
                        </div>

                        <div class="flex shrink-0 items-center gap-1.5 rounded-full bg-amber-50 py-1.5 ps-3 pe-3 text-amber-600 dark:bg-amber-950/40 dark:text-amber-400">
                            <i data-lucide="star" class="h-4 w-4 fill-current"></i>
                            <span class="text-sm font-semibold">{{ $response['rating'] }}</span>
                        </div>
                    </div>

                    <div class="mt-4 rounded-lg bg-slate-50 p-3 dark:bg-slate-800/70">
                        <p class="text-sm leading-6 text-slate-600 dark:text-slate-300">{{ $response['comment'] }}</p>
                    </div>

                    <button type="button"
                        class="survey-response-detail mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-blue-600 dark:text-blue-400"
                        data-name="{{ $response['name'] }}"
                        data-date="{{ $response['date'] }}"
                        data-rating="{{ $response['rating'] }}"
                        data-answers='@json($response["answers"])'>
                        View Response
                        <i data-lucide="arrow-right" class="h-4 w-4"></i>
                    </button>
                </article>
            @endforeach
        </div>
    </div>
</section>

<div id="surveyResponseModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4 backdrop-blur-sm">
    <div class="flex max-h-screen w-full max-w-2xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-slate-900">
        <div class="flex shrink-0 items-start justify-between gap-4 border-b border-slate-200 p-5 dark:border-slate-800">
            <div>
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Survey Response Detail</h2>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Complete participant survey response</p>
            </div>

            <button id="closeSurveyResponseModal" type="button" class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white" aria-label="Close">
                <i data-lucide="x" class="h-5 w-5"></i>
            </button>
        </div>

        <div class="overflow-y-auto p-5">
            <div class="mb-6 grid gap-4 rounded-xl bg-slate-50 p-4 dark:bg-slate-800/60 sm:grid-cols-2">
                <div>
                    <p class="text-xs font-medium text-slate-400">Respondent</p>
                    <p id="responseModalName" class="mt-1 text-sm font-semibold text-slate-900 dark:text-white"></p>
                </div>

                <div>
                    <p class="text-xs font-medium text-slate-400">Submission Date</p>
                    <p id="responseModalDate" class="mt-1 text-sm font-semibold text-slate-900 dark:text-white"></p>
                </div>

                <div class="sm:col-span-2">
                    <p class="text-xs font-medium text-slate-400">Overall Rating</p>

                    <div class="mt-1 flex items-center gap-1.5">
                        <i data-lucide="star" class="h-4 w-4 fill-amber-400 text-amber-400"></i>
                        <span id="responseModalRating" class="text-sm font-bold text-slate-900 dark:text-white"></span>
                    </div>
                </div>
            </div>

            <div class="mb-3 flex items-center justify-between gap-3">
                <h3 class="font-semibold text-slate-900 dark:text-white">Survey Answers</h3>
                <span id="responseQuestionCount" class="rounded-full bg-blue-50 py-1 ps-3 pe-3 text-xs font-semibold text-blue-600 dark:bg-blue-950/50 dark:text-blue-400"></span>
            </div>

            <div id="responseAnswers" class="space-y-3"></div>
        </div>

        <div class="flex shrink-0 justify-end border-t border-slate-200 p-4 dark:border-slate-800">
            <button id="closeSurveyResponseFooter" type="button" class="rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white transition hover:bg-blue-700">
                Close
            </button>
        </div>
    </div>
</div>
@endsection
