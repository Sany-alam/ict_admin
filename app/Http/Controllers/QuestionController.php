<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Request $request)
    {
        $q = new Question;
        $q->topic_id = $request->topic_id;
        $q->question = $request->question;
        if (!empty($request->board_id)) {
            $q->board_id = $request->board_id;
        }
        if (!empty($request->tag)) {
            $q->tag = $request->tag;
        }
        if (!empty($request->details)) {
            $q->details = $request->details;
        }
        $q->option1 = $request->option1;
        $q->option2 = $request->option2;
        $q->option3 = $request->option3;
        $q->option4 = $request->option4;
        $q->correct_option = $request->correct_option;
        if ($q->save()) {
            return "Successfully added";
        }
        else {
            return "Somethinf went wrong";
        }
    }


    public function show()
    {
        $fetch = Question::with('topic','board_list')->get();
        $data = '<table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>#Id</th>
                            <th>Topic</th>
                            <th>Question</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
            for ($i=0; $i < sizeof($fetch); $i++) {
                $data .='<tr>
                            <td>'.$fetch[$i]->id.'</td>
                            <td>'.$fetch[$i]->topic->topic_name.'</td>
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
}
