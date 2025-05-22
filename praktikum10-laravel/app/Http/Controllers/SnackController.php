<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    public function index()
    {
        $snacks = Snack::all();
        return view('index', compact('snacks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Snack::create($request->all());
        return redirect()->back()->with('success', 'Snack added successfully!');
    }

    public function update(Request $request, $id)
    {
        $snack = Snack::find($id);
        $snack->update($request->all());
        return redirect()->back()->with('success', 'Snack updated!');
    }

    public function destroy($id)
    {
        Snack::find($id)->delete();
        return redirect()->back()->with('success', 'Snack deleted!');
    }
}
