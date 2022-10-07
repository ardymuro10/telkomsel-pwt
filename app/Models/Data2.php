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

        //eqp
        'lat',
        'long',
        'sp_prog_jpp',
        'objective',
        'sow',
        'prog_jpp',
        'prog_jppsimple',
        'jpp_part',
        'remark_jpp',

        //tower
        'infra_type',
        'site_id_tp',
        'plan_tower_prov',
        'tower_hg',

        //review
        'isd_totsel',
        'isd_cattotsel',
        'site_terdekat',
        'isd_totp',
        'isd_cattotp',
        'tp_id',
        'tp_name',
        'tower_hgview',
        'isd_tocomp',
        'isd_cattocomp',
        'kompet',
        'isd_usuljpp',
        'sitename_rev',
        'luas_hh',
        'mrbad',
        'mrgood',
        'total',
        'per_badmr',
        'mr_4gcov',

        //demografi
        'branch',
        'cluster',
        'do',
        'id_desa',
        'nama_desa',
        'nama_kec',
        'nama_pul',
        'nama_kab',

        //sales
        'reg_rev_proj',
        'kom_rev',
        'rev_cat_pr',
        'pot_nsbranch',
        'arpu_kec',
        'rank_perns',
        'prior_srm',
        'rank_reg',
        'rank_rtpe',
        'prior_finreg',
    ];
}
