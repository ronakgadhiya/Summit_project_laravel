<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{State,City};
class CommonController extends Controller
{
    public function getState(Request $request)
    {
        $State=State::where('country_id',$request->id)->get();
        echo '<option value=""> Select State </option>';
        foreach ($State as $data) {
            echo '<option value="'.$data->id.'">'.$data->name.'</option>';
        }   
    }
    public function getCity(Request $request)
    {
        $City=City::where('state_id',$request->id)->get();
        echo '<option value=""> Select State </option>';
        foreach ($City as $data) {
            echo '<option value="'.$data->id.'">'.$data->name.'</option>';
        }
    }
}
