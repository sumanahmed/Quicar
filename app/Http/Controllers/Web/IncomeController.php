<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdminDebit;

class IncomeController extends Controller
{
    //show all income
    public function index(){
        $incomes = AdminDebit::join('users','users.api_token','admin_debit.user_id')
                            ->select('users.name as user_name','users.phone as user_phone','admin_debit.*')
                            ->orderBy('admin_debit.id','desc')
                            ->get();
        return view('quicar.backend.income.index', compact('incomes'));
    }
}
