<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $primaryKey = 'isbn';
    public $incrementing = false;

    protected $fillable = [
        'isbn','judul','pengarang','penerbit','halaman'
    ];
}
