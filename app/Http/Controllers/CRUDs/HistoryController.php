<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;

use App\Models\HistoryTransaction;

class HistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $historyTransaction = HistoryTransaction::orderBy('created_at', 'desc')->get();

        return view('cruds.history.index', compact('historyTransaction'));
    }
}
