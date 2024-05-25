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
                loadPosts();
            }
        });
    });

    $('.load-more').click(function(e){
        e.preventDefault();
        var post_id = $(this).data('postid');
        var offset = $(this).data('offset');
        var limit = 3; // Assuming you have a fixed limit for comments per request

        $.ajax({
            url: 'load_comments.php',
            type: 'POST',
            dataType: 'json',
            data: {post_id: post_id, offset: offset, limit: limit},
            success: function(response){
                $('.comments[data-postid="'+post_id+'"]').append(response.comments_html);
                $('.load-more[data-postid="'+post_id+'"]').data('offset', offset + limit);
                
                // Update the Load More button text to show remaining comments
                if (response.remaining_comments > 0) {
                    $('.load-more[data-postid="'+post_id+'"]').text('Load More (' + response.remaining_comments + ' remaining)');
                } else {
                    $('.load-more[data-postid="'+post_id+'"]').hide(); // Hide the button if no remaining comments
                }
            }
        });
    });
});        
        
        
