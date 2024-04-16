<?php

namespace App\Http\Controllers;

use App\Models\DetailSale;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Customer;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function paymentAdmin()
    {
        return view('page.admin.sale');
    }
    public function paymentUser()
    {
        $sales = Sale::with('customer', 'detailSale.product')->get();
        // dd($sales);
        return view('page.users.sale.sale', compact('sales'));
    }
    public function detailSale()
    {
        $products = Product::all();
        return view('page.users.sale.detailsale', compact('products'));
    }
    public function customer()
    {
        $sale = Sale::latest()->first();
        if (!$sale) {
            return redirect(route('customer'));
        }

        // dd($sale);

        $detailsale = DetailSale::where('sales_id', $sale->id)
            ->with('product')
            ->get();

        // dd($detailsale);

        return view('page.users.sale.customer', compact('sale', 'detailsale'));
    }

    public function customerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'telp' => 'required',
        ]);

        $customer = Customer::create([
            'name' => request('name'),
            'address' => request('address'),
            'telp' => request('telp'),
        ]);

        $sale = Sale::latest()->first();
        if ($sale) {
            $sale->update([
                'customers_id' => $customer->id,
            ]);
        }

        return redirect(route('user.payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function detailSaleStore(Request $request)
    {
        $hasOrder = false;
        foreach ($request->total_product as $order) {
            if ($order > 0) {
                $hasOrder = true;
                break;
            }
        }

        if (!$hasOrder) {
            return redirect()->back()->with('order-error-message', 'Please select at least one product');
        }

        try {
            DB::beginTransaction();
            $total_price = 0;
            $sale = Sale::create([
                'date_sale' => Carbon::now(),
                'total_price' => $total_price,
                'customers_id' => 0,
                'created_by' => auth()->user()->username,
            ]);

            foreach ($request->total_product as $products_id => $jumlah_order) {
                if ($jumlah_order == 0) {
                    continue;
                }

                $product = Product::find($products_id);
                if ($product->stock < $jumlah_order) {
                    DB::rollback();
                    return redirect()->back()->with('stock-error-message', 'Stock product is not enough');
                }

                $total_price += $product->price * $jumlah_order;
                // dd($total_price);

                DetailSale::create([
                    'sales_id' => $sale->id,
                    'products_id' => $product->id,
                    'total_product' => $jumlah_order,
                    'subtotal' => $product->price * $jumlah_order,
                ]);

                Product::find($products_id)->update([
                    'stock' => $product->stock - $jumlah_order,
                ]);
            }

            $sale->update([
                'total_price' => $total_price,
            ]);

            DB::commit();
            return redirect(route('customer'));
            dd(Sale::find($sale->id)->get(), DetailSale::where('sales_id', $sale->id)->get(), Product::where('id', $product->id)->get());
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message', $e->getMessage());
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteSale(Sale $sale, string $id)
    {
        $sale = Sale::find($id);
        DetailSale::where('sales_id', $sale->id)->delete();
        $sale->customer()->delete();
        $sale->delete();

        return redirect()->back()->with('delete-message', 'Delete Success');
    }
}
