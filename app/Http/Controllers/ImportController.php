<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelReader;

class ImportController extends Controller
{
    public function handle(Request $request) {
        $file = $request->file('file');
        $path = $file->storeAs('temp', $file->getClientOriginalName());

        $rows = SimpleExcelReader::create(storage_path('app/' . $path))
                    ->useDelimiter(';')
                    ->headerOnRow(1)
                    ->headersToSnakeCase()
                    ->skip(1) // Ignora a primeira linha
                    ->getRows();

        $rows->chunk(50)->each(function ($item) {
            DB::table('datas')->insert($item->toArray());
        });

        return response()->json([
            'message' => 'Arquivo importado com sucesso',
        ]);
    }
}
