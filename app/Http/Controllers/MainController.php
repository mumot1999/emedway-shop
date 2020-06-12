<?php


namespace App\Http\Controllers;


use App\Item;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function postCheckout(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'phone' => 'required|int',
            'nip' => 'required',
            'name' => 'required',
            'street' => 'required',
            'postcode' => 'required',
        ]);
        $items = Item::findMany($request->get('items'));
        dd($request->all());
    }
}
