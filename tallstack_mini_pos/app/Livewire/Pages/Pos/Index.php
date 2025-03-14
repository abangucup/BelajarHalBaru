<?php

namespace App\Livewire\Pages\Pos;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // define layout
    #[Layout('layouts.app')]
    // define title
    #[Title('Pos')]

    // define property
    #[Url]
    public $search;
    public $carts;
    public $qty;
    public $totalQty;
    public $subTotalPrice;
    public $totalPrice;
    public $pay;
    public $change;

    // define method userCarts
    public function userCarts()
    {
        // get carts data by userId
        $this->carts = Cart::whereUserId(auth()->user()->id)->get();
    }

    // define lifecycle hooks
    public function mount()
    {
        // call method userCarts
        $this->userCarts();

        // loop carts data
        foreach($this->carts as $cart){
            // set totalQty
            $this->totalQty[$cart->id] = $cart->quantity;
            // set subTotalPrice
            $this->subTotalPrice[$cart->id] = $cart->quantity * $cart->price;
            // set totalPrice
            $this->totalPrice = $this->totalPrice + $this->subTotalPrice[$cart->id];
            // set change
            $this->change = 0;
        }
    }

    // define method addToCart
    public function addToCart($id)
    {
        // get product item by id
        $product = Product::findOrFail($id);

        // get cart items by product id and user id
        $cart = Cart::whereProductId($product->id)->whereUserId(auth()->user()->id)->first();

        // do it when cart is true
        if($cart && $product->quantity > 0){
            // do it when cart qty is less than product qty
            if($cart->quantity < $product->quantity) {

                // update cart qty
                $cart->update([
                    'quantity' => $cart->quantity + 1,
                ]);
            }
        }else{
             // do it when product quantity is more than 0
            if($product->quantity > 0) {

                // create new cart data
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'price' => $product->price,
                ]);
            }
        }

        // render view
        return $this->redirect('/pos', navigate: true);
    }

    // define method incrementQty
    public function incrementQty($id)
    {
        // get cart items by id
        $cart = Cart::whereId($id)->whereUserId(auth()->user()->id)->first();

        // get products by id
        $product = Product::findOrFail($cart->product_id);

        // do it when cart qty is less than product qty
        if($cart->quantity < $product->quantity){
            // update cart qty
            $cart->increment('quantity');
            // update totalQty
            $this->totalQty[$cart->id] = $cart->quantity;
            // update subTotalPrice
            $this->subTotalPrice[$cart->id] = $cart->quantity * $cart->price;
            // update totalPrice
            $this->totalPrice += $cart->price;
            // update change
            $this->change = $this->totalPrice;
        }
    }

    // define method decrementQty
    public function decrementQty($id)
    {
        // get cart items by id
        $cart = Cart::whereId($id)->whereUserId(auth()->user()->id)->first();

        // do it when cart qty more than 1
        if($cart->quantity > 1){
            // update cart qty
            $cart->decrement('quantity');
            // update totalQty
            $this->totalQty[$cart->id] = $cart->quantity;
            // update subTotalPrice
            $this->subTotalPrice[$cart->id] = $cart->quantity * $cart->price;
            // update totalPrice
            $this->totalPrice -= $cart->price;
            // update change
            $this->change = $this->totalPrice;
        }
    }

    // define method removeItem
    public function removeItem($id)
    {
        // get cart data by id
        $cart = Cart::findOrFail($id);

        // delete cart data
        $cart->delete();

        // render view
        return $this->redirect('/pos', navigate: true);
    }

    // define method updateChange
    public function updateChange()
    {
        // do it when property pay is more than 0
        if($this->pay > 0 ) {

            // calculate change
            $this->change = $this->pay - $this->totalPrice;
        }
        else {

            // change is totalPrice
            $this->change = $this->totalPrice;
        }
    }

    // define lifecycle hook
    public function updatedPay()
    {
        // call method updateChange
        $this->updateChange();
    }

    // define method save
    public function save()
    {
        // start db transaction
        DB::transaction(function(){
            // loop
            for($i = 0; $i < 6; $i++) {

                // generate random char
                $char = rand(0,1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
            }

            // generate invoice
            $invoice = 'TRX-'.str()->upper($char);

            // create new transaction
            $transaction = Transaction::create([
                'invoice' => $invoice,
                'user_id' => auth()->user()->id,
                'cash' => $this->pay,
                'grand_total' => $this->totalPrice,
                'change' => $this->change,
            ]);

            // loop user carts
            foreach($this->carts as $cart){
                // create new transaction details
                $transaction->details()->create([
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->price
                ]);

                // update qty product
                Product::where('id', $cart->product_id)->decrement('quantity', $cart->quantity);
            }

            // delete cart
            $this->carts->each->delete();

            // render view
            return $this->redirect('/dashboard', navigate: true);
        });
    }

    public function render()
    {
        // list products data
        $products = Product::query()
            ->with('category')
            ->when($this->search, function($query){
                $query->where('name', 'like', '%'. $this->search . '%');
            })->paginate(9);

        // render view
        return view('livewire.pages.pos.index', compact('products'));
    }
}
