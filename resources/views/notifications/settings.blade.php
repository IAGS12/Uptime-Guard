<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="eyebrow">Alert Routing</p>
            <h2 class="font-black text-2xl" style="color: var(--md-text)">Pengaturan Notifikasi</h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="surface-card p-4 text-sm font-medium" style="color: var(--md-success)">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="surface-card p-4 text-sm font-medium" style="color: var(--md-danger)">{{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="surface-card p-4 text-sm" style="color: var(--md-danger)">
                    <div class="font-bold mb-2">Form belum bisa disimpan.</div>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="surface-card-soft p-5 text-sm">
                <div class="flex items-start gap-3">
                    <div class="metric-icon shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0a3 3 0 11-6 0m6 0H9"/></svg>
                    </div>
                    <div>
                        <p class="font-bold mb-2" style="color: var(--md-text)">Cara setup Bot Telegram pribadi</p>
                        <ol class="list-decimal pl-5 space-y-1" style="color: var(--md-text-soft)">
                            <li>Buka Telegram, cari <strong>@BotFather</strong>, lalu kirim <code>/newbot</code>.</li>
                            <li>Ikuti instruksi dan simpan <strong>Bot Token</strong>.</li>
                            <li>Cari bot Anda, klik <strong>Start</strong> atau kirim <code>/start</code>.</li>
                            <li>Paste token di form, lalu klik <strong>Ambil Chat ID</strong>.</li>
                            <li>Jika Chat ID sudah terisi, simpan channel lalu klik <strong>Test</strong>.</li>
                        </ol>
                    </div>
                </div>
            </div>

            @if($channels->isNotEmpty())
                <div class="surface-card overflow-hidden">
                    <div class="px-6 py-4 border-b" style="border-color: var(--md-border)">
                        <h3 class="text-sm font-bold" style="color: var(--md-text)">Channel Aktif</h3>
                    </div>
                    <div>
                        @foreach($channels as $channel)
                            <div class="px-6 py-4 border-t flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between" style="border-color: var(--md-border)">
                                <div class="flex items-center gap-3">
                                    <span class="status-dot {{ $channel->is_active ? 'status-up' : 'status-muted' }}"></span>
                                    <div>
                                        <div class="text-sm font-bold" style="color: var(--md-text)">{{ $channel->name }}</div>
                                        <div class="text-xs" style="color: var(--md-muted)">{{ $channel->typeLabel() }}
                                            @if($channel->last_tested_at)
                                                - Test terakhir: {{ $channel->last_tested_at->diffForHumans() }}
                                                <span class="{{ $channel->last_test_passed ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-600 dark:text-red-400' }}">
                                                    {{ $channel->last_test_passed ? 'Berhasil' : 'Gagal' }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 shrink-0">
                                    <form action="{{ route('notifications.test', $channel->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="md-button md-button-secondary py-2 px-4">Test</button>
                                    </form>
                                    <form action="{{ route('notifications.toggle', $channel->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="md-button md-button-secondary py-2 px-4">
                                            {{ $channel->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('notifications.destroy', $channel->id) }}" method="POST"
                                          onsubmit="return confirm('Hapus channel ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="md-icon-button text-red-600 dark:text-red-400" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div
                x-data="{
                    type: @js(old('type', 'telegram')),
                    telegramToken: @js(old('telegram_bot_token', '')),
                    telegramChatId: @js(old('telegram_chat_id', '')),
                    telegramChats: [],
                    lookupLoading: false,
                    lookupMessage: '',
                    lookupError: false,
                    lookupNeedsStart: false,
                    botLink: '',
                    async lookupTelegramChats() {
                        this.lookupLoading = true;
                        this.lookupMessage = '';
                        this.lookupError = false;
                        this.lookupNeedsStart = false;
                        this.botLink = '';
                        this.telegramChats = [];

                        try {
                            const response = await axios.post('{{ route('notifications.telegram.lookup') }}', {
                                telegram_bot_token: this.telegramToken,
                            });

                            this.telegramToken = response.data.token || this.telegramToken;
                            this.telegramChats = response.data.chats || [];
                            this.lookupMessage = response.data.message || 'Chat ID ditemukan.';

                            if (response.data.status === 'needs_start') {
                                this.lookupNeedsStart = true;
                                this.botLink = response.data.bot_link || '';
                            } else if (this.telegramChats.length === 1) {
                                this.telegramChatId = this.telegramChats[0].id;
                            }
                        } catch (error) {
                            this.lookupError = true;
                            this.lookupMessage = error.response?.data?.message || 'Gagal mengambil Chat ID.';
                        } finally {
                            this.lookupLoading = false;
                        }
                    },
                    selectTelegramChat(event) {
                        this.telegramChatId = event.target.value;
                    }
                }"
                class="surface-card p-6"
            >
                <h3 class="text-sm font-bold mb-5" style="color: var(--md-text)">Tambah Channel Baru</h3>
                <form action="{{ route('notifications.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold mb-1" style="color: var(--md-text-soft)">Nama Channel</label>
                            <input type="text" name="name" required value="{{ old('name') }}" placeholder="Bot Pribadi Saya" class="monitor-input w-full text-sm">
                            @error('name')<p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold mb-1" style="color: var(--md-text-soft)">Tipe</label>
                            <select name="type" x-model="type" class="monitor-select w-full text-sm">
                                <option value="telegram">Telegram</option>
                                <option value="discord">Discord</option>
                            </select>
                            @error('type')<p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div x-show="type === 'telegram'" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold mb-1" style="color: var(--md-text-soft)">Bot Token</label>
                            <input type="text" name="telegram_bot_token" x-model="telegramToken" placeholder="1234567890:AAFxxx..." class="monitor-input w-full text-sm font-mono">
                            @error('telegram_bot_token')<p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold mb-1" style="color: var(--md-text-soft)">Chat ID</label>
                            <div class="flex gap-2">
                                <input type="text" name="telegram_chat_id" x-model="telegramChatId" placeholder="6675720507" class="monitor-input w-full text-sm font-mono">
                                <button type="button" @click="lookupTelegramChats" class="md-button md-button-secondary shrink-0 px-4" :disabled="lookupLoading || !telegramToken">
                                    <span x-show="!lookupLoading">Ambil</span>
                                    <span x-show="lookupLoading">Cek...</span>
                                </button>
                            </div>
                            @error('telegram_chat_id')<p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>
                        {{-- Needs Start: panduan buka bot --}}
                        <div x-show="lookupNeedsStart" x-cloak class="md:col-span-2 rounded-lg border px-4 py-4 text-sm space-y-3" style="border-color: #d97706; background: rgba(217, 119, 6, 0.08);">
                            <div class="flex items-start gap-2">
                                <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="#d97706" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <div>
                                    <p class="font-bold" style="color: #d97706;">Satu langkah lagi!</p>
                                    <p style="color: var(--md-text-soft);" x-text="lookupMessage"></p>
                                </div>
                            </div>
                            <div class="flex flex-wrap items-center gap-2">
                                <a :href="botLink" target="_blank" rel="noopener" class="md-button md-button-secondary inline-flex items-center gap-2 py-2 px-4 text-sm" style="border-color: #d97706; color: #d97706;">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69a.2.2 0 00-.05-.18c-.06-.05-.14-.03-.21-.02-.09.02-1.49.95-4.22 2.79-.4.27-.76.41-1.08.4-.36-.01-1.04-.2-1.55-.37-.63-.2-1.12-.31-1.08-.66.02-.18.27-.36.74-.55 2.92-1.27 4.86-2.11 5.83-2.51 2.78-1.16 3.35-1.36 3.73-1.36.08 0 .27.02.39.12.1.08.13.19.14.27-.01.06.01.24 0 .38z"/></svg>
                                    Buka Bot di Telegram
                                </a>
                                <span class="text-xs" style="color: var(--md-muted);">Tekan <strong>Start</strong> di bot, lalu kembali ke sini dan klik <strong>"Ambil"</strong> lagi.</span>
                            </div>
                        </div>

                        {{-- Pesan sukses atau error biasa --}}
                        <div x-show="lookupMessage && !lookupNeedsStart" x-cloak class="md:col-span-2 rounded-lg border px-4 py-3 text-sm" :class="lookupError ? 'text-red-600 dark:text-red-400' : 'text-emerald-600 dark:text-emerald-400'" style="border-color: var(--md-border); background: var(--md-surface-soft)">
                            <span x-text="lookupMessage"></span>
                        </div>
                        <div x-show="telegramChats.length > 1" x-cloak class="md:col-span-2">
                            <label class="block text-xs font-bold mb-1" style="color: var(--md-text-soft)">Pilih Chat</label>
                            <select @change="selectTelegramChat" class="monitor-select w-full text-sm">
                                <option value="">Pilih Chat ID</option>
                                <template x-for="chat in telegramChats" :key="chat.id">
                                    <option :value="chat.id" x-text="`${chat.title} (${chat.type}) - ${chat.id}`"></option>
                                </template>
                            </select>
                        </div>
                    </div>

                    <div x-show="type === 'discord'" x-cloak>
                        <label class="block text-xs font-bold mb-1" style="color: var(--md-text-soft)">Webhook URL</label>
                        <input type="url" name="discord_webhook_url" value="{{ old('discord_webhook_url') }}" placeholder="https://discord.com/api/webhooks/..." class="monitor-input w-full text-sm font-mono">
                        @error('discord_webhook_url')<p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="md-button">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/></svg>
                            Simpan Channel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
