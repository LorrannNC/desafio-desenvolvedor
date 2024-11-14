<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataResource;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = Data::query();

        $per_page = $request->query('per_page', config('api.paginate.per_page', 100));

        if ($request->query('filter_tckr_symb')) {
            $datas->where('tckr_symb', $request->query('filter_tckr_symb'));
        }

        if ($request->query('filter_rpt_dt')) {
            $datas->where('rpt_dt', $request->query('filter_rpt_dt'));
        }

        $datas = $per_page == -1 ? $datas->get() : $datas->paginate($per_page);

        return $datas;
    }
}
