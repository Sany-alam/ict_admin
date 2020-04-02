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
        $chapter_list = '<option value="" class="">Select Chapter</option>';
        $delete_chapter = '<button class="btn btn-sm btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delete Chapter <i class="fa fa-arrow-down"></i></button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
        $edit_chapter = '<button class="btn btn-sm btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit Chapter <i class="fa fa-arrow-down"></i></button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
        for ($i=0; $i < sizeof($query); $i++) {
            $delete_chapter .='<a class="dropdown-item" onclick="Delete_Chapter('.$query[$i]->id.')" href="javascript:void(0)"><i class="fa fa-trash"></i> '.$query[$i]->chapter_name.'</a>';
            $edit_chapter .='<a class="dropdown-item" onclick="Edit_Chapter('.$query[$i]->id.')" href="javascript:void(0)"><i class="fa fa-edit"></i> '.$query[$i]->chapter_name.'</a>';
            $chapter_list .= '<option value="'.$query[$i]->id.'" class="">'.$query[$i]->chapter_name.'</option>';
        }
        $delete_chapter .='</div>';
        $edit_chapter .='</div>';
        $array['delete_chapter'] = $delete_chapter;
        $array['edit_chapter'] = $edit_chapter;
        $array['chapter_list'] = $chapter_list;

        return json_encode($array);
    }


    public function Delete_Chapter($id)
    {
        Chapter::where('id',$id)->delete();
    }

    public function edit($id)
    {
        $Chapter = Chapter::where('id',$id)->first();
        return json_encode($Chapter);
    }

    public function update(Request $request)
    {
        if (Chapter::where('id',$request->id)->update(['chapter_name'=>$request->chapter_name])) {
            $data = Chapter::where('id',$request->id)->first();
            return "successfully updated to ".$data->chapter_name;
        }
        else {
            return "Something went wrong";
        }
    }
}
