@extends('admin.layouts.main')

@section('title','Survey Questions - BRIN Event Management')

@section('content')
@php
    $questions=[
        ['id'=>1,'question'=>'How would you rate the overall relevance of the keynote topics?','type'=>'rating'],
        ['id'=>2,'question'=>'Please share any specific suggestions for improving future events.','type'=>'paragraph'],
        ['id'=>3,'question'=>'How satisfied are you with the overall event experience?','type'=>'rating']
    ];
@endphp

<section class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Create New Survey</h1>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Add questions that participants will answer after the event.</p>
    </div>

    @include('admin.partials.steps',['currentStep'=>2])

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <div class="flex flex-col gap-3 border-b border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:p-6 dark:border-slate-800">
            <div>
                <h2 class="font-bold text-slate-900 dark:text-white">Survey Questions</h2>
                <p class="mt-1 text-xs text-slate-400">Use Star Rating or Paragraph questions for participant feedback.</p>
            </div>

            <button type="button" class="inline-flex w-fit items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-4 pe-4 text-sm font-semibold text-white transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                <i data-lucide="plus" class="size-4"></i>
                <span>Add Question</span>
            </button>
        </div>

        <div class="space-y-4 p-4 sm:p-6">
            @foreach($questions as $index=>$question)
                <div class="rounded-xl border border-slate-200 bg-slate-50/50 p-4 transition hover:border-blue-200 dark:border-slate-700 dark:bg-slate-800/40 dark:hover:border-blue-800 sm:p-5">
                    <div class="mb-5 flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-xs font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                                {{ $index+1 }}
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-800 dark:text-white">
                                    Question {{ $index+1 }}
                                </h3>
                                <p class="mt-0.5 text-xs text-slate-400">
                                    {{ $question['type']==='rating' ? 'Star Rating' : 'Paragraph' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex shrink-0 items-center gap-1">
                            <button type="button" class="flex size-8 items-center justify-center rounded-lg text-slate-400 transition hover:bg-blue-100 hover:text-blue-600 dark:hover:bg-blue-950/50 dark:hover:text-blue-400" aria-label="Duplicate question">
                                <i data-lucide="copy" class="size-4"></i>
                            </button>

                            <button type="button" class="flex size-8 items-center justify-center rounded-lg text-slate-400 transition hover:bg-red-100 hover:text-red-500 dark:hover:bg-red-950/50" aria-label="Delete question">
                                <i data-lucide="trash-2" class="size-4"></i>
                            </button>
                        </div>
                    </div>

                    <div class="grid gap-5 lg:grid-cols-3">
                        <div class="lg:col-span-2">
                            <label for="question_{{ $question['id'] }}" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                                Question Text <span class="text-red-500">*</span>
                            </label>

                            <input id="question_{{ $question['id'] }}" type="text" value="{{ $question['question'] }}" class="w-full rounded-lg border border-slate-200 bg-white p-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:hover:border-slate-600">
                        </div>

                        <div>
                            <label for="type_{{ $question['id'] }}" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                                Question Type
                            </label>

                            <div class="relative">
                                <select id="type_{{ $question['id'] }}" class="w-full appearance-none rounded-lg border border-slate-200 bg-white p-3 pe-10 text-sm text-slate-700 outline-none transition hover:border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300">
                                    <option value="rating" @selected($question['type']==='rating')>Star Rating</option>
                                    <option value="paragraph" @selected($question['type']==='paragraph')>Paragraph</option>
                                </select>

                                <div class="pointer-events-none absolute inset-y-0 end-3 flex items-center">
                                    <i data-lucide="chevron-down" class="size-4 text-slate-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($question['type']==='rating')
                        <div class="mt-5">
                            <p class="mb-2 text-xs font-semibold text-slate-500 dark:text-slate-400">
                                Star Rating Preview
                            </p>

                            <div class="flex flex-wrap items-center gap-2">
                                @for($star=1;$star<=5;$star++)
                                    <div class="flex size-10 items-center justify-center rounded-lg border border-amber-200 bg-amber-50 text-amber-400 dark:border-amber-900/50 dark:bg-amber-950/30">
                                        <i data-lucide="star" class="size-5 fill-current"></i>
                                    </div>
                                @endfor

                                <span class="ms-1 text-xs text-slate-400">1 - 5 rating scale</span>
                            </div>
                        </div>
                    @else
                        <div class="mt-5">
                            <p class="mb-2 text-xs font-semibold text-slate-500 dark:text-slate-400">
                                Paragraph Preview
                            </p>

                            <textarea rows="3" disabled placeholder="Participants will type their answer here..." class="w-full resize-none rounded-lg border border-dashed border-slate-200 bg-white p-3 text-sm text-slate-400 outline-none dark:border-slate-700 dark:bg-slate-900"></textarea>
                        </div>
                    @endif

                    {{--
                    BACKEND LATER:

                    <input type="text"
                        name="questions[{{ $index }}][questionnaire]"
                        value="{{ old('questions.'.$index.'.questionnaire') }}">

                    Jika kolom type sudah ditambahkan ke survey_question:
                    <select name="questions[{{ $index }}][type]">
                        <option value="rating">Star Rating</option>
                        <option value="paragraph">Paragraph</option>
                    </select>
                    --}}
                </div>
            @endforeach

            <button type="button" class="flex w-full items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-200 py-4 text-sm font-semibold text-slate-500 transition hover:border-blue-300 hover:bg-blue-50/50 hover:text-blue-600 dark:border-slate-700 dark:text-slate-400 dark:hover:border-blue-700 dark:hover:bg-blue-950/20 dark:hover:text-blue-400">
                <i data-lucide="plus-circle" class="size-4"></i>
                <span>Add Another Question</span>
            </button>
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:p-6 dark:border-slate-800">
            <a href="{{ url('/admin/survey/create-survey') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 no-underline! transition hover:bg-slate-50 hover:text-slate-900 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                <i data-lucide="arrow-left" class="size-4"></i>
                <span>Previous</span>
            </a>

            <a href="{{ url('/admin/survey/review') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white no-underline! transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                <span>Next: Review & Publish</span>
                <i data-lucide="arrow-right" class="size-4"></i>
            </a>
        </div>
    </div>
</section>
@endsection
