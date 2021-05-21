<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MovieModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'year',
        'type',
        'poster'
    ];

    public static function insertData($insertArr = [])
    {
        if (empty($insertArr)) {
            return false;
        }

        return DB::table('movies_details')->insert($insertArr);
    }
}
