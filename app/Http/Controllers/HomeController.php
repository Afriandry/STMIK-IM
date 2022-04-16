<?php

namespace App\Http\Controllers;

use App\Models\TrxThr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function pertemuanpertama()
    {
        return view('pertemuan1');
    }

    public function tugaspertama()
    {
        $data = [];
        return view('tugas1', compact('data'));
    }

    public function saveGaji(Request $request)
    {
        $data = $request->except("_token");
        // ambil data tanggal masuk
        $join = date_create($request->get("tglmasuk"));
        // ambil data tanggal hari ini
        $now = date_create(now());
        // hitung perbedaan tanggal masuk dan saat ini
        $diff= date_diff($join,$now);
        // ambil data perbedaan berdasarkan lama (tahun)
        $lamaKerja = $diff->y;
        
        // ambil data input golongan, status & anak
        $golongan = $request->get("golongan");
        $status = $request->get("status");
        $anak = $request->get("anak");
        // define gajipokok, tunjangan, dan potongan
        $gajipokok = 0;
        $tunjangan = 0;
        $potongan = 0;

        if($lamaKerja > 10) {
            if($golongan == "A") {
                $gajipokok = 5000000;
            } elseif ($golongan == "B")  {
                $gajipokok = 4000000;
            }
        } else { // jika lama kerja tidak lebih besar dari 10 tahun
            if($golongan == "A") {
                $gajipokok = 4500000;
            } else {
                $gajipokok = 3000000;
            }
        }

        if($status=="sudah") {
            $data["status"] = "Sudah Menikah";
            if($anak=="sudah") {
                $data["anak"] = "Sudah Punya Anak";
                $tunjangan = 1000000;
            } else {
                $data["anak"] = "Belum Punya Anak";
                $tunjangan = 750000;
            }
        } else {
            $data["status"] = "Belum Menikah";
            $tunjangan = 250000;
        }

        $gaji = $gajipokok + $tunjangan;

        if($gaji > 5500000) {
            $potongan = $gaji * 0.00025;
        }

        $data['totaltahun'] = $lamaKerja;
        $data['gajipokok'] = $gajipokok;
        $data['potongan'] = $potongan;
        $data['tunjangan'] = $tunjangan;
        $data['totalgaji'] = ($gajipokok + $tunjangan) - $potongan;
        return view('tugas1', compact('data'));
    }

    public function uts()
    {
        $data = [];
        return view('uts', compact('data'));
    }

    public function saveNilai(Request $request)
    {
        $data = $request->except("_token");

        $nilaiAbsen = intval($data['absen']) * (10/100); // Hitung Nilai 10% dari nilai absen
        $nilaiTugas = intval($data['tugas']) * (20/100); // Hitung Nilai 20% dari nilai tugas & quiz
        $nilaiUts = intval($data['uts']) * (30/100); // Hitung Nilai 30% dari nilai uts
        $nilaiUas = intval($data['uas']) * (40/100); // Hitung Nilai 40% dari nilai uas

        // Jumlah nilai akhir
        $nilaiAkhir = $nilaiAbsen + $nilaiTugas + $nilaiUts + $nilaiUas;

        if (intval($nilaiAkhir) > 90 ) { // jika NA lebih dari 90
            $data['grade'] = "A";
            $data['keterangan'] = "Memuaskan";
        } elseif (intval($nilaiAkhir) > 70 ) { // jika NA lebih dari 70
            $data['grade'] = "B";
            $data['keterangan'] = "Baik";
        } elseif (intval($nilaiAkhir) > 60 ) { // jika NA lebih dari 60
            $data['grade'] = "C";
            $data['keterangan'] = "Cukup";
        } elseif (intval($nilaiAkhir) > 55 ) { // jika NA lebih dari 55
            $data['grade'] = "D";
            $data['keterangan'] = "Kurang";
        } else {  // jika NA kurang dari 56
            $data['grade'] = "E";
            $data['keterangan'] = "Tidak Lulus";
        }

        $data['nilaiakhir'] = $nilaiAkhir;

        return view('uts', compact('data'));
    }

    public function uas()
    {
        $pegawai = DB::table('trx_thr')->get();
        return view('uas.index', compact('pegawai'));
    }

    public function tambahThr() {
        return view('uas.create');
    }

    public function saveThr(Request $request)
    {
        $data = $request->except("_token");

        // ambil data input golongan, nama, tgl masuk
        $golongan = $request->get("golongan");
        $nama = $request->get("nama");
        $tglMasuk = $request->get("tglmasuk");
        // ambil data tanggal masuk
        $join = date_create($tglMasuk);
        // ambil data tanggal hari ini
        $now = date_create(now());
        // hitung perbedaan tanggal masuk dan saat ini
        $diff= date_diff($join,$now);
        // ambil data perbedaan berdasarkan lama (tahun)
        $lamaKerja = $diff->y;

        $thr = 0;
        $thrAkhir = 0;

        if($golongan == "Guru") {
            $thr = 4000000;
        } elseif ($golongan == "Pelaksana") {
            $thr = 3000000;
        } else { // Manajerial
            $thr = 5000000;
        }

        if ($lamaKerja <= 1) {
            $thrAkhir = $thr * 0.5;
        } elseif ($lamaKerja <= 3) {
            $thrAkhir = $thr * 0.75;
        } elseif ($lamaKerja > 3) {
            $thrAkhir = $thr;
        }

        $obj = new TrxThr();
        $dataInsert = array(
            'nama' => $nama,
            'golongan' => $golongan,
            'tgl_masuk' => $tglMasuk,
            'lama_kerja' => $lamaKerja,
            'thr' => $thrAkhir
        );
        $obj->insert($dataInsert);

        return redirect('/thr');
    }

    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('trx_thr')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/thr');
    }
}
