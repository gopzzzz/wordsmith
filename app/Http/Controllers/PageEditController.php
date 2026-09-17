<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PageEditController extends Controller
{
    /**
     * Display Page Edit form
     */
    public function index()
    {
        // Get the first homepage record
        $homepage = DB::table('homepages')
            ->orderBy('id', 'asc')
            ->first();

        return view('page_edit', compact('homepage'));
    }


    /**
     * Insert or Update Homepage
     */
    public function save(Request $request)
    {
        // Validate form
        $request->validate([
            'aboutitle' => 'nullable|string|max:255',
            'aboutdescription' => 'nullable|string|max:255',

            'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'firstquote' => 'nullable|string|max:255',
            'secondquote' => 'nullable|string|max:255',
            'thirdquote' => 'nullable|string|max:255',

            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'founderquote' => 'nullable|string',
        ]);


        // Check whether a homepage record already exists
        $homepage = DB::table('homepages')
            ->orderBy('id', 'asc')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | IMAGE UPLOAD
        |--------------------------------------------------------------------------
        */

        $imagePath = $homepage->about_image ?? null;

        if ($request->hasFile('about_image')) {

            $image = $request->file('about_image');

            // Create folder if it doesn't exist
            $uploadPath = public_path('uploads/homepage');

            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            // Generate unique image name
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move image
            $image->move($uploadPath, $imageName);

            // Save path in database
            $imagePath = 'uploads/homepage/' . $imageName;


            /*
            |--------------------------------------------------------------------------
            | DELETE OLD IMAGE
            |--------------------------------------------------------------------------
            */

            if ($homepage && !empty($homepage->about_image)) {

                $oldImage = public_path($homepage->about_image);

                if (File::exists($oldImage)) {
                    File::delete($oldImage);
                }
            }
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE EXISTING RECORD
        |--------------------------------------------------------------------------
        */

        if ($homepage) {

            DB::table('homepages')
                ->where('id', $homepage->id)
                ->update([

                    'aboutitle' => $request->aboutitle,

                    'aboutdescription' => $request->aboutdescription,

                    'about_image' => $imagePath,

                    'firstquote' => $request->firstquote,

                    'secondquote' => $request->secondquote,

                    'thirdquote' => $request->thirdquote,

                    'vision' => $request->vision,

                    'mission' => $request->mission,

                    'founderquote' => $request->founderquote,

                    'updated_at' => now(),
                ]);


            return redirect()
                ->route('page_edit')
                ->with('success', 'Homepage updated successfully.');
        }


        /*
        |--------------------------------------------------------------------------
        | INSERT NEW RECORD
        |--------------------------------------------------------------------------
        */

        DB::table('homepages')->insert([

            'aboutitle' => $request->aboutitle,

            'aboutdescription' => $request->aboutdescription,

            'about_image' => $imagePath,

            'firstquote' => $request->firstquote,

            'secondquote' => $request->secondquote,

            'thirdquote' => $request->thirdquote,

            'vision' => $request->vision,

            'mission' => $request->mission,

            'founderquote' => $request->founderquote,

            'created_at' => now(),

            'updated_at' => now(),
        ]);


        return redirect()
            ->route('page_edit')
            ->with('success', 'Homepage created successfully.');
    }
}