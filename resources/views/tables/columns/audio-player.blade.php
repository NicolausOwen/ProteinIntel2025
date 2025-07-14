@if ($record && filled($record->audio_path))
    <audio controls class="w-40">
        <source src="{{ Storage::url($record->audio_path) }}" type="audio/mpeg">
        Browser Anda tidak mendukung pemutar audio.
    </audio>
@else
    <span class="text-sm text-gray-500 italic">Tidak ada audio</span>
@endif
