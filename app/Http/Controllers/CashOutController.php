<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CashOut;
use App\Sale;
use App\Income;
use App\Expense;
use App\Subscription;
use App\Payment;
use App\SmallBox;
use Carbon;
use PDF;

class CashOutController extends Controller
{

    public function index()
    {
      $latest = CashOut::latest()->first();

      $sales = Sale::whereNull('box')->with('user', 'products', 'payment')->get();
      $incomes = Income::whereNull('box')->get();
      $expenses = Expense::whereNull('box')->with('user')->get();
      $inscriptions = Subscription::whereNull('box')->with('user', 'payment_method')->get();
      $payments = Payment::whereNull('box')->with('user', 'payment_method')->get();
      return view('backend.transaction.cash.index', compact('latest', 'sales', 'incomes', 'expenses', 'inscriptions', 'payments'));
    }


    public function indexall()
    {
      $cashout = CashOut::orderBy('updated_at', 'desc')->whereNotNull('final')->paginate();
      return view('backend.transaction.cash.indexall', compact('cashout'));
    }

    public function show($id)
    {
      $cash = CashOut::findOrFail($id);
      $sales = $cash->sales()->with('user', 'payment')->orderBy('updated_at', 'desc')->get();
      $inscriptions = $cash->inscriptions()->with('user', 'payment_method')->orderBy('updated_at', 'desc')->get();
      $payments = $cash->payments()->with('user', 'payment_method')->orderBy('updated_at', 'desc')->get();
      return view('backend.transaction.cash.show', compact('cash', 'sales', 'inscriptions', 'payments'));
    }

    public function showcash($id)
    {
      $cash = CashOut::findOrFail($id);
      $sales = $cash->sales()->whereHas('payment',function( $query ){
        $query->where('id','1');
        })->with('user', 'payment')->orderBy('updated_at', 'desc')->get();
      $inscriptions = $cash->inscriptions()->whereHas('payment_method',function( $query ){
        $query->where('id','1');
        })->with('user', 'payment_method')->orderBy('updated_at', 'desc')->get();
      $payments = $cash->payments()->whereHas('payment_method',function( $query ){
        $query->where('id','1');
        })->with('user', 'payment_method')->orderBy('updated_at', 'desc')->get();
      return view('backend.transaction.cash.showcash', compact('cash', 'sales', 'inscriptions', 'payments'));
    }

    public function showcard($id)
    {
      $cash = CashOut::findOrFail($id);
      $sales = $cash->sales()->whereHas('payment',function( $query ){
        $query->where('id','2');
        })->with('user', 'payment')->orderBy('updated_at', 'desc')->get();
      $inscriptions = $cash->inscriptions()->whereHas('payment_method',function( $query ){
        $query->where('id','2');
        })->with('user', 'payment_method')->orderBy('updated_at', 'desc')->get();
      $payments = $cash->payments()->whereHas('payment_method',function( $query ){
        $query->where('id','2');
        })->with('user', 'payment_method')->orderBy('updated_at', 'desc')->get();
      return view('backend.transaction.cash.showcard', compact('cash', 'sales', 'inscriptions', 'payments'));
    }

    public function storeInitial(Request $request)
    {

      $this->validate($request, [
          'quantity' => 'required',
      ]);

      $cashinput = new CashOut();
      $cashinput->initial = $request->quantity;
      $cashinput->save();
   
      return redirect()->route('admin.transaction.cash.index')
      ->withFlashSuccess('Cantidad inicial guardada con éxito');

    }


    public function updateFinal(Request $request)
    {
    
      $this->validate($request, [
          'final' => 'required|not_in:0',
      ]);

      $cashinput = CashOut::findOrFail($request->id);
      $cashinput->final = $request->final;
      $cashinput->update();

      $sales = Sale::whereNull('box')->get();
      foreach($sales as $sal){
        $sal->box = $cashinput->id;
        $sal->save();
      }

      $incomes = Income::whereNull('box')->get();
      foreach($incomes as $inc){
        $inc->box = $cashinput->id;
        $inc->save();
      }

      $expenses = Expense::whereNull('box')->get();
      foreach($expenses as $expense){
        $expense->box = $cashinput->id;
        $expense->save();
      }

      $subscriptions = Subscription::whereNull('box')->get();
      foreach($subscriptions as $sub){
        $sub->box = $cashinput->id;
        $sub->save();
      }

      $payments = Payment::whereNull('box')->get();
      foreach($payments as $pay){
        $pay->box = $cashinput->id;
        $pay->save();
      }
   
      return redirect()->route('admin.transaction.cash.indexall')
      ->withFlashSuccess('Corte realizado con éxito');

    }

    public function updateInitial(Request $request)
    {

      $this->validate($request, [
          'quantity_' => 'required',
      ]);

      $cashinput = CashOut::findOrFail($request->id);
      $cashinput->initial = $request->quantity_;
      $cashinput->update();

      return redirect()->route('admin.transaction.cash.index')
        ->withFlashSuccess('Cantidad inicial actualizado con éxito');
    }

    public function withdraw(Request $request)
    {
    
      $this->validate($request, [
          'withdraw' => 'required',
      ]);

      $cashout = CashOut::findOrFail($request->id);
      $withdraw = $cashout->withdraw+$request->withdraw;
      $cashout->withdraw = $withdraw;
      $cashout->withdraw_final = $cashout->final-$withdraw;
        
        if($request->checkbox==1){
            $smallbox = new SmallBox();
            $smallbox->name = 'Corte de caja #'.$cashout->id;
            $smallbox->amount = $request->withdraw;
            $smallbox->type = 1;
            $smallbox->save();
        }

      $cashout->update();


   
      return redirect()->route('admin.transaction.cash.indexall')
      ->withFlashSuccess('Retiro realizado con éxito');

    }

    public function generatePDF($id)
    {
        // $data = ['title' => 'Welcome to '];
        // $pdf = PDF::loadView('mypdf', $data);
        $cash = CashOut::findOrFail($id);

        $customPaper = array(0,0,667.00,283.80);
        $pdf = PDF::setOption('page-height', '267.7')->setOption('page-width', '55.9')->setOption('margin-right', '2')->setOption('margin-left', '2')->setOption('margin-top', '2')->loadView('cashout', compact('cash'));

        return $pdf->stream('#'.$cash->id.'-corte.pdf');
    }


    public function destroy($id)
    {

      $cash_out = CashOut::findOrFail($id);
      try {
        $sale = $cash_out->sales()->update([
          'box' => null,
        ]);
        $inscriptions = $cash_out->inscriptions()->update([
          'box' => null,
        ]);
        $payments = $cash_out->payments()->update([
          'box' => null,
        ]);
        $incomes = $cash_out->incomes()->update([
          'box' => null,
        ]);
        $expenses = $cash_out->expenses()->update([
          'box' => null,
        ]);
          // $delete = CashOut::findOrFail($id);
          // $delete->delete();

      } catch (\Exception $e) {
          return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
      }


      return redirect()->route('admin.transaction.cash.indexall')->withFlashSuccess('Corte eliminado con éxito');
    }


}
