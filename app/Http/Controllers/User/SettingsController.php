<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\CertificateImage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.settings');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function CertificateImageList()
    {

        if (request()->ajax()) {
            $data = CertificateImage::get();
            return Datatables::of($data)
            // ->addColumn('image', function ($row) {
            //     $url= asset('images/'.$row->file_path);
            //     return '<img src="'.$url.'" border="0" width="50" height="50" class="img-rounded" align="center" />';
            // })
        ->make(true);
        }
        // return view('user.settings');
    }


    public function create(Request $request)
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $image = $request->file('file');
            $image_name = $image->getClientOriginalName();
            $filename = time() . '-' . $image_name;
            $image->move(public_path('/images'),$filename);
            $image_path = "/images/" . $filename;
        }
            $product = new CertificateImage([
                "file_path" => $filename
            ]);
            $product->save();
        return view('user.settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $value)
    {
        //
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
        $image = CertificateImage::find($id);
        $image->status   = $request->value;
        $image->save();
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CertificateImage::find($id);
        $data->delete();
        return response()->json(['success' => true]);
    }
}
