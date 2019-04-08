<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />    
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
    <link rel="stylesheet" href="css/main.css" />
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=v6tdhrat3htidv8lr34y66kg4imowde4jrhuv0nfn79bxkf3"></script>
    <script>
  	tinymce.init({
    selector: '#mytextarea'
  	});
  	</script>
    <title><?= $title ?></title>
</head>
<body>
    <div id="content">
        <?= $content ?>
    </div>
    <script src="../public/js/verif.js"></script>
</body>
</html>