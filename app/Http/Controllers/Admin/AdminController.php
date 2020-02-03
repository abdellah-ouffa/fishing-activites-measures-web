<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Constant;
use App\Helpers\Helper;
use App\Models\User;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admins.index', [
            'admins' => Admin::filter(request()->all())
                            ->paginate(Constant::COUNT_PER_PAGE)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name, 
            'is_active' => true,
            'role' => Constant::USER_ROLES['admin'],
            'ppr_number' => $request->ppr_number,
        ]);

        Admin::create([
            'email' => $request->email, 
            'password' => bcrypt($request->password),
            'visible_password' => $request->password,
            'user_id' => $user->id, 
            'picture' => Helper::saveFileFromRequest($request, 'picture'), 
        ]);

        session()->flash('success', 'Saved');

        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.admins.show', [
            'admin' => Admin::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.admins.edit', [
            'admin' => Admin::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->update([
            'email' => $request->email, 
            'password' => bcrypt($request->password),
            'visible_password' => $request->password,
            'picture' => Helper::saveFileFromRequest($request, 'picture', $admin->user->picture) ?? $admin->user->picture, 
        ]);

        $admin->user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name, 
            'password' => $request->password ? bcrypt($request->password) : $admin->user->password, 
            'visible_password' => $request->password ? $request->password : $admin->user->visible_password, 
            'ppr_number' => $request->ppr_number, 
            'is_active' => $request->is_active ? true : false, 
        ]);

        session()->flash('success', 'Updated');

        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->user->delete();

        session()->flash('success', 'Updated');

        return redirect()->route('admins.index');
    }
}
