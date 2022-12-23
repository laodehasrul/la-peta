<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';

    public function setFileberkasAttribute($value)
    {
        $this->attributes['file_berkas'] = json_encode($value);
    }
    public function setFilektpAttribute($value)
    {
        $this->attributes['file_ktp'] = json_encode($value);
    }
}
