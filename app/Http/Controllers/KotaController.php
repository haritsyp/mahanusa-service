<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Kota;

class KotaController extends Controller
{
	public function getKota(){
		$kota = Kota::all();
		$kotas['result'] = $kota;
		return response($kotas);
	}

	function index()
	{
		$data = Kota::get();
		return view('pages.kota.index', compact('data'));
	}

	function create(){
		$kota = Kota::get();
		return view('pages.kota.create',compact('kota'));
	}

	public function store(Request $request) {
		$preview = $request->file('preview');
		$extension = $preview->getClientOriginalExtension();
		Storage::disk('public')->put($preview->getFilename().'.'.$extension,  File::get($preview));

		$data = new Kota();
		$data->id = $request->id;
		$data->nama_kota = $request->nama_kota;
		$data->preview = $preview->getFilename().'.'.$extension;
		$data->save();
		return redirect('admin/kota');
	}

	public function edit($id)
	{
		$data=Kota::find($id);
		$kota = Kota::get();
		return view('pages.kota.edit',compact('data','kota'));
	}

	public function update(Request $request, $id)
	{
		$data = Kota::find($id);
		if(!empty($request->file('preview'))){
			$preview = $request->file('preview');
			$extension = $preview->getClientOriginalExtension();
			$file = public_path().'\image\\'.$data->preview;
			if(file_exists($file)){
				unlink($file);
			}
			Storage::disk('public')->put($preview->getFilename().'.'.$extension,  File::get($preview));
			$data->preview = $preview->getFilename().'.'.$extension;
		}

		$data->nama_kota = $request->nama_kota;
		$data->save();
		return redirect('admin/kota');
	}

	public function destroy($id){
		$data = Kota::find($id)->delete();
		if($data){
			return redirect('kota');
		}
	}

	public function deleteKota(Request $request){
		$datas = Kota::find($request->id);
		$data = Kota::find($request->id)->delete();   
		$file = public_path().'\image\\'.$datas->preview;
		unlink($file);
		return redirect('admin/kota');
	}
}
