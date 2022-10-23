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
        'sow_infra',
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

        //powertrans
        'pre_surveipot',
        'pln',
        'ass_los',
        'siteid_farend',
        'configfe',
        'min_los',
        'simple_trans',

        //drm
        'ur_kandidat',
        'lat_kandidat',
        'lon_kandidat',
        'dist_tonom',
        'sa_potcomm',
        'prop_rf', //
        'alamat',
        'azimuth',
        'tipe_rf',
        'tipe_rru',
        'm_tilt',
        'e_tilt',
        'jum_sector', //
        'siteid_fe',
        'sitename_fe',
        'lat_fe',
        'lon_fe',
        'tp',
        'tower_hghtfe', //
        'path',
        'azimuth_ne',
        'freq',
        'diameter_antnefe',
        'ant_nefe',
        'min_losnefe',
        'los_nlos',
        'remark',
        'tgl_drm',
        'tgl_edrm',
        'drm_stts',

        //kom & report
        'no_komkkst',
        'tp_komkkst',
        'tgl_kom',
        'cp_eqp',
        'pre_sales',
        'aging',
        'batch_final',
        'prog_sim',
        'need_supp',
        'detail_prog',
        'need_form',
        'remark_rep',
    ];
}
