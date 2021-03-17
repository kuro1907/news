<head>
    <meta charset="utf-8">

    <title>Editor Placeholder</title>
    <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>
</head>

<body>
    <form action="test2.php" method="post">
        <textarea cols="10" id="editor1" name="content" rows="10" data-sample-short></textarea>
        <button type="submit">SSSSSSS</button>
    </form>
    <script>
        CKEDITOR.replace('editor1', {
            extraPlugins: 'editorplaceholder',
            editorplaceholder: 'Start typing here...'
        });
    </script>
</body>

</html>