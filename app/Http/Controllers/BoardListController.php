<?php

namespace App\Http\Controllers;

use App\board_list;
use Illuminate\Http\Request;

class BoardListController extends Controller
{
    public function create(Request $request)
    {
        if (board_list::create($request->all())) {
            return $request->board_name." of ".$request->year." added succesfully";
        }
        else {
            return "Something went wrong";
        }
    }

    public function show()
    {
        $query = board_list::all();
        $array = array();
        $board_list = '<option value="" class="">Select Board</option>';
        $delete = '<button class="btn btn-sm btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delete Board <i class="fa fa-arrow-down"></i></button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      ';
        for ($i=0; $i < sizeof($query); $i++) {
            $delete .='<a class="dropdown-item" onclick="Delete_Board('.$query[$i]->id.')" href="javascript:void(0)"><i class="fa fa-trash"></i> '.$query[$i]->board_name.'</a>';
            $board_list .= '<option value="'.$query[$i]->id.'" class="">'.$query[$i]->board_name.'</option>';
        }
        $delete .='</div>';
        $array['delete'] = $delete;
        $array['board_list'] = $board_list;

        return json_encode($array);
    }

    public function destroy($id)
    {
        board_list::where('id',$id)->delete();
    }
}
