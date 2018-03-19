
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
});         
 </script>

<div class ="container">
<?php if (!empty($post)) { 
  foreach($post as $key => $req) {
?>    
    <h2>Modifications du <?= htmlspecialchars($req->getTitle()) ?></h2>
  <form action="index.php?action=UpdateContent&amp;id=<?= $post['id'] ?>" method="POST">
     <div class ="form-group">
      <label for="title" class ="control-label">Titre de l'article</label><br />
      <input type="text" class="form-control" id="title" name="new_title" value="<?= htmlspecialchars($req->getTitle()) ?>">
      </input>
    </div>
     <div class ="form-group">
      <br /><label for="content" class ="control-label">Contenu de l'article</label><br />
      <textarea id ="mytextarea", name="new_content"> 
        <?= nl2br(htmlspecialchars($req->getContent())) ?> 
      </textarea>
      <br /><button type="submit" class="btn btn-primary">Modifier</button>
    </div>
  </form>

<?php 
  }
}
else {
?>  
<h2>Création d'un nouvel article</h2>
  <form action="index.php?action=CreateContent" method="POST">
    <div class = "form-group">
      <label for="title">Titre de l'article</label><br />
      <input type="text" id="title" name="newtitle">
      </input>
    </div>
    <div class="form-group">
      <label for="newcontent">Contenu de l'article</label><br />
      <textarea id ="mytextarea", name="newcontent"></textarea> 
      <br /><button type="submit" class="btn btn-primary">Mettre en ligne</button>
    </div>
  </form>
<?php 
}
?>
  <div align="center">
    <div class="row">
      <a href="index.php"><button class="btn btn-primary">Retour à la liste des billets</button></a>
    
      <a href="index.php?action=Administration"><button class="btn btn-primary">Retour à l'espace d'administration</button></a>
      </div>
  </div>
</div>


