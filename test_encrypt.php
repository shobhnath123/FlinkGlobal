<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Post;

// Test encryption/decryption
$testPassword = 'testpassword123';
$encrypted = encrypt($testPassword);
$decrypted = decrypt($encrypted);

echo "Original: $testPassword\n";
echo "Encrypted: $encrypted\n";
echo "Decrypted: $decrypted\n";
echo "Test passed: " . ($testPassword === $decrypted ? 'Yes' : 'No') . "\n";

// Test with a post
$post = Post::first();
if ($post) {
    echo "\nPost password (encrypted): " . $post->website_password . "\n";
    echo "Post password (decrypted): " . $post->decrypted_password . "\n";
} else {
    echo "\nNo posts found\n";
}