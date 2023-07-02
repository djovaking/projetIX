<h1>Edit Comment</h1>

<form method="POST" action="updatecomment">
    <input type="hidden" name="commentId" value="<?php echo $_GET['commentId']; ?>">
    <div>
        <label for="text">Commentaire:</label>
        <input type="text" name="text" value="<?php echo $_GET['text']; ?>">
    </div>
    <button type="submit">Update</button>
</form>
<form method="POST" action="deleteComment">
    <input type="hidden" name="commentId" value="<?php echo $_GET['commentId']; ?>">
    <button type="submit" onclick="return confirm('Are you sure you want to delete this comment?')">Supprimer le commentaire</button>
</form>