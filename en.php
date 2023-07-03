<?php


function encryptData($data, $key, $iv)
{
    $encryptedData = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($encryptedData);
}

function decryptData($encryptedData, $key, $iv)
{
    $encryptedData = base64_decode($encryptedData);
    return openssl_decrypt($encryptedData, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
}

// Example usage
$key = 'your_secret_key';
$iv = openssl_random_pseudo_bytes(16); // Generate a random initialization vector (IV)

$data = 'Hello, world!';
$encrypted = encryptData($data, $key, $iv);
$enc = "QZqYvsrMKoXapVvRNEYKuA==";
$decrypted = decryptData($enc, $key, $iv);

echo 'Original data: ' . $data . "<br><br>";
echo 'Encrypted data: ' . $encrypted . "<br><br>";
echo 'Decrypted data: ' . $decrypted . "<br><br>";
