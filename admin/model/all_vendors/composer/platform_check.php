<?php

// platform_check.php @generated by Composer

$issues = array();

if (!(PHP_VERSION_ID >= 70100)) {
    $issues[] = 'Your Composer dependencies require a PHP version ">= 7.1.0". You are running ' . PHP_VERSION  .  '.';
}

$missingExtensions = array();
extension_loaded('ctype') || $missingExtensions[] = 'ctype';
extension_loaded('dom') || $missingExtensions[] = 'dom';
extension_loaded('filter') || $missingExtensions[] = 'filter';
extension_loaded('hash') || $missingExtensions[] = 'hash';
extension_loaded('mbstring') || $missingExtensions[] = 'mbstring';
extension_loaded('pcre') || $missingExtensions[] = 'pcre';

if ($missingExtensions) {
    $issues[] = 'Your Composer dependencies require the following PHP extensions to be installed: ' . implode(', ', $missingExtensions);
}

if ($issues) {
    echo 'Composer detected issues in your platform:' . "\n\n" . implode("\n", $issues);
    exit(104);
}
