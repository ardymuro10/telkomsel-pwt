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
            $table->string('unik')->nullable();
            $table->integer('unik_krdnt')->nullable();
            $table->string('id_site')->nullable();
            $table->string('site_name')->nullable();
            $table->integer('lat')->nullable();
            $table->integer('long')->nullable();
            $table->string('sp_prog_jpp')->nullable();
            $table->string('objective')->nullable();
            $table->string('sow')->nullable();
            $table->string('prog_jpp')->nullable();
            $table->string('prog_jppsimple')->nullable();
            $table->string('jpp_part')->nullable();
            $table->string('remark_jpp')->nullable();
            // $table->text('cek_lat');
            // $table->text('cek_long');
            // $table->text('infra_type');
            // $table->text('site_id_tp');
            // $table->text('plan_tower_prov');
            // $table->text('tower_hg');
            // $table->text('isd_totsel');
            // $table->text('isd_cattotsel');
            // $table->text('site_terdekat');
            // $table->text('isd_totp');
            // $table->text('isd_cattotp');
            // $table->text('tp_id');
            // $table->text('tp_name');
            // $table->text('tower_hgview');
            // $table->text('isd_tocomp');
            // $table->text('isd_cattocomp');
            // $table->text('kompet');
            // $table->text('isd_usuljpp');
            // $table->text('isd_cat');
            // $table->text('sitename_rev');
            // $table->text('luas_hh');
            // $table->text('cat_hh');
            // $table->text('mrbad');
            // $table->text('mrgood');
            // $table->text('total');
            // $table->text('per_badmr');
            // $table->text('mr_4gcov');
            // $table->text('branch');
            // $table->text('cluster');
            // $table->text('do');
            // $table->text('id_desa');
            // $table->text('nama_desa');
            // $table->text('nama_kec');
            // $table->text('nama_pul');
            // $table->text('nama_kab');
            // $table->text('reg_rev_proj');
            // $table->text('kom_rev');
            // $table->text('rev_cat_pr');
            // $table->text('up_regrev');
            // $table->text('rev_predsifa');
            // $table->text('rem_revsifa');
            // $table->text('pot_nsbranch');
            // $table->text('arpu_kec');
            // $table->text('rank_perns');
            // $table->text('prior_srm');
            // $table->text('rank_reg');
            // $table->text('rank_rtpe');
            // $table->text('prior_finreg');
            // $table->text('pre_surveipot');
            // $table->text('pln');
            // $table->text('ass_los');
            // $table->text('siteid_farend');
            // $table->text('configfe');
            // $table->text('min_los');
            // $table->text('simple_trans');
            // $table->text('ur_kandidat');
            // $table->text('lat_kandidat');
            // $table->text('lon_kandidat');
            // $table->text('dist_tonom');
            // $table->text('sa_potcomm');
            // $table->text('prop_rf');
            // $table->text('alamat');
            // $table->text('azimuth');
            // $table->text('tipe_rf');
            // $table->text('tipe_rru');
            // $table->text('m_tilt');
            // $table->text('e_tilt');
            // $table->text('jum_sector');
            // $table->text('siteid_fe');
            // $table->text('sitename_fe');
            // $table->text('lat_fe');
            // $table->text('lon_fe');
            // $table->text('tp');
            // $table->text('tower_hghtfe');
            // $table->text('path');
            // $table->text('azimuth_ne');
            // $table->text('freq');
            // $table->text('diameter_antnefe');
            // $table->text('ant_nefe');
            // $table->text('min_losnefe');
            // $table->text('los_nlos');
            // $table->text('remark');
            // $table->text('no_komkkst');
            // $table->text('tp_komkkst');
            // $table->text('tgl_kom');
            // $table->text('tgl_drm');
            // $table->text('tgl_edrm');
            // $table->text('drm_stts');
            // $table->text('cp_eqp');
            // $table->text('pre_sales');
            // $table->text('aging');
            // $table->text('batch_final');
            // $table->text('prog_sim');
            // $table->text('need_supp');
            // $table->text('detail_prog');
            // $table->text('need_form');
            // $table->text('remark_rep');
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
