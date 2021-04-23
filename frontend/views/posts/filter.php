<h1>Posts by <?=$model->name?></h1>

<div class="posts-container">
    <?php foreach($model->posts as $post) :?>
    <a class="post-card" href="/posts/view/<?=$post->id?>">
        <div class="post-body">
            <h3><?=$post->Title?></h3>
            <img src=<?=$post->picture?> alt="author">
            <h4>By: <?=$post->author->name?></h4>
        </div>
    </a> 
    <?php endforeach;?> 
</div>
<br>
<a class="btn btn-primary" href="/authors/index">Back to Authors</a>

