<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function User() {
      return $this->HasOne(User::class, 'id', 'fk_user_id');
    }

    public function Building() {
      return $this->HasOne(Buildings::class, 'id', 'fk_building_id');
    }
}
