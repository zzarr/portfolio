<section id="project" class="px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">Projects</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($projects as $project)
            <div
                class="border border-gray-800 rounded-xl p-4 hover:shadow-[0_10px_35px_rgba(255,255,255,0.15)]  bg-gray-950">

                {{-- Thumbnail --}}
                <div class="h-40 bg-gray-800 rounded-lg mb-3 overflow-hidden">
                    @if ($project->thumbnail)
                        <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                            class="w-full h-full object-cover">
                    @endif
                </div>

                {{-- Title & Description --}}
                <h3 class="font-semibold">
                    {{ $project->title }}
                </h3>

                <p class="text-sm text-gray-400 mt-1">
                    {{ $project->description }}
                </p>

                {{-- Tags --}}
                <p class="text-xs text-gray-500 mt-2">
                    @foreach ($project->tags as $tag)
                        {{ $tag->name }}@if (!$loop->last)
                            •
                        @endif
                    @endforeach
                </p>

                {{-- Links --}}
                <div class="flex gap-2 mt-3">
                    @if ($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="text-sm underline">
                            Github
                        </a>
                    @endif

                    @if ($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" class="text-sm underline">
                            Demo
                        </a>
                    @endif
                </div>

            </div>
        @endforeach
    </div>
</section>
