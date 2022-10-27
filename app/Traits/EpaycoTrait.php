<?php

namespace App\Traits;

use App\Models\Card;
use App\Models\User;
use Epayco\Epayco;

/**
 * To connect Epayco
 */
trait EpaycoTrait
{
    private $epayco;

    public function __construct()
    {
        $this->epayco = new Epayco([
            "apiKey" => "11fdf4f07a1860f733891eee3b263b43",
            "privateKey" => "fee5f43f5eeb18f2da598e998639241f",
            "lenguage" => "ES",
            "test" => true
        ]);
    }

    public function subscriptions(User $user, $plan, $card){
        $sub = $this->epayco->subscriptions->create([
            "id_plan" => $plan,
            "customer" => $user->epayco_id,
            "token_card" => $card,
            "doc_type" => "CC",
            "doc_number" => $user->document,
        ]);

        return $sub;
    }

    public function paySubscriptions(User $user,  $plan, $card){
        $sub = $this->epayco->subscriptions->charge(array(
            "id_plan" => $plan,
            "customer" => $user->epayco_id,
            "token_card" => $card,
            "doc_type" => "CC",
            "doc_number" => $user->document,
            "ip" => request()->ip()  // This is the client's IP, it is required
          ));

        return $sub;
    }

    public function create(Card $card, User $user){
       $tokenCard = $this->epayco->token->create([
            "card[number]" => $card->number,
            "card[exp_year]" => $card->year,
            "card[exp_month]" => $card->month,
            "card[cvc]" => $card->cvc
        ]);

        $customer = $this->epayco->customer->create([
            "token_card" => $tokenCard->id,
            "name" => $user->name,
            "last_name" => $user->lastname, //This parameter is optional
            "email" => $user->email,
            //Optional parameters: These parameters are important when validating the credit card transaction
            "city" => $user->city,
            "cell_phone"=> $user->phone,
        ]);

        return ['card' =>$tokenCard->id, 'customer' => $customer->data->customerId];

    }

    public function listPlans()
    {
        dd($this->epayco);
       return $this->epayco->plan->getList();
    }

}
