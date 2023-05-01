<?php

namespace App\Http\Controllers;

use App\Models\GameAccount;
use App\Models\Transaksi;
use App\Models\TransaksiHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function indexTransaction($id)
    {
        if(Auth::user()->role === 'Admin'){
            $transaksi = DB::table('transaksi_histories')
        ->select('*','game_accounts.name as name')
        ->join('transaksis','transaksi_histories.TransaksiID','=','transaksis.TransaksiID')
        ->join('game_accounts','transaksis.GameAccountID','=','game_accounts.GameAccountID')
        ->get();
        }
        else{
            $transaksi = DB::table('transaksi_histories')
        ->select('*','game_accounts.name as name')
        ->join('transaksis','transaksi_histories.TransaksiID','=','transaksis.TransaksiID')
        ->join('game_accounts','transaksis.GameAccountID','=','game_accounts.GameAccountID')
        ->where(['transaksi_histories.UserID' => $id])
        ->get();
        }
        return view('transaksi_history', compact('transaksi'));
    }

    public function createTransaction(GameAccount $gameAccount)
    {
        return view('create_transaksi', ['gameAccount' => $gameAccount]);
    }

    public function storeTransaction(Request $request)
    {
        $tr = new Transaksi();
        $tr->GameAccountID = $request->GameAccountID;
        $tr->Method = $request->Method;
        $tr->UserID = $request->UserID;
        $tr->save();

        $trh = new TransaksiHistory();
        $trh->UserID = $request->user_id;
        $trh->TransaksiID = $tr->TransaksiID;
        $trh->save();

        $gameAccount = GameAccount::all()->find($tr->GameAccountID);
        $gameAccount->UserID = $trh->UserID;
        $gameAccount->save();

        return redirect()->route('Transaksi History Page',['id' => $trh->UserID]);

    }

    public function showTransaction($id)
    {
        $tr = DB::table('transaksis')
        ->select('*','game_accounts.name as name','transaksis.UserID as PrevOwner','transaksi_histories.UserID as BuyerUserID',"game_accounts.UserID as AccountOwner")
        ->join('transaksi_histories','transaksis.TransaksiID','=','transaksi_histories.TransaksiID')
        ->join('game_accounts','transaksis.GameAccountID','=','game_accounts.GameAccountID')
        ->where(['transaksis.TransaksiID' => $id])
        ->get();

        return view('view_transaksiHistory', compact('tr'));
    }
}
