<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_meta extends Model
{
    use HasFactory;

    protected $table = "invoice_meta";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idinvoice',
        'idbarang',
        'kuantiti',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
