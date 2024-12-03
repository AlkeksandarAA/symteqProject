<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Object;
class Invoice extends Model
{
    protected $guarded = [];

    public function clients()
    {
        return $this->hasOne(Client::class, "id", );
    }
}
