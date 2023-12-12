<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounting;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


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
        $user = Auth::user();
        $this->debug_to_console("Create");
        if(Gate::forUser($user)->allows('create-accounting')){
            return view('accountings.create');
        }else{
            abort(403);
        }
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        Accounting::create(array_merge($request->all(), ['creator_user_id' => $user->id]));
        return redirect('/accountings')->with('success', 'Accounting created successfully!');
    }
    public function show($id)
    {
        $this->debug_to_console("Show");
        $user = Auth::user();
        if(Gate::forUser($user)->allows('show-accounting')){
            $accounting = Accounting::findOrFail($id);
            return view('accountings.show', ['accounting' => $accounting]);
        }else{
            abort(403);
        }
    }
    public function edit($id)
    {
        $user = Auth::user();
        $this->debug_to_console("Edit");
        $accounting = Accounting::findOrFail($id);
        if(Gate::forUser($user)->allows('edit-accounting',$accounting)){
            return view('accountings.edit', ['accounting' => $accounting]);
        }else{
            abort(403);
        }
    }
    public function update(Request $request, $id)
    {
        $accounting = Accounting::findOrFail($id);
        $accounting->update($request->all());
        return redirect('/accountings/' . $accounting->id)->with('success', 'Accounting updated successfully!');
    }
    public function destroy($id)
    {
        $user = Auth::user();
        $accounting = Accounting::findOrFail($id);
        if(Gate::forUser($user)->allows('delete-accounting',$accounting)){
            $accounting->delete();
            return redirect('/accountings')->with('success', 'Accounting deleted successfully!');
        }else{
            abort(403);
        }
    }

}
