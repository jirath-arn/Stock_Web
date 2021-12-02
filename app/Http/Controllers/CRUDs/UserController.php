<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Models\User;
use App\Models\Role;
use App\Models\HistoryTransaction;

class UserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();
        $roles = Role::all();

        return view('cruds.users.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|max:255|email|string|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required',
        ]);

        $user = new User();
        $user->role_id = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $auth = Auth::user();
        $history = new HistoryTransaction();
        $history->detail = $auth->name.' ทำการสร้างบัญชีผู้ใช้ใหม่ "'.$request->name.'"';
        $history->save();

        return redirect(route('users.index'))->with(['header' => 'สำเร็จ!', 'message' => 'เพิ่มบัญชีผู้ใช้ "'.$request->name.'" เรียบร้อยแล้ว', 'alert' => 'success']);
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all();

        return view('cruds.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8',
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        $auth = Auth::user();
        $history = new HistoryTransaction();
        $history->detail = $auth->name.' ทำการรีเซ็ตรหัสผ่านบัญชีผู้ใช้ "'.$user->name.'"';
        $history->save();

        return redirect(route('users.index'))->with(['header' => 'สำเร็จ!', 'message' => 'รีเซ็ตรหัสผ่าน "'.$user->name.'" เรียบร้อยแล้ว', 'alert' => 'success']);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user_info = $user->name;

        $auth = Auth::user();
        $history = new HistoryTransaction();
        $history->detail = $auth->name.' ทำการลบบัญชีผู้ใช้ "'.$user->name.'"';
        $history->save();

        $user->delete();
        
        return redirect(route('users.index'))->with(['header' => 'สำเร็จ!', 'message' => 'ลบบัญชีผู้ใช้ "'.$user_info.'" เรียบร้อยแล้ว', 'alert' => 'success']);
    }
}
