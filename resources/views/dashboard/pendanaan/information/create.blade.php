@extends('layouts.dashboard')

@section('content')
    <x-header-with-back route="{{ route('admin.dashboard.pendanaan.information') }}" titleInSpan="Informasi Pendanaan" />

    <form action="" method="POST">
        @csrf

        <div class="mb-4">
            <x-label :isRequired="true" for="type">Tipe</x-label>
            <x-input.select 
                name="type"
                :options="[
                    '' => 'Pilih..',
                    'kur' => 'kur',
                    'hibah' => 'hibah',
                ]"
            />
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="name">Nama</x-label>
            <x-input.default name="name" placeholder="Masukkan nama pendanaan"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="name_funder">Pemberi Dana</x-label>
            <x-input.default placeholder="Masukkan nama pemberi dana" name="name_funder"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label for="logo_funder">Logo Pemberi Dana</x-label>
            <x-input.file name="logo_funder" />
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="logo_funder">Rentang Nominal</x-label>
            <div class="grid grid-cols-2 gap-3 items-center">
                <x-input.default placeholder="Mulai Dari" type="number" min="1" name="start_nominal"></x-input.default>
                <x-input.default placeholder="Sampai Dengan" type="number" min="1" name="end_nominal"></x-input.default>
                <div class="col-span-2 text-sm text-gray-500">Jika tidak ada rentang (masukkan nominal yang sama)</div>
            </div>
        </div>
        
        <div class="mb-4">
            <x-label for="interest_rate">Bunga/Tahun</x-label>
            <x-input.default placeholder="Masukkan bunga per tahun" min="0" max="100" name="interest_rate"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label for="tenor">Tenor</x-label>
            <x-input.default placeholder="Masukkan bunga per tahun" name="tenor"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label for="age_requirements">Syarat Lama Usaha</x-label>
            <x-input.default placeholder="Masukkan syarat lama usaha berdiri" name="age_requirements"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label for="turnover_requirements">Syarat Omzet Usaha</x-label>
            <x-input.default placeholder="Masukkan syarat omzet usaha" name="turnover_requirements"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label for="link_funding">Link Detail Pendanaan</x-label>
            <x-input.default placeholder="Masukkan link detail pendanaan" name="link_funding"></x-input.default>
        </div>
        
        <div x-data="requirementsForm()">
            <div class="mb-4">
                <x-label>Syarat Lainnya</x-label>
                <div class="space-y-4">
                    <template x-for="(item, index) in requirements" :key="index">
                        <div class="mb-2 w-full">
                            <x-label x-bind:for="`requirements[${index}][requirement]`">Syarat</x-label>
                            <x-input.default
                                type="text"
                                x-bind:name="`requirements[${index}][requirement]`"
                                placeholder="Masukkan syarat"
                                x-model="item.requirement"
                            />
                        </div>
                    </template>
        
                    <button type="button"
                        @click="addRequirement"
                        class="w-full bg-gray-50 border border-dashed border-gray-400 text-gray-700 py-2 rounded-md hover:bg-gray-200 transition flex items-center justify-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2">
            <x-button.default 
                variant="danger"
                class="w-full"
            >
                Batal
            </x-button.default>
            <x-button.default 
                class="w-full"
            >
                Simpan
            </x-button.default>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        function requirementsForm() {
            return {
                requirements: [
                    { requirement: '' }
                ],
                addRequirement() {
                    this.requirements.push({ requirement: '' });
                },
                removeRequirement(index) {
                    if (index === 0) return;
                    this.requirements.splice(index, 1);
                }
            }
        }
    </script>
@endsection