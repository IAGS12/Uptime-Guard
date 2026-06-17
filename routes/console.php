<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Cek semua target aktif setiap menit (interval per-target dikelola di dalam command)
Schedule::command('monitor:run')->everyMinute();

// Hitung ulang uptime % setiap jam
Schedule::command('uptime:calculate')->hourly();

// Cek SSL expiry setiap hari jam 08.00
Schedule::command('ssl:check')->dailyAt('08:00');

// Bersihkan log monitoring yang usianya lebih dari 30 hari (Auto-cleanup) setiap malam jam 01:00
Schedule::call(function () {
    $deleted = \App\Models\StatusLog::where('checked_at', '<', now()->subDays(30))->delete();
    \Illuminate\Support\Facades\Log::info("Auto-cleanup: {$deleted} baris log lama telah dihapus.");
})->dailyAt('01:00');
