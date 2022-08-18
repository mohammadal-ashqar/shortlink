<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ShortlinkController extends Controller
{
    public function index()
    {
        $shortlinks =Shortlink::orderByDesc('id')->paginate(10);
        return view('shortlink.index',compact('shortlinks'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'link'=>'required|url| unique:shortlinks,link'
        ]);
        $data['link'] =$request->link;
        $data['code'] =Str::random(6);

        Shortlink::create($data);
        return redirect()->route('shortlink.index')->with('success', 'تم اختصار الرابط بنجاح');
    }

    public function show($code)
    {
        $shortlink=Shortlink::where('code', $code)->firstOrFail();
        $shortlink->visits_count +=1;
        $shortlink->save();
        return redirect($shortlink->link);
    }

}
