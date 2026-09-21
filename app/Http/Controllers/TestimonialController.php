<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    /**
     * Display testimonials list
     */
    public function index()
    {
        $testimonials = DB::table('testimonials')
            ->orderBy('id', 'asc')
            ->get();

        return view('testimonials', compact('testimonials'));
    }


    /**
     * Store new testimonial
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'occupations' => 'required|string|max:255',
           'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);


        $imagePath = null;


        // Upload image
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads/testimonials'),
                $imageName
            );

            $imagePath = 'uploads/testimonials/' . $imageName;
        }


        DB::table('testimonials')->insert([
            'image' => $imagePath,
            'name' => $request->name,
            'description' => $request->description,
            'occupations' => $request->occupations,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial added successfully.');
    }


    /**
     * Update testimonial
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'occupations' => 'required|string|max:255',
           'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);


        $testimonial = DB::table('testimonials')
            ->where('id', $id)
            ->first();


        if (!$testimonial) {

            return redirect()
                ->route('testimonials.index')
                ->with('error', 'Testimonial not found.');
        }


        $imagePath = $testimonial->image;


        // Upload new image
        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $testimonial->image &&
                file_exists(public_path($testimonial->image))
            ) {

                unlink(public_path($testimonial->image));
            }


            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads/testimonials'),
                $imageName
            );

            $imagePath = 'uploads/testimonials/' . $imageName;
        }


        DB::table('testimonials')
            ->where('id', $id)
            ->update([
                'image' => $imagePath,
                'name' => $request->name,
                'description' => $request->description,
                'occupations' => $request->occupations,
                'updated_at' => now(),
            ]);


        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }


    /**
     * Delete testimonial
     */
    public function destroy($id)
    {
        $testimonial = DB::table('testimonials')
            ->where('id', $id)
            ->first();


        if (!$testimonial) {

            return redirect()
                ->route('testimonials.index')
                ->with('error', 'Testimonial not found.');
        }


        // Delete image
        if (
            $testimonial->image &&
            file_exists(public_path($testimonial->image))
        ) {

            unlink(public_path($testimonial->image));
        }


        DB::table('testimonials')
            ->where('id', $id)
            ->delete();


        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}