$(document).on("submit", '.comment-form', function(event) {
    var data = $(this).serialize() + '&action=add_comment_ajax';

    console.log('submitting comment...');
    console.log(event);

    let $t = $(this);

    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_comments.ajaxurl,
        data: data,
        success: function(new_comment){
            console.log(new_comment);
            let closest = $t.closest('.comment-form-block');

            let closest_id = $(closest).attr('id');
            $(closest).before(new_comment);

            if (!closest_id) {
                $(closest).remove();
            }

            // очищаем поле textarea
            $('#comment').val('');
        },
        error : function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });

    return false;
});

let comments_page = 1;

function load_comments() {
    comments_page++;
    var str = '&page=' + comments_page + '&post_id=' + post_id + '&action=more_comments_ajax';

    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: str,
        success: function(data){
            var $data = $(data);
            if ($data.length) {
                $($data).insertBefore('#comment-form');
                $("#more_comments").attr("disabled",false);
            }

            console.log(cpp * comments_page + " - " + commment_count);

            if (cpp * comments_page >= commment_count) {
                // console.log("no more comments");
                $("#more_comments").remove();
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

$("#more_comments").click(function() {
    $(this).attr("disabled",true);
    load_comments();
    $(this).insertAfter('#ajax-videos');
});

$(document).on("click", '.reply-btn', function(event) {
    // copy and place form
    let comment_id = $(this).attr('comment-id');
    console.log(comment_id);

    $('.copy-form').remove();
    let new_form = $("#comment-form").clone().removeAttr('id');

    $(new_form).find('#more_comments').remove();
    $(new_form).find('#comment_parent').val(comment_id);
    $(new_form).find('#comment').val('');
    $(new_form).addClass('copy-form').insertAfter($(this).closest('.single-comment'));
});