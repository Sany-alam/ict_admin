$(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); // csrf solution


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



    // show chapter
    show_chapter_list();
    // show topic
    show_topics();

});  // jquery function end here


// show topic
function show_topics() {
    $.ajax({
        processData:false,
        contentType:false,
        type:"get",
        url:"ShowTopiclist",
        success:function(data){
            all = JSON.parse(data);
            $("#TopicList").html(all.dropdown);
            // $("#Topic-chapter").html(all.option);
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

            $("#ChapterList").html(all.dropdown);
            $("#Topic-chapter").html(all.option);
        }
    });
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
