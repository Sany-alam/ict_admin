<?php

namespace App\Http\Controllers;

use App\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function Add_Chapter(Request $request)
    {
        if (Chapter::create($request->all())) {
            return $request->chapter_name." chapter added succesfully";
        }
        else {
            return "Something went wrong";
        }
    }


    public function Show_Chapter_list()
    {
        $query = Chapter::all();
        $array = array();
        $options = '<option value="" class="">Select Chapter</option>';
        $data = '<button class="btn btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select to Delete Chapter <i class="fa fa-arrow-down"></i></button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      ';
        for ($i=0; $i < sizeof($query); $i++) {
            $data .='<a class="dropdown-item" onclick="Delete_Chapter('.$query[$i]->id.')" href="javascript:void(0)">'.$query[$i]->chapter_name.' <i class="fa fa-trash"></i></a>';
            $options .= '<option value="'.$query[$i]->id.'" class="">'.$query[$i]->chapter_name.'</option>';
        }
        $data .='</div>';
        $array['dropdown'] = $data;
        $array['option'] = $options;

        return json_encode($array);
    }


    public function Delete_Chapter($id)
    {
        Chapter::where('id',$id)->delete();
    }
}
