<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>
        This is the title for index action in index controller
</title>
</head>
<body>
    
    <h1><?php echo trim($test); ?></h1>
    <h2>array test</h2>
    <div>
        <?php foreach ($arr as $index => $el) { ?>
            <p>
                <?php if (((($index) % 2) == 0)) { ?>
                    <?php echo Phalcon\Text::upper($el); ?>
                <?php } else { ?>
                    <?php echo $el; ?>
                <?php } ?>
            </p>
        <?php } ?>
        <p></p>
    </div>

</body>
</html>