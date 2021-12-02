<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('change_password'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();

        return view('cruds.profiles.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if($request->old_password == $request->password) {
            return redirect(route('profiles.index'))->with(['header' => 'เตือน!', 'message' => 'ไม่สามารถใช้รหัสผ่านซ้ำเดิมได้', 'alert' => 'warning']);
        }

        $user = User::find($id);

        if(Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect(route('profiles.index'))->with(['header' => 'สำเร็จ!', 'message' => 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว', 'alert' => 'success']);
        }
        return redirect(route('profiles.index'))->with(['header' => 'ไม่สำเร็จ!', 'message' => 'รหัสผ่านเดิมไม่ถูกต้อง', 'alert' => 'danger']);
    }
}
