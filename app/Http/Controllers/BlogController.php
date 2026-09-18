<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display Blog List
     */
    public function index()
    {
        $blogs = DB::table('blogs')
            ->orderBy('id', 'desc')
            ->get();

        return view('blogs', compact('blogs'));
    }


    /**
     * Store New Blog
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'name' => 'required|string|max:255',

            'description' => 'required|string',

            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);


        /*
        |--------------------------------------------------------------------------
        | IMAGE UPLOAD
        |--------------------------------------------------------------------------
        */

        $imagePath = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $uploadPath = public_path('uploads/blogs');

            // Create folder if it doesn't exist
            if (!File::exists($uploadPath)) {

                File::makeDirectory(
                    $uploadPath,
                    0755,
                    true
                );
            }


            // Generate unique image name
            $imageName = time() . '_' . $image->getClientOriginalName();


            // Move image
            $image->move(
                $uploadPath,
                $imageName
            );


            // Database path
            $imagePath = 'uploads/blogs/' . $imageName;
        }


        /*
        |--------------------------------------------------------------------------
        | INSERT BLOG
        |--------------------------------------------------------------------------
        */

        DB::table('blogs')->insert([

            'name' => $request->name,

            'description' => $request->description,

            'image' => $imagePath,

            'created_at' => now(),

            'updated_at' => now(),

        ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('blogs.index')
            ->with(
                'success',
                'Blog added successfully.'
            );
    }


    /**
     * Update Existing Blog
     */
    public function update(Request $request, $id)
    {
        /*
        |--------------------------------------------------------------------------
        | FIND BLOG
        |--------------------------------------------------------------------------
        */

        $blog = DB::table('blogs')
            ->where('id', $id)
            ->first();


        if (!$blog) {

            return redirect()
                ->route('blogs.index')
                ->with(
                    'error',
                    'Blog not found.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'name' => 'required|string|max:255',

            'description' => 'required|string',

            // Image is optional while editing
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);


        /*
        |--------------------------------------------------------------------------
        | KEEP OLD IMAGE
        |--------------------------------------------------------------------------
        */

        $imagePath = $blog->image;


        /*
        |--------------------------------------------------------------------------
        | NEW IMAGE UPLOAD
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $uploadPath = public_path('uploads/blogs');


            // Create folder if it doesn't exist
            if (!File::exists($uploadPath)) {

                File::makeDirectory(
                    $uploadPath,
                    0755,
                    true
                );
            }


            // Generate unique image name
            $imageName = time() . '_' . $image->getClientOriginalName();


            // Move new image
            $image->move(
                $uploadPath,
                $imageName
            );


            // New database path
            $imagePath = 'uploads/blogs/' . $imageName;


            /*
            |--------------------------------------------------------------------------
            | DELETE OLD IMAGE
            |--------------------------------------------------------------------------
            */

            if (!empty($blog->image)) {

                $oldImage = public_path($blog->image);


                if (File::exists($oldImage)) {

                    File::delete($oldImage);
                }
            }
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE BLOG
        |--------------------------------------------------------------------------
        */

        DB::table('blogs')
            ->where('id', $id)
            ->update([

                'name' => $request->name,

                'description' => $request->description,

                'image' => $imagePath,

                'updated_at' => now(),

            ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('blogs.index')
            ->with(
                'success',
                'Blog updated successfully.'
            );
    }


    /**
     * Delete Blog
     */
    public function destroy($id)
    {
        /*
        |--------------------------------------------------------------------------
        | FIND BLOG
        |--------------------------------------------------------------------------
        */

        $blog = DB::table('blogs')
            ->where('id', $id)
            ->first();


        if (!$blog) {

            return redirect()
                ->route('blogs.index')
                ->with(
                    'error',
                    'Blog not found.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | DELETE IMAGE
        |--------------------------------------------------------------------------
        */

        if (!empty($blog->image)) {

            $imagePath = public_path($blog->image);


            if (File::exists($imagePath)) {

                File::delete($imagePath);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | DELETE DATABASE RECORD
        |--------------------------------------------------------------------------
        */

        DB::table('blogs')
            ->where('id', $id)
            ->delete();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('blogs.index')
            ->with(
                'success',
                'Blog deleted successfully.'
            );
    }
}