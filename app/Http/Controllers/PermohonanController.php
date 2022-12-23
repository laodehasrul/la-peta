<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Kategorilayanan;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class PermohonanController extends Controller
{
    protected $row;
    protected $slug;
    public function formulir()
    {
        $formulir = Formulir::orderBy('id', 'asc')->paginate(6);
     
        return view('formulir', compact('formulir'));
    }
    public function layanan_permohonan()
    {
        $jenis_layanan = Kategorilayanan::all();
        return view('frontend.layanan_permohonan', compact('jenis_layanan'));
    }
    public function formpost(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'jenis_layanan' => 'required|exists:kategori_layanans,id',
            'nama_lengkap' => 'required|',
            'nik_ktp' => 'required|',
            'email_cust' => 'required|',
            'nomor_hp' => 'required|',
            'file_ktp' => 'required|max:2048',
            'file_berkas' => 'required|max:5200',
            'file_berkas.*' => 'mimes:mimes:jpg,jpeg,png,pdf',
            'file_ktp.*' => 'mimes:mimes:jpg,jpeg,png,pdf',
        ],
        [
            'file_ktp.required' => 'Mohon Lengkapi Data',
            'file_berkas.required' => 'Mohon Lengkapi Data'
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Mohon Lengkapi Data!');

            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $layanan = new Layanan();
      
        if ($request->hasfile('file_berkas')) {
            $filesBerkas = Arr::wrap($request->file_berkas);
            $filesPathBerkas = [];
            $path = $this->generatePath();

            foreach ($filesBerkas as $file) {
                $filename = $this->generateFileName($file, $path);
                $file->storeAs(
                    'Layanan\Berkas' .
                        $path,
                    $filename . '.' . $file->getClientOriginalExtension(),
                    config('voyager.storage.disk', 'public')
                );

                array_push($filesPathBerkas, [
                    'download_link' => 'Layanan\Berkas'. $path . $filename . '.' . $file->getClientOriginalExtension(),
                    'original_name' => $file->getClientOriginalName(),
                ]);
            }
            $layanan->file_berkas = $filesPathBerkas;
        }
        if ($request->hasfile('file_ktp')) {
            $files = Arr::wrap($request->file_ktp);
            $filesPath = [];
            $path = $this->generatePath();

            foreach ($files as $file) {
                $filename = $this->generateFileName($file, $path);
                $file->storeAs(
                    'Layanan\NIK' .
                        $path,
                    $filename . '.' . $file->getClientOriginalExtension(),
                    config('voyager.storage.disk', 'public')
                );

                array_push($filesPath, [
                    'download_link' => 'Layanan\NIK'. $path . $filename . '.' . $file->getClientOriginalExtension(),
                    'original_name' => $file->getClientOriginalName(),
                ]);
            }
            $layanan->file_ktp = $filesPath;
        }
        $layanan->nama_lengkap = $request->nama_lengkap;
        $layanan->email_cust = $request->email_cust;
        $layanan->nik_ktp = $request->nik_ktp;
        $layanan->nomor_hp = $request->nomor_hp;
        $layanan->jenis_layanan = $request->jenis_layanan;

        $layanan->save();
        Alert::success('Permohonan Terkirim', 'Terimah Kasih Sudah Menggunakan Layanan Kami...');

        return back();
    }
    protected function generatePath()
    {
        return $this->slug . DIRECTORY_SEPARATOR . date('FY') . DIRECTORY_SEPARATOR;
    }
    protected function generateFileName($file, $path)
    {
        $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension());
        $filename_counter = 1;
        // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
        while (Storage::disk(config('voyager.storage.disk'))->exists($path . $filename . '.' . $file->getClientOriginalExtension())) {
            $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) . (string) ($filename_counter++);
        }
        return $filename;
    }
}
