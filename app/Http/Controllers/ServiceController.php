<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
            'icon' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);


        // Upload icon
        $iconPath = null;

        if ($request->hasFile('icon')) {

            $icon = $request->file('icon');

            // Create folder
            $uploadPath = public_path('uploads/services');

            if (!File::exists($uploadPath)) {

                File::makeDirectory(
                    $uploadPath,
                    0755,
                    true
                );
            }


            // Generate unique image name
            $iconName = time() . '_' . $icon->getClientOriginalName();


            // Move image
            $icon->move(
                $uploadPath,
                $iconName
            );


            // Save path
            $iconPath = 'uploads/services/' . $iconName;
        }


        // Insert service
        DB::table('services')->insert([

            'icon' => $iconPath,

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

            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',

            'name' => 'required|string|max:255',

            'description' => 'required|string|max:255',

        ]);


        // Find service
        $service = DB::table('services')
            ->where('id', $id)
            ->first();


        if (!$service) {

            return redirect()
                ->route('services.index')
                ->with('error', 'Service not found.');
        }


        // Keep existing icon
        $iconPath = $service->icon;


        // New icon uploaded
        if ($request->hasFile('icon')) {

            $icon = $request->file('icon');


            // Create folder
            $uploadPath = public_path('uploads/services');

            if (!File::exists($uploadPath)) {

                File::makeDirectory(
                    $uploadPath,
                    0755,
                    true
                );
            }


            // Delete old icon
            if (!empty($service->icon)) {

                $oldIcon = public_path($service->icon);

                if (File::exists($oldIcon)) {

                    File::delete($oldIcon);
                }
            }


            // Generate new name
            $iconName = time() . '_' . $icon->getClientOriginalName();


            // Move new icon
            $icon->move(
                $uploadPath,
                $iconName
            );


            // New database path
            $iconPath = 'uploads/services/' . $iconName;
        }


        // Update service
        DB::table('services')
            ->where('id', $id)
            ->update([

                'icon' => $iconPath,

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
        // Find service
        $service = DB::table('services')
            ->where('id', $id)
            ->first();


        if (!$service) {

            return redirect()
                ->route('services.index')
                ->with('error', 'Service not found.');
        }


        // Delete icon image
        if (!empty($service->icon)) {

            $iconPath = public_path($service->icon);

            if (File::exists($iconPath)) {

                File::delete($iconPath);
            }
        }


        // Delete database record
        DB::table('services')
            ->where('id', $id)
            ->delete();


        return redirect()
            ->route('services.index')
            ->with('success', 'Service deleted successfully.');
    }
}