@extends('admin.layouts.main')

@section('title','Create Survey - BRIN Event Management')

@section('content')
<section class="p-4 sm:p-6 lg:p-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Create New Survey</h1>
        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Create a survey and collect feedback from event participants.</p>
    </div>

    @include('admin.partials.steps',['currentStep'=>1])

    {{--
    BACKEND LATER:
    <form action="{{ url('/admin/events/'.$event->id.'/survey') }}" method="POST">
        @csrf
    --}}

    <form class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
        <div class="p-4 sm:p-6 lg:p-8">
            <div class="mb-6 flex items-center gap-3">
                <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                    <i data-lucide="clipboard-list" class="size-4"></i>
                </div>
                <div>
                    <h2 class="font-bold text-slate-900 dark:text-white">Basic Information</h2>
                    <p class="mt-0.5 text-xs text-slate-400">Set the event relation and survey submission deadline.</p>
                </div>
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Related Event
                    </label>

                    <div class="flex min-h-14 items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-800">
                        <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                            <i data-lucide="calendar-days" class="size-4"></i>
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-semibold text-slate-800 dark:text-white">
                                National Research Innovation Summit 2026
                            </p>
                            <p class="mt-0.5 truncate text-xs text-slate-400">
                                Survey is automatically linked to this event.
                            </p>
                        </div>
                    </div>

                    {{--
                    BACKEND LATER:
                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                    Event name:
                    {{ $event->title }}
                    --}}
                </div>

                <div>
                    <label for="survey_deadline" class="mb-2 block text-sm font-semibold text-slate-600 dark:text-slate-300">
                        Survey Deadline <span class="text-red-500">*</span>
                    </label>

                    <div class="flex min-h-14 items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 ps-3 transition hover:border-slate-300 focus-within:border-blue-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-blue-500/20 dark:border-slate-700 dark:bg-slate-800 dark:hover:border-slate-600 dark:focus-within:border-blue-500 dark:focus-within:bg-slate-800">
                        <i data-lucide="calendar-clock" class="size-4 shrink-0 text-slate-400"></i>
                        <input id="survey_deadline" type="datetime-local" name="survey_deadline" class="min-w-0 flex-1 bg-transparent p-3 ps-0 text-sm text-slate-700 outline-none dark:text-slate-200">
                    </div>

                    <p class="mt-1.5 text-xs text-slate-400">
                        Set the final date and time participants can submit this survey.
                    </p>

                    {{--
                    BACKEND LATER:
                    value="{{ old('survey_deadline') }}"

                    @error('survey_deadline')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    --}}
                </div>
            </div>

            <div class="mt-6 rounded-xl border border-blue-100 bg-blue-50/60 p-4 dark:border-blue-900/50 dark:bg-blue-950/20">
                <div class="flex items-start gap-3">
                    <div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-950/60 dark:text-blue-400">
                        <i data-lucide="info" class="size-4"></i>
                    </div>

                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                            Survey Questions
                        </p>
                        <p class="mt-1 text-xs leading-5 text-slate-500 dark:text-slate-400">
                            Survey questions will be added in the next step. You can create Star Rating and Paragraph questions.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:p-6 dark:border-slate-800">
            <a href="{{ url('/admin/survey') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white py-2.5 ps-5 pe-5 text-sm font-semibold text-slate-600 no-underline! transition hover:bg-slate-50 hover:text-slate-900 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                Cancel
            </a>

            <a href="{{ url('/admin/survey/create-survey/questions') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 py-2.5 ps-5 pe-5 text-sm font-semibold text-white no-underline! transition hover:bg-blue-700 hover:shadow-md active:scale-95">
                <span>Next: Add Questions</span>
                <i data-lucide="arrow-right" class="size-4"></i>
            </a>

            {{--
            BACKEND LATER:
            Button Next nantinya bisa submit/store Basic Information
            sebelum redirect ke halaman Questions.
            --}}
        </div>
    </form>

    {{--
    BACKEND LATER:
    </form>
    --}}
</section>
@endsection
