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
        $options = '<option value="" class="">Select Topic</option>';
        $data = '<button class="btn btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select to Delete Topic <i class="fa fa-arrow-down"></i></button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      ';
        for ($i=0; $i < sizeof($query); $i++) {
            $data .='<a class="dropdown-item" onclick="Delete_Topic('.$query[$i]->id.')" href="javascript:void(0)"><i class="fa fa-trash"></i> '.$query[$i]->topic_name.'</a>';
            $options .='<option value="'.$query[$i]->id.'" class="">'.$query[$i]->topic_name.'</option>';
        }
        $data .='</div>';
        $array['dropdown'] = $data;
        $array['option'] = $options;

        return json_encode($array);
    }

    public function Delete_Topic($id)
    {
        Topic::where('id',$id)->delete();
    }
}
