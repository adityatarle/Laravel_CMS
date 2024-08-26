<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{

   
   public function index()
    {
        $banners = Banner::all();
        return view('edit-banner', compact('banners'));
    }

    public function store(Request $request)
{
    $request->validate([
        'image.*' => 'nullable|image',
        'title.*' => 'required|string',
        'description.*' => 'required|string',
        'ids.*' => 'required|integer', // Add validation for ids
    ]);

    $ids = $request->ids;

    if (!is_array($ids) || empty($ids)) {
        return redirect()->back()->with('error', 'No banners selected for update.');
    }

    foreach ($ids as $index => $id) {
        $banner = Banner::findOrFail($id);
        $banner->title = $request->title[$index];
        $banner->description = $request->description[$index];

        if ($request->hasFile("image.$index")) {
            $imageName = time() . '_' . $index . '.' . $request->image[$index]->extension();
            $request->image[$index]->move(public_path('images'), $imageName);
            $banner->image = $imageName;
        }

        $banner->save();
    }

    return redirect()->back()->with('success', 'Banner updated successfully!');
}


}
