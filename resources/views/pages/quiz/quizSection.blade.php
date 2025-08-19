@extends('layouts.quiz')

@section('container')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 flex items-center justify-center p-4">
    <div class="w-full max-w-3xl space-y-8">

        <!-- Header Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transform transition-all duration-500">
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 px-6 py-8 text-center relative">
                <h1 class="text-3xl font-bold text-white font-title">{{ $attempt->quiz->title }}</h1>
                <p class="mt-2 text-sm text-white/80">{{ $attempt->quiz->description }}</p>
            </div>
        </div>

        <!-- Section List -->
        @foreach ($sections as $section)
            <a href="{{ route('user.attempt.questions', ['attempt' => $attempt->id, 'section' => $section->id]) }}"
                class="block bg-white border-l-4 border-indigo-500 rounded-xl shadow p-5 hover:shadow-md hover:scale-[1.02] transition-all duration-300 group">
                <div class="flex items-center space-x-4">
                    {{-- <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-layer-group text-indigo-600"></i>
                    </div> --}}
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-700 transition">{{ $section->name }}</h2>
                    </div>
                </div>
            </a>
        @endforeach

        <!-- Finish Button -->
        <div class="text-center">
            <button
                type="button"
                onclick="openModal()"
                class="group inline-flex items-center justify-center px-6 py-3 text-md font-semibold text-white bg-gradient-to-r from-red-500 via-pink-500 to-rose-500 rounded-xl hover:from-red-600 hover:to-rose-600 transform hover:-translate-y-1 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-red-200"
            >
                <i class="fas fa-flag-checkered mr-2"></i> Finish Attempt
            </button>
        </div>

        <!-- Modal -->
        <div id="confirmationModal" class="fixed inset-0 z-50 bg-black bg-opacity-40 hidden items-center justify-center">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Konfirmasi Selesai</h2>
                <p class="text-sm text-gray-600 mb-6">Apakah Anda yakin ingin menyelesaikan quiz ini? Jawaban yang sudah dikirim tidak bisa diubah.</p>
                <div class="flex justify-end space-x-3">
                    <button onclick="closeModal()" class="px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                    <form id="finishForm" action="{{ route('user.attempt.submit',['attempt' => $attempt->id]) }}" method="POST" onsubmit="clearQuizStorage()">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-sm text-white bg-red-500 rounded hover:bg-red-600">Ya, Saya Yakin</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<form id="autoSubmitForm" method="POST" style="display: none;">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection

@push('scripts')
<script>
    function openModal() {
        document.getElementById('confirmationModal').classList.remove('hidden');
        document.getElementById('confirmationModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('confirmationModal').classList.add('hidden');
        document.getElementById('confirmationModal').classList.remove('flex');
    }

    function clearQuizStorage() {
        localStorage.removeItem('quiz_start_time');
        localStorage.removeItem('quiz_duration');
        localStorage.removeItem('quiz_active');
        return true;
    }
</script>
@endpush

@push('styles')
<style>
    .font-title {
        font-family: 'Space Grotesk', sans-serif;
    }
</style>
@endpush
