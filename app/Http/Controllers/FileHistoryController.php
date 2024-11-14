<?php

namespace App\Http\Controllers;

use App\Models\FileHistory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class FileHistoryController extends Controller
{
    public function index(Request $request) {
        $files = FileHistory::query();

        $per_page = $request->query('per_page', 10);

        if ($request->query('filter_file_name')) {
            $files->where('file_name', 'like', "%{$request->query('filter_filename')}%");
        }

        if ($request->query('filter_date')) {
            $files->whereDate('created_at', $request->query('filter_date'));
        }

        $files = $per_page == -1 ? $files->get() : $files->paginate();

        return $files;
    }
}
