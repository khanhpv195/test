<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
$locations = Location::paginate(10);

        return view('locations.index', compact('locations'));
    }

    public function data()
{
    $locations = Location::paginate(10); // Lấy 10 bản ghi trên mỗi trang
    return response()->json($locations);
}

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        Location::create($request->all());
        return redirect()->route('locations.index');
    }

    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $location->update($request->all());
        return redirect()->route('locations.index');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index');
    }
}
