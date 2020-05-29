<?php

namespace App\Http\Controllers;


use App\Info;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $infos = Info::all();

    return view('home',[
        'infos'=> $infos
    ]);
    }
    public function insert(){
        return view('admin.insert');
    }
    public function insertData(Request $request){
       // $demo = new Info();
      //  $demo->name = $request->name;
      //  $demo->email = $request->email;
       // $demo->address = $request->address;
       // $demo->city = $request->city;
       // $demo->state = $request->state;
       // $demo->zip = $request->zip;
        //$demo->save();


        Info::create($request->all());
        return redirect('/home')->with('message','data inserted successfully');

    }

    public function edit($id){
        $info = Info::find($id);
        return view('admin.edit',[
            'info'=> $info
        ]);
    }
    public function update(Request $request,$id){
        $info = Info::find($id);

        $info->name = $request->name;
         $info->email = $request->email;
         $info->address = $request->address;
         $info->city = $request->city;
         $info->state = $request->state;
         $info->zip = $request->zip;
         $info->save();

        return redirect('/home')->with('message','data updated successfully');

    }

    public function delete($id){
        $info = Info::find($id);
        $info->delete();
        return back()->with('message','data deleted successfully');
    }
}
