<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function UserPosts()
    {
        if (auth()->user())
        {
            $user = auth()->user();
            $Lists = $user->listings;
            return view('listings.userPosts',compact('Lists'));
        }else{
            return view('error404');
        }

    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $post= new Listing();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->website = $request->website;
        $post->email = $request->email;
        $post->tags = $request->tags;
        $post->location = $request->location;
        $post->company= $request->company;
        $image = $request->logo;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->logo->move('Logos',$imageName);
        $post->image= $imageName;
        $post->user_id= auth()->user()->id;
        $post->save();
        return redirect()->back();
    }
    public function edit(Listing $id){
        $post = Listing::find($id->id);
        return view('Listings.editPost',compact('post'));
    }
    public function update(Request $request,$id){
        $post = Listing::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->website = $request->website;
        $post->email = $request->email;
        $post->tags = $request->tags;
        $post->location = $request->location;
        $post->company= $request->company;
        if($request->logo){
            $image = $request->logo;
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->logo->move('Logos',$imageName);
            $post->image= $imageName;     
        }
        // $post->user_id= auth()->user()->id;
        $post->save();
        return redirect()->back();
    }
}
