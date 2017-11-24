<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cuti;
use App\CutiRecord;
use Carbon\Carbon;

class CutiRecordController extends Controller
{
    public function claim()
    {
    	$cuti_record = CutiRecord::where('user_id',Auth::id())->first();

        $cuti_hamil = Carbon::now()->diffInDays(Carbon::now()->addMonths(3));

        $cuti_umroh = 40;

        $cuti_nikah = 3;

        $cuti_tahunan = $this->cekJatah();

    	$total_cuti = [$cuti_tahunan,$cuti_hamil,$cuti_umroh,$cuti_nikah];

    	if (is_null($cuti_record)) {

    		$cuti_tahunan = $this->cekJatah();

    		$total_cuti = [$cuti_tahunan,$cuti_hamil,$cuti_umroh,$cuti_nikah];

    		$awal = Carbon::now();

    		foreach ($total_cuti as $key => $index) {
    				$key++;
                    if (Auth::user()->gender->gender == "Laki-Laki" && $key == 2) {
                        continue;
                    }elseif (Auth::user()->marriedStatus->status == "Menikah" && $key == 4) {
                        continue;
                    }else{
                        CutiRecord::create([
                        'cuti_type_id' => $key,
                        'user_id'   =>  Auth::id(),
                        'masa_berlaku'  => $awal,
                        'masa_berakhir' => $awal->copy()->addMonths(6),
                        'total' => $index
                    ]);
                    }
	    	}

	    	return redirect()->back()
	            ->with('message', 'Cuti Berhasil Diklaim!')
	            ->with('status','success')
	            ->with('type','success'); 		
    	}

    	if (!empty($cuti_record)) {
    		return redirect()->back()
			            ->with('message', 'Diklaim Ditolak!')
			            ->with('status','error')
			            ->with('type','error');
    	}
    }

    public function claimReport()
    {
        $users = User::paginate(15);

        $page_title = "Daftar User";

        return view('cuti-record.index',compact([
            'page_title',
            'users'
        ]));
    }

    public function showUserRecord($id)
    {
        $user = User::findOrFail($id);

        $cuti_records = CutiRecord::where('user_id',$user->id)->get();

        $page_title = "Laporan Sisa Cuti ".$user->fullName();

        return view('cuti-record.show',compact([
            'cuti_records',
            'page_title'
        ]));
    }

    public function cekJatah()
    {
    	$masa_kerja = Auth::user()->masaKerja();

    	$total = 0;

    	if ($masa_kerja <= 5 or $masa_kerja >= 5) {
    		$total = 12;
            }

        if ($masa_kerja > 5) {
        	$total = 15;
        }

        if ($masa_kerja > 10) {
        	$total = 18;
        }

        return $total;
    }
}
