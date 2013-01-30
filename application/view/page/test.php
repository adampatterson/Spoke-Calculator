<html>
<head>
    <title>What's Up?</title>
</head>
<body>
<div id="content"> This is where the content goes! </div>
<script id="template" type="text/handlebars">
    {{#fields}}

    Hello, {{name}}!

    {{/fields}}
</script>
<script src="<?= JS ?>jquery.js"></script>
<script src="<?= JS ?>handlebars.js" type="text/javascript"></script>

</body>
</html>