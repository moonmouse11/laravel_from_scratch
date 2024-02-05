<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Posts</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
    <h1>Мои тупые истории про рыбок</h1>
    <?php foreach($posts as $post): ?>
    <article>
        <h2><a href="/posts/<?= $post->getSlug(); ?>"><?= $post->getTitle(); ?></a></h2>
        <div>
            <?= $post->getExcerpt(); ?>
        </div>
    </article>
    <?php endforeach; ?>
</body>
</html>
