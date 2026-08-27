<section id="experience" class="px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">Experience,-</h2>

    <div class="space-y-4">

        @php
            use Carbon\Carbon;

            Carbon::setLocale('id');
        @endphp

        @foreach ($experiences as $experience)
            @php
                $start = Carbon::parse($experience->start_date);

                $end = $experience->is_current ? Carbon::now() : Carbon::parse($experience->end_date);

                $formattedDate =
                    $start->translatedFormat('F Y') .
                    ' - ' .
                    ($experience->is_current ? 'Present' : $end->translatedFormat('F Y'));

                $diff = $start->diff($end);

                $duration = '';

                if ($diff->y > 0) {
                    $duration .= $diff->y . ' tahun ';
                }

                if ($diff->m > 0) {
                    $duration .= $diff->m . ' bulan';
                }

                if ($duration === '') {
                    $duration = 'Kurang dari 1 bulan';
                }
            @endphp

            <!-- card experience -->
            <div
                class="border border-gray-800 rounded-xl p-4 bg-gray-950
        transition-all duration-300 hover:-translate-y-1
        hover:shadow-[0_10px_35px_rgba(255,255,255,0.15)]">

                <div class="flex flex-col gap-1 md:flex-row md:items-start md:justify-between">

                    <h2 class="text-xl font-semibold text-white">
                        {{ $experience->company_name }}
                    </h2>

                    <h2 class="text-sm md:text-sm font-medium text-gray-300 md:text-right">
                        {{ $formattedDate }}
                        ({{ trim($duration) }})
                    </h2>

                </div>

                <p class="mt-3 text-sm font-semibold text-gray-200">
                    {{ $experience->position }}
                </p>

                <ul class="mt-2 list-disc pl-5 space-y-1 text-sm leading-7 text-gray-300 marker:text-gray-500">

                    @foreach ($experience->details as $detail)
                        <li>
                            {{ $detail->description }}
                        </li>
                    @endforeach

                </ul>

            </div>
            <!-- end card experience -->
        @endforeach


    </div>
</section>
