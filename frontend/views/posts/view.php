<h1><?=$model->Title?></h1>
<br>
<h3 id="by">BY: <?=$model->Author?></h3>
<p class="content"><?=$model->Content?></p>
<h2>Follow <?=$model->Author?>:</h2>
<div class="author-info">
    <img id="view-pic" src=<?=$model->picture?> alt="author">
    <ul class="social-links">
        <li><a href=<?=$model->Twitter?>>Twitter</a></li>
        <li><a href=<?=$model->Facebook?>>Facebook</a></li>
        <li><a href=<?=$model->Instagram?>>Instagram</a></li>
    </ul>
</div>




<a class="btn btn-primary" href="/posts/index">Back</a>
<a class="btn btn-primary" href="/posts/edit/<?=$model->ID?>">Edit</a>
<a class="btn btn-danger" href="/posts/delete/<?=$model->ID?>" >Delete</a>