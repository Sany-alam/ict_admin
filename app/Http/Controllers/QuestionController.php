<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Request $request)
    {
        // return $request->all();
        $board = explode(',',$request->board_id);
        if (!empty($request->board_id)) {
            // return sizeof($board);
            for ($i=0; $i < sizeof($board); $i++) {
                Question::create(['topic_id'=>$request->topic_id, 'question'=>$request->question, 'tag'=>$request->tag, 'details'=>$request->details, 'option1'=>$request->option1, 'option2'=>$request->option2, 'option3'=>$request->option3, 'option4'=>$request->option4, 'correct_option'=>$request->correct_option, 'board_id'=>$board[$i]]);
            }
        }
        else {
            Question::create($request->all());
        }
    }


    public function show()
    {
        $fetch = Question::with('topic','board_list')->get();
        $data = '<table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>#Id</th>
                            <th>Question</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
            for ($i=0; $i < sizeof($fetch); $i++) {
                $data .='<tr>
                            <td>'.$fetch[$i]->id.'</td>
                            <td>'.$fetch[$i]->question.'</td>
                            <td class="text-right">
                                <button onclick="view_question('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-bars"></i>
                                </button>
                                <button onclick="edit_question('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-edit"></i>
                                </button>
                                <button onclick="delete_question('.$fetch[$i]->id.')" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </td>
                        </tr>';
                    }
            $data .='</tbody>
                </table>
                <script src="'.asset('assets').'/vendors/datatables/jquery.dataTables.min.js"></script>
                <script src="'.asset('assets').'/vendors/datatables/dataTables.bootstrap.min.js"></script>
                <script src="'.asset('assets').'/vendors/datatables/datatables.js"></script>';

        return $data;
    }


    public function destroy($id)
    {
        if (Question::where('id',$id)->delete()) {
            return  "Successfully deleted";
        }
        else {
            return "Something went wrong";
        }
    }


    public function view($id)
    {
        return json_encode(Question::where('id',$id)->with('topic','board_list')->first());
    }


    public function edit($id)
    {
        return json_encode(Question::where('id',$id)->with('topic','board_list')->first());
    }


    public function update(Request $request)
    {
        Question::where('id',$request->id)->update($request->all());
    }
}
