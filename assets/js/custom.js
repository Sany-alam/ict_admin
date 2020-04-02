$(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); // csrf solution

    $(".yearpicker").yearpicker(); // year picker for add board


    // adding question
    $("#AddQuestion").click(function() {
        if (
        $("#question_topic").val().length !== 0 &&
        $("#question").val().length !== 0 &&
        $("#question_option1").val().length !== 0 &&
        $("#question_option2").val().length !== 0 &&
        $("#question_option3").val().length !== 0 &&
        $("#question_option4").val().length !== 0 &&
        $("#question_correct_option").val().length !== 0
        ){
            if (
                $("#question_option1").val() === $("#question_correct_option").val() ||
                $("#question_option2").val() === $("#question_correct_option").val() ||
                $("#question_option3").val() === $("#question_correct_option").val() ||
                $("#question_option4").val() === $("#question_correct_option").val()
            ) {
                alert($("#question_topic").val()+" "+
                $("#question_board").val()+" "+
                $("#question").val()+" "+
                $("#question_option1").val()+" "+
                $("#question_option2").val()+" "+
                $("#question_option3").val()+" "+
                $("#question_option4").val()+" "+
                $("#question_correct_option").val()+" "+
                $("#question_tag").val()+" "+
                $("#question_answer_detail").val());
            }
            else{
                alert("correct option missmathed");
            }
        // alert($("#question_topic").val()+" "+
        // $("#question_board").val()+" "+
        // $("#question").val()+" "+
        // $("#question_option1").val()+" "+
        // $("#question_option2").val()+" "+
        // $("#question_option3").val()+" "+
        // $("#question_option4").val()+" "+
        // $("#question_correct_option").val()+" "+
        // $("#question_tag").val()+" "+
        // $("#question_answer_detail").val());
        // var formdata = new FormData();
        //     formdata.append('topic_id',$("#question_topic").val());
        //     formdata.append('question',$("#question").val());
        //     formdata.append('board_id',$("#question_board").val());
        //     formdata.append('option1',$("#question_option1").val());
        //     formdata.append('option2',$("#question_option2").val());
        //     formdata.append('option3',$("#question_option3").val());
        //     formdata.append('option4',$("#question_option4").val());
        //     formdata.append('correct_option',$("#question_correct_option").val());
        //     formdata.append('tag',$("#question_tag").val());
        //     formdata.append('details',$("#question_answer_detail").val());
        //     $.ajax({
        //         processData:false,
        //         contentType:false,
        //         data:formdata,
        //         type:"post",
        //         url:"AddQuestion",
        //         success:function(data) {
        //             $("#question_topic").val("");
        //             $("#question_board").val("");
        //             $("#question").val("");
        //             $("#question_option1").val("");
        //             $("#question_option2").val("");
        //             $("#question_option3").val("");
        //             $("#question_option4").val("");
        //             $("#question_correct_option").val("");
        //             $("#question_tag").val("");
        //             $("#question_answer_detail").val("");
        //             alert(data);
        //             // show_Question();
        //         }
        //     });
        }
        else{
            alert("Fill the required inputs");
        }
    });




    // adding chapters
    $("#AddChapter").click(function(){
        if ($("#ChapterName").val().length !== 0) {
            var formdata = new FormData();
            formdata.append('chapter_name',$("#ChapterName").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                type:"post",
                url:"AddChapter",
                success:function(data) {
                    $("#ChapterName").val("");
                    alert(data);
                    show_chapter_list();
                }
            });
        }
        else{
            alert("Chapter field is empty");
        }
    });


    $("#AddTopics").click(function (){
        if ($("#Topic-name").val().length !== 0 && $("#Topic-chapter").val().length) {
            var formdata = new FormData();
            formdata.append('chapter_id',$("#Topic-chapter").val());
            formdata.append('topic_name',$("#Topic-name").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                type:"post",
                url:"AddTopic",
                success:function(data) {
                    $("#Topic-name").val("");
                    $("#Topic-chapter").val("");
                    alert(data);
                    show_topics();
                }
            });
        }
        else{
            alert("Inputs Empty");
        }
    });


    $("#AddBoard").click(function (){
        if ($("#board_name").val().length !== 0 && $("#board_year").val().length) {
            var formdata = new FormData();
            formdata.append('board_name',$("#board_name").val());
            formdata.append('year',$("#board_year").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                type:"post",
                url:"AddBoard",
                success:function(data) {
                    $("#board_name").val("");
                    $("#board_year").val("");
                    alert(data);
                    show_board();
                }
            });
        }
        else{
            alert("Inputs Empty");
        }
    });


    // update functions

    // cahapter update
    $("#UpdateChapterName").click(function() {
        $("#EditChapterName").val();
        $("#HiddenEditChapterId").val();
        if ($("#EditChapterName").val().length !== 0) {
            var formdata = new FormData();
            formdata.append('id',$("#HiddenEditChapterId").val());
            formdata.append('chapter_name',$("#EditChapterName").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                type:"post",
                url:"UpdateChapter",
                success:function(data) {
                    $("#EditChapterNameModal").modal('hide');
                    alert(data);
                    show_chapter_list();
                }
            });
        }
        else{
            alert("Chapter field is empty");
        }
    });
    // update functions


    // topic update
    $("#UpdateTopic").click(function() {
        if ($("#EditTopicChapter").val().length !== 0 && $("#EditTopicName").val().length !== 0) {
            var formdata = new FormData();
            formdata.append('id',$("#HiddenEditTopicId").val());
            formdata.append('chapter_id',$("#EditTopicChapter").val());
            formdata.append('topic_name',$("#EditTopicName").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                type:"post",
                url:"UpdateTopic",
                success:function(data) {
                    $("#EditTopicModal").modal('hide');
                    alert(data);
                    show_topics();
                }
            });
        }
        else{
            alert("Chapter field is empty");
        }
    });


    // update functions

    // show functions
    All_show_functions();

});  // jquery function end here


function All_show_functions() {
    // show chapter
    show_chapter_list();
    // show topic
    show_topics();
    // show board
    show_board();
}


// show board
function show_board() {
    $.ajax({
        processData:false,
        contentType:false,
        type:"get",
        url:"ShowBoardlist",
        success:function(data){
            all = JSON.parse(data);
            $("#BoardListDelete").html(all.delete);
            // $("#board_list").html(all.board_list);
        }
    })
}


// show topic
function show_topics() {
    $.ajax({
        processData:false,
        contentType:false,
        type:"get",
        url:"ShowTopiclist",
        success:function(data){
            all = JSON.parse(data);
            $("#EditTopicList").html(all.edit);
            $("#DeleteTopicList").html(all.delete);
            // $("#Topic-chapter").html(all.topic_list);
        }
    })
}

// show chapter
function show_chapter_list() {
    $.ajax({
        processData:false,
        contentType:false,
        type:"get",
        url:"ShowChapterlist",
        success:function(data){
            all = JSON.parse(data);

            $("#EditChapterList").html(all.edit_chapter);
            $("#DeleteChapterList").html(all.delete_chapter);
            $("#Topic-chapter").html(all.chapter_list);
            $("#EditTopicChapter").html(all.chapter_list);
        }
    });
}

// delete board
function Delete_Board(id) {
    $.ajax({
        processData:false,
        contentType:false,
        type:"get",
        url:"DeleteBoard/"+id+"",
        success:function(data){
            alert("Successfully deleted");
            show_board();
        }
    })
}

// delete chapter
function Delete_Chapter(id) {
    $.ajax({
        processData:false,
        contentType:false,
        type:"get",
        url:"DeleteChapter/"+id+"",
        success:function(data){
            alert("Successfully deleted");
            show_chapter_list();
        }
    })
}

// delete topic
function Delete_Topic(id) {
    $.ajax({
        processData:false,
        contentType:false,
        type:"get",
        url:"DeleteTopic/"+id+"",
        success:function(){
            alert("Successfully deleted");
            show_topics();
        }
    })
}


// edit chapter name
function Edit_Chapter(id) {
    $.ajax({
        processData:false,
        contentType:false,
        type:"get",
        url:"EditChapterName/"+id+"",
        success:function(data){
            all = JSON.parse(data);
            $("#EditChapterName").val(all.chapter_name);
            $("#HiddenEditChapterId").val(all.id);
            $("#EditChapterNameModal").modal('show');
        }
    })
}


// edit topic
function Edit_Topic(id) {
    $.ajax({
        processData:false,
        contentType:false,
        type:"get",
        url:"EditTopic/"+id+"",
        success:function(data){
            all = JSON.parse(data);
            $("#EditTopicName").val(all.topic_name);
            $("#EditTopicChapter").val(all.chapter_id);
            $("#HiddenEditTopicId").val(all.id);
            $("#EditTopicModal").modal('show');
        }
    })
}
