<section id="skill" class="px-4 py-10 relative">
    <div class="max-w-7xl mx-auto relative z-10">
        <h2 class="text-3xl font-bold mb-8">Skills</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach ($skills->groupBy(fn ($skill) => $skill->category?->name ?? 'Lainnya') as $categoryName => $categorySkills)
                <div
                    class="rounded-2xl border border-white/50 dark:border-white/10 bg-white/40 dark:bg-gray-900/40 backdrop-blur-md p-6 shadow-lg shadow-black/5">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-1.5 h-6 rounded-full bg-blue-500"></div>
                        <h3 class="text-xl font-semibold">{{ $categoryName }}</h3>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        @foreach ($categorySkills as $skill)
                            <span
                                class="px-4 py-2 rounded-xl border border-white/60 dark:border-white/20 bg-white/50 dark:bg-white/10 backdrop-blur-sm text-sm">
                                {{ $skill->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
