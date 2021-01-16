<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\PolicyPartner;
use App\Model\PolicyUser;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * show user policy page
     */
    public function showPolicyUser()
    {
        $policy_user = PolicyUser::find(1);
        return view('quicar.backend.policy.user', compact('policy_user'));
    }
    /**
     * update user policy
     */
    public function updatePolicyUser(Request $request)
    {
        $this->validate($request, [
            'terms_of_services' => 'required',
            'privacy_policy'    => 'required',
            'booking_policy'    => 'required',
            'cancellation_policy' => 'required',
            'payment_policy'    => 'required',
            'refund_policy'     => 'required',
        ]);

        $policy_user = PolicyUser::find(1);
        
        $policy_user->terms_of_services     = $request->terms_of_services;
        $policy_user->privacy_policy        = $request->privacy_policy;
        $policy_user->booking_policy        = $request->booking_policy;
        $policy_user->cancellation_policy   = $request->cancellation_policy;
        $policy_user->payment_policy        = $request->payment_policy;
        $policy_user->refund_policy         = $request->refund_policy;
        $policy_user->update();

        return redirect()->back()->with('message','Policy update successfully');
    }

    /**
     * show partner policy page
     */
    public function showPolicyPartner()
    {
        $policy_partner = PolicyPartner::find(1);
        return view('quicar.backend.policy.partner', compact('policy_partner'));
    }

    /**
     * update user policy
     */
    public function updatePolicyPartner(Request $request)
    {

        $this->validate($request, [
            'terms_of_services' => 'required',
            'privacy_policy'    => 'required',
            'booking_policy'    => 'required',
            'cancellation_policy' => 'required',
            'payment_policy'    => 'required',
            'cashback_policy'     => 'required',
        ]);

        $policy_partner = PolicyPartner::find(1);

        $policy_partner->terms_of_services  = $request->terms_of_services;
        $policy_partner->privacy_policy     = $request->privacy_policy;
        $policy_partner->booking_policy     = $request->booking_policy;
        $policy_partner->cancellation_policy= $request->cancellation_policy;
        $policy_partner->payment_policy     = $request->payment_policy;
        $policy_partner->cashback_policy    = $request->cashback_policy;
        $policy_partner->update();

        return redirect()->back()->with('message','Policy update successfully');
    }
}
