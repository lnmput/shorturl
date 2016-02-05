<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
      <form action="test" method="post">
          {{csrf_field()}}
          <input type="test" name="url">
          <input type="submit" value="提交">
      </form>
</body>
</html>