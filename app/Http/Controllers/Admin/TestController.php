<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repo\Eloquent\Diagnosis\Relasi\DiagnosisTandaDanGejalaRepo;

class TestController extends Controller
{

    private $repo;

    public function __construct(DiagnosisTandaDanGejalaRepo $repo)
    {
        $this->repo = $repo;
    }

    public function index($id, Request $request) {
        return response()->json(
            $this->repo->tambahLama($id, $request->id, [
                "mayor" => 0,
                "objektif" => 0
            ])
        );
    }

}
