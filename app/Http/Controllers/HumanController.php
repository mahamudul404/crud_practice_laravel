<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class HumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $humans = Human::paginate(5);
        // $humans = Human::all();
        return view('humans.index', compact('humans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('humans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:humans',
            'age' => 'required|integer',
            'picture' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $human = new Human();
        $human->name = $request->name;
        $human->email = $request->email;
        $human->age = $request->age;

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $human->picture = $filename;
        }

        $human->save();
        return redirect()->route('humans.index')->with('success', 'Human created successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(Human $human)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Human $human)
    {
    
        return view('humans.edit', compact('human'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'age' => 'required|integer',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $human = Human::find($id);
        $human->name = $request->name;
        $human->email = $request->email;
        $human->age = $request->age;

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $human->picture = $filename;
        }

        $human->save();
        return redirect()->route('humans.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Human $human)
    {
        $human->delete();
        return redirect()->route('humans.index')->with('success', 'Delete successfull');
    }
}
