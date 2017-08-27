<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class UserApiController extends Controller
{
    protected $users;

    public function __construct(UserRepository $userRepository)
    {
        $this->users = $userRepository;
    }

    public function avatarUpload(Request $request)
    {
        $upload_file = $request->input('file');
        list($type, $upload_file) = explode(';', $upload_file);
        list(, $upload_file) = explode(',', $upload_file);
        $upload_file = base64_decode($upload_file);

        $user = User::find($request->user()->id);
        $imageName = md5(time() . $user->email) . '.png';
        $path = public_path('uploads/avatar/');
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        file_put_contents($path . $imageName, $upload_file);

        $imageUrl = url('uploads/avatar/' . $imageName);
        $user->avatar = $imageUrl;
        $user->save();

        return response(['data' => $imageUrl], 201);
    }
}
