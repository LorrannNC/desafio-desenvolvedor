<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasTable extends Migration
{
    protected $table = 'datas';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datas', function (Blueprint $table) {
            $table->id();

            $table->string('rpt_dt')->nullable();
            $table->string('tckr_symb')->nullable();
            $table->string('asst')->nullable();
            $table->string('asst_desc')->nullable();
            $table->string('sgmt_nm')->nullable();
            $table->string('mkt_nm')->nullable();
            $table->string('scty_ctgy_nm')->nullable();
            $table->string('xprtn_dt')->nullable();
            $table->string('xprtn_cd')->nullable();
            $table->string('tradg_start_dt')->nullable();
            $table->string('tradg_end_dt')->nullable();
            $table->string('base_cd')->nullable();
            $table->string('convs_crit_nm')->nullable();
            $table->string('mtrty_dt_trgt_pt')->nullable();
            $table->string('reqrd_convs_ind')->nullable();
            $table->string('isin')->nullable();
            $table->string('cficd')->nullable();
            $table->string('dlvry_ntce_start_dt')->nullable();
            $table->string('dlvry_ntce_end_dt')->nullable();
            $table->string('optn_tp')->nullable();
            $table->string('ctrct_mltplr')->nullable();
            $table->string('asst_qtn_qty')->nullable();
            $table->string('allcn_rnd_lot')->nullable();
            $table->string('tradg_ccy')->nullable();
            $table->string('dlvry_tp_nm')->nullable();
            $table->string('wdrwl_days')->nullable();
            $table->string('wrkg_days')->nullable();
            $table->string('clnr_days')->nullable();
            $table->string('rlvr_base_pric_nm')->nullable();
            $table->string('opng_futr_pos_day')->nullable();
            $table->string('sd_tp_cd_1')->nullable();
            $table->string('undrlyg_tckr_symb_1')->nullable();
            $table->string('sd_tp_cd_2')->nullable();
            $table->string('undrlyg_tckr_symb_2')->nullable();
            $table->string('pure_gold_wght')->nullable();
            $table->string('exrc_pric')->nullable();
            $table->string('optn_style')->nullable();
            $table->string('val_tp_nm')->nullable();
            $table->string('prm_upfrnt_ind')->nullable();
            $table->string('opng_pos_lmt_dt')->nullable();
            $table->string('dstrbtn_id')->nullable();
            $table->string('pric_fctr')->nullable();
            $table->string('days_to_sttlm')->nullable();
            $table->string('srs_tp_nm')->nullable();
            $table->string('prtcn_flg')->nullable();
            $table->string('automtc_exrc_ind')->nullable();
            $table->string('spcfctn_cd')->nullable();
            $table->string('crpn_nm')->nullable();
            $table->string('corp_actn_start_dt')->nullable();
            $table->string('ctdy_trtmnt_tp_nm')->nullable();
            $table->string('mkt_cptlstn')->nullable();
            $table->string('corp_govn_lvl_nm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datas');
    }
}
