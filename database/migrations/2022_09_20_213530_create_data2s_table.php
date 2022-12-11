<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data2s', function (Blueprint $table) {
            $table->id();
            //eqp
            $table->string('unik')->nullable();
            $table->string('unik_krdnt')->nullable();
            $table->string('id_site')->nullable();
            $table->string('site_name')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('sp_prog_jpp')->nullable();
            $table->string('objective')->nullable();
            $table->string('sow')->nullable();
            $table->string('prog_jpp')->nullable();
            $table->string('prog_jppsimple')->nullable();
            $table->string('jpp_part')->nullable();
            $table->string('remark_jpp')->nullable();
            // $table->text('cek_lat');
            // $table->text('cek_long');

            //tower
            $table->string('sow_infra')->nullable();
            $table->string('infra_type')->nullable();
            $table->string('site_id_tp')->nullable();
            $table->string('plan_tower_prov')->nullable();
            $table->integer('tower_hg')->nullable();

            //review
            $table->string('isd_totsel')->nullable();
            $table->string('isd_cattotsel')->nullable();
            $table->string('site_terdekat')->nullable();
            $table->string('isd_totp')->nullable();
            $table->string('isd_cattotp')->nullable();
            $table->string('tp_id')->nullable();
            $table->string('tp_name')->nullable();
            $table->integer('tower_hgview')->nullable();
            $table->string('isd_tocomp')->nullable();
            $table->string('isd_cattocomp')->nullable();
            $table->string('kompet')->nullable();
            $table->string('isd_usuljpp')->nullable();
            $table->string('isd_cat')->nullable();
            $table->string('sitename_rev')->nullable();
            $table->string('luas_hh')->nullable();
            // $table->string('cat_hh')->nullable();
            $table->integer('mrbad')->nullable();
            $table->integer('mrgood')->nullable();
            $table->string('total')->nullable();
            $table->string('per_badmr')->nullable();
            $table->string('mr_4gcov')->nullable();

            //demografi
            $table->string('branch')->nullable();
            $table->string('cluster')->nullable();
            $table->string('do')->nullable();
            $table->string('id_desa')->nullable();
            $table->string('nama_desa')->nullable();
            $table->string('nama_kec')->nullable();
            $table->string('nama_pul')->nullable();
            $table->string('nama_kab')->nullable();

            //sales
            $table->string('reg_rev_proj')->nullable();
            $table->string('kom_rev')->nullable();
            $table->string('rev_cat_pr')->nullable();
            // $table->string('up_regrev')->nullable();
            // $table->string('rev_predsifa')->nullable();
            // $table->string('rem_revsifa')->nullable();
            $table->string('pot_nsbranch')->nullable();
            $table->string('arpu_kec')->nullable();
            $table->string('rank_perns')->nullable();
            $table->integer('prior_srm')->nullable();
            $table->integer('rank_reg')->nullable();
            $table->string('rank_rtpe')->nullable();
            $table->string('prior_finreg')->nullable();

            //power
            $table->string('pre_surveipot')->nullable();
            $table->string('pln')->nullable();
            $table->string('ass_los')->nullable();
            $table->string('siteid_farend')->nullable();
            $table->string('configfe')->nullable();
            $table->string('min_los')->nullable();
            $table->string('simple_trans')->nullable();

            //drm
            $table->text('ur_kandidat')->nullable();
            $table->text('lat_kandidat')->nullable();
            $table->text('lon_kandidat')->nullable();
            $table->text('dist_tonom')->nullable();
            $table->text('sa_potcomm')->nullable();
            $table->integer('prop_rf')->nullable();
            $table->text('alamat')->nullable();
            $table->text('azimuth')->nullable();
            $table->text('tipe_rf')->nullable();
            $table->text('tipe_rru')->nullable();
            $table->text('m_tilt')->nullable();
            $table->text('e_tilt')->nullable();
            $table->integer('jum_sector')->nullable();
            $table->text('siteid_fe')->nullable();
            $table->text('sitename_fe')->nullable();
            $table->text('lat_fe')->nullable();
            $table->text('lon_fe')->nullable();
            $table->text('tp')->nullable();
            $table->integer('tower_hghtfe')->nullable();
            $table->text('path')->nullable();
            $table->text('azimuth_ne')->nullable();
            $table->text('freq')->nullable();
            $table->text('diameter_antnefe')->nullable();
            $table->text('ant_nefe')->nullable();
            $table->text('min_losnefe')->nullable();
            $table->text('los_nlos')->nullable();
            $table->text('remark')->nullable();
            $table->date('tgl_drm')->nullable();
            $table->date('tgl_edrm')->nullable();
            $table->text('drm_stts')->nullable();

            //KOM/KKST & REPORT
            $table->text('no_komkkst')->nullable();
            $table->text('tp_komkkst')->nullable();
            $table->date('tgl_kom')->nullable();
            $table->text('cp_eqp')->nullable();
            $table->text('pre_sales')->nullable();
            $table->text('aging')->nullable();
            $table->text('batch_final')->nullable();
            $table->text('prog_sim')->nullable();
            $table->text('need_supp')->nullable();
            $table->text('detail_prog')->nullable();
            $table->text('need_form')->nullable();
            $table->text('remark_rep')->nullable();


            // $table->text('feed_sales');
            // $table->text('feed_ns');
            // $table->text('prior_ns');
            // $table->text('remark_ns');
            // $table->text('update_by');
            // $table->text('remark_csodp');
            // $table->text('remark_prog');
            // $table->text('last_miles');
            // $table->text('stts_fbshare');
            // $table->text('in_out');
            // $table->text('cek_duplikat');
            // $table->text('remark_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data2s');
    }
};
