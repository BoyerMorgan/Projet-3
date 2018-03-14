<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="style.css" rel="stylesheet" /> 
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
          <script>
            tinymce.init({
  selector: '#mytextarea', 
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});          </script>
    </head>
    <body>
<?php if (!empty($post)) { 
?>    
    <h2>Modifications du <?= htmlspecialchars($post['title']) ?></h2>
  <form action="index.php?action=UpdateContent&amp;id=<?= $post['id'] ?>" method="POST">
    <div>
      <label for="title">Titre de l'article</label><br />
      <input type="text" id="title" name="new_title" value="<?= htmlspecialchars($post['title']) ?>">
      </input>
    </div>
    <div>
      <br /><label for="content">Contenu de l'article</label><br />
      <textarea id ="mytextarea", name="new_content"> 
        <?= nl2br(htmlspecialchars($post['content'])) ?> 
      </textarea>
      <br /><input type="submit" value="Modifier" />
    </div>
  </form>
<?php 
}
else {
?>  
<h2>Création d'un nouvel article</h2>
  <form action="index.php?action=CreateContent" method="POST">
    <div>
      <label for="title">Titre de l'article</label><br />
      <input type="text" id="title" name="newtitle">
      </input>
    </div>
    <div>
      <br /><label for="newcontent">Contenu de l'article</label><br />
      <textarea id ="mytextarea", name="newcontent"></textarea> 
      <br /><input type="submit" value="Mettre en ligne" />
    </div>
  </form>
<?php 
}
?>

<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>
<p><a href="index.php?action=Administration">Retour à l'espace d'administration</a></p>
</body>

</html>

