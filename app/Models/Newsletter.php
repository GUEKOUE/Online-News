<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;

class Newsletter extends Model
{
    use HasFactory;

    public $fillable = ['email'];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
                
            $adminEmail = "demenoucompassion02@gmail.com";
            Mail::to($adminEmail)->send(new NotifyMail($item));
        });
    }
}
