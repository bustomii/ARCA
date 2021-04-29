<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iduser',
        'idbarang',
        'kuantiti',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
