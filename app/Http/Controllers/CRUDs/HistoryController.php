<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\HistoryAuthentication;
use App\Models\HistoryTransaction;

class HistoryController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function show($id)
    {
        // abort_if(Gate::denies('history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
    
    public function create()
    {
        // abort_if(Gate::denies('history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function store(Request $request)
    {
        // Code..
    }

    public function edit($id)
    {
        // abort_if(Gate::denies('history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function update(Request $request, $id)
    {
        // Code..
    }

    public function destroy($id)
    {
        // abort_if(Gate::denies('history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
}
