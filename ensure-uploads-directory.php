<?php

/**
 * Script to ensure uploads directory exists with correct permissions
 * Run this once: php ensure-uploads-directory.php
 */

$uploadPath = __DIR__ . '/public/uploads';

if (!is_dir($uploadPath)) {
    mkdir($uploadPath, 0755, true);
    echo "✅ Created uploads directory: {$uploadPath}\n";
} else {
    echo "✅ Uploads directory already exists: {$uploadPath}\n";
}

// Set permissions
chmod($uploadPath, 0755);
echo "✅ Set permissions to 755 on uploads directory\n";

// Check if writable
if (is_writable($uploadPath)) {
    echo "✅ Uploads directory is writable\n";
} else {
    echo "⚠️  Uploads directory is NOT writable. Run: chmod 755 public/uploads\n";
}

echo "\n✅ Setup complete!\n";
