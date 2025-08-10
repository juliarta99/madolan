@extends('layouts.dashboard')

@section('content')
    <div class="h-70 w-70 bg-accent blur-[150px] fixed -z-10 top-0 right-0 translate-x-1/2 -translate-y-1/2"></div>
    <div class="h-70 w-70 bg-primary blur-[150px] fixed -z-10 bottom-0 left-0 -translate-x-1/2 translate-y-1/2"></div>
    <div x-data="{ openSaranAI: false  }" class="relative">
        <h1 class="text-2xl lg:text-3xl font-bold mb-4">Selamat Datang, Sanjaya Putra</h1>
        <div x-data="{ openNotification: true  }" x-transition.opacity x-cloak x-show="openNotification" class="bg-warning p-4 rounded-md mb-4 flex gap-4 justify-between items-center">
            <p class="text-sm md:text-base">
                Stok Kopi Bubuk tersisa 4 pcs dan 3 item lainnya juga menipis. Segera lakukan restok sebelum kehabisan.
            </p>
            <button 
                @click="openNotification = false" 
                class="text-gray-800 hover:text-dark cursor-pointer"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="bg-primary text-light p-4 rounded-md mb-3">
            <p>Penjualan kemarin <span class="font-bold">turun dibanding dua hari lalu</span>, dan penjualan bulan ini <span class="font-bold">lebih rendah dari bulan sebelumnya</span></p>
            <x-button.default variant="light" @click="openSaranAI = true" class="mt-3">
                Lihat Saran Strategi dari AI
            </x-button.default>

            <div 
                x-show="openSaranAI" 
                x-transition.opacity 
                x-cloak 
                class="fixed inset-0 z-999 flex items-center justify-center bg-black/50"
            >
                <div 
                    x-show="openSaranAI" 
                    x-transition 
                    @click.away="openSaranAI = false" 
                    class="bg-light text-dark p-6 rounded-none md:rounded-lg w-full md:w-150 md:h-max max-h-screen shadow-lg overflow-auto"
                >
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold">Saran Strategi dari AI</h2>
                        <button 
                            @click="openSaranAI = false" 
                            class="text-gray-800 hover:text-dark cursor-pointer"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div>
                        <h3 class="font-semibold">Immediate (0–48 jam) — Stop-gap & Investigasi cepat</h3>
                        <ol class="list-decimal ml-5 text-sm space-y-1">
                            <li>Verifikasi data & root cause quick check
                                <ul class="list-disc ml-5">
                                    <li>Cek logs: site uptime, error checkout, payment gateway, stock sync.</li>
                                    <li>Target: temukan akar masalah dalam 24 jam.</li>
                                </ul>
                            </li>
                            <li>Segmentasi dampak — pisahkan per produk/kategori/kanal.</li>
                            <li>Pause & reallocate budget iklan yang tidak efisien.</li>
                            <li>Quick promo 48 jam: Diskon 10% + Gratis Ongkir untuk best-seller.</li>
                            <li>Customer outreach: kirim pesan ke VIP & abandoned carts.</li>
                        </ol>
                    </div>

                    <div>
                        <h3 class="font-semibold">Short term (3–14 hari) — Stabilisasi & Eksperimen</h3>
                        <ol class="list-decimal ml-5 text-sm space-y-1">
                            <li>A/B test landing page & checkout (1-step vs 3-step).</li>
                            <li>Retargeting & win-back funnel untuk abandoned cart & churned user.</li>
                            <li>Promo tersegmentasi & bundling produk pelengkap.</li>
                            <li>Optimasi iklan & kreatif baru.</li>
                            <li>Flash sale & live engagement di media sosial.</li>
                        </ol>
                    </div>

                    <div>
                        <h3 class="font-semibold">Medium term (2–8 minggu) — Scale & Perbaikan</h3>
                        <ol class="list-decimal ml-5 text-sm space-y-1">
                            <li>Analisis unit economics per SKU, stop promosi SKU rugi.</li>
                            <li>Implementasi program loyalitas & retention.</li>
                            <li>Perkuat direct channel jika marketplace menurun.</li>
                            <li>Dynamic pricing & promosi terjadwal.</li>
                            <li>Push review pelanggan dengan insentif kecil.</li>
                        </ol>
                    </div>

                    <div>
                        <h3 class="font-semibold">Long term (2–6 bulan) — Structural improvements</h3>
                        <ol class="list-decimal ml-5 text-sm space-y-1">
                            <li>Evaluasi katalog produk: fokus best-seller.</li>
                            <li>Invest di personalisasi AI & automasi.</li>
                            <li>Bangun brand & content marketing.</li>
                            <li>Jajaki partnership B2B.</li>
                            <li>Perkuat rantai pasok & stok aman.</li>
                        </ol>
                    </div>

                    <div class="bg-white shadow rounded-lg p-6 space-y-4">
                        <h3 class="font-semibold">Rencana Aksi 30 Hari</h3>
                        <ul class="list-disc ml-5 text-sm space-y-1">
                            <li><strong>Hari 0–2:</strong> Verifikasi data, pause iklan bermasalah, quick promo, outreach VIP.</li>
                            <li><strong>Hari 3–10:</strong> A/B test, retargeting funnels, flash sale akhir minggu.</li>
                            <li><strong>Hari 11–21:</strong> Evaluasi A/B, scale pemenang, bundling, influencer mikro, push review.</li>
                            <li><strong>Hari 22–30:</strong> Analisa unit economics, mulai loyalty program, automasi personalisasi.</li>
                        </ul>
                    </div>

                    <div class="bg-white shadow rounded-lg p-6 space-y-3">
                        <h3 class="font-semibold">Contoh Copy & Template</h3>
                        <div class="text-sm space-y-2">
                            <p><strong>Email abandoned cart:</strong> <code class="bg-gray-100 px-1 rounded">"{nama}, barangmu hampir habis — ambil diskon 12% sekarang"</code></p>
                            <p><strong>Push notif:</strong> <code class="bg-gray-100 px-1 rounded">"Diskon 10% untuk produk favoritmu — hanya 24 jam!"</code></p>
                            <p><strong>Iklan headline:</strong> <code class="bg-gray-100 px-1 rounded">"Sering dicari — Diskon 10% + Gratis Ongkir. Cek Sekarang!"</code></p>
                            <p><strong>SMS VIP:</strong> <code class="bg-gray-100 px-1 rounded">"{nama}, terima kasih! Nikmati potongan 10% untuk pembelian hari ini: VIP10"</code></p>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="font-semibold">Monitoring & KPI</h3>
                        <ul class="list-disc ml-5 text-sm space-y-1">
                            <li>Harian: revenue/day, orders/day, CR, AOV, cart abandonment.</li>
                            <li>Mingguan: ROAS per channel, retention 7/30d, top 10 SKU, margin.</li>
                            <li>Reporting: dashboard pagi & review meeting mingguan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4 block md:hidden px-5 py-7 overflow-hidden bg-light rounded-xl border border-gray-300 shadow-xl">
            <div class="flex gap-8 items-center overflow-x-auto">
                <a href="" class="flex gap-1 flex-col items-center">
                    <svg class="size-6 fill-primary" viewBox="0 0 56 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M48.6257 47.2084C48.3201 47.2084 48.0336 47.1511 47.7663 47.0365C47.4989 46.9219 47.2507 46.75 47.0215 46.5209L41.7507 41.25H18.834C17.5736 41.25 16.495 40.8016 15.5982 39.9048C14.7013 39.008 14.2522 37.9287 14.2507 36.6667V34.375H39.459C40.7194 34.375 41.7988 33.9266 42.6971 33.0298C43.5954 32.133 44.0438 31.0537 44.0423 29.7917V13.75H46.334C47.5944 13.75 48.6738 14.1992 49.5721 15.0975C50.4704 15.9959 50.9188 17.0745 50.9173 18.3334V44.8594C50.9173 45.5469 50.6882 46.1107 50.2298 46.5507C49.7715 46.9907 49.2368 47.2099 48.6257 47.2084ZM9.66732 27.9011L12.36 25.2084H34.8757V9.16671H9.66732V27.9011ZM7.37565 35.75C6.76454 35.75 6.22982 35.5308 5.77148 35.0923C5.31315 34.6539 5.08398 34.0901 5.08398 33.4011V9.16671C5.08398 7.90629 5.53315 6.82768 6.43148 5.93087C7.32982 5.03407 8.40843 4.5849 9.66732 4.58337H34.8757C36.1361 4.58337 37.2154 5.03254 38.1138 5.93087C39.0121 6.82921 39.4605 7.90782 39.459 9.16671V25.2084C39.459 26.4688 39.0106 27.5482 38.1138 28.4465C37.217 29.3448 36.1376 29.7932 34.8757 29.7917H14.2507L8.97982 35.0625C8.75065 35.2917 8.50239 35.4636 8.23503 35.5782C7.96766 35.6927 7.68121 35.75 7.37565 35.75Z"/>
                    </svg>
                    <p class="font-semibold whitespace-nowrap text-sm md:text-base text-primary">Forum</p>
                </a>
                <a href="" class="flex gap-1 flex-col items-center">
                    <svg class="size-6 fill-accent" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5395 5.51C15.5395 7.44997 13.9595 9.02 12.0295 9.02C10.0895 9.02 8.51953 7.44997 8.51953 5.51C8.51953 3.56998 10.0895 2 12.0295 2C13.9695 2 15.5395 3.56998 15.5395 5.51ZM13.5395 5.51C13.5395 4.67998 12.8595 3.99997 12.0295 3.99997C11.1995 3.99997 10.5195 4.67998 10.5195 5.51C10.5195 6.33997 11.1995 7.01998 12.0295 7.01998C12.8595 7.01998 13.5395 6.33997 13.5395 5.51Z"/>
                        <path d="M9.83984 15.48H9.88986V15.53H9.83984V15.48ZM14.2099 15.48H14.1598V15.53H14.2099V15.48ZM14.8099 15.49H14.7598V15.54H14.8099V15.49Z"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.03 10.92L3 6.39996V17.48L12.03 22L21.06 17.48V6.39996L12.03 10.92ZM5.00002 9.62998L11.03 12.65V19.26L5.00002 16.24V9.62998ZM19.06 16.24L13.03 19.26V12.65L19.06 9.62998V16.24Z"/>
                    </svg>
                    <p class="font-semibold whitespace-nowrap text-sm md:text-base text-accent">Pembelajaran</p>
                </a>
                <a href="" class="flex gap-1 flex-col items-center">
                    <svg class="size-6 fill-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.75 0.0234375L24 4.14844V13.3477L22.5 12.5977V5.82422L16.5 8.82422V11.8477L15 12.5977V8.82422L9 5.82422V8.48438L7.5 7.73438V4.14844L15.75 0.0234375ZM15.75 7.52344L17.8242 6.48047L12.3984 3.375L9.92578 4.61719L15.75 7.52344ZM19.4414 5.68359L21.5742 4.61719L15.75 1.69922L14.0039 2.57812L19.4414 5.68359ZM13.5 13.3477L12 14.0977V14.0859L7.5 16.3359V21.668L12 19.4062V21.0938L6.75 23.7188L0 20.332V12.4102L6.75 9.03516L13.5 12.4102V13.3477ZM6 21.668V16.3359L1.5 14.0859V19.4062L6 21.668ZM6.75 15.0352L11.0742 12.8789L6.75 10.7109L2.42578 12.8789L6.75 15.0352ZM13.5 15.0234L18.75 12.3984L24 15.0234V21.1992L18.75 23.8242L13.5 21.1992V15.0234ZM18 21.7734V18.1992L15 16.6992V20.2734L18 21.7734ZM22.5 20.2734V16.6992L19.5 18.1992V21.7734L22.5 20.2734ZM18.75 16.8984L21.5742 15.4805L18.75 14.0742L15.9258 15.4805L18.75 16.8984Z"/>
                    </svg>
                    <p class="font-semibold whitespace-nowrap text-sm md:text-base text-primary">Produk</p>
                </a>
                <a href="" class="flex gap-1 flex-col items-center">
                    <svg class="size-6 fill-accent" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 5.49999C9.99985 4.73404 10.1952 3.98073 10.5676 3.31139C10.94 2.64205 11.477 2.07883 12.1279 1.67508C12.7788 1.27133 13.522 1.0404 14.2871 1.00416C15.0522 0.967915 15.8139 1.12756 16.5 1.46799C17.1861 1.12797 17.9476 0.968644 18.7124 1.00509C19.4773 1.04153 20.2201 1.27253 20.8708 1.67624C21.5214 2.07995 22.0583 2.643 22.4306 3.31212C22.8029 3.98123 22.9982 4.73428 22.9982 5.49999C22.9982 6.2657 22.8029 7.01874 22.4306 7.68786C22.0583 8.35697 21.5214 8.92003 20.8708 9.32373C20.2201 9.72744 19.4773 9.95845 18.7124 9.99489C17.9476 10.0313 17.1861 9.872 16.5 9.53199C15.8139 9.87241 15.0522 10.0321 14.2871 9.99582C13.522 9.95958 12.7788 9.72865 12.1279 9.32489C11.477 8.92114 10.94 8.35793 10.5676 7.68859C10.1952 7.01925 9.99985 6.26594 10 5.49999ZM18.25 7.98799C18.332 7.99599 18.4153 7.99999 18.5 7.99999C18.8384 7.99926 19.1731 7.92984 19.4839 7.79593C19.7946 7.66203 20.075 7.46643 20.3079 7.22099C20.5409 6.97554 20.7216 6.68536 20.8391 6.36803C20.9566 6.0507 21.0084 5.71281 20.9915 5.37485C20.9745 5.03689 20.8891 4.70588 20.7405 4.40188C20.5919 4.09789 20.3831 3.82723 20.1268 3.60631C19.8704 3.38539 19.5719 3.2188 19.2493 3.11664C18.9267 3.01448 18.5868 2.97888 18.25 3.01199C18.7392 3.74952 19.0001 4.61494 19 5.49999C19.0001 6.38503 18.7392 7.25045 18.25 7.98799ZM8.435 13.25C8.27081 13.2496 8.10814 13.2815 7.95629 13.3439C7.80444 13.4064 7.66638 13.4982 7.55 13.614L5.5 15.664V19.5H11.127L16.93 18.05L20.462 16.542C20.5823 16.477 20.6744 16.3698 20.7205 16.2411C20.7667 16.1124 20.7637 15.9712 20.7122 15.8445C20.6606 15.7178 20.5641 15.6147 20.4412 15.5548C20.3182 15.4949 20.1775 15.4825 20.046 15.52L20.026 15.525L13.614 17H10V15H13.125C13.3571 15 13.5796 14.9078 13.7437 14.7437C13.9078 14.5796 14 14.3571 14 14.125C14 13.8929 13.9078 13.6704 13.7437 13.5063C13.5796 13.3422 13.3571 13.25 13.125 13.25H8.435ZM15.987 14.402L19.539 13.585C19.9173 13.4855 20.3134 13.4741 20.6968 13.5515C21.0802 13.6289 21.4408 13.7932 21.7509 14.0317C22.0609 14.2702 22.3122 14.5766 22.4854 14.9273C22.6586 15.2781 22.7491 15.6638 22.75 16.055C22.7496 16.5298 22.6171 16.9952 22.3674 17.3991C22.1177 17.803 21.7606 18.1294 21.336 18.342L21.309 18.356L17.569 19.951L11.373 21.5H0V14.25H4.086L6.138 12.198C6.44034 11.8967 6.79907 11.6579 7.1937 11.4952C7.58834 11.3326 8.01116 11.2492 8.438 11.25H13.125C13.5259 11.2499 13.9225 11.3337 14.2891 11.496C14.6557 11.6583 14.9843 11.8955 15.2539 12.1923C15.5234 12.4892 15.7278 12.8391 15.8541 13.2196C15.9804 13.6002 16.0256 14.0029 15.987 14.402ZM3.5 16.25H2V19.5H3.5V16.25Z"/>
                    </svg>
                    <p class="font-semibold whitespace-nowrap text-sm md:text-base text-accent">Point of Sales</p>
                </a>
                <a href="" class="flex gap-1 flex-col items-center">
                    <svg class="size-6 stroke-primary" viewBox="0 0 56 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.125 8.59375H12.5312V49.8438H43.4688V8.59375H34.875M17.6875 39.5312H38.3125M21.125 12.0312H34.875L36.5938 5.15625H19.4062L21.125 12.0312ZM21.125 34.375L26.2812 32.6562L36.5938 22.3438L33.1562 18.9062L22.8438 29.2188L21.125 34.375Z" stroke-width="3.4375" stroke-linejoin="round"/>
                    </svg>
                    <p class="font-semibold whitespace-nowrap text-sm md:text-base text-primary">Pre Order</p>
                </a>
                <a href="" class="flex gap-1 flex-col items-center">
                    <svg class="size-6 fill-accent" viewBox="0 0 56 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.82031 55L8.34141 54.6683C8.81578 54.5697 9.29016 54.4741 9.76453 54.3812C10.4881 54.2386 11.2237 54.0942 11.9491 53.9619C12.5042 53.8639 13.0508 53.7745 13.6059 53.6663L13.7297 53.6302C14.302 53.5322 14.8692 53.4239 15.4416 53.362L18.2242 52.9495V0H18.1263C16.6885 0.00888937 15.251 0.0358186 13.8139 0.0807812C12.2275 0.127188 10.617 0.216562 9.03406 0.323125C8.35344 0.366094 7.66422 0.431406 6.97328 0.482969H6.87531V54.9811L6.82031 55ZM20.9192 0.0360937V52.6092C22.8872 52.3764 24.8603 52.1885 26.8369 52.0455C31.6975 51.6797 36.5737 51.5632 41.4463 51.6966C44.0255 51.7791 46.6008 51.928 49.172 52.1434V3.44609C46.8731 2.91664 44.5599 2.45125 42.2352 2.05047C37.7224 1.2787 33.1759 0.719491 28.6106 0.374687C26.054 0.189341 23.4926 0.0764314 20.9295 0.0360937H20.9192ZM45.5919 33.9436L45.4836 33.9367L44.1928 33.7923C40.9879 33.4603 37.7725 33.2396 34.5523 33.1306C31.3279 33.0358 28.1012 33.0479 24.8775 33.1667H24.7795C24.6713 33.1667 24.5733 33.1667 24.465 33.1306C24.2359 33.0721 24.0257 32.9555 23.8548 32.792C23.6621 32.5942 23.5361 32.341 23.4944 32.0679C23.4528 31.7948 23.4977 31.5155 23.6228 31.2692C23.6847 31.1713 23.7655 31.0355 23.8548 30.965C23.9553 30.8712 24.0667 30.7899 24.1866 30.7227C24.3292 30.6608 24.4633 30.6247 24.5991 30.5903H24.8036C25.2522 30.5903 25.6991 30.5542 26.1116 30.5542C29.2951 30.4731 32.4804 30.4938 35.6627 30.6161C38.9644 30.7605 42.2334 31.0011 45.4922 31.3775L45.8411 31.4136C45.9391 31.4497 46.0387 31.4497 46.1453 31.4755C46.3859 31.5837 46.5922 31.7178 46.7366 31.8966C46.8345 31.9945 46.8964 32.1303 46.9686 32.273C47.0388 32.3992 47.076 32.5411 47.0769 32.6855C47.0925 32.8741 47.0669 33.0639 47.0019 33.2416C46.9369 33.4194 46.834 33.5809 46.7005 33.715C46.5922 33.8233 46.4856 33.8852 46.3859 33.9556C46.2811 34.0295 46.1453 34.0536 46.0095 34.0914C45.9391 34.1275 45.9012 34.1275 45.805 34.1275H45.6967L45.5919 33.9436ZM45.6709 27.7337C45.5627 27.7337 45.5627 27.7337 45.4561 27.7148L44.1842 27.5516C40.993 27.1409 37.7858 26.8663 34.5712 26.7283C31.3543 26.5623 28.1322 26.5171 24.9119 26.5925L24.8036 26.5581C24.7056 26.522 24.5991 26.522 24.5011 26.4877C24.2758 26.4186 24.074 26.2883 23.9184 26.1112C23.848 26.003 23.7397 25.8689 23.7122 25.7692C23.6222 25.5815 23.5778 25.3751 23.5826 25.1669C23.5874 24.9588 23.6412 24.7547 23.7397 24.5712C23.8012 24.4426 23.8824 24.3243 23.9803 24.2206C24.0783 24.1227 24.1866 24.0144 24.3223 23.9886C24.465 23.9181 24.5991 23.8442 24.7331 23.8442L24.9394 23.8098L26.2817 23.7738C29.4548 23.7391 32.6281 23.8079 35.7967 23.98C39.0831 24.1572 42.3618 24.4553 45.6262 24.8738L45.9769 24.9098L46.1831 24.9459C46.4225 25.0052 46.6379 25.1366 46.8002 25.3223C47.0769 25.5991 47.2127 25.9755 47.1766 26.3519C47.1766 26.4945 47.1422 26.6286 47.0786 26.7283C47.0081 26.8727 46.9359 26.9706 46.8723 27.0772C46.8019 27.1752 46.7022 27.2491 46.5612 27.3573C46.4633 27.4192 46.3189 27.4536 46.1848 27.4897L45.9786 27.5258H45.8806L45.6709 27.7337ZM45.6709 21.5205C45.5627 21.5205 45.5627 21.5205 45.4561 21.5016L44.1842 21.3228C40.9924 20.882 37.7861 20.5535 34.5712 20.338C31.3557 20.1317 28.1341 20.0331 24.9119 20.0423H24.8036L24.5991 20.0063C24.4681 19.9709 24.3417 19.9201 24.2227 19.855C24.0497 19.7429 23.902 19.5958 23.7893 19.4232C23.6765 19.2507 23.6011 19.0564 23.5678 18.853C23.5678 18.7086 23.5678 18.5728 23.6039 18.4405C23.6331 18.3043 23.6786 18.1721 23.7397 18.0469C23.8176 17.9251 23.9106 17.8137 24.0164 17.7152C24.1977 17.5428 24.4242 17.4254 24.6695 17.3766C24.7723 17.3507 24.8781 17.3386 24.9841 17.3405H26.2903C32.776 17.3741 39.2516 17.8553 45.6709 18.7808L46.0095 18.8272C46.1178 18.8461 46.1539 18.8461 46.2158 18.8702C46.3501 18.9129 46.4771 18.9761 46.5922 19.0575C46.7366 19.1314 46.8345 19.2294 46.9067 19.3377C46.9772 19.4425 47.0425 19.5697 47.113 19.7037C47.1786 19.8804 47.2062 20.0689 47.1941 20.257C47.1819 20.445 47.1303 20.6284 47.0425 20.7952C46.9824 20.9225 46.9003 21.0382 46.8002 21.1372C46.6328 21.309 46.418 21.4269 46.1831 21.4758C46.1195 21.5033 46.0852 21.5033 45.9769 21.5119L45.8789 21.5205H45.6709ZM45.6709 15.3089C45.5627 15.3089 45.5627 15.3089 45.4561 15.29L44.1842 15.0837C40.9978 14.5663 37.7905 14.1873 34.5712 13.9477C31.3575 13.6826 28.136 13.5215 24.9119 13.4647H24.8036L24.563 13.4372C24.4272 13.4028 24.3034 13.3289 24.1866 13.267C24.0611 13.1966 23.9614 13.0883 23.8634 12.9903C23.7827 12.882 23.7122 12.748 23.6503 12.6517C23.603 12.5152 23.5702 12.374 23.5523 12.2306C23.5336 12.024 23.5607 11.8159 23.6317 11.621C23.7027 11.4261 23.8159 11.2493 23.9631 11.1031C24.1442 10.9318 24.367 10.8109 24.6094 10.7525C24.7056 10.7267 24.8139 10.7267 24.9119 10.7267C28.6421 10.7712 32.3691 10.9656 36.0837 11.3094C39.2617 11.5775 42.4311 11.9883 45.5833 12.5073L45.8978 12.5434C45.9872 12.5434 46.013 12.5434 46.1023 12.5692C46.2467 12.6156 46.355 12.6775 46.4787 12.748C46.587 12.8116 46.685 12.9198 46.7675 13.0178C46.972 13.3289 47.07 13.7053 47.0081 14.0834C46.9754 14.2165 46.927 14.3452 46.8638 14.4667C46.7897 14.5833 46.696 14.6862 46.587 14.7709C46.4156 14.9398 46.2028 15.0607 45.97 15.1216H45.6555L45.6709 15.3089ZM9.75594 14.135C9.40417 14.1348 9.06573 14.0004 8.8096 13.7593C8.55347 13.5182 8.39894 13.1885 8.3775 12.8373C8.3775 12.7016 8.41188 12.5761 8.44797 12.4609C8.48608 12.3018 8.55626 12.152 8.65422 12.0209C8.75501 11.8759 8.8828 11.7516 9.03062 11.6548C9.20177 11.5515 9.38964 11.4788 9.58578 11.44L10.6858 11.342C12.1914 11.2097 13.6764 11.1014 15.1545 11.012H15.2869C15.5292 11.0206 15.7338 11.0653 15.9056 11.1719C16.3525 11.4056 16.6292 11.8714 16.6292 12.363C16.6225 12.4876 16.5988 12.6108 16.5588 12.7291C16.5242 12.8858 16.4536 13.0324 16.3525 13.157C16.2545 13.3358 16.1102 13.4338 15.9761 13.542C15.8044 13.6424 15.6165 13.7122 15.4209 13.7483C15.1872 13.7844 14.9466 13.7844 14.7042 13.8102C14.3897 13.8462 14.0511 13.8463 13.7022 13.8841L11.0261 14.0886L10.373 14.1625C10.2372 14.1969 10.0962 14.1969 9.92437 14.1969L9.75594 14.135ZM45.6348 9.09562L45.4217 9.06812L44.1584 8.84297C40.9538 8.30436 37.7322 7.87157 34.4991 7.54531C31.2868 7.23488 28.0653 7.02852 24.8397 6.92656H24.7314L24.5252 6.88359C24.3938 6.84548 24.2674 6.79182 24.1488 6.72375C24.037 6.64284 23.9355 6.54878 23.8463 6.44359C23.708 6.28941 23.6101 6.1034 23.5612 5.90217C23.5123 5.70094 23.514 5.49074 23.5661 5.29031C23.6022 5.14594 23.6641 5.01359 23.738 4.87781C23.8084 4.73344 23.9081 4.63547 24.0147 4.52891C24.1972 4.35757 24.423 4.23931 24.6678 4.18688C24.7658 4.15078 24.8741 4.15078 24.972 4.15078L26.3144 4.18688C29.5095 4.32266 32.6686 4.52891 35.8294 4.87609C39.1311 5.21469 42.3898 5.69938 45.6589 6.24594L45.9975 6.28031C46.1058 6.28031 46.1419 6.28031 46.2038 6.31641C46.3481 6.35078 46.4805 6.42469 46.5888 6.48656C46.7396 6.60359 46.8657 6.74938 46.9598 6.91548C47.0539 7.08157 47.1142 7.26469 47.137 7.45422C47.1714 7.58656 47.137 7.72234 47.1009 7.86672C47.094 8.00288 47.0467 8.13389 46.9652 8.24312C46.8942 8.35369 46.8137 8.4578 46.7245 8.55422C46.545 8.72288 46.3161 8.8295 46.0714 8.85844L45.8737 8.89453H45.7655L45.6348 9.09562ZM9.71984 7.33047C9.52239 7.33079 9.32718 7.28859 9.1475 7.20672C8.98941 7.12468 8.84503 7.01857 8.71953 6.89219C8.52361 6.67622 8.40143 6.40356 8.37062 6.11359C8.33653 5.76203 8.44076 5.41101 8.66122 5.13504C8.88168 4.85907 9.20099 4.67987 9.55141 4.63547C9.9175 4.60969 10.2784 4.60969 10.6359 4.57359C12.1295 4.46531 13.618 4.40344 15.103 4.33297H15.2198C15.4261 4.36734 15.6323 4.40344 15.8025 4.50312C16.2133 4.74375 16.4917 5.22672 16.4917 5.70109C16.4883 5.8326 16.4633 5.96266 16.4178 6.08609C16.3577 6.24391 16.2798 6.39441 16.1858 6.53469C16.0729 6.67802 15.9289 6.7938 15.7647 6.87328C15.5903 6.98352 15.3884 7.04249 15.182 7.04344C14.9414 7.07953 14.6991 7.07953 14.4206 7.07953L13.3911 7.15C12.4698 7.21187 11.5744 7.24797 10.6772 7.32016L9.98969 7.35625C9.81781 7.39234 9.68547 7.39234 9.54109 7.39234L9.71984 7.33047Z"/>
                    </svg>
                    <p class="font-semibold whitespace-nowrap text-sm md:text-base text-accent">Pembukuan</p>
                </a>
                <a href="" class="flex gap-1 flex-col items-center">
                    <svg class="size-6 fill-primary" viewBox="0 0 56 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8327 29.7917H37.166V25.2084H18.8327V29.7917ZM18.8327 36.6667H37.166V32.0834H18.8327V36.6667ZM18.8327 43.5417H30.291V38.9584H18.8327V43.5417ZM14.2493 50.4167C12.9889 50.4167 11.9103 49.9683 11.0135 49.0715C10.1167 48.1747 9.66754 47.0953 9.66602 45.8334V9.16671C9.66602 7.90629 10.1152 6.82768 11.0135 5.93087C11.9118 5.03407 12.9905 4.5849 14.2493 4.58337H32.5827L46.3327 18.3334V45.8334C46.3327 47.0938 45.8843 48.1732 44.9875 49.0715C44.0907 49.9698 43.0113 50.4182 41.7494 50.4167H14.2493ZM30.291 20.625V9.16671H14.2493V45.8334H41.7494V20.625H30.291Z"/>
                    </svg>
                    <p class="font-semibold whitespace-nowrap text-sm md:text-base text-primary">Laporan</p>
                </a>
                <a href="" class="flex gap-1 flex-col items-center">
                    <svg class="size-6 fill-accent" viewBox="0 0 56 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.875 15.8125C12.875 14.1715 13.5269 12.5977 14.6873 11.4373C15.8477 10.2769 17.4215 9.625 19.0625 9.625C20.7035 9.625 22.2773 10.2769 23.4377 11.4373C24.5981 12.5977 25.25 14.1715 25.25 15.8125C25.25 17.4535 24.5981 19.0273 23.4377 20.1877C22.2773 21.3481 20.7035 22 19.0625 22C17.4215 22 15.8477 21.3481 14.6873 20.1877C13.5269 19.0273 12.875 17.4535 12.875 15.8125ZM19.0625 6.875C16.6921 6.875 14.4188 7.81663 12.7427 9.49273C11.0666 11.1688 10.125 13.4421 10.125 15.8125C10.125 18.1829 11.0666 20.4562 12.7427 22.1323C14.4188 23.8084 16.6921 24.75 19.0625 24.75C21.4329 24.75 23.7062 23.8084 25.3823 22.1323C27.0584 20.4562 28 18.1829 28 15.8125C28 13.4421 27.0584 11.1688 25.3823 9.49273C23.7062 7.81663 21.4329 6.875 19.0625 6.875ZM28 27.5C28.6875 27.5037 29.3356 27.6219 29.9443 27.8547C28.6077 28.3002 27.4527 29.1472 26.625 30.25H10.125C9.39565 30.25 8.69618 30.5397 8.18046 31.0555C7.66473 31.5712 7.375 32.2707 7.375 33V33.2145L7.39425 33.4428C7.54348 34.761 8.01371 36.0225 8.76375 37.1167C10.103 39.0527 12.9108 41.25 19.0625 41.25C21.6833 41.25 23.699 40.8512 25.25 40.2435V42.625C25.25 42.801 25.2564 42.9752 25.2692 43.1475C23.5588 43.681 21.51 44 19.0625 44C12.1518 44 8.42825 41.47 6.5005 38.6815C5.48547 37.2026 4.85246 35.4954 4.658 33.7122C4.64231 33.5522 4.63131 33.3917 4.625 33.231V33C4.625 31.5413 5.20446 30.1424 6.23591 29.1109C7.26736 28.0795 8.66631 27.5 10.125 27.5H28ZM36.25 17.875C36.25 16.781 36.6846 15.7318 37.4582 14.9582C38.2318 14.1846 39.281 13.75 40.375 13.75C41.469 13.75 42.5182 14.1846 43.2918 14.9582C44.0654 15.7318 44.5 16.781 44.5 17.875C44.5 18.969 44.0654 20.0182 43.2918 20.7918C42.5182 21.5654 41.469 22 40.375 22C39.281 22 38.2318 21.5654 37.4582 20.7918C36.6846 20.0182 36.25 18.969 36.25 17.875ZM40.375 11C38.5516 11 36.803 11.7243 35.5136 13.0136C34.2243 14.303 33.5 16.0516 33.5 17.875C33.5 19.6984 34.2243 21.447 35.5136 22.7364C36.803 24.0257 38.5516 24.75 40.375 24.75C42.1984 24.75 43.947 24.0257 45.2364 22.7364C46.5257 21.447 47.25 19.6984 47.25 17.875C47.25 16.0516 46.5257 14.303 45.2364 13.0136C43.947 11.7243 42.1984 11 40.375 11ZM28 34.375C28 33.281 28.4346 32.2318 29.2082 31.4582C29.9818 30.6846 31.031 30.25 32.125 30.25H48.625C49.719 30.25 50.7682 30.6846 51.5418 31.4582C52.3154 32.2318 52.75 33.281 52.75 34.375V42.625C52.75 43.719 52.3154 44.7682 51.5418 45.5418C50.7682 46.3154 49.719 46.75 48.625 46.75H32.125C31.031 46.75 29.9818 46.3154 29.2082 45.5418C28.4346 44.7682 28 43.719 28 42.625V34.375ZM30.75 34.375V37.125C31.844 37.125 32.8932 36.6904 33.6668 35.9168C34.4404 35.1432 34.875 34.094 34.875 33H32.125C32.125 33.3647 31.9801 33.7144 31.7223 33.9723C31.4644 34.2301 31.1147 34.375 30.75 34.375ZM50 37.125V34.375C49.6353 34.375 49.2856 34.2301 49.0277 33.9723C48.7699 33.7144 48.625 33.3647 48.625 33H45.875C45.875 34.094 46.3096 35.1432 47.0832 35.9168C47.8568 36.6904 48.906 37.125 50 37.125ZM45.875 44H48.625C48.625 43.6353 48.7699 43.2856 49.0277 43.0277C49.2856 42.7699 49.6353 42.625 50 42.625V39.875C48.906 39.875 47.8568 40.3096 47.0832 41.0832C46.3096 41.8568 45.875 42.906 45.875 44ZM30.75 39.875V42.625C31.1147 42.625 31.4644 42.7699 31.7223 43.0277C31.9801 43.2856 32.125 43.6353 32.125 44H34.875C34.875 42.906 34.4404 41.8568 33.6668 41.0832C32.8932 40.3096 31.844 39.875 30.75 39.875ZM40.375 42.625C41.469 42.625 42.5182 42.1904 43.2918 41.4168C44.0654 40.6432 44.5 39.594 44.5 38.5C44.5 37.406 44.0654 36.3568 43.2918 35.5832C42.5182 34.8096 41.469 34.375 40.375 34.375C39.281 34.375 38.2318 34.8096 37.4582 35.5832C36.6846 36.3568 36.25 37.406 36.25 38.5C36.25 39.594 36.6846 40.6432 37.4582 41.4168C38.2318 42.1904 39.281 42.625 40.375 42.625Z"/>
                    </svg>
                    <p class="font-semibold whitespace-nowrap text-sm md:text-base text-accent">Pendanaan</p>
                </a>
            </div>
        </div>
    
        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6">
            <div class="bg-light shadow-xl p-5 rounded-lg flex col-span-2 lg:col-span-3 xl:col-span-2 gap-4 items-center border border-b-6 border-b-success border-gray-50">
                <div class="p-3 rounded-xl bg-success">
                    <img src="{{ asset('assets/icons/moneys.svg') }}" class="w-11 lg:w-13" alt="">
                </div>
                <div class="w-full">
                    <div class="flex gap-2 justify-between w-full mb-1">
                        <h2 class="text-base lg:text-lg font-semibold">Kas Saat Ini</h2>
                        <div class="flex items-center gap-3">
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/icons/edit.svg') }}" class="w-4" alt="">
                                <p class="text-accent text-sm md:text-base">Edit</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/icons/history.svg') }}" class="w-4" alt="">
                                <p class="text-primary text-sm md:text-base">Riwayat</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-xl lg:text-2xl font-bold">Rp 25.900.000</p>
                    <p class="text-danger">-5%</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-success">
                    <img src="{{ asset('assets/icons/chart_up.svg') }}" class="w-8 lg:w-10" alt="">
                </div>
                <h2 class="text-sm md:text-base font-semibold mt-1">Pemasukan Hari Ini</h2>
                <div class="mt-2">
                    <p class="text-lg lg:text-xl font-bold text-center">Rp 850.000</p>
                    <p class="text-sm text-success text-center">10%</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-danger">
                    <img src="{{ asset('assets/icons/chart_down.svg') }}" class="w-8 lg:w-10" alt="">
                </div>
                <h2 class="text-sm md:text-base font-semibold mt-1">Pengeluaran Hari Ini</h2>
                <div class="mt-2">
                    <p class="text-lg lg:text-xl font-bold text-center">Rp 200.000</p>
                    <p class="text-sm text-success text-center">10%</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-primary">
                    <img src="{{ asset('assets/icons/money.svg') }}" class="w-8 lg:w-10" alt="">
                </div>
                <h2 class="text-sm md:text-base font-semibold mt-1">Laba Rugi Hari Ini</h2>
                <div class="mt-2">
                    <p class="text-lg lg:text-xl font-bold text-center">Rp 200.000</p>
                    <p class="text-sm text-success text-center">10%</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-accent">
                    <img src="{{ asset('assets/icons/moneys.svg') }}" class="w-8 lg:w-10" alt="">
                </div>
                <h2 class="text-sm md:text-base font-semibold mt-1">Laba Rugi Bulan Ini</h2>
                <div class="mt-2">
                    <p class="text-lg lg:text-xl font-bold text-center">Rp 30.00.000</p>
                    <p class="text-sm text-danger text-center">-10%</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-primary">
                    <img src="{{ asset('assets/icons/shopping.svg') }}" class="w-8 lg:w-10" alt="">
                </div>
                <h2 class="text-sm md:text-base font-semibold mt-1">Jumlah Barang</h2>
                <div class="mt-2">
                    <p class="text-lg lg:text-xl font-bold text-center">120</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-accent">
                    <img src="{{ asset('assets/icons/service.svg') }}" class="w-8 lg:w-10" alt="">
                </div>
                <h2 class="text-sm md:text-base font-semibold mt-1">Jumlah Jasa</h2>
                <div class="mt-2">
                    <p class="text-lg lg:text-xl font-bold text-center">9</p>
                </div>
            </div>
            <div class="bg-light col-span-2 lg:col-span-3 xl:col-span-2 shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-primary">
                    <img src="{{ asset('assets/icons/rocket_box.svg') }}" class="w-8 lg:w-10" alt="">
                </div>
                <h2 class="text-sm md:text-base font-semibold mt-1">Produk Terlaris</h2>
                <p class="text-sm text-center">7 hari terakhir</p>
                <p class="text-lg lg:text-xl font-bold text-center mt-2">Ice Coffe</p>
            </div>
            <div class="bg-light col-span-2 lg:col-span-3 xl:col-span-2 shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-accent">
                    <img src="{{ asset('assets/icons/clock_dering.svg') }}" class="w-8 lg:w-10" alt="">
                </div>
                <h2 class="text-sm md:text-base font-semibold mt-1">Jam Tersibuk</h2>
                <p class="text-sm text-center">7 hari terakhir</p>
                <p class="text-lg lg:text-xl font-bold text-center mt-2">14:00</p>
            </div>
        </div>
    
        <div class="mt-6 bg-accent rounded-xl px-7 py-4 text-light">
            <h1 class="text-lg lg:text-xl font-semibold">Optimalkan Hari Sepi</h1>
            <p class="mt-2">Penjualan cenderung turun setiap <span class="font-bold">hari Kamis</span>. Coba dorong diskon terbatas atau campaign tematik untuk menarik pelanggan.</p>
        </div>
    
        <div x-data="chartLabaRugi()" x-init="initChart()" class="my-10">
            <h1 class="font-semibold text-base lg:text-lg text-center mb-5">Chart Laba Rugi</h1>
            <canvas id="lineLabaRugi" height="150"></canvas>
        </div>
    
        <div class="mt-6">
            <h1 class="font-semibold text-xl lg:text-2xl">Akses Cepat ke <span class="text-primary">Fitur Unggulan</span></h1>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-4">
                    <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-primary text-light w-full rounded-xl shadow-xl items-center justify-center">
                        <img src="{{ asset('assets/icons/forum.svg') }}" class="w-13" alt="">
                        <p>Forum</p>
                    </a>
                    <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-accent text-light w-full rounded-xl shadow-xl items-center justify-center">
                        <img src="{{ asset('assets/icons/user_reading.svg') }}" class="w-13" alt="">
                        <p>Pembelajaran</p>
                    </a>
                    <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-primary text-light w-full rounded-xl shadow-xl items-center justify-center">
                        <img src="{{ asset('assets/icons/products.svg') }}" class="w-13" alt="">
                        <p>Produk</p>
                    </a>
                    <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-accent text-light w-full rounded-xl shadow-xl items-center justify-center">
                        <img src="{{ asset('assets/icons/pos.svg') }}" class="w-13" alt="">
                        <p>Poin of Sales</p>
                    </a>
                    <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-primary text-light w-full rounded-xl shadow-xl items-center justify-center">
                        <img src="{{ asset('assets/icons/order_edit.svg') }}" class="w-13" alt="">
                        <p>Pre Order</p>
                    </a>
                    <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-accent text-light w-full rounded-xl shadow-xl items-center justify-center">
                        <img src="{{ asset('assets/icons/docs.svg') }}" class="w-13" alt="">
                        <p>Pembukuan</p>
                    </a>
                    <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-primary text-light w-full rounded-xl shadow-xl items-center justify-center">
                        <img src="{{ asset('assets/icons/doc.svg') }}" class="w-13" alt="">
                        <p>Laporan</p>
                    </a>
                    <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-accent text-light w-full rounded-xl shadow-xl items-center justify-center">
                        <img src="{{ asset('assets/icons/people_money.svg') }}" class="w-13" alt="">
                        <p>Pendanaan</p>
                    </a>
                </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function chartLabaRugi() {
            return {
                labels: [
                    '10/10/2025', '11/10/2025', '12/10/2025',
                    '13/10/2025', '14/10/2025', '15/10/2025', '16/10/2025'
                ],
                labaRugiData: [
                    470000, 540000, 510000, 520000,
                    580000, 530000, 650000
                ],

                initChart() {
                    const ctx = document.getElementById('lineLabaRugi').getContext('2d');

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: this.labels,
                            datasets: [{
                                label: 'Laba Rugi',
                                data: this.labaRugiData,
                                fill: false,
                                borderColor: '#2563eb',
                                backgroundColor: '#2563eb',
                                pointBackgroundColor: '#2563eb',
                                tension: 0.3,
                                pointRadius: 6,
                                pointHoverRadius: 7
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                    labels: {
                                        font: {
                                            size: 14
                                        }
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const value = context.raw.toLocaleString('id-ID');
                                            return `Rp ${value}`;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: false,
                                    ticks: {
                                        callback: function(value) {
                                            return value.toLocaleString('id-ID');
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            }
        }
    </script>
@endsection