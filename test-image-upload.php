<?php

/**
 * Test script to verify image upload setup
 * Run: php test-image-upload.php
 */

require __DIR__ . '/vendor/autoload.php';

echo "===========================================\n";
echo "Image Upload Setup Test\n";
echo "===========================================\n\n";

// 1. Check Intervention/Image
echo "1. Checking Intervention/Image package...\n";
if (class_exists('Intervention\Image\ImageManagerStatic')) {
    echo "   ✅ Intervention/Image is installed\n";
} else {
    echo "   ❌ Intervention/Image is NOT installed\n";
    echo "   Run: composer require intervention/image\n";
    exit(1);
}

// 2. Check PHP extensions
echo "\n2. Checking PHP extensions...\n";
if (extension_loaded('gd')) {
    $gdInfo = gd_info();
    echo "   ✅ GD extension is loaded\n";
    echo "   Version: " . $gdInfo['GD Version'] . "\n";
    echo "   WebP Support: " . (isset($gdInfo['WebP Support']) && $gdInfo['WebP Support'] ? 'Yes' : 'No') . "\n";
} elseif (extension_loaded('imagick')) {
    echo "   ✅ Imagick extension is loaded\n";
} else {
    echo "   ❌ Neither GD nor Imagick is loaded\n";
    echo "   Install: sudo apt-get install php-gd\n";
    exit(1);
}

// 3. Check uploads directory
echo "\n3. Checking uploads directory...\n";
$uploadPath = __DIR__ . '/public/uploads';
if (is_dir($uploadPath)) {
    echo "   ✅ Directory exists: {$uploadPath}\n";
} else {
    echo "   ❌ Directory does NOT exist\n";
    echo "   Creating...\n";
    mkdir($uploadPath, 0755, true);
    echo "   ✅ Created directory\n";
}

// 4. Check permissions
echo "\n4. Checking permissions...\n";
if (is_writable($uploadPath)) {
    echo "   ✅ Directory is writable\n";
} else {
    echo "   ⚠️  Directory is NOT writable\n";
    echo "   Run: chmod 755 public/uploads\n";
}

$perms = substr(sprintf('%o', fileperms($uploadPath)), -4);
echo "   Permissions: {$perms}\n";

// 5. Test WebP creation
echo "\n5. Testing WebP image creation...\n";
try {
    $testImage = imagecreatetruecolor(100, 100);
    $white = imagecolorallocate($testImage, 255, 255, 255);
    imagefill($testImage, 0, 0, $white);
    
    $testPath = $uploadPath . '/test_' . time() . '.webp';
    
    if (function_exists('imagewebp')) {
        imagewebp($testImage, $testPath, 90);
        imagedestroy($testImage);
        
        if (file_exists($testPath)) {
            echo "   ✅ WebP image created successfully\n";
            echo "   File: {$testPath}\n";
            echo "   Size: " . filesize($testPath) . " bytes\n";
            unlink($testPath); // Clean up
            echo "   ✅ Test file cleaned up\n";
        } else {
            echo "   ❌ Failed to create WebP image\n";
        }
    } else {
        echo "   ⚠️  imagewebp() function not available\n";
        echo "   WebP support may not be enabled in GD\n";
    }
} catch (\Exception $e) {
    echo "   ❌ Error: " . $e->getMessage() . "\n";
}

// 6. Check .htaccess
echo "\n6. Checking .htaccess security...\n";
$htaccessPath = $uploadPath . '/.htaccess';
if (file_exists($htaccessPath)) {
    echo "   ✅ .htaccess exists\n";
} else {
    echo "   ⚠️  .htaccess does NOT exist (recommended for security)\n";
}

echo "\n===========================================\n";
echo "Test Complete!\n";
echo "===========================================\n\n";

echo "Next steps:\n";
echo "1. Ensure uploads directory has correct permissions\n";
echo "2. Test uploading an image via admin panel\n";
echo "3. Verify image displays correctly on frontend\n";
