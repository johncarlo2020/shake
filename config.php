<?php
// Reads .env and outputs JS config so the frontend can use the model URL
// without hardcoding it in HTML.
header('Content-Type: application/javascript');

$env = [];
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (str_starts_with(trim($line), '#')) continue;
        [$key, $value] = array_map('trim', explode('=', $line, 2));
        $env[$key] = $value;
    }
}

$modelUrl = $env['TEACHABLE_MACHINE_MODEL_URL'] ?? '';
echo "window.APP_CONFIG = " . json_encode(['modelUrl' => $modelUrl]) . ";";
