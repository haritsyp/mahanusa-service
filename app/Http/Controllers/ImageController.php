<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;
use App\Image;

class ImageController extends Controller
{
    public function getImage(Request $request)
    {
        $image = DB::select("SELECT * FROM IMAGE WHERE ID_PROYEK = $request->id_proyek");
        $images['result'] = $image;
        return response($images);
    }

    public function image($fileName){
        $path = public_path().'image/'.$fileName;
        return Response::download($path);
    }

    function index()
    {
        $data = DB::select("select a.*,b.nama_proyek from image a join proyek b on a.id_proyek = b.id");
        return view('pages.image.index', compact('data'));
    }

    function create(){
        $image = Image::get();
        $proyek = DB::select("select * from proyek");
        return view('pages.image.create',compact('image','proyek'));
    }

    public function store(Request $request) {
        $preview = $request->file('dir');
        $extension = $preview->getClientOriginalExtension();
        Storage::disk('public')->put($preview->getFilename().'.'.$extension,  File::get($preview));

        $data = new Image();
        $data->id_proyek = $request->id_proyek;
        $data->image_name = $request->image_name;
        $data->dir = $preview->getFilename().'.'.$extension;
        $data->save();
        return redirect('admin/image');
    }

    public function edit($id)
    {
        $data=Image::find($id);
        $proyek = DB::select("select * from proyek");
        return view('pages.image.edit',compact('data','proyek'));
    }

    public function update(Request $request, $id)
    {
       $data = Image::find($id);
       if(!empty($request->file('dir'))){
        $preview = $request->file('dir');
        $extension = $preview->getClientOriginalExtension();
        $file = public_path().'\image\\'.$data->dir;
        if(file_exists($file)){
            unlink($file);
        }
        Storage::disk('public')->put($preview->getFilename().'.'.$extension,  File::get($preview));
        $data->dir = $preview->getFilename().'.'.$extension;

    }
    $data->id_proyek = $request->id_proyek;
    $data->image_name = $request->image_name;
    $data->save();
    return redirect('admin/image');
}

public function destroy($id){
    $data = Image::find($id)->delete();
    if($data){
        return redirect('image');
    }
}

public function deleteImage(Request $request){
    $datas = Image::find($request->id);
    $data = Image::find($request->id)->delete();   
    $file = public_path().'\image\\'.$datas->dir;
    unlink($file);
    return redirect('admin/image');
}
}
