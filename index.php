<!doctype html>
<?php
require 'vendor/autoload.php';

use League\HTMLToMarkdown\HtmlConverter;

$res = '';
$contents = '';
if (isset($_POST['submit'])) {
    if (is_uploaded_file($_FILES['customFile']['tmp_name'])) {
        $contents = file_get_contents($_FILES['customFile']['tmp_name']);

    } else if (!empty($_POST['input'])) {
        $contents = $_POST['input'];
    } else {
        echo '<script>';
        echo 'alert("There was no input provided")';
        echo '</script>';
    }
    function isHTML($string)
    {
        return $string != strip_tags($string) ? true : false;
    }

    if (isHTML($contents) == true) {
        $HTMLToMarkdown = new HtmlConverter(array('header_style' => 'atx'));
        $res = $HTMLToMarkdown->convert($contents);
    } else {
        $Markdown2HTML = new Parsedown();
        $res = $Markdown2HTML->text($contents);
    }
}


if (isset($_POST['download'])) {

    header('Content-disposition: attachment; filename=output.txt');
    header('Content-type: application/txt');

    echo $_POST['output'];
    exit;
}


?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>MARKDOWN2HTML</title>
</head>
<body>
<div id="header"><h1 id="header_text">MARKDOWN2HTML</h1></div>

<form action="index.php" method="post" enctype="multipart/form-data">
    <div class="form-row justify-content-center">
        <div class="col-3" id="col1">
            <textarea class="form-control textbox text-white" placeholder="Input here (Markdown and HTML supported)"
                      name="input" id="input"><?php echo $contents ?></textarea>
            <button type="submit" id="submit" onclick="fetchApi()" name="submit" class="btn button-style"><i
                        class="fa fa-arrow-right"></i>
                Convert
            </button>
            <label for="customFile" class="btn button-style">
                <i class="fa fa-cloud-upload"></i> Upload
            </label>
            <input type="file" accept=".txt" class="form-control button-style text-white" onchange="readText(event)"
                   name="customFile" id="customFile"/>
        </div>
        <div class="col-3" id="col2">
            <textarea class="form-control textbox text-white" name="output" id="output"
                      readonly><?php echo $res ?></textarea>
            <button type="button" id="copy" onclick="copy()" class="btn button-style"><i class="fa fa-copy"></i> Copy
            </button>
            <button type="submit" name="download" class="btn button-style"><i class="fa fa-download"></i> Download
            </button>
        </div>
    </div>
</form>
<footer>
    <p class="text-center">Made with ♥ by Wojciech Osmulski</p>
</footer>


<script src="index.js"></script>

</body>
</html>

