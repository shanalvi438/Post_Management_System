        
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
                    url: 'updateposts.php',
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

            // $('.delete-comment').on('click', function() {
            //     var commentDiv = $(this).closest('.comment');
            //     var commentId = commentDiv.data('id');

            //     $.ajax({
            //         url: 'deletecomment.php',
            //         type: 'POST',
            //         data: { id: commentId },
            //         success: function(response) {
            //             if (response === 'success') {
            //                 commentDiv.remove();
            //             } else {
            //                 alert('Failed to delete comment.');
            //             }
            //         }
            //     });
            // });

            // var postId = $('#load-more').data('postid');
            // var offset = $('#load-more').data('offset');
            // var limit = $('#load-more').data('limit');

            // function loadComments() {
            //     $.ajax({
            //         url: 'getMoreComments.php',
            //         type: 'POST',
            //         data: { postId: postId, offset: offset, limit: limit },
            //         success: function(response) {
            //             var data = JSON.parse(response);
            //             $('#comments').append(data.comments_html);

            //             offset += limit;
            //             $('#load-more').data('offset', offset);

            //             if (data.remaining_comments <= 0) {
            //                 $('#load-more').hide();
            //             } else {
            //                 $('#load-more').text('Load More (' + data.remaining_comments + ' left)');
            //             }
            //         }
            //     });
            // }

            // $('#load-more').on('click', function() {
            //     loadComments();
            // });

            // // Initial load
            // loadComments();


        });