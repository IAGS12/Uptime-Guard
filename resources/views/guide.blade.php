<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="eyebrow">Dokumentasi</p>
            <h2 class="font-black text-2xl" style="color: var(--md-text)">Panduan Pengguna UptimeGuard</h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- Navigasi Cepat --}}
            <div class="surface-card p-6">
                <h3 class="text-sm font-bold mb-4" style="color: var(--md-text)">
                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                    Daftar Isi
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                    <a href="#overview" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/5 transition" style="color: var(--md-primary)">
                        <span class="w-6 h-6 rounded-full bg-yellow-400/10 flex items-center justify-center text-xs font-bold" style="color: var(--md-primary)">1</span>
                        Apa itu UptimeGuard?
                    </a>
                    <a href="#target" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/5 transition" style="color: var(--md-primary)">
                        <span class="w-6 h-6 rounded-full bg-yellow-400/10 flex items-center justify-center text-xs font-bold" style="color: var(--md-primary)">2</span>
                        Mengelola Target
                    </a>
                    <a href="#detail" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/5 transition" style="color: var(--md-primary)">
                        <span class="w-6 h-6 rounded-full bg-yellow-400/10 flex items-center justify-center text-xs font-bold" style="color: var(--md-primary)">3</span>
                        Detail & Grafik Target
                    </a>
                    <a href="#notifikasi" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/5 transition" style="color: var(--md-primary)">
                        <span class="w-6 h-6 rounded-full bg-yellow-400/10 flex items-center justify-center text-xs font-bold" style="color: var(--md-primary)">4</span>
                        Notifikasi (Telegram & Discord)
                    </a>
                    <a href="#statuspage" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/5 transition" style="color: var(--md-primary)">
                        <span class="w-6 h-6 rounded-full bg-yellow-400/10 flex items-center justify-center text-xs font-bold" style="color: var(--md-primary)">5</span>
                        Halaman Status Publik
                    </a>
                    <a href="#laporan" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/5 transition" style="color: var(--md-primary)">
                        <span class="w-6 h-6 rounded-full bg-yellow-400/10 flex items-center justify-center text-xs font-bold" style="color: var(--md-primary)">6</span>
                        Laporan & Export
                    </a>
                    <a href="#istilah" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/5 transition" style="color: var(--md-primary)">
                        <span class="w-6 h-6 rounded-full bg-yellow-400/10 flex items-center justify-center text-xs font-bold" style="color: var(--md-primary)">7</span>
                        Glosarium Istilah
                    </a>
                    <a href="#faq" class="flex items-center gap-2 p-2 rounded-lg hover:bg-white/5 transition" style="color: var(--md-primary)">
                        <span class="w-6 h-6 rounded-full bg-yellow-400/10 flex items-center justify-center text-xs font-bold" style="color: var(--md-primary)">8</span>
                        FAQ
                    </a>
                </div>
            </div>

            {{-- 1. Overview --}}
            <div id="overview" class="surface-card p-6 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="metric-icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div>
                    <h3 class="text-lg font-bold" style="color: var(--md-text)">Apa itu UptimeGuard?</h3>
                </div>
                <p class="text-sm leading-relaxed" style="color: var(--md-text-soft)">
                    <strong>UptimeGuard</strong> adalah aplikasi monitoring server yang memantau ketersediaan (uptime) website, API, dan server Anda secara otomatis dan berkala. Ketika server Anda down, UptimeGuard akan segera mengirimkan notifikasi ke Telegram atau Discord agar Anda bisa bertindak cepat.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                    <div class="rounded-lg border p-4 text-center" style="border-color: var(--md-border); background: var(--md-surface-soft)">
                        <div class="text-2xl font-black" style="color: var(--md-success)">✓</div>
                        <div class="text-xs font-bold mt-1" style="color: var(--md-text)">Monitoring Otomatis</div>
                        <div class="text-xs mt-1" style="color: var(--md-muted)">HTTP, HTTPS, TCP</div>
                    </div>
                    <div class="rounded-lg border p-4 text-center" style="border-color: var(--md-border); background: var(--md-surface-soft)">
                        <div class="text-2xl font-black" style="color: var(--md-primary)">⚡</div>
                        <div class="text-xs font-bold mt-1" style="color: var(--md-text)">Alert Instan</div>
                        <div class="text-xs mt-1" style="color: var(--md-muted)">Telegram & Discord</div>
                    </div>
                    <div class="rounded-lg border p-4 text-center" style="border-color: var(--md-border); background: var(--md-surface-soft)">
                        <div class="text-2xl font-black" style="color: var(--md-text)">📊</div>
                        <div class="text-xs font-bold mt-1" style="color: var(--md-text)">Laporan Lengkap</div>
                        <div class="text-xs mt-1" style="color: var(--md-muted)">Uptime, SSL, Incident</div>
                    </div>
                </div>
            </div>

            {{-- 2. Mengelola Target --}}
            <div id="target" class="surface-card p-6 space-y-5">
                <div class="flex items-center gap-3">
                    <div class="metric-icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"/></svg></div>
                    <h3 class="text-lg font-bold" style="color: var(--md-text)">Mengelola Target</h3>
                </div>
                <p class="text-sm" style="color: var(--md-text-soft)">Target adalah server, website, atau layanan yang ingin Anda pantau. Anda bisa menambahkan target dari halaman <strong>Dashboard</strong>.</p>

                <h4 class="text-sm font-bold pt-2" style="color: var(--md-text)">📋 Cara Menambah Target</h4>
                <ol class="list-decimal pl-5 space-y-2 text-sm" style="color: var(--md-text-soft)">
                    <li>Buka halaman <strong>Dashboard</strong>, klik tombol <strong>"Tambah Target"</strong>.</li>
                    <li>Isi form yang muncul sesuai panduan kolom di bawah.</li>
                    <li>Klik <strong>"Simpan Target"</strong>. Target akan langsung mulai dipantau.</li>
                </ol>

                <h4 class="text-sm font-bold pt-2" style="color: var(--md-text)">📝 Penjelasan Kolom Form</h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm" style="color: var(--md-text-soft)">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <th class="text-left py-2 pr-4 font-bold" style="color: var(--md-text)">Kolom</th>
                                <th class="text-left py-2 pr-4 font-bold" style="color: var(--md-text)">Keterangan</th>
                                <th class="text-left py-2 font-bold" style="color: var(--md-text)">Contoh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">Nama Target</td>
                                <td class="py-2 pr-4">Nama bebas untuk mengenali server Anda</td>
                                <td class="py-2"><code class="text-xs px-2 py-0.5 rounded" style="background: var(--md-surface-soft)">Server Production</code></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">Protocol</td>
                                <td class="py-2 pr-4"><strong>HTTPS</strong> (website SSL), <strong>HTTP</strong> (tanpa SSL), atau <strong>TCP</strong> (cek port saja)</td>
                                <td class="py-2"><code class="text-xs px-2 py-0.5 rounded" style="background: var(--md-surface-soft)">HTTPS</code></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">Host</td>
                                <td class="py-2 pr-4">Domain atau IP server. <strong>Harus</strong> memiliki ekstensi seperti .com, .co.id</td>
                                <td class="py-2"><code class="text-xs px-2 py-0.5 rounded" style="background: var(--md-surface-soft)">myapp.com</code></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">Port</td>
                                <td class="py-2 pr-4">Opsional. Default: 443 (HTTPS), 80 (HTTP). Isi jika menggunakan port khusus</td>
                                <td class="py-2"><code class="text-xs px-2 py-0.5 rounded" style="background: var(--md-surface-soft)">8080</code></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">Interval Cek</td>
                                <td class="py-2 pr-4">Seberapa sering server dicek (dalam detik). Minimum 10 detik</td>
                                <td class="py-2"><code class="text-xs px-2 py-0.5 rounded" style="background: var(--md-surface-soft)">300</code> <span class="text-xs">(= 5 menit)</span></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">Timeout</td>
                                <td class="py-2 pr-4">Batas waktu tunggu respon server (1–30 detik)</td>
                                <td class="py-2"><code class="text-xs px-2 py-0.5 rounded" style="background: var(--md-surface-soft)">5</code></td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">Alert Threshold</td>
                                <td class="py-2 pr-4">Jumlah kegagalan berturut-turut sebelum dianggap <strong>DOWN</strong> dan notifikasi dikirim</td>
                                <td class="py-2"><code class="text-xs px-2 py-0.5 rounded" style="background: var(--md-surface-soft)">3</code></td>
                            </tr>
                            <tr>
                                <td class="py-2 pr-4 font-medium">Grup</td>
                                <td class="py-2 pr-4">Opsional. Untuk mengelompokkan target (misal: Production, Staging)</td>
                                <td class="py-2"><code class="text-xs px-2 py-0.5 rounded" style="background: var(--md-surface-soft)">Production</code></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="text-sm font-bold pt-2" style="color: var(--md-text)">⚙️ Aksi pada Target</h4>
                <div class="space-y-3 text-sm" style="color: var(--md-text-soft)">
                    <div class="flex items-start gap-3 p-3 rounded-lg" style="background: var(--md-surface-soft)">
                        <span class="shrink-0 mt-0.5">📈</span>
                        <div><strong style="color: var(--md-text)">Detail & Grafik</strong> — Melihat grafik response time 24 jam, statistik uptime, dan riwayat insiden.</div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-lg" style="background: var(--md-surface-soft)">
                        <span class="shrink-0 mt-0.5">✏️</span>
                        <div><strong style="color: var(--md-text)">Edit Target</strong> — Mengubah konfigurasi target (host, interval, timeout, dll).</div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-lg" style="background: var(--md-surface-soft)">
                        <span class="shrink-0 mt-0.5">⏸️</span>
                        <div><strong style="color: var(--md-text)">Jeda / Resume</strong> — Menghentikan sementara monitoring tanpa menghapus data. Berguna saat maintenance.</div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-lg" style="background: var(--md-surface-soft)">
                        <span class="shrink-0 mt-0.5">🗑️</span>
                        <div><strong style="color: var(--md-text)">Hapus Target</strong> — Menghapus target beserta seluruh log dan data insiden.</div>
                    </div>
                </div>
            </div>

            {{-- 3. Detail & Grafik --}}
            <div id="detail" class="surface-card p-6 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="metric-icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/></svg></div>
                    <h3 class="text-lg font-bold" style="color: var(--md-text)">Detail & Grafik Target</h3>
                </div>
                <p class="text-sm" style="color: var(--md-text-soft)">Klik ikon grafik pada target di dashboard untuk melihat halaman detail.</p>

                <div class="space-y-3 text-sm" style="color: var(--md-text-soft)">
                    <div class="flex items-start gap-3 p-3 rounded-lg" style="background: var(--md-surface-soft)">
                        <span class="shrink-0 mt-0.5">📊</span>
                        <div><strong style="color: var(--md-text)">Grafik Response Time</strong> — Menampilkan waktu respon server dalam 24 jam terakhir. Warna hijau = cepat (&lt;200ms), kuning = sedang, merah = lambat (&gt;800ms).</div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-lg" style="background: var(--md-surface-soft)">
                        <span class="shrink-0 mt-0.5">📈</span>
                        <div><strong style="color: var(--md-text)">Statistik Uptime</strong> — Persentase ketersediaan server dalam 24 jam, 7 hari, dan 30 hari terakhir. Angka 100% artinya server tidak pernah down selama periode tersebut.</div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-lg" style="background: var(--md-surface-soft)">
                        <span class="shrink-0 mt-0.5">🔒</span>
                        <div><strong style="color: var(--md-text)">SSL Certificate</strong> — Untuk target HTTPS, menampilkan sisa hari sebelum sertifikat SSL kedaluwarsa. Jika &lt;14 hari, akan berwarna kuning sebagai peringatan.</div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-lg" style="background: var(--md-surface-soft)">
                        <span class="shrink-0 mt-0.5">🚨</span>
                        <div><strong style="color: var(--md-text)">Riwayat Insiden</strong> — Daftar kejadian DOWN beserta waktu mulai, waktu pulih, dan durasi downtime.</div>
                    </div>
                </div>
            </div>

            {{-- 4. Notifikasi --}}
            <div id="notifikasi" class="surface-card p-6 space-y-5">
                <div class="flex items-center gap-3">
                    <div class="metric-icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0a3 3 0 11-6 0m6 0H9"/></svg></div>
                    <h3 class="text-lg font-bold" style="color: var(--md-text)">Notifikasi (Telegram & Discord)</h3>
                </div>
                <p class="text-sm" style="color: var(--md-text-soft)">
                    UptimeGuard mengirimkan notifikasi otomatis saat server Anda mengalami masalah. Buka menu <strong>Notifikasi</strong> di navigasi untuk mengaturnya.
                </p>

                {{-- Telegram --}}
                <div class="rounded-lg border p-5 space-y-3" style="border-color: var(--md-border); background: var(--md-surface-soft)">
                    <h4 class="text-sm font-bold flex items-center gap-2" style="color: var(--md-text)">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69a.2.2 0 00-.05-.18c-.06-.05-.14-.03-.21-.02-.09.02-1.49.95-4.22 2.79-.4.27-.76.41-1.08.4-.36-.01-1.04-.2-1.55-.37-.63-.2-1.12-.31-1.08-.66.02-.18.27-.36.74-.55 2.92-1.27 4.86-2.11 5.83-2.51 2.78-1.16 3.35-1.36 3.73-1.36.08 0 .27.02.39.12.1.08.13.19.14.27-.01.06.01.24 0 .38z"/></svg>
                        Setup Bot Telegram
                    </h4>
                    <ol class="list-decimal pl-5 space-y-2 text-sm" style="color: var(--md-text-soft)">
                        <li>Buka Telegram, cari <strong>@BotFather</strong>, lalu kirim perintah <code class="text-xs px-1.5 py-0.5 rounded" style="background: var(--md-surface)">/newbot</code>.</li>
                        <li>Ikuti instruksi BotFather. Anda akan mendapatkan <strong>Bot Token</strong> (contoh: <code class="text-xs px-1.5 py-0.5 rounded" style="background: var(--md-surface)">1234567890:AAFxxx...</code>).</li>
                        <li>Buka menu <strong>Notifikasi</strong> di UptimeGuard, isi Nama Channel dan paste Bot Token.</li>
                        <li>Klik tombol <strong>"Ambil"</strong>. Jika muncul panel kuning "Satu langkah lagi!", klik <strong>"Buka Bot di Telegram"</strong>.</li>
                        <li>Di Telegram, tekan tombol <strong>Start</strong> pada bot Anda.</li>
                        <li>Kembali ke UptimeGuard, klik <strong>"Ambil"</strong> lagi. Chat ID akan terisi otomatis.</li>
                        <li>Klik <strong>"Simpan Channel"</strong>, lalu klik <strong>"Test"</strong> untuk mengirim pesan uji coba.</li>
                    </ol>
                </div>

                {{-- Discord --}}
                <div class="rounded-lg border p-5 space-y-3" style="border-color: var(--md-border); background: var(--md-surface-soft)">
                    <h4 class="text-sm font-bold flex items-center gap-2" style="color: var(--md-text)">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.317 4.37a19.791 19.791 0 00-4.885-1.515.074.074 0 00-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 00-5.487 0 12.64 12.64 0 00-.617-1.25.077.077 0 00-.079-.037A19.736 19.736 0 003.677 4.37a.07.07 0 00-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 00.031.057 19.9 19.9 0 005.993 3.03.078.078 0 00.084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 00-.041-.106 13.107 13.107 0 01-1.872-.892.077.077 0 01-.008-.128 10.2 10.2 0 00.372-.292.074.074 0 01.077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 01.078.01c.12.098.246.198.373.292a.077.077 0 01-.006.127 12.299 12.299 0 01-1.873.892.077.077 0 00-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 00.084.028 19.839 19.839 0 006.002-3.03.077.077 0 00.032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 00-.031-.03z"/></svg>
                        Setup Discord Webhook
                    </h4>
                    <ol class="list-decimal pl-5 space-y-2 text-sm" style="color: var(--md-text-soft)">
                        <li>Buka Discord, masuk ke <strong>Server Settings → Integrations → Webhooks</strong>.</li>
                        <li>Klik <strong>"New Webhook"</strong>, pilih channel tujuan, lalu salin <strong>Webhook URL</strong>.</li>
                        <li>Di UptimeGuard, pilih tipe <strong>Discord</strong>, paste Webhook URL, lalu simpan.</li>
                        <li>Klik <strong>"Test"</strong> untuk mengirim pesan uji coba ke channel Discord.</li>
                    </ol>
                </div>

                <h4 class="text-sm font-bold pt-2" style="color: var(--md-text)">🔔 Kapan Notifikasi Dikirim?</h4>
                <div class="space-y-2 text-sm" style="color: var(--md-text-soft)">
                    <div class="flex items-start gap-2">
                        <span class="status-dot status-down shrink-0 mt-1.5"></span>
                        <div><strong>Server DOWN</strong> — Dikirim ketika kegagalan berturut-turut mencapai Alert Threshold yang ditentukan.</div>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="status-dot status-up shrink-0 mt-1.5"></span>
                        <div><strong>Server RECOVERED</strong> — Dikirim ketika server kembali online setelah down (jika opsi "Kirim notifikasi saat recovered" diaktifkan di pengaturan target).</div>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="status-dot status-warning shrink-0 mt-1.5"></span>
                        <div><strong>SSL Expiring</strong> — Dikirim ketika sertifikat SSL akan kedaluwarsa dalam 14 hari.</div>
                    </div>
                </div>
            </div>

            {{-- 5. Status Page --}}
            <div id="statuspage" class="surface-card p-6 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="metric-icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg></div>
                    <h3 class="text-lg font-bold" style="color: var(--md-text)">Halaman Status Publik</h3>
                </div>
                <p class="text-sm" style="color: var(--md-text-soft)">
                    Setiap akun memiliki <strong>halaman status publik</strong> yang bisa dibagikan ke pelanggan atau tim Anda. Halaman ini bisa diakses tanpa login dan menampilkan status terkini semua target yang Anda pantau.
                </p>
                <p class="text-sm" style="color: var(--md-text-soft)">
                    Akses halaman status publik Anda melalui tombol <strong>"Halaman Status Publik"</strong> di kanan atas Dashboard.
                </p>
            </div>

            {{-- 6. Laporan --}}
            <div id="laporan" class="surface-card p-6 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="metric-icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></div>
                    <h3 class="text-lg font-bold" style="color: var(--md-text)">Laporan & Export CSV</h3>
                </div>
                <p class="text-sm" style="color: var(--md-text-soft)">
                    Menu <strong>Laporan</strong> di navigasi menampilkan ringkasan performa semua target Anda dalam satu halaman. Anda bisa melihat statistik uptime dan data insiden secara keseluruhan.
                </p>
                <p class="text-sm" style="color: var(--md-text-soft)">
                    Gunakan tombol <strong>"Export CSV"</strong> untuk mengunduh data laporan dalam format spreadsheet yang bisa dibuka di Excel atau Google Sheets. Data ini berguna untuk pelaporan ke manajemen atau arsip bulanan.
                </p>
            </div>

            {{-- 7. Glosarium --}}
            <div id="istilah" class="surface-card p-6 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="metric-icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></div>
                    <h3 class="text-lg font-bold" style="color: var(--md-text)">Glosarium Istilah</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm" style="color: var(--md-text-soft)">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <th class="text-left py-2 pr-4 font-bold" style="color: var(--md-text)">Istilah</th>
                                <th class="text-left py-2 font-bold" style="color: var(--md-text)">Penjelasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">Uptime</td>
                                <td class="py-2">Persentase waktu server dalam kondisi online/tersedia. 99.9% berarti downtime ~43 menit per bulan.</td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">Response Time</td>
                                <td class="py-2">Waktu yang dibutuhkan server untuk merespon (dalam milidetik). Semakin kecil semakin baik.</td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">SSL Certificate</td>
                                <td class="py-2">Sertifikat keamanan HTTPS. Jika kedaluwarsa, browser akan menampilkan peringatan "Not Secure".</td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">Alert Threshold</td>
                                <td class="py-2">Jumlah kegagalan berturut-turut sebelum server dianggap DOWN. Mencegah false alarm dari gangguan sementara.</td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">Incident</td>
                                <td class="py-2">Kejadian saat server terdeteksi DOWN. Tercatat waktu mulai dan waktu pulihnya.</td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--md-border)">
                                <td class="py-2 pr-4 font-medium">TCP</td>
                                <td class="py-2">Protocol untuk mengecek apakah port tertentu bisa diakses (misal: database, game server).</td>
                            </tr>
                            <tr>
                                <td class="py-2 pr-4 font-medium">Webhook</td>
                                <td class="py-2">URL khusus yang menerima pesan otomatis dari UptimeGuard (digunakan oleh Discord).</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 8. FAQ --}}
            <div id="faq" class="surface-card p-6 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="metric-icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
                    <h3 class="text-lg font-bold" style="color: var(--md-text)">FAQ (Pertanyaan Umum)</h3>
                </div>

                <div class="space-y-4" x-data="{ openFaq: null }">
                    @php
                        $faqs = [
                            ['q' => 'Kenapa uptime langsung 100% saat target baru ditambahkan?', 'a' => 'Uptime dihitung dari rasio cek berhasil vs total cek. Jika baru 1 kali dicek dan hasilnya UP, maka 1/1 = 100%. Angka akan semakin akurat seiring waktu.'],
                            ['q' => 'Apa bedanya status "Unstable" dan "Down"?', 'a' => 'Unstable berarti server kadang merespon kadang tidak (belum mencapai Alert Threshold). Down berarti kegagalan sudah melewati batas Alert Threshold yang ditentukan.'],
                            ['q' => 'Apakah monitoring tetap berjalan saat saya tidak buka dashboard?', 'a' => 'Ya! Monitoring berjalan otomatis di background. Anda tidak perlu membuka dashboard agar monitoring aktif.'],
                            ['q' => 'Berapa banyak target yang bisa saya pantau?', 'a' => 'Tidak ada batasan jumlah target. Namun semakin banyak target dengan interval pendek, semakin besar beban server.'],
                            ['q' => 'Apakah bisa memonitor server internal/lokal (localhost)?', 'a' => 'Tidak. UptimeGuard hanya bisa memonitor server yang bisa diakses dari internet publik (memiliki domain atau IP publik).'],
                            ['q' => 'Chat ID Telegram tidak ditemukan, apa yang harus dilakukan?', 'a' => 'Pastikan Anda sudah membuka bot di Telegram dan menekan tombol "Start" atau mengirim /start. Setelah itu, klik "Ambil" lagi di UptimeGuard.'],
                            ['q' => 'Bagaimana cara mengaktifkan notifikasi recovery?', 'a' => 'Buka halaman Edit Target, centang opsi "Kirim notifikasi saat server kembali online (RECOVERED)", lalu simpan.'],
                        ];
                    @endphp
                    @foreach($faqs as $i => $faq)
                        <div class="rounded-lg border overflow-hidden" style="border-color: var(--md-border)">
                            <button @click="openFaq = openFaq === {{ $i }} ? null : {{ $i }}" class="w-full flex items-center justify-between p-4 text-left text-sm font-medium transition hover:bg-white/5" style="color: var(--md-text)">
                                <span>{{ $faq['q'] }}</span>
                                <svg class="w-4 h-4 shrink-0 transition-transform duration-200" :class="openFaq === {{ $i }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="openFaq === {{ $i }}" x-cloak x-collapse class="px-4 pb-4 text-sm" style="color: var(--md-text-soft)">
                                {{ $faq['a'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center text-xs py-4" style="color: var(--md-muted)">
                UptimeGuard — Monitoring server Anda, 24/7.
            </div>

        </div>
    </div>
</x-app-layout>
