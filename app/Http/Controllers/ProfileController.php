<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::all();
        return view('admin.profile.profiles',[
            'profile' => $profile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
         'name'=>'required|min:5|max:15',
       'address'=>'required',
            'image'=>'required|image',
       ]);

        $profileImage = $request->file('image');
        $imageName = $profileImage->getClientOriginalName();
        $directory = 'images/profile-images/';
        $imageUrl = $directory.$imageName;
        $profileImage->move($directory,$imageName);

        $profile = new Profile();
        $profile->name = $request->name;
        $profile->address = $request->address;
        $profile->image =  $imageUrl;
        $profile->save();

        return redirect('/profile')->with('message','data inserted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);
        return view('admin.profile.show',[
            'profile' => $profile
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $profile = Profile::find($id);
        return view('admin.profile.edit',[
            'profile' => $profile
        ]);
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
        $profile = Profile::find($id);
        $profileImage = $request->file('image');
        if ($profileImage){
            unlink($profile->image);
            $profileImage = $request->file('image');
        $imageName = $profileImage->getClientOriginalName();
        $directory = 'images/profile-images/';
        $imageUrl = $directory.$imageName;
        $profileImage->move($directory,$imageName);

        $profile->name = $request->name;
        $profile->address = $request->address;
        $profile->image = $imageUrl;
            $profile->save();

            }else{

            $profile->name = $request->name;
            $profile->address = $request->address;
            $profile->save();
        }



        return redirect('/profile')->with('message','data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);
        unlink($profile->image);
        $profile->delete();
        return back()->with('message','data deleted successfully');
    }
}
