<?php

namespace App\Http\Controllers;

use App\Actions\GetURLAsPDFAction;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    /**
     * Get URL as PDF
     *
     * @param GetURLAsPDFAction           $action   Get URL as PDF action
     * @param Request                     $request  Request data
     *
     * @return \Illuminate\Http\Response  PDF download response
     */
    public function get(
        GetURLAsPDFAction $action,
        Request $request
    ): \Illuminate\Http\Response {
        return $action->execute($request->url);
    }
}
