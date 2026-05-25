<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratorium extends Model
{
    use HasFactory;

    protected $table = 'laboratorium';

    protected $fillable = [
        'no_lab',
        'nama_lab',
        'level_lab',
        'jumlah_pc',
        'no_induk_admin',
    ];

    public function admin()
    {
        return $this->belongsTo(
            User::class,
            'no_induk_admin',
            'no_induk'
        );
    }

    public function pengajuan()
    {
        return $this->hasMany(
            Pengajuan::class,
            'no_lab',
            'no_lab'
        );
    }
    public function instalasi()
    {
        return $this->hasMany(
            Instalasi::class,
            'no_lab',
            'no_lab'
        );
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($laboratorium) {

            $last = self::latest('id')->first();

            $number = $last ? $last->id + 1 : 1;

            $laboratorium->no_lab =
                'LAB' . str_pad($number, 3, '0', STR_PAD_LEFT);
        });
    }
}