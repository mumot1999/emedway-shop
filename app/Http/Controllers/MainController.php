<?php


namespace App\Http\Controllers;


use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function postCheckout(Request $request)
    {
        if(!$request->get('items'))
            return back()->withErrors(['items' => "Your cart can't be empty"])->withInput($request->all());

        $this->validate($request, [
            'email' => 'required|email',
            'phone' => 'required|int',
            'nip' => 'required',
            'name' => 'required',
            'street' => 'required',
            'postcode' => 'required',
        ]);

        $items = Item::findMany($request->get('items'));

        foreach ($items as $item) {
            if($item->amount == 0){
                return back()->withErrors(['items' => "Sorry, we don't have ".$item->name])->withInput($request->all());
            }
            DB::transaction(function () use ($item) {
                $item->amount--;
                $item->update();
            });
        }

        return back()->with('success_checkout', true);
    }
}
