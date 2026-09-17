@extends('user.layouts.main')

@section('content')
@php
    // Dummy event
    $event=[
        'title'=>'BRIN Environment Policy Analysis & Green Tech Talk',
        'short_title'=>'BRIN Environment Policy Analysis Talk',
        'date'=>'20 May 2025',
        'location'=>'Jakarta, Kampus BRIN'
    ];

    // Dummy survey
    $survey=[
        'title'=>'Post-Event Survey & Feedback',
        'description'=>'Help us improve future scientific talks by providing your honest feedback about content relevance, speaker quality, and infrastructure.',
        'label'=>'Survey For Event'
    ];

    // Dummy questions
    $questions=[
        [
            'id'=>1,
            'type'=>'rating',
            'question'=>'How would you rate the overall quality of this policy seminar?',
            'required'=>true
        ],
        [
            'id'=>2,
            'type'=>'textarea',
            'question'=>'What was the most valuable aspect of this event?',
            'required'=>true,
            'placeholder'=>'Write your feedback about speakers, content, venue, or overall experience...',
            'min_height'=>'min-h-32'
        ],
        [
            'id'=>3,
            'type'=>'textarea',
            'question'=>'Additional comments or suggestions',
            'required'=>false,
            'placeholder'=>'Write any additional feedback or suggestions...',
            'min_height'=>'min-h-28'
        ]
    ];
@endphp

<section class="min-h-screen bg-slate-50 pt-28 pb-12 max-sm:pt-24 max-sm:pb-24">
    <div class="mx-auto w-11/12 max-w-7xl max-sm:w-full max-sm:px-3">

        {{-- Header --}}
        <div class="mb-8 border-b border-slate-200 pb-1 max-sm:mb-4 max-sm:pb-3">
            <div class="flex flex-wrap items-center gap-2 text-sm text-slate-500 max-sm:flex-nowrap max-sm:gap-1.5 max-sm:overflow-hidden max-sm:text-[9px]!">
                <span class="shrink-0 text-blue-500">My Past Events</span>
                <span class="shrink-0">›</span>
                <span class="min-w-0 max-sm:truncate">{{ $event['short_title'] }}</span>
                <span class="shrink-0">›</span>
                <span class="shrink-0 font-semibold text-slate-900">Post-Event Survey</span>
            </div>

            <h1 class="mt-2 text-shadow text-2xl font-bold text-slate-900 sm:text-3xl max-sm:truncate max-sm:text-xl!">
                {{ $survey['title'] }}
            </h1>

            <p class="mt-2 text-sm text-slate-600 sm:text-base max-sm:mt-1 max-sm:text-[10px]! max-sm:leading-4">
                {{ $survey['description'] }}
            </p>
        </div>

        {{-- Survey Card --}}
        <div class="mx-auto max-w-3xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-10 max-sm:rounded-xl max-sm:p-3">

            {{-- Event Info --}}
            <div class="mb-4 border-b border-slate-200 pb-2 max-sm:mb-3">
                <p class="text-xs! font-bold text-blue-500 max-sm:text-[8px]!">
                    {{ $survey['label'] }}
                </p>

                <h2 class="mt-2 text-2xl! font-bold text-slate-900 sm:text-lg max-sm:mt-1 max-sm:truncate max-sm:text-sm!">
                    {{ $event['title'] }}
                </h2>

                <p class="mt-1 text-xs! text-slate-500 max-sm:truncate max-sm:text-[9px]!">
                    Held on {{ $event['date'] }} • {{ $event['location'] }}
                </p>
            </div>

            {{-- Questions --}}
            @foreach($questions as $question)

                @if($question['type']==='rating')
                    <div x-data="{rating:0}" class="mb-8 max-sm:mb-5">
                        <h3 class="mb-4 text-lg! font-bold text-slate-900 sm:text-base max-sm:mb-2 max-sm:text-[11px]! max-sm:leading-4">
                            {{ $question['question'] }}
                            @if($question['required'])
                                *
                            @endif
                        </h3>

                        <div class="flex flex-wrap items-center gap-3 max-sm:flex-nowrap max-sm:gap-2">
                            @for($i=1;$i<=5;$i++)
                                <button type="button"
                                        @click="rating={{ $i }}"
                                        class="text-3xl! transition duration-200 hover:scale-110 max-sm:text-2xl!"
                                        :class="rating >= {{ $i }} ? 'text-amber-400' : 'text-slate-300'">
                                    ★
                                </button>
                            @endfor

                            <span x-show="rating" class="ml-2 text-sm font-semibold text-amber-500 max-sm:ml-1 max-sm:text-[10px]!">
                                <span x-text="rating"></span>/5
                            </span>
                        </div>
                    </div>
                @endif

                @if($question['type']==='textarea')
                    <div class="mb-8 max-sm:mb-5">
                        <h3 class="mb-3 text-lg! font-bold text-slate-900 sm:text-base max-sm:mb-2 max-sm:text-[11px]! max-sm:leading-4">
                            {{ $question['question'] }}
                            @if($question['required'])
                                *
                            @else
                                <span class="font-normal">(Optional)</span>
                            @endif
                        </h3>

                        <textarea
                            class="{{ $question['min_height'] }} w-full resize-none rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white max-sm:min-h-24 max-sm:rounded-lg max-sm:p-3 max-sm:text-[10px]!"
                            placeholder="{{ $question['placeholder'] }}"></textarea>
                    </div>
                @endif

            @endforeach

            {{-- Actions --}}
            <div class="flex flex-col gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:justify-end max-sm:gap-2 max-sm:pt-3">
                <button type="button" class="rounded-3xl! border border-slate-200 px-6 py-2 text-sm! font-semibold text-slate-600 transition hover:bg-blue-600 hover:text-slate-100 max-sm:h-9 max-sm:w-full max-sm:rounded-xl! max-sm:px-3 max-sm:py-0 max-sm:text-[10px]!">
                    Back to Dashboard
                </button>

                <button type="button" class="rounded-3xl! bg-blue-600 px-6 py-2 text-sm! font-semibold text-white transition hover:bg-blue-800 hover:shadow max-sm:h-9 max-sm:w-full max-sm:rounded-xl! max-sm:px-3 max-sm:py-0 max-sm:text-[10px]!">
                    Submit Survey Feedback
                </button>
            </div>
        </div>
    </div>
</section>
@endsection
