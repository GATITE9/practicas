<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Track extends Model
{
    use HasFactory;
    protected $fillable = ['title','audio'];
    public function deleteaudio(){
        if($this->path != "public/tracks/no_mames.mp3")
        Storage::delete($this->path);
    }
    public function getUrl()
    {
        return Storage::url($this->path);
    }
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($table) {
            if (!app()->runningInConsole()) {
                $table->user_id = auth()->id();
            }
        });
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 
}
