<?php

namespace App\Http\Controllers;
namespace App\Http\AuthControllers;
use App\Models\fixed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\fixed_ledger_account;


 
class dashboardtableview extends dashboard {
    public function dashboardtableview(){
        $fixeddata=fixed_ledger_account::all();
        return view ("dashboard",compact("fixeddata"));
    }
}