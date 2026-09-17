<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    // Display banners
    public function index()
    {
        $banners = DB::table('banners')
            ->orderBy('id', 'asc')
            ->get();

        return view('banners', compact('banners'));
    }


    // Add banner
    public function store(Request $request)
    {
        $request->validate([
            'pagename' => 'required|string|max:255',
            'bannerimage' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'maintitle' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        $imageName = null;

        if ($request->hasFile('bannerimage')) {

            $image = $request->file('bannerimage');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads'),
                $imageName
            );
        }

        DB::table('banners')->insert([
            'pagename' => $request->pagename,
            'bannerimage' => $imageName,
            'maintitle' => $request->maintitle,
            'subtitle' => $request->subtitle,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner added successfully.');
    }


    // Edit / Update banner
    public function update(Request $request, $id)
    {
        $request->validate([
            'pagename' => 'required|string|max:255',
            'bannerimage' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'maintitle' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        $banner = DB::table('banners')
            ->where('id', $id)
            ->first();

        if (!$banner) {

            return redirect()
                ->route('banners.index')
                ->with('error', 'Banner not found.');
        }

        $imageName = $banner->bannerimage;


        // New image uploaded
        if ($request->hasFile('bannerimage')) {

            // Delete old image
            if (
                $imageName &&
                file_exists(public_path('uploads/' . $imageName))
            ) {
                unlink(public_path('uploads/' . $imageName));
            }

            $image = $request->file('bannerimage');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads'),
                $imageName
            );
        }


        DB::table('banners')
            ->where('id', $id)
            ->update([
                'pagename' => $request->pagename,
                'bannerimage' => $imageName,
                'maintitle' => $request->maintitle,
                'subtitle' => $request->subtitle,
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner updated successfully.');
    }


    // Delete banner
    public function destroy($id)
    {
        $banner = DB::table('banners')
            ->where('id', $id)
            ->first();

        if (!$banner) {

            return redirect()
                ->route('banners.index')
                ->with('error', 'Banner not found.');
        }


        // Delete image
        if (
            $banner->bannerimage &&
            file_exists(public_path('uploads/' . $banner->bannerimage))
        ) {
            unlink(public_path('uploads/' . $banner->bannerimage));
        }


        // Delete database record
        DB::table('banners')
            ->where('id', $id)
            ->delete();


        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner deleted successfully.');
    }
}