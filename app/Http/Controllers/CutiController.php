<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\CutiType;
use App\Cuti;
use App\CutiRecord;

use App\Notifications\CutiApprovedSmsNotification;
use App\Notifications\CutiRejectedSmsNotification;

use App\Notifications\CutiApproveMailNotification;
use App\Notifications\CutiRejectMailNotification;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Daftar Cuti Pegawai";

        $data = Cuti::paginate('15');

        return view('cuti.index',compact(['page_title','data']));
    }

    public function proses()
    {
        $page_title = "Daftar Cuti Menunggu";

        $data = Cuti::where('cuti_status_id',1)->paginate('15');

        return view('cuti.proses_cuti',compact(['page_title','data']));
    }

    public function berjalan()
    {
        $page_title = "Daftar Cuti Berjalan";

        $data = Cuti::where('cuti_status_id',2)->paginate('15');

        return view('cuti.berjalan_cuti',compact(['page_title','data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Form Pengajuan Cuti";

        $cuti_type = CutiType::all('type','id');

        return view('cuti.create',compact(['page_title','cuti_type']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $start = Carbon::createFromFormat('m/d/Y', substr($input['rangeTanggal'], 0, 10));

        $end = Carbon::createFromFormat('m/d/Y', substr($input['rangeTanggal'], 13, 10));

        $startDate = $start->copy()->subDay();

        $selama = $startDate->diffInDays($end);

        $cuti = Cuti::where('cuti_type_id', $input['cuti_type_id'])
                        ->where('user_id', Auth::id())
                        ->whereBetween('berakhir',[Carbon::now(),$end])->first();

        $cutiRunning = Cuti::whereBetween('berakhir',[Carbon::now(),$end])
                            ->where('user_id',Auth::id())->get();

        $masa_kerja = Auth::user()->masaKerja();

        $cuti_hamil = $start->copy()->diffInDays($start->copy()->addMonths(3));

        $cuti_nikah = $start->copy()->diffInDays($start->copy()->addWeekDays(3));

        $cuti_tahunan = $startDate->diffInDays($end);

        if (empty($cuti) or empty($cutiRunning)) {

            // cuti tahunan as per masa kerja

            if ($input['cuti_type_id'] === "1" && $selama >= 12 && $masa_kerja >= 5) {
                return redirect()->back()
                ->with('message', 'Cuti Tahunan Melebihi Batas Hari!')
                ->with('status','error')
                ->with('type','error');                            
            }

            if ($input['cuti_type_id'] === "1" && $selama >= 15 && $masa_kerja <= 10) {
                return redirect()->back()
                ->with('message', 'Cuti Tahunan Melebihi Batas Hari!')
                ->with('status','error')
                ->with('type','error');                            
            }

            if ($input['cuti_type_id'] === "1" && $selama >= 18 && $masa_kerja <= 10) {
                return redirect()->back()
                ->with('message', 'Cuti Tahunan Melebihi Batas Hari!')
                ->with('status','error')
                ->with('type','error');                            
            }
            // cuti hamil max 3 months start from day taken
            if ($input['cuti_type_id'] === "2") {
                if ($input['cuti_type_id'] === "2" && $selama > $cuti_hamil) {
                    return redirect()->back()
                            ->with('message', "Cuti Melahirkan Melebihi Batas Syarat $selama!")
                            ->with('status','error')
                            ->with('type','error');
                }elseif ($input['cuti_type_id'] === "2" && $selama < $cuti_hamil) {
                    return redirect()->back()
                            ->with('message', "Cuti Melahirkan Kurang Batas Syarat $selama!")
                            ->with('status','error')
                            ->with('type','error');
                }
            }

            if ($input['cuti_type_id'] === "3") {
                if ($input['cuti_type_id'] === "3" && $selama > 40) {
                    return redirect()->back()
                            ->with('message', "Cuti Haji Melebihi Batas Syarat .$selama!")
                            ->with('status','error')
                            ->with('type','error');
                }elseif ($input['cuti_type_id'] === "3" && $selama < 40) {
                    return redirect()->back()
                            ->with('message', "Cuti Haji Kurang Dari Batas Syarat $selama!")
                            ->with('status','error')
                            ->with('type','error');
                }
                    
            }

            if ($input['cuti_type_id'] === "4") {
                if ($selama > 3) {
                    return redirect()->back()
                            ->with('message', "Cuti Nikah Melebihi Syarat $selama!")
                            ->with('status','error')
                            ->with('type','error');
                }elseif ($selama < 3) {
                    return redirect()->back()
                            ->with('message',  "Cuti Nikah Kurang Dari Syarat $selama!")
                            ->with('status','error')
                            ->with('type','error');
                }
            }

            $cuti = new Cuti;

            $cutiRecord = CutiRecord::where('user_id',Auth::id())->where('cuti_type_id',$input['cuti_type_id']);

            $cuti->cuti_type_id = $input['cuti_type_id'];
            $cuti->mulai = $start;
            $cuti->berakhir = $end;
            $cuti->masa_tahun = $input['masa_tahun'];
            $cuti->keperluan = $input['keperluan'];
            $cuti->alamat = $input['alamat'];
            // $cuti->catatan_umc = $input['catatan_umc'];
            // $cuti->permohonan_lain = $input['permohonan_lain'];
            // $cuti->rekomendasi_1 = $input['rekomendasi_1'];
            // $cuti->rekomendasi_2 = $input['rekomendasi_2'];
            $cuti->user_id = Auth::id();
            if ($input['cuti_type_id'] === "1") {
                $cuti->total = $cuti_tahunan;
            }
            $cuti->total = $selama;

            // Cuti Record increment decrease
            $cutiRecord->increment('terpakai',$selama);

            $cuti->save();

            return redirect()->route('user.cuti.status')
            ->with('message', 'Data Telah Tersimpan!')
            ->with('status','success')
            ->with('type','success');
        }

        if (!empty($cuti) or !empty($cutiRunning)) {
            return redirect()->back()
            ->withInputs($input)
            ->with('message', 'Permohonan Belum Bisa Diajukan, Cuti Anda Sedang Berjalan!')
            ->with('status','error')
            ->with('type','error');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = "Permohon Cuti";

        $data = Cuti::findOrFail($id);

        if ($data->cuti_status_id === 3) {
            return view('cuti.show_ditolak',compact(['page_title','data']));
        }

        if(is_null($data->catatan_umc))
        {
            return view('cuti.show_umc',compact(['page_title','data']));
        }else{
            return view('cuti.show',compact(['page_title','data']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = "Catatan Cuti";

        $cuti = Cuti::findOrFail($id);

        $cuti_type = CutiType::all('type','id');

        return view('cuti.edit',compact(['page_title','cuti','cuti_type']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $cuti = Cuti::findOrFail($id);

        $cuti->update($input);

        return redirect()->route('admin.cuti.index')
                        ->with('message','Data Berhasil diupdate!')
                        ->with('type','success')
                        ->with('status','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cutiStatus()
    {
        $page_title = "Status Pengajuan Cuti ".Auth::user()->fullName();

        $data = Auth::user()->cutis()->paginate(15);

        return view('cuti.status_cuti',compact(['page_title','data']));
    }

    public function cutiApproved($id)
    {
        // todo kirim sms setelah aksi

        $data = Cuti::find($id);

        $data->cuti_status_id = 2;

        $data->save();

        if ($data) {
            
            // kirim sms pemberitahuan diseteujui

            $data->user->notify(new CutiApprovedSmsNotification($data));

            // kirim email pemberitahuan disetejui

            // $data->user->notify(new CutiApproveMailNotification($data));
        }

            // redirect back

            return redirect()->route('user.cuti.status');

    }

    public function cutiReject($id)
    {
        // todo kirim sms setelah aksi

        $data = Cuti::find($id);

        $data->cuti_status_id = 3;

        $data->save();

        if ($data) {

            //kirim sms pemberitahuan ditolak

            $data->user->notify(new CutiRejectedSmsNotification($data));

            // kirim email pemberitahuan disetejui

            // $data->user->notify(new CutiRejectMailNotification($data));
        }

            // redirect back

            return redirect()->route('user.cuti.status');

    }

    public function cutiBerjalan()
    {
        $page_title = "Daftar Cuti Berjalan Pegawai";

        $data = Cuti::where('cuti_status_id',2)->paginate('15');

        return view('cuti.cuti_berjalan',compact(['page_title','data']));
    }
}
