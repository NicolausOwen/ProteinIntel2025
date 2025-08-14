{{-- resources/views/filament/user/pages/dashboard.blade.php --}}
<x-filament-panels::page>
    <div class="space-y-6 font-[Poppins]">
        <div>
            <h1 class="text-2xl font-bold">Simulation Result</h1>
            <p class="text-gray-500">08 July 2025 – Simulation Test</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            {{-- Result Box --}}
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <h3 class="text-lg font-semibold mb-4">Result</h3>
                <div
                    class="mx-auto w-24 h-24 flex items-center justify-center rounded-full bg-blue-100 text-2xl font-bold text-blue-600">
                    481
                </div>
                <p class="mt-4 text-gray-600">Great! You have excellent listening and reading skills.</p>
            </div>

            {{-- Summary Box --}}
            <div class="lg:col-span-2 bg-white rounded-xl shadow p-6 space-y-6">
                <h3 class="text-lg font-semibold">Summary</h3>

                {{-- Reading --}}
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <div class="flex items-center gap-2">
                            <i class="ph ph-book-open text-blue-500"></i>
                            <span>Reading</span>
                        </div>
                        <span class="text-sm font-medium">38/50</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 80%"></div>
                    </div>
                </div>

                {{-- Structure --}}
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <div class="flex items-center gap-2">
                            <i class="ph ph-pencil-simple text-yellow-500"></i>
                            <span>Structure</span>
                        </div>
                        <span class="text-sm font-medium">27/50</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-yellow-400 h-2 rounded-full" style="width: 73%"></div>
                    </div>
                </div>

                {{-- Listening --}}
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <div class="flex items-center gap-2">
                            <i class="ph ph-headphones text-blue-500"></i>
                            <span>Listening</span>
                        </div>
                        <span class="text-sm font-medium">40/50</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 85%"></div>
                    </div>
                </div>

                {{-- Level Indicator --}}
                <div class="pt-4">
                    <span class="block text-sm font-semibold mb-2">Level: Intermediate</span>
                    <div class="flex overflow-hidden rounded-full text-xs font-medium text-white">
                        <div class="flex-1 bg-gray-400 py-1 text-center">0–400</div>
                        <div class="flex-1 bg-blue-500 py-1 text-center">401–500</div>
                        <div class="flex-1 bg-gray-400 py-1 text-center">501–600</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tips Section --}}
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow p-6 flex gap-4">
                <i class="ph ph-book-open text-blue-500 text-2xl"></i>
                <div>
                    <h4 class="font-semibold">Reading</h4>
                    <ul class="list-disc list-inside text-sm text-gray-600">
                        <li>Focus on identifying main ideas and supporting details.</li>
                        <li>Practice with academic articles 10 mins/day.</li>
                    </ul>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow p-6 flex gap-4">
                <i class="ph ph-pencil-simple text-yellow-500 text-2xl"></i>
                <div>
                    <h4 class="font-semibold">Structure</h4>
                    <ul class="list-disc list-inside text-sm text-gray-600">
                        <li>Review grammar rules: tenses, agreement, and word order.</li>
                        <li>Do 10 structure questions per day.</li>
                    </ul>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow p-6 flex gap-4">
                <i class="ph ph-headphones text-blue-500 text-2xl"></i>
                <div>
                    <h4 class="font-semibold">Listening</h4>
                    <ul class="list-disc list-inside text-sm text-gray-600">
                        <li>Practice active listening with TED-Ed or BBC Learning.</li>
                        <li>Summarize what you hear in 1-2 sentences.</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex gap-3">
            <x-filament::button icon="heroicon-o-arrow-path" color="gray">
                Retake Test
            </x-filament::button>
            <x-filament::button icon="heroicon-o-list-bullet" color="primary">
                Review Answers
            </x-filament::button>
            <x-filament::button icon="heroicon-o-arrow-down-tray" color="success">
                Download PDF
            </x-filament::button>
        </div>
    </div>

    {{-- Import Phosphor Icons --}}
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</x-filament-panels::page>