<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'unik',
        'unik_krdnt',
        'id_site',
        'site_name',
        'infra_type',
        'site_id_tp',
        'plan_tower_prov',
        'tower_hg',
    ];
}
