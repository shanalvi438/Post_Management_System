<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<header>
        <div class="header-content">
    <h1>Posts</h1>
    <form id="postForm">
        <input type="text" id="title" name="title" placeholder="Title" required>
        <textarea id="content" name="content" placeholder="Content" required></textarea>
        <button type="submit">Submit</button>
    </form>
</div>
</header>
    <div id="posts"></div>
        
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</body>
</html>
