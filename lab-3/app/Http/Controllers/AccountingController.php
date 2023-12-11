<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounting;


class AccountingController extends Controller
{
    protected $accountings;

    public function __construct()
    {
        $this->accountings = Accounting::all();
    }

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    public function index()
    {
        $this->debug_to_console("Index");
        return view('accountings.index', ['accountings' => $this->accountings]);
    }
    public function create()
    {
        $this->debug_to_console("Create");
        return view('accountings.create');
    }
    public function store(Request $request)
    {
        Accounting::create($request->all());
        return redirect('/accountings')->with('success', 'Accounting created successfully!');
    }
    public function show($id)
    {
        $this->debug_to_console("Show");
        $accounting = Accounting::findOrFail($id);
        return view('accountings.show', ['accounting' => $accounting]);
    }
    public function edit($id)
    {
        $this->debug_to_console("Edit");
        $accounting = Accounting::findOrFail($id);
        return view('accountings.edit', ['accounting' => $accounting]);
        //
    }
    public function update(Request $request, $id)
    {
        $accounting = Accounting::findOrFail($id);
        $accounting->update($request->all());
        return redirect('/accountings/' . $accounting->id)->with('success', 'Accounting updated successfully!');
    }
    public function destroy($id)
    {
        $accounting = Accounting::findOrFail($id);
        $accounting->delete();
        return redirect('/accountings')->with('success', 'Accounting deleted successfully!');
    }

}
