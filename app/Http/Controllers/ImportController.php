<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\FileHistory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelReader;

class ImportController extends Controller
{
    public function handle(Request $request) {
        $file = $request->file('file');
        $path = $file->storeAs('temp', $file->getClientOriginalName());
        $filename = $file->getClientOriginalName();

        //Verificação de arquivo, nesse caso, será feita a verificação considerando o nome, dado ao padrão de nome dos arquivos
        if (FileHistory::firstWhere('file_name', $filename)) {
            return response()->json([
                'message' => 'Arquivo já enviado, por favor envie uma nova versão'
            ], Response::HTTP_CONFLICT);
        }

        try {
            DB::beginTransaction();

            //Adicionando arquivo ao histórico
            FileHistory::create([
                'file_name' => $filename,
            ]);

            $rows = SimpleExcelReader::create(storage_path('app/' . $path))
                        ->useDelimiter(';') //Mudando o delimitador, o habitual é ','
                        ->headerOnRow(1) //Definindo cabeçalho
                        ->headersToSnakeCase() //Transforma o cabeçalho em Snake case
                        ->skip(1) //Pula a primeira linha
                        ->getRows();

            $rows->chunk(50)->each(function ($item) {
                DB::table('datas')->insert($item->toArray());
            });

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            logger()->error('Erro ao adicionar arquivo', ['error' => $e->getMessage()]);

            return response()->json([
                'message' => 'Erro ao adicionar arquivo'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'Arquivo importado com sucesso',
        ]);
    }
}
