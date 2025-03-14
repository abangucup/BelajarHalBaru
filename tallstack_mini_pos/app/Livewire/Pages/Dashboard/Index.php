<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
   // define layout
   #[Layout('layouts.app')]
   // define title
   #[Title('Dashboard')]

   public function render()
   {
       // sum grandtotal all transaction
       $revenue = Transaction::query()
           ->whereUserId(auth()->user()->id)
           ->sum('grand_total');

       // sum grandtotal transaction this month
       $monthly_revenue = Transaction::query()
           ->whereUserId(auth()->user()->id)
           ->whereMonth('created_at', date('m'))
           ->sum('grand_total');

       // count all transaction
       $transaction = Transaction::count();

       // get product out of stock
       $product_out_stocks = Product::query()
           ->with(['category' => fn($query) => $query->select('id', 'name')])
           ->select('id', 'category_id', 'name', 'quantity')
           ->where('quantity', '<=', 5)
           ->limit(8)->get();

       // get best selling product
       $best_selling_products = Product::query()
           ->select('products.id', 'products.name', DB::raw('SUM(transaction_details.quantity) as total_sold'))
           ->join('transaction_details', 'products.id', '=', 'transaction_details.product_id')
           ->groupBy('products.id', 'products.name')
           ->orderBy('total_sold', 'DESC')
           ->limit(10)
           ->get();

       // render view
       return view('livewire.pages.dashboard.index', compact('revenue', 'monthly_revenue', 'transaction', 'product_out_stocks', 'best_selling_products'));
   }
}
