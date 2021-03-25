let pageNumber = 1;
let offset = 0;
let category_slug = "";

function load_posts() {
    pageNumber++;
    var str = '&pageNumber=' + pageNumber + '&offset=' + offset + '&action=more_post_ajax';
    console.log(pageNumber);

    if (category_slug) {
        str += '&category=' + category_slug;
    }

    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: str,
        success: function(data){
            var $data = $(data);
            if ($data.length) {
                $("#ajax-posts").append($data);
                $("#more_posts").attr("disabled",false);
            }

            if (ppp * pageNumber >= (postCount - offset)) {
                console.log("no more posts");
                $("#more_posts").remove();
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

function loadClick(newOffset, slug) {
    offset = newOffset;
    category_slug = slug;
    // $("#more_posts").attr("disabled",true);
    load_posts();
    $("#more_posts").insertAfter('#ajax-posts'); // Move the 'Load More' button to the end of the the newly added posts.
};

let videoPageNumber = 1;

function load_videos() {
    videoPageNumber++;
    var str = '&pageNumber=' + videoPageNumber + '&action=more_video_ajax';

    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: str,
        success: function(data){
            var $data = $(data);
            if ($data.length) {
                $("#ajax-videos").append($data);
                $("#more_videos").attr("disabled",false);
            }

            if (videoPpp * videoPageNumber >= videoPostCount - videoOffset) {
                console.log("no more videos");
                $("#more_videos").remove();
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

$("#more_videos").click(function() {
    $(this).attr("disabled",true);
    load_videos();
    $(this).insertAfter('#ajax-videos');
});

