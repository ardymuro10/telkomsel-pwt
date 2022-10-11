<?php

namespace App\Imports;

use App\Models\Data2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Data2Import implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data2([
            // 'nama kolom db' => $row['nama kolom excel'],
            'unik' => $row['unik'],
            'unik_krdnt' => $row['unik_koordinat'],
            'id_site' => $row['site_id'],
            'site_name' => $row['site_name'],

            //eqp
            'lat' => $row['lat'],
            'long' => $row['long'],
            'sp_prog_jpp' => $row['special_program_jpp'],
            'objective' => $row['objective'],
            'sow' => $row['sow'],
            'prog_jpp' => $row['program_jpp_2023'],
            'prog_jppsimple' => $row['program_jpp_2023_simple'],
            'jpp_part' => $row['jpp_part'],
            'remark_jpp' => $row['remark_jpp'],

            //tower
            'infra_type' => $row['infra_type'],
            'site_id_tp' => $row['site_id_tp'],
            'plan_tower_prov' => $row['plan_tower_provider'],
            'tower_hg' => $row['tower_height'],

            //review
            'isd_totsel' => $row['isd_m_to_tsel'],
            'isd_cattotsel' => $row['isd_cat_to_tsel'],
            'site_terdekat' => $row['site_terdekat'],
            'isd_totp' => $row['isd_m_to_tp'],
            'isd_cattotp' => $row['isd_cat_to_tp'],
            'tp_id' => $row['tp_id'],
            'tp_name' => $row['tp_name'],
            'tower_hgview' => $row['tower_height'],
            'isd_tocomp' => $row['isd_m_to_competitor'],
            'isd_cattocomp' => $row['isd_cat_to_competitor'],
            'kompet' => $row['kompetitor'],
            'isd_usuljpp' => $row['isd_usulan_jpp'],
            'sitename_rev' => $row['site_name'],
            'luas_hh' => $row['luas_household_km2'],
            'mrbad' => $row['mr_bad_105'],
            'mrgood' => $row['mr_good_105'],
            'total' => $row['total'],
            'per_badmr' => $row['percentage_bad_mr'],
            'mr_4gcov' => $row['mr_4g_coverage'],

            //demografi
            'branch' => $row['branch'],
            'cluster' => $row['cluster'],
            'do' => $row['do'],
            'id_desa' => $row['id_desa'],
            'nama_desa' => $row['nama_desa'],
            'nama_kec' => $row['nama_kecamatan'],
            'nama_pul' => $row['nama_pulau'],
            'nama_kab' => $row['nama_kabupaten'],

            //sales
            'reg_rev_proj' => $row['reg_rev_projection_update_3_oct_2021'],
            'kom_rev' => $row['komitment_revenue_branch'],
            'rev_cat_pr' => $row['rev_cat_priority'],
            'pot_nsbranch' => $row['potensi_nsbranch'],
            'arpu_kec' => $row['arpu_kecamatan'],
            'rank_perns' => $row['rank_per_nsbranch'],
            'prior_srm' => $row['priority_srm'],
            'rank_reg' => $row['rank_regional'],
            'rank_rtpe' => $row['rank_rtpe'],
            'prior_finreg' => $row['priority_final_regional'],

            //powertrans
            'pre_surveipot' => $row[''],
            'pln' => $row[''],
            'ass_los' => $row[''],
            'siteid_farend' => $row[''],
            'configfe' => $row[''],
            'min_los' => $row[''],
            'simple_trans' => $row[''],

            //drm
            'ur_kandidat' => $row[''],
            'lat_kandidat' => $row[''],
            'lon_kandidat' => $row[''],
            'dist_tonom' => $row[''],
            'sa_potcomm' => $row[''],
            'prop_rf' => $row[''], //
            'alamat' => $row[''],
            'azimuth' => $row[''],
            'tipe_rf' => $row[''],
            'tipe_rru' => $row[''],
            'm_tilt' => $row[''],
            'e_tilt' => $row[''],
            'jum_sector' => $row[''], //
            'siteid_fe' => $row[''],
            'sitename_fe' => $row[''],
            'lat_fe' => $row[''],
            'lon_fe' => $row[''],
            'tp' => $row[''],
            'tower_hghtfe' => $row[''], //
            'path' => $row[''],
            'azimuth_ne' => $row[''],
            'freq' => $row[''],
            'diameter_antnefe' => $row[''],
            'ant_nefe' => $row[''],
            'min_losnefe' => $row[''],
            'los_nlos' => $row[''],
            'remark' => $row[''],
            'tgl_drm' => $row[''],
            'tgl_edrm' => $row[''],
            'drm_stts' => $row[''],

            //kom & report
            'no_komkkst' => $row[''],
            'tp_komkkst' => $row[''],
            'tgl_kom' => $row[''],
            'cp_eqp' => $row[''],
            'pre_sales' => $row[''],
            'aging' => $row[''],
            'batch_final' => $row[''],
            'prog_sim' => $row[''],
            'need_supp' => $row[''],
            'detail_prog' => $row[''],
            'need_form' => $row[''],
            'remark_rep' => $row[''],

        ]);
    }
}
