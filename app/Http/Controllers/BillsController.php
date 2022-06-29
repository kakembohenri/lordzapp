<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Bill;
use App\Models\Reciept;
use App\Models\Rental;
use Illuminate\Http\Request;
use PDF;

class BillsController extends Controller
{
    public function index()
    {
        $bills = Bill::where('landlord_id', auth()->user()->landlord->id)->where('paid', '0')->get();
        return view('bills.due', [
            'bills' => $bills
        ]);
    }

    public function rent_index()
    {
        $bills = Bill::where('tenant_id', auth()->user()->tenant->id)->where('balance', '>', '0')->get();
        return view('bills.pay', [
            'bills' => $bills
        ]);
        //dd(auth()->user());
    }

    public function pay_rent(Request $request, Bill $bill)
    {
        // dd($bill);
        if ($request->amount > $bill->balance) {
            return back()->with('greater', 'Please pay amount not greater than the balance owed');
        } else {

            // Create a reciept
            Reciept::create([
                'name' =>   auth()->user()->first_name . " " . auth()->user()->last_name,
                'amount' => $request->amount,
                'to' =>  $bill->rental->name,
                'balance' => $bill->balance
            ]);

            // Update bill
            $balance = $bill->balance - $request->amount;
            if ($balance > 0) {
                $status = 'unpaid';
            } else {
                $status = 'paid';
            }

            $bill->update([
                'paid' => $request->amount,
                'balance' => $balance,
                'status' => $status,
            ]);

            return back()->with('paid', 'Rent Payment recieved');
        }
    }

    public function reciept()
    {
        $reciepts = Reciept::where('name', auth()->user()->first_name . " " . auth()->user()->last_name)->get();
        return view('bills.reciept', [
            'reciepts' => $reciepts
        ]);
    }

    public function pdf(Reciept $reciept)
    {
        $pdf = PDF::loadView('pdf', ['reciept' => $reciept]);

        return $pdf->download('invoice.pdf');
    }

    public function bills_index()
    {
        if (auth()->user()->tenant) {
            $bills = Bill::where('tenant_id', auth()->user()->tenant->id)->get();
            return view('bills.history', [
                'bills' => $bills
            ]);
        } elseif (auth()->user()->landlord) {
            $bills = Bill::where('landlord_id', auth()->user()->landlord->id)->get();
            return view('bills.history', [
                'bills' => $bills
            ]);
        }
    }

    public function download_bills()
    {
        $bills = Bill::where('landlord_id', auth()->user()->landlord->id)->get();
        $users = array();
        $count = 0;
        foreach ($bills as $bill) {
            $month = $bill->created_at->format('M');
            $year = $bill->created_at->format('Y');
            if ($bill->paid == 0) {
                $paid = 0;
            } else {
                $paid = $bill->paid;
            }

            if ($bill->balance == 0) {
                $balance = 0;
            } else {
                $balance = $bill->balance;
            }
            $users[$count] = [
                [
                    'Name' => $bill->tenant->user->first_name . " " . $bill->tenant->user->last_name,

                    'Rent' => $bill->due,

                    'Paid' => $paid,

                    'Balance' => $balance,

                    'Month' => $month,

                    'Year' => $year
                ],
            ];

            $count++;
        }

        return Excel::download(new UsersExport($users), 'bills history.xlsx');
    }
}
