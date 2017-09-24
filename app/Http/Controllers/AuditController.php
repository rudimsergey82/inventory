<?php

namespace App\Http\Controllers;

use App\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    //
    public function index()
    {
        if (view()->exists('audits')) {
            /*$audits = $this->getAudits();*/
            return view('audits')/*->with(['audits' => $audits])*/;
        }
        abort(404);
    }

    protected function getAudits()
    {
        $audits = Audit::all();
        dump($audits);
        return $audits;
    }

}
