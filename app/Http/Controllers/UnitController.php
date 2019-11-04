<?php

namespace App\Http\Controllers;
use DB;
use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    function getUnit(Request $request){
        $unit = DB::select("select * from unit where id_proyek = $request->id_proyek");
        $units['result'] = $unit;
        return response($units);
    }

    function index()
	{
		$data = DB::select("select a.*,b.nama_proyek from unit a join proyek b on a.id_proyek = b.id");
		return view('pages.unit.index', compact('data'));
	}

	function create(){
		$unit = Unit::get();
		$proyek = DB::select("select * from proyek");
		return view('pages.unit.create',compact('unit','proyek'));
	}

	public function store(Request $request) {
		$data = new Unit();
		$data->tipe = $request->tipe;
		$data->harga_jual = $request->harga_jual;
		$data->jumlah_unit = $request->jumlah_unit;
		$data->setoran_awal = $request->setoran_awal;
		$data->id_proyek = $request->id_proyek;
		$data->save();
		return redirect('admin/unit');
	}

	public function edit($id)
	{
		$data=Unit::find($id);
		$proyek = DB::select("select * from proyek");
		return view('pages.unit.edit',compact('data','proyek'));
	}

	public function update(Request $request, $id)
	{
		$data = Unit::find($id);
		$data->tipe = $request->tipe;
		$data->harga_jual = $request->harga_jual;
		$data->jumlah_unit = $request->jumlah_unit;
		$data->setoran_awal = $request->setoran_awal;
		$data->id_proyek = $request->id_proyek;
		$data->save();
		return redirect('admin/unit');
	}

	public function destroy($id){
		$data = Unit::find($id)->delete();
		if($data){
			return redirect('unit');
		}
	}

	public function deleteUnit(Request $request){
		$data = Unit::find($request->id)->delete();   
		return redirect('admin/unit');
	}
}
