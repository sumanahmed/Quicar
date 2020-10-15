<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdminDebit;
use App\Model\UserAccount;
use App\Model\OwnerAccount;
use DB;

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
        $start_date     = isset($request->start_date) ? $request->start_date : date('Y-m-d', strtotime('-7 days'));
        $end_date       = isset($request->end_date) ? $request->end_date : date('Y-m-d');
        $user_accounts  = UserAccount::select('user_id',DB::raw('sum(amount) as amount'),DB::raw('count(ride_id) as total_ride'))                                    
                                    ->groupBy('user_id')
                                    ->whereBetween('date',[$start_date, $end_date])
                                    ->get();
        return view('quicar.backend.account.user_account', compact('user_accounts','start_date','end_date'));
    }

    //user account details
    public function userAccountDetails($user_id){
        $user_accounts = UserAccount::where('user_id', $user_id)->get();
        return view('quicar.backend.account.user_account_details', compact('user_accounts'));
    }

    //owner Account
    public function ownerAccount(Request $request){
        $start_date     = isset($request->start_date) ? $request->start_date : date('Y-m-d', strtotime('-7 days'));
        $end_date       = isset($request->end_date) ? $request->end_date : date('Y-m-d');
        $owner_accounts = OwnerAccount::select('user_id', DB::raw('sum(amount) as amount'), DB::raw('count(ride_id) as total_ride'))
                                    ->groupBy('user_id')
                                    ->whereBetween('date',[$start_date, $end_date])
                                    ->get();
        return view('quicar.backend.account.owner_account', compact('owner_accounts','start_date','end_date'));
    }

    //owner account details
    public function ownerAccountDetails($user_id){
        $owner_accounts = OwnerAccount::where('user_id', $user_id)->get();
        return view('quicar.backend.account.owner_account_details', compact('owner_accounts'));
    }
}
