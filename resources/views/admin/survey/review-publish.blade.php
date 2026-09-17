@extends('admin.layouts.main')

@section('title','Survey Settings - BRIN Event Management')

@section('content')
@php
    $questions=[
        ['question'=>'How would you rate the overall relevance of the keynote topics?','type'=>'rating'],
        ['question'=>'Please share your feedback about the keynote session.','type'=>'paragraph'],
        ['question'=>'How satisfied are you with the overall event experience?','type'=>'rating'],
        ['question'=>'Please share any additional comments or suggestions.','type'=>'paragraph']
    ];
@endphp

<section class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Create New Survey</h1>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Configure how participants can submit their survey responses.</p>
    </div>

    @include('admin.partials.steps',['currentStep'=>3])

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <div class="border-b border-slate-200 p-4 sm:p-6 dark:border-slate-800">
            <div class="flex items-center gap-3">
                <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                    <i data-lucide="settings-2" class="size-4"></i>
                </div>
                <div>
                    <h2 class="font-bold text-slate-900 dark:text-white">Survey Settings</h2>
                    <p class="mt-0.5 text-xs text-slate-400">Review response collection and survey deadline settings.</p>
                </div>
            </div>
        </div>

        <div class="space-y-7 p-4 sm:p-6 lg:p-8">
            <section>
                <div class="mb-4">
                    <h3 class="text-sm font-bold text-slate-800 dark:text-white">Response Collection</h3>
                    <p class="mt-1 text-xs text-slate-400">Choose whether respondent identity will be shown in survey responses.</p>
                </div>

                <p class="mb-2 text-xs font-semibold text-slate-500 dark:text-slate-400">
                    Response Type <span class="text-red-500">*</span>
                </p>

                <div class="grid gap-3 md:grid-cols-2">
                    <label class="relative cursor-pointer">
                        <input type="radio" name="response_type" value="anonymous" checked class="peer absolute right-4 top-1/2 z-10 size-4 -translate-y-1/2 cursor-pointer accent-blue-600">

                        <div class="flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4 pe-12 transition hover:border-blue-300 peer-checked:border-blue-500 peer-checked:bg-blue-50/60 dark:border-slate-700 dark:bg-slate-800/60 dark:hover:border-blue-700 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-950/30">
                            <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-white text-slate-500 transition peer-checked:text-blue-600 dark:bg-slate-900 dark:text-slate-400">
                                <i data-lucide="user-round-x" class="size-4"></i>
                            </div>

                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-semibold text-slate-800 dark:text-white">
                                    Anonymous
                                </p>
                                <p class="mt-0.5 text-xs text-slate-400">
                                    Respondent remains unidentified
                                </p>
                            </div>
                        </div>
                    </label>

                    <label class="relative cursor-pointer">
                        <input type="radio" name="response_type" value="registered" class="peer absolute right-4 top-1/2 z-10 size-4 -translate-y-1/2 cursor-pointer accent-blue-600">

                        <div class="flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4 pe-12 transition hover:border-blue-300 peer-checked:border-blue-500 peer-checked:bg-blue-50/60 dark:border-slate-700 dark:bg-slate-800/60 dark:hover:border-blue-700 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-950/30">
                            <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-white text-slate-500 dark:bg-slate-900 dark:text-slate-400">
                                <i data-lucide="user-round-check" class="size-4"></i>
                            </div>

                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-semibold text-slate-800 dark:text-white">
                                    Registered
                                </p>
                                <p class="mt-0.5 text-xs text-slate-400">
                                    Require respondent identification
                                </p>
                            </div>
                        </div>
                    </label>
                </div>

                {{--
                BACKEND LATER:
                response_type hanya digunakan untuk menentukan apakah
                identitas responden ditampilkan atau disembunyikan
                pada halaman Survey Responses.
                --}}
            </section>

            <div class="border-t border-slate-200 dark:border-slate-800"></div>

            <section>
                <div class="mb-4">
                    <h3 class="text-sm font-bold text-slate-800 dark:text-white">Schedule & Deadline</h3>
                    <p class="mt-1 text-xs text-slate-400">Define the final date and time participants may submit responses.</p>
                </div>

                <div class="max-w-xl">
                    <label for="survey_deadline" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Survey Deadline <span class="text-red-500">*</span>
                    </label>

                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="calendar-clock" class="size-4 shrink-0 text-slate-400"></i>
                        <input id="survey_deadline" type="datetime-local" name="survey_deadline" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-700 outline-none dark:text-slate-200">
                    </div>

                    <p class="mt-1.5 text-xs text-slate-400">Participants cannot submit responses after this date and time.</p>

                    {{--
                    BACKEND LATER:
                    value="{{ old('survey_deadline',$survey->survey_deadline) }}"

                    @error('survey_deadline')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    --}}
                </div>
            </section>

            <div class="border-t border-slate-200 dark:border-slate-800"></div>

            <section>
                <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-sm font-bold text-slate-800 dark:text-white">Survey Questions</h3>
                        <p class="mt-1 text-xs text-slate-400">{{ count($questions) }} questions have been added to this survey.</p>
                    </div>

                    <a href="{{ url('/admin/survey/questions') }}" class="inline-flex w-fit items-center gap-1.5 text-xs font-semibold text-blue-600 no-underline! transition hover:text-blue-700 dark:text-blue-400">
                        <i data-lucide="pencil" class="size-3.5"></i>
                        <span>Edit Questions</span>
                    </a>
                </div>

                <div class="space-y-3">
                    @foreach($questions as $index=>$question)
                        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-800/60">
                            <div class="flex items-start gap-3">
                                <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-xs font-bold text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                                    {{ $index+1 }}
                                </div>

                                <div class="min-w-0 flex-1">
                                    <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                                        <p class="text-sm font-semibold leading-6 text-slate-700 dark:text-slate-200">
                                            {{ $question['question'] }}
                                        </p>

                                        @if($question['type']==='rating')
                                            <span class="inline-flex w-fit shrink-0 items-center gap-1.5 rounded-full bg-amber-100 py-1 ps-2.5 pe-2.5 text-xs font-semibold text-amber-600 dark:bg-amber-950/50 dark:text-amber-400">
                                                <i data-lucide="star" class="size-3.5"></i>
                                                Star Rating
                                            </span>
                                        @else
                                            <span class="inline-flex w-fit shrink-0 items-center gap-1.5 rounded-full bg-blue-100 py-1 ps-2.5 pe-2.5 text-xs font-semibold text-blue-600 dark:bg-blue-950/50 dark:text-blue-400">
                                                <i data-lucide="align-left" class="size-3.5"></i>
                                                Paragraph
                                            </span>
                                        @endif
                                    </div>

                                    @if($question['type']==='rating')
                                        <div class="mt-3 flex flex-wrap items-center gap-1.5">
                                            @for($star=1;$star<=5;$star++)
                                                <div class="flex size-8 items-center justify-center rounded-lg bg-amber-50 text-amber-400 dark:bg-amber-950/30">
                                                    <i data-lucide="star" class="size-4 fill-current"></i>
                                                </div>
                                            @endfor

                                            <span class="ms-1 text-xs text-slate-400">1–5 rating scale</span>
                                        </div>
                                    @else
                                        <div class="mt-3 rounded-lg border border-dashed border-slate-200 bg-white p-3 dark:border-slate-700 dark:bg-slate-900">
                                            <p class="text-xs text-slate-400">Participant paragraph response...</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{--
                BACKEND LATER:
                Pertanyaan nantinya berasal dari:
                $survey->questions
                --}}
            </section>
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:p-6 dark:border-slate-800">
            <a href="{{ url('/admin/survey/questions') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 no-underline! transition hover:bg-slate-50 hover:text-slate-900 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                <i data-lucide="arrow-left" class="size-4"></i>
                <span>Previous</span>
            </a>

            <a href="{{ url('/admin/survey/review') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white no-underline! transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                <span>Next: Review Survey</span>
                <i data-lucide="arrow-right" class="size-4"></i>
            </a>
        </div>
    </div>
</section>
@endsection
