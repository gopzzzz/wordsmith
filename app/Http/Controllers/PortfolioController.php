<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    // Display portfolios
    public function index()
    {
        $portfolios = DB::table('portfolios')
            ->orderBy('id', 'asc')
            ->get();

        return view('portfolios', compact('portfolios'));
    }


    // Add portfolio
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'name' => 'required|string|max:255',
        ]);

        $imageName = null;


        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads'),
                $imageName
            );
        }


        DB::table('portfolios')->insert([
            'image' => $imageName,
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return redirect()
            ->route('portfolio.index')
            ->with('success', 'Portfolio added successfully.');
    }


    // Edit / Update portfolio
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'name' => 'required|string|max:255',
        ]);


        $portfolio = DB::table('portfolios')
            ->where('id', $id)
            ->first();


        if (!$portfolio) {

            return redirect()
                ->route('portfolio.index')
                ->with('error', 'Portfolio not found.');
        }


        $imageName = $portfolio->image;


        // New image uploaded
        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $imageName &&
                file_exists(public_path('uploads/' . $imageName))
            ) {
                unlink(public_path('uploads/' . $imageName));
            }


            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(
                public_path('uploads'),
                $imageName
            );
        }


        DB::table('portfolios')
            ->where('id', $id)
            ->update([
                'image' => $imageName,
                'name' => $request->name,
                'updated_at' => now(),
            ]);


        return redirect()
            ->route('portfolio.index')
            ->with('success', 'Portfolio updated successfully.');
    }


    // Delete portfolio
    public function destroy($id)
    {
        $portfolio = DB::table('portfolios')
            ->where('id', $id)
            ->first();


        if (!$portfolio) {

            return redirect()
                ->route('portfolio.index')
                ->with('error', 'Portfolio not found.');
        }


        // Delete image
        if (
            $portfolio->image &&
            file_exists(public_path('uploads/' . $portfolio->image))
        ) {
            unlink(public_path('uploads/' . $portfolio->image));
        }


        // Delete database record
        DB::table('portfolios')
            ->where('id', $id)
            ->delete();


        return redirect()
            ->route('portfolio.index')
            ->with('success', 'Portfolio deleted successfully.');
    }
}