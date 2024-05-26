function loadPosts() {
    $.ajax({
        url: 'getposts.php',
        method: 'GET',
        success: function(data) {
            $('#posts').html(data);
        }
    });
}

$(document).ready(function() {
    loadPosts();

    $('#postForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'addposts.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(data) {
                $('#postForm')[0].reset();
                loadPosts();
            }
        });
    });

    $(document).on('click', '.delete-post', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'deleteposts.php',
            method: 'POST',
            data: {id: id},
            success: function(data) {
                loadPosts();
            }
        });
    });

    $(document).on('submit', '.commentForm', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'postComment.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(data) {
                // console.log(data)
                loadPosts();
            }
        });
    });

    //  $('.load-more').on('click', function() {
    //     alert("d");
    //     var post_id = $(this).data('post_id');
    //     var offset = $(this).data('offset');
        
    //     $.ajax({
    //         url: 'load-comments.php',
    //         type: 'POST',
    //         data: { post_id: post_id, offset: offset },
    //         success: function(response) {
    //             $('.comments[data-post_id="' + post_id + '"]').append(response);
    //         }
    //     });
    // });

    // $('.load-more').click(function(e){
    //     e.preventDefault();
    //     var post_id = $(this).data('post_id');
    //     var offset = $(this).data('offset');
    //     var limit = 3; 

    //     $.ajax({
    //         url: 'load_comments.php',
    //         type: 'POST',
    //         dataType: 'json',
    //         data: {
    //             post_id: post_id,
    //             offset: offset,
    //             limit: limit
    //         },
    //         success: function(response){
    //             $('.comments[data-post_id="'+post_id+'"]').append(response.comments_html);
    //             $('.load-more[data-post_id="'+post_id+'"]').data('offset', offset + limit);
    //             if (response.remaining_comments > 0) {
    //                 var popupWidth = 600;
    //                 var popupHeight = 400;
    //                 var left = (screen.width - popupWidth) / 2;
    //                 var top = (screen.height - popupHeight) / 2;
    //                 var popupParams = 'width=' + popupWidth + ', height=' + popupHeight + ', top=' + top + ', left=' + left;
    //                 var popupWindow = window.open('popup.html', 'Popup', popupParams);
    //             } else {
    //                 $('.load-more[data-post_id="'+post_id+'"]').hide();
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(xhr.responseText);
    //             // Handle error
    //         }
    //     });
    // });
});        
        
        
