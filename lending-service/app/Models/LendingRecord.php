<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LendingRecord extends Model
{
    protected $table = "lending_records";
    protected $primaryKey = "id";
    protected $fillable = ['member_id', 'book_id', 'lent_date', 'return_date', 'is_returned', 'created_at', 'updated_at'];
}
