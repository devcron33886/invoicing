<?php

    namespace App\Http\Controllers;

    use App\Models\Customer;
    use App\Models\Invoice;
    use App\Models\Product;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;

    class HomeController extends Controller
    {
        public function index()
        {
            $products = Product::with(['created_by'])->where('created_by', auth()->id())->count();
            $customers = Customer::with(['created_by'])->where('created_by', auth()->id())->count();
            $newCustomers = DB::table('customers')->where('created_by', auth()->id())->whereDate('created_at', '>=',
                Carbon::now()->subDays(7))->count();
            $invoices=Invoice::with(['customer'])->where('user_id',auth()->id())->orderByDesc('id')
                ->paginate(10);
            $sales=DB::table('invoices')->where('user_id',auth()->id())->sum('total');

            return view('home', compact('products', 'customers', 'newCustomers','invoices','sales'));
        }
    }
