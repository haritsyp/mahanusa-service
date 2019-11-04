<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Proyek;
use App\Kota;
use DB;


class ProyekController extends Controller
{

    public function getProyekNear(Request $request)
    {
        $proyek = DB::select("SELECT a.*,b.nama_kota,(SELECT SUM(nilai_proyek) from proyek ) as totalproyek,(select sum(jumlah_unit) from proyek) as totalunit,haversine(latitude,longitude,$request->latitude, $request->longitude) as distance FROM proyek a, kota b where a.id_kota=b.id and haversine(a.latitude,a.longitude,$request->latitude, $request->longitude) <= 100");
        $proyeks['result'] = $proyek;
        return response($proyeks);
    }

    public function getProyek(Request $request)
    {
        $proyek = DB::select("SELECT a.*,b.nama_kota,(SELECT SUM(nilai_proyek) from proyek ) as totalproyek,(select sum(jumlah_unit) from proyek) as totalunit FROM proyek a, kota b where a.id_kota=b.id");
        $proyeks['result'] = $proyek;
        return response($proyeks);
    }


    public function getProyekByKota(Request $request)
    {
        $proyek = DB::select("SELECT a.*,b.nama_kota,(SELECT SUM(nilai_proyek) from proyek ) as totalproyek,(select sum(jumlah_unit) from proyek) as totalunit FROM proyek a, kota b where a.id_kota=b.id and a.id_kota = '$request->id_kota' ");
        $proyeks['result'] = $proyek;
        return response($proyeks);
    }

    public function getProyekById(Request $request)
    {
        $proyek = Collect(\DB::select("SELECT a.*,b.nama_kota,(SELECT SUM(nilai_proyek) from proyek ) as totalproyek,(select sum(jumlah_unit) from proyek) as totalunit FROM proyek a, kota b where a.id_kota=b.id and a.id = $request->id_proyek"))->first();
        echo json_encode($proyek);
    }


    public function getDistance(){
        echo $this->distance(-7.254290781268196,112.68005772468018,-7.260997160698722,112.66274824086861, 'K');
    }

    function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

    function index()
    {
      $data = Proyek::get();
      return view('pages.proyek.index', compact('data'));
  }

  function create(){
    $kota = Kota::get();
    return view('pages.proyek.create',compact('kota'));
}

public function store(Request $request) {
    $preview = $request->file('preview');
    $extension = $preview->getClientOriginalExtension();
    Storage::disk('public')->put($preview->getFilename().'.'.$extension,  File::get($preview));

    $data = new Proyek();
    $data->nama_proyek = $request->nama_proyek;
    $data->nilai_proyek = $request->nilai_proyek;
    $data->jumlah_unit = $request->jumlah_unit;
    $data->id_kota = $request->id_kota;
    $data->preview = $preview->getFilename().'.'.$extension;
    $data->lokasi = $request->lokasi;
    $data->latitude = $request->latitude;
    $data->longitude = $request->longitude;
    $data->save();
    return redirect('admin/proyek');
}

public function edit($id)
{
  $data=Proyek::find($id);
  $kota = Kota::get();
  return view('pages.proyek.edit',compact('data','kota'));
}

public function update(Request $request, $id)
{
    $data = Proyek::find($id);
    if(!empty($request->file('preview'))){
      $preview = $request->file('preview');
      $extension = $preview->getClientOriginalExtension();
      $file = public_path().'\image\\'.$data->preview;
      if (file_exists($file)) {
        unlink($file);
      }
      Storage::disk('public')->put($preview->getFilename().'.'.$extension,  File::get($preview));
      $data->preview = $preview->getFilename().'.'.$extension;
  }
  
  $data->nama_proyek = $request->nama_proyek;
  $data->nilai_proyek = $request->nilai_proyek;
  $data->jumlah_unit = $request->jumlah_unit;
  $data->id_kota = $request->id_kota;

  $data->lokasi = $request->lokasi;
  $data->latitude = $request->latitude;
  $data->longitude = $request->longitude;
  $data->save();
  return redirect('admin/proyek');
}

public function destroy($id){
    $data = Proyek::find($id)->delete();
    if($data){
        return redirect('proyek');
    }
}

public function deleteProyek(Request $request){
    $datas = Proyek::find($request->id);
    $data = Proyek::find($request->id)->delete();   
    $file = public_path().'\image\\'.$datas->preview;
    unlink($file);
    return redirect('admin/proyek');

}
}
