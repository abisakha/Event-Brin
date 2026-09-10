@extends('user.layouts.main')

@section('content')
<section class="min-h-screen bg-slate-50 pt-28 pb-12">
    <div class="mx-auto w-11/12 max-w-7xl">
        <div class="mb-8 border-b border-slate-200 pb-1">
            <div class="flex flex-wrap items-center gap-2 text-sm text-slate-500">
                <span class="text-blue-500">My Past Events</span>
                <span>›</span>
                <span>BRIN Environment Policy Analysis Talk</span>
                <span>›</span>
                <span class="font-semibold text-slate-900">Post-Event Survey</span>
            </div>

            <h1 class="mt-2 text-shadow text-2xl font-bold text-slate-900 sm:text-3xl">
                Post-Event Survey & Feedback
            </h1>

            <p class="mt-2 text-sm text-slate-600 sm:text-base">
                Help us improve future scientific talks by providing your honest feedback about content relevance, speaker quality, and infrastructure.
            </p>
        </div>

        <div class="mx-auto max-w-3xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-10">

            <div class="mb-4 border-b border-slate-200 pb-2">
                <p class="text-xs! font-bold text-blue-500">
                    Survey For Event
                </p>

                <h2 class="mt-2 text-2xl! font-bold text-slate-900 sm:text-lg">
                    BRIN Environment Policy Analysis & Green Tech Talk
                </h2>

                <p class="mt-1 text-xs! text-slate-500">
                    Held on 20 May 2025 • Jakarta, Kampus BRIN
                </p>
            </div>

            <div x-data="{rating:0}" class="mb-8">

                <h3 class="mb-4 text-lg! font-bold text-slate-900 sm:text-base">
                    How would you rate the overall quality of this policy seminar? *
                </h3>

                <div class="flex flex-wrap items-center gap-3">

                    @for($i=1;$i<=5;$i++)
                    <button
                        type="button"
                        @click="rating={{ $i }}"
                        class="text-3xl! transition duration-200 hover:scale-110"
                        :class="rating >= {{ $i }} ? 'text-amber-400' : 'text-slate-300'">
                        ★
                    </button>
                    @endfor

                    <span x-show="rating" class="ml-2 text-sm font-semibold text-amber-500">
                        <span x-text="rating"></span>/5
                    </span>

                </div>
            </div>

            <div class="mb-8">
                <h3 class="mb-3 text-lg! font-bold text-slate-900 sm:text-base">
                    What was the most valuable aspect of this event? *
                </h3>

                <textarea class="min-h-32 w-full resize-none rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white" placeholder="Write your feedback about speakers, content, venue, or overall experience..."></textarea>
            </div>

            <div class="mb-8">
                <h3 class="mb-3 text-lg! font-bold text-slate-900 sm:text-base">
                    Additional comments or suggestions (Optional)
                </h3>

                <textarea class="min-h-28 w-full resize-none rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white" placeholder="Write any additional feedback or suggestions..."></textarea>
            </div>

            <div class="flex flex-col gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:justify-end">
                <button class="rounded-3xl! border border-slate-200 px-6 py-2 text-sm! font-semibold text-slate-600 transition hover:text-slate-100 hover:bg-blue-600">
                    Back to Dashboard
                </button>

                <button class="rounded-3xl! bg-blue-600 px-6 py-2 text-sm! font-semibold text-white transition hover:bg-blue-800 hover:shadow">
                    Submit Survey Feedback
                </button>
            </div>

        </div>
    </div>
</section>
@endsection
