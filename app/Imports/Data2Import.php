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
            'sow_infra' => $row['sow_infra'],
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
            'pre_surveipot' => $row['pre_survey_potensi_power'],
            'pln' => $row['pln'],
            'ass_los' => $row['assessment_los'],
            'siteid_farend' => $row['site_id_far_end'],
            'configfe' => $row['config_fe'],
            'min_los' => $row['minimal_los'],
            'simple_trans' => $row['simple_transport'],

            //drm
            'ur_kandidat' => $row['urutan_kandidat'],
            'lat_kandidat' => $row['lat_kandidat'],
            'lon_kandidat' => $row['long_kandidat'],
            'dist_tonom' => $row['distance_to_nom'],
            'sa_potcomm' => $row['sa_potensi_community_case'],
            'prop_rf' => $row['proposed_rf_collo_tp'], //
            'alamat' => $row['alamat'],
            'azimuth' => $row['azimuth'],
            'tipe_rf' => $row['tipe_rf'],
            'tipe_rru' => $row['tipe_rru'],
            'm_tilt' => $row['m_tilt'],
            'e_tilt' => $row['e_tilt'],
            'jum_sector' => $row['jumlah_sector'], //
            'siteid_fe' => $row['site_id_fe'],
            'sitename_fe' => $row['site_name_fe'],
            'lat_fe' => $row['lat'],
            'lon_fe' => $row['long'],
            'tp' => $row['tp'],
            'tower_hghtfe' => $row['tower_height'], //
            'path' => $row['path'],
            'azimuth_ne' => $row['azimuth_ne'],
            'freq' => $row['freq'],
            'diameter_antnefe' => $row['diameter_ant_ne_fe'],
            'ant_nefe' => $row['ant_ne_fe'],
            'min_losnefe' => $row['minimum_los_nefe'],
            'los_nlos' => $row['losnlos'],
            'remark' => $row['remarks'],
            'tgl_drm' => $row['drm_date'],
            'tgl_edrm' => $row['e_drm_date'],
            'drm_stts' => $row['drm_status'],

            //kom & report
            'no_komkkst' => $row['no_komkkst'],
            'tp_komkkst' => $row['tp'],
            'tgl_kom' => $row['tanggal_kom'],
            'cp_eqp' => $row['cp_eqp'],
            'pre_sales' => $row['pre_sales'],
            'aging' => $row['aging'],
            'batch_final' => $row['batch_final'],
            'prog_sim' => $row['progress_simple'],
            'need_supp' => $row['need_support_ke_management'],
            'detail_prog' => $row['detail_progress_dari_project_deployment'],
            'need_form' => $row['need_form_survey'],
            'remark_rep' => $row['remark'],

        ]);
    }
}
