<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    // Display services
    public function index()
    {
        $services = DB::table('services')
            ->orderBy('id', 'asc')
            ->get();

        return view('services', compact('services'));
    }


    // Add service
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);


        DB::table('services')->insert([
            'icon' => $request->icon,
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return redirect()
            ->route('services.index')
            ->with('success', 'Service added successfully.');
    }


    // Edit / Update service
    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);


        $service = DB::table('services')
            ->where('id', $id)
            ->first();


        if (!$service) {

            return redirect()
                ->route('services.index')
                ->with('error', 'Service not found.');
        }


        DB::table('services')
            ->where('id', $id)
            ->update([
                'icon' => $request->icon,
                'name' => $request->name,
                'description' => $request->description,
                'updated_at' => now(),
            ]);


        return redirect()
            ->route('services.index')
            ->with('success', 'Service updated successfully.');
    }


    // Delete service
    public function destroy($id)
    {
        $service = DB::table('services')
            ->where('id', $id)
            ->first();


        if (!$service) {

            return redirect()
                ->route('services.index')
                ->with('error', 'Service not found.');
        }


        DB::table('services')
            ->where('id', $id)
            ->delete();


        return redirect()
            ->route('services.index')
            ->with('success', 'Service deleted successfully.');
    }
}