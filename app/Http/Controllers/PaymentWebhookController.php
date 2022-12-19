<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentWebhookController extends Controller
{
    public function handler(Request $request)
    {
        $user = User::where('epayco_id',$request->x_cust_id_cliente)->first();
        $rol = $user->hasRole('Conductor');
        if ((int) $request->x_cod_response == 1)
            $this->facture($user,$request,1, $rol);
        else
            $this->facture($user,$request,0,$rol);
    }

    public function facture(User $user,$request,$status, $rol){
        Bill::create([
            'user_id' => $user->id,
            'reference' => $request->x_ref_payco,
            'status' => $status,
            'cutoff' => $request->date
        ]);
        if($rol){
            $user->drivers[0]->status = $status;
            $user->drivers[0]->save();
        }else{
            $user->owners[0]->status = $status;
            $user->owners[0]->save();
        }
        if ($status)
            $user->givePermissionTo('offer_view');
        else
            $user->revokePermissionTo('offer_view');

    }

}
