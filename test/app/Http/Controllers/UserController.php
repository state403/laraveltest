<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyUser;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class UserController extends Controller
{
    public function getUserID()
    {
        foreach (MyUser::cursor() as $user) {
            echo PHP_EOL;
            var_export($user->toArray());
            echo PHP_EOL;
        }
    }

    public function store(Request $request)
    {
        $id1 = $request->input('id1');
        $id2 = $request->input('id2');

        if (! is_numeric($id1) || ! is_numeric($id2)) {
            return response('forbidden', 403);
        }

        $userinfo = MyUser::where('id1', $id1)->where('id2', $id2)->first();

        if ($userinfo) {
            $json = ['userID' => $userinfo->userID];
            return response(json_encode($json), 200);
        }

        try {
            $uuid4 = Uuid::uuid4();
            $userID = $uuid4->toString();
        } catch (UnsatisfiedDependencyException $e) {
            return response('exception' . $e->getMessage(), 500);
        }

        $flight = new MyUser();

        $flight->userID = $userID;
        $flight->id1 = $id1;
        $flight->id2 = $id2;

        $res = $flight->save();

        if (! $res) {
            return response('add failed', 500);
        }

        $json = ['userID' => $userID];
        return response(json_encode($json), 200);
    }
}
