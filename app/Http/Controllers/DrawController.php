<?php

namespace App\Http\Controllers;

use App\Dot;
use App\PathDot;
use http\Env\Response;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Path;
use App\User;

class DrawController extends Controller
{

    function getIn(Request $request)
    {
        $request->validate([
            'name' => ['unique:users'],
        ]);
        User::create([
            'name' => $request->name,
        ]);
        $result['member'] = User::all();
        $result['paths'] = $this->getPaths();
        return response()->json($result);
    }

    function canvas()
    {
        $allPath = $this->getPaths();
        return response()->json($allPath);
    }

    function getPaths(){
        $allPath = Path::all();
        $i = 0;
        foreach ($allPath as $path) {
            $allPath = $path->with(  'dots','user')->get();
            $i++;
        }
        return $allPath;
    }

    function draw(Request $request)
    {
        $request->validate([
            'red' => ['required', 'integer'],
            'green' => ['required', 'integer'],
            'blue' => ['required', 'integer'],
            'width' => ['required', 'integer'],
        ]);
        $i = 0;
        $data['paths'] = Path::create([
            'user_id' => $request->user_id,
            'red' => $request->red,
            'green' => $request->green,
            'blue' => $request->blue,
            'width' => $request->width,
        ]);
        $path_id = Path::latest()->first('id')->id;
        foreach ($request->dots as $dot){
            $data['dot'][$i] = Dot::create([
                'x_axis' => $dot['x'],
                'y_axis' => $dot['y'],
            ]);
            $dot_id = $data['dots'][$i]->id;
            PathDot::create([
                'path_id' => $path_id,
                'dot_id' =>  $dot_id,
            ]);
            $i++;
        }
        return response()->json($data);
    }

    function undo($id)
    {
        Path::where('user_id',$id)->latest()->first('id')->delete();
        $picture = $this->getPaths();
        return response()->json($picture);
    }

    function leave($id)
    {
        User::find($id)->first()->delete();
        return response()->json(User::all());
    }
}
