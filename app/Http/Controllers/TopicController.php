<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function Add_Topic(Request $Request)
    {
        if (Topic::create($Request->all())) {
            return $Request->topic_name." topic added succesfully";
        }
        else {
            return "Something went wrong";
        }
    }

    public function Show_Topic_list()
    {
        $query = Topic::all();
        $array = array();
        $topic_list = '<option value="" class="">Select Topic</option>';
        $delete = '<button class="btn btn-sm btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delete Topic <i class="fa fa-arrow-down"></i></button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      ';
        $edit = '<button class="btn btn-sm btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit Topic <i class="fa fa-arrow-down"></i></button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
        for ($i=0; $i < sizeof($query); $i++) {
            $delete .='<a class="dropdown-item" onclick="Delete_Topic('.$query[$i]->id.')" href="javascript:void(0)"><i class="fa fa-trash"></i> '.$query[$i]->topic_name.' - '.$query[$i]->chapter->chapter_name.'</a>';
            $edit .='<a class="dropdown-item" onclick="Edit_Topic('.$query[$i]->id.')" href="javascript:void(0)"><i class="fa fa-edit"></i> '.$query[$i]->topic_name.'</a>';
            $topic_list .='<option value="'.$query[$i]->id.'" class="">'.$query[$i]->topic_name.' - '.$query[$i]->chapter->chapter_name.'</option>';
        }
        $delete .='</div>';
        $edit .='</div>';
        $array['delete'] = $delete;
        $array['edit'] = $edit;
        $array['topic_list'] = $topic_list;

        return json_encode($array);
    }

    public function Delete_Topic($id)
    {
        Topic::where('id',$id)->delete();
    }

    public function edit($id)
    {
        $data = Topic::where('id',$id)->first();
        return json_encode($data);
    }

    public function update(Request $request)
    {
        if (Topic::where('id',$request->id)->update(['chapter_id'=>$request->chapter_id,'topic_name'=>$request->topic_name])) {
            return "Topic is successfully updated";
        }
        else {
            return "Something went wrong";
        }
    }
}
