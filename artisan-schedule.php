<?php
// path ke autoload Laravel
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Jalankan schedule:run
$status = $kernel->call('schedule:run');

echo $kernel->output();
