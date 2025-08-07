@extends('layouts.dashboard')

@section('content')
    <x-header-with-back route="{{ route('dashboard.keuangan.pembukuan') }}" titleInSpan="Pembukuan" />

    <form action="" method="POST">
        @csrf

        <div class="mb-4">
            <x-label :isRequired="true" for="transaction_date ">Tanggal</x-label>
            <x-input.default type="date" name="transaction_date "></x-input.default>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="category">Kategori</x-label>
            <x-input.select 
                name="category"
                :options="[
                    '' => 'Pilih..',
                    'pemasukan' => 'Pemasukan',
                    'hutang' => 'Hutang',
                    'pengeluaran' => 'Pengeluaran',
                    'piutang' => 'Piutang'
                ]"
            />
            <div class="flex mt-1 gap-2">
                <input 
                    type="checkbox" 
                    name="paid_off" 
                    id="paid_off"
                >
                <x-label for="paid_off" class="!mb-0 mt-1 !font-normal">Lunas?</x-label>
            </div>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="description">Deskripsi Singkat</x-label>
            <x-input.default placeholder="Masukkan deskripsi singkat untuk pembukuan ini" name="description"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true">Pembayaran</x-label>
            <div class="items-center flex gap-4">
                <div class="items-center flex gap-2">
                    <input type="radio" class="cursor-pointer" name="payment" id="payment-cash" value="cash">
                    <x-label class="!mb-0 cursor-pointer !font-normal" for="payment-cash">Cash</x-label>
                </div>
                <div class="items-center flex gap-2">
                    <input type="radio" class="cursor-pointer" name="payment" id="payment-digital" value="digital">
                    <x-label class="!mb-0 cursor-pointer !font-normal" for="payment-digital">Digital</x-label>
                </div>
            </div>
        </div>
        
        <div class="mb-4">
            <x-label :isRequired="true" for="payment_proof">Bukti Pembayaran</x-label>
            <x-input.file name="payment_proof" />
        </div>
        
        <div x-data="itemsForm()">
            <div class="mb-4">
                <x-label :isRequired="true">Items</x-label>
                <div class="space-y-4">
                    <template x-for="(item, index) in items" :key="index">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-2 border border-gray-200 p-4 rounded-md relative">
                            <div class="mb-2">
                                <x-label :isRequired="true" x-bind:for="`items[${index}][name]`">Nama</x-label>
                                <x-input.default
                                    type="text"
                                    x-bind:name="`items[${index}][name]`"
                                    placeholder="Masukkan nama item"
                                    x-model="item.name"
                                />
                            </div>
                            <div class="mb-2">
                                <x-label :isRequired="true" x-bind:for="`items[${index}][price]`">Harga Satuan</x-label>
                                <x-input.default
                                    type="number"
                                    min="0"
                                    x-bind:name="`items[${index}][price]`"
                                    placeholder="Masukkan harga"
                                    x-model="item.price"
                                />
                            </div>
                            <div class="mb-2">
                                <x-label :isRequired="true" x-bind:for="`items[${index}][unit]`">Unit Satuan</x-label>
                                <x-input.default
                                    type="text"
                                    x-bind:name="items[${index}][unit]`"
                                    placeholder="Contoh: pcs"
                                    x-model="item.unit"
                                />
                            </div>
                            <div class="mb-2">
                                <x-label :isRequired="true" x-bind:for="`items[${index}][quantity]`">Kuantitas</x-label>
                                <x-input.default
                                    type="number"
                                    min="1"
                                    x-bind:name="`items[${index}][quantity]`"
                                    placeholder="Contoh: 1"
                                    x-model="item.quantity"
                                />
                            </div>
                            <div class="col-span-4 font-semibold">
                                Total Item <span x-text="index + 1"></span>: <span x-text="formatCurrency(item.price * item.quantity)"></span>
                            </div>
                            <button
                                type="button"
                                class="absolute top-0 right-0 text-red-500 text-sm hover:underline bg-light flex items-center gap-2 p-2 cursor-pointer"
                                x-show="index !== 0"
                                @click="removeItem(index)"
                            >
                                <img src="{{ asset('assets/icons/trash.svg') }}" class="w-4 shrink-0" alt="">
                                <span>Hapus</span>
                            </button>
                        </div>
                    </template>
        
                    <button type="button"
                        @click="addItem"
                        class="w-full bg-gray-50 border border-dashed border-gray-400 text-gray-700 py-2 rounded-md hover:bg-gray-200 transition flex items-center justify-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
    
            <div class="mb-4">
                <x-label>Pajak</x-label>
                <div class="space-y-4">
                    <template x-for="(item, index) in pajaks" :key="index">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 border border-gray-200 p-4 rounded-md relative">
                            <div class="mb-2">
                                <x-label x-bind:for="`items[${index}][name]`">Nama</x-label>
                                <x-input.default
                                    type="text"
                                    x-bind:name="`items[${index}][name]`"
                                    placeholder="Masukkan nama item"
                                    x-model="item.name"
                                />
                            </div>
                            <div class="mb-2">
                                <x-label x-bind:for="`items[${index}][total]`">Total Pajak</x-label>
                                <x-input.default
                                    type="number"
                                    min="0"
                                    x-bind:name="`items[${index}][total]`"
                                    placeholder="Masukkan harga"
                                    x-model="item.total"
                                />
                            </div>
                            <button
                                type="button"
                                class="absolute top-0 right-0 text-red-500 text-sm hover:underline bg-light flex items-center gap-2 p-2 cursor-pointer"
                                x-show="index !== 0"
                                @click="removePajak(index)"
                            >
                                <img src="{{ asset('assets/icons/trash.svg') }}" class="w-4 shrink-0" alt="">
                                <span>Hapus</span>
                            </button>
                        </div>
                    </template>
        
                    <button type="button"
                        @click="addPajak"
                        class="w-full bg-gray-50 border border-dashed border-gray-400 text-gray-700 py-2 rounded-md hover:bg-gray-200 transition flex items-center justify-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
            <h1 class="mb-2 text-base sm:text-lg lg:text-xl font-semibold">Total Transaksi: <span x-text="formatCurrency(totalKeseluruhan)"></span></h1>
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
        function itemsForm() {
            return {
                items: [
                    { name: '', price: 0, unit: '', quantity: 1 }
                ],
                pajaks: [
                    { name: '', total: 0 }
                ],
                addItem() {
                    this.items.push({ name: '', price: 0, unit: '', quantity: 1 });
                },
                removeItem(index) {
                    if (index === 0) return;
                    this.items.splice(index, 1);
                },
                addPajak() {
                    this.pajaks.push({ name: '', total: 0 });
                },
                removePajak(index) {
                    if (index === 0) return;
                    this.pajaks.splice(index, 1);
                },
                formatCurrency(value) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(value || 0);
                },
                get totalHargaItems() {
                    return this.items.reduce((total, item) => {
                        return total + (parseFloat(item.price || 0) * parseFloat(item.quantity || 0));
                    }, 0);
                },
                get totalPajak() {
                    return this.pajaks.reduce((total, pajak) => {
                        return total + parseFloat(pajak.total || 0);
                    }, 0);
                },
                get totalKeseluruhan() {
                    return this.totalHargaItems + this.totalPajak;
                }
            }
        }
    </script>
@endsection