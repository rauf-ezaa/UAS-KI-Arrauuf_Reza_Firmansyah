<?php

namespace App\Encryption;

use Illuminate\Support\Facades\Crypt;

class EncryptionHelper
{
    /**
     * Encrypt data using a custom key.
     */
    public static function encrypt($data)
    {
        $key = env('KEY_ENCRYPT', 'defaultkey');  // Use the key from the .env file
        return Crypt::encryptString($data, false);  // Encrypt data with the key
    }

    /**
     * Decrypt data using a custom key.
     */
    public static function decrypt($enkripsi_data)
    {
        try {
            return Crypt::decryptString($enkripsi_data);
        } catch (\Exception $e) {
            return 'Decryption failed: ' . $e->getMessage();
        }
    }
}
