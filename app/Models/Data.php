<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'datas';

    protected $fillable = [
        'rpt_dt',
        'tckr_symb',
        'asst',
        'asst_desc',
        'sgmt_nm',
        'mkt_nm',
        'scty_ctgy_nm',
        'xprtn_dt',
        'xprtn_cd',
        'tradg_start_dt',
        'tradg_end_dt',
        'base_cd',
        'convs_crit_nm',
        'mtrty_dt_trgt_pt',
        'reqrd_convs_ind',
        'isin',
        'cficd',
        'dlvry_ntce_start_dt',
        'dlvry_ntce_end_dt',
        'optn_tp',
        'ctrct_mltplr',
        'asst_qtn_qty',
        'allcn_rnd_lot',
        'tradg_ccy',
        'dlvry_tp_nm',
        'wdrwl_days',
        'wrkg_days',
        'clnr_days',
        'rlvr_base_pric_nm',
        'opng_futr_pos_day',
        'sd_tp_cd_1',
        'undrlyg_tckr_symb_1',
        'sd_tp_cd_2',
        'undrlyg_tckr_symb_2',
        'pure_gold_wght',
        'exrc_pric',
        'optn_style',
        'val_tp_nm',
        'prm_upfrnt_ind',
        'opng_pos_lmt_dt',
        'dstrbtn_id',
        'pric_fctr',
        'days_to_sttlm',
        'srs_tp_nm',
        'prtcn_flg',
        'automtc_exrc_ind',
        'spcfctn_cd',
        'crpn_nm',
        'corp_actn_start_dt',
        'ctdy_trtmnt_tp_nm',
        'mkt_cptlstn',
        'corp_govn_lvl_nm',
    ];

}
