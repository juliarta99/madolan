@extends('layouts.consultation.main')

@section('title', 'Konsultasi AI')

@section('content')
<div class="flex flex-col h-full" 
     x-data="{ messages: [
        { text: 'Ada tools gratis untuk desain branding nggak?', sender: 'user' },
        { text: 'Ada, kamu bisa coba Canva, VistaCreate, atau Adobe Express. Mereka punya banyak template gratis untuk feed, logo, hingga kemasan produk.', sender: 'ai' },
        { text: 'Perlu nggak sih bikin logo?', sender: 'user' },
        { text: 'Mulai dari konten ringan dan relatable: proses produksi, unboxing, atau reaksi pelanggan. Gunakan musik yang sedang tren dan tambahkan teks yang eye-catching.', sender: 'ai' },
        { text: 'Ada, kamu bisa coba Canva, VistaCreate, atau Adobe Express. Mereka punya banyak template gratis untuk feed, logo, hingga kemasan produk.', sender: 'ai' },
        { text: 'Perlu nggak sih bikin logo?', sender: 'user' },
        { text: 'Mulai dari konten ringan dan relatable: proses produksi, unboxing, atau reaksi pelanggan. Gunakan musik yang sedang tren dan tambahkan teks yang eye-catching.', sender: 'ai' }
    ], 
    input: '',
    popup: { show: false, message: '', type: 'success' },
    copyText(text) {
        navigator.clipboard.writeText(text)
            .then(() => {
                this.popup = { show: true, message: 'Berhasil disalin!', type: 'success' };
                setTimeout(() => this.popup.show = false, 2000);
            })
            .catch(() => {
                this.popup = { show: true, message: 'Gagal menyalin!', type: 'error' };
                setTimeout(() => this.popup.show = false, 2000);
            });
    }
    }">
    <div 
        x-show="popup.show" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
        :class="popup.type === 'success' ? 'bg-success' : 'bg-danger'"
        class="fixed top-20 right-5 px-4 py-2 rounded-lg shadow-lg text-light z-50"
    >
        <span x-text="popup.message"></span>
    </div>
    <div class="flex-1 overflow-y-auto space-y-4 py-6">
        <template x-for="(msg, index) in messages" :key="index">
            <div class="flex" :class="msg.sender === 'user' ? 'justify-end' : 'justify-start'">
                <div class="max-w-lg p-3 rounded-xl flex-col gap-1"
                    :class="msg.sender === 'user' ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 shadow'">
                    <p x-text="msg.text"></p>
                    <div class="flex justify-end mt-2">
                        <button @click="copyText(msg.text)">
                            <svg width="24" height="24" viewBox="0 0 24 24" class="size-6" 
                                :class="msg.sender === 'user' ? 'stroke-white' : 'stroke-gray-800'" 
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 3H4V16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 7H20V19C20 19.5304 19.7893 20.0391 19.4142 20.4142C19.0391 20.7893 18.5304 21 18 21H10C9.46957 21 8.96086 20.7893 8.58579 20.4142C8.21071 20.0391 8 19.5304 8 19V7Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <div class="py-2 space-y-3 px-4 bg-light rounded-xl shadow-xl">
        <textarea 
            id="chatInput" 
            name="chatInput" 
            rows="1" 
            placeholder="Masukkan pertanyaan anda"
            class="w-full py-3 rounded-lg resize-y focus:outline-none focus:ring-none"
        ></textarea>
        <div class="flex justify-end">
            <button @click="if(input.trim()){ messages.push({ text: input, sender: 'user' }); input=''; }"
                    class="bg-primary text-light p-3 rounded-full hover:bg-secondary">
                <img src="{{ asset('assets/icons/send.svg') }}" alt="">
            </button>
        </div>
    </div>
</div>
@endsection
