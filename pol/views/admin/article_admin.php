<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">-->
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
	<script src="assets/js/scipts/ckfinder/ckfinder.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="/assets/js/google-translate.js"></script>
<script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>
    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
    </style>

</head>
<body>
<br>
<br>
<br>
<?php include ('views/partials/header.php');?>
<div class="container">
    <h1>Содержимое темы</h1>
    <div>
        <?php
            $send = "/?go=admin&action=".$_GET['action'].($_GET['action']!="add"?("&id=".$_GET['id']):"");
        ?>
        <form method="post" action=<?=$send;?>>
            <label>Название <input type="text" name="title" value="<?=$article['title']?>" class="form-item" autofocus required></label><br>
            <label>Дата <input type="date" name="date" value="<?=$article['date']?>" class="form-item" required></label><br>         
		 <textarea name="content" id="editor" class="form-item"><?=$article['content']?></textarea><br>		  
            <label>Предмет <select name="product_id" class="form-item" required>
                <?php foreach($productNames as $product): ?>
                    <option name="option_name" 
                    <?=($subjectId==$product['id'])?"selected":"";?> 
                    value="<?= $product['id'] ?>"><?= $product['title'] ?></option>
                <?php endforeach; ?>
                    <?=$article['content']?>
                </select></label><br>
                       <p><input type="submit" value="Сохранить"></p>
        </form>
        <script>
        ClassicEditor
			.create( document.querySelector( '#editor' ), {
            ckfinder: {
                uploadUrl: 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
            },
            toolbar: [ 'ckfinder','VideoDetector', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo', ]
			
        } )
        .catch( error => {
            console.error( error );
        } );	
        </script>
        </form>
    </div>
</div>
</body>
</html>