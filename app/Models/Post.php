<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','user_id','publish', 'url', 'website_password', 'username'];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the decrypted password.
     */
    public function getDecryptedPasswordAttribute()
    {
        try {
            return decrypt($this->website_password);
        } catch (\Exception $e) {
            // If decryption fails, return the original value (might be plain text)
            return $this->website_password;
        }
    }
}
