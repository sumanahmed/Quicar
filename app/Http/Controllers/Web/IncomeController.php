<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdminDebit;
use App\Model\UserAccount;
use App\Model\OwnerAccount;

class IncomeController extends Controller
{
    //show all income
    public function index(){
        $incomes = AdminDebit::join('users','users.api_token','admin_debit.user_id')
                            ->select('users.name as user_name','users.phone as user_phone','admin_debit.*')
                            ->orderBy('admin_debit.id','desc')
                            ->get();
        return view('quicar.backend.account.income', compact('incomes'));
    }

    //user Account
    public function userAccount(Request $request){
        $start_date    = isset($request->start_date) ? $request->start_date : date('Y-m-d', strtotime('-7 days'));
        $end_date    = isset($request->end_date) ? $request->end_date : date('Y-m-d');
        $user_accounts = UserAccount::join('users','users.api_token','user_account.user_id')
                                    ->select('users.name as user_name','users.phone as user_phone','user_account.id',
                                            'user_account.amount','user_account.ride_id','user_account.type','user_account.reason'
                                    )
                                    ->whereBetween('user_account.date',[$start_date, $end_date])
                                    ->get();
        return view('quicar.backend.account.user_account', compact('user_accounts','start_date','end_date'));
    }

    //owner Account
    public function ownerAccount(Request $request){
        $start_date     = isset($request->start_date) ? $request->start_date : date('Y-m-d', strtotime('-7 days'));
        $end_date       = isset($request->end_date) ? $request->end_date : date('Y-m-d');
        $owner_accounts = OwnerAccount::join('owners','owners.api_token','owner_account.user_id')
                                    ->select('owners.name as owner_name','owners.phone as owner_phone','owner_account.id',
                                            'owner_account.amount','owner_account.ride_id','owner_account.type','owner_account.reason'
                                    )
                                    ->whereBetween('owner_account.date',[$start_date, $end_date])
                                    ->get();
        return view('quicar.backend.account.owner_account', compact('owner_accounts','start_date','end_date'));
    }
}
