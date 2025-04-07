<?php
$name = htmlspecialchars($_POST["name"]);
$comment = htmlspecialchars($_POST["comment"]);
echo "Hi, $name. Your comment has been received successfully." . "";
echo "Here's the comment what you've entered: $comment";
?>