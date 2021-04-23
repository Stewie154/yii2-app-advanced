<h1><?=$model->name?></h1>
<br>
<div class="author-info">
    <img class="author-pic" src=<?=$model->picture?> alt=<?=$model->name?> >
    <br>    
    <ul>
        <li><span class="bold">Age: </span><?=$model->age?></li>
        <li><span class="bold">Location: </span><?=$model->location?></li>
        <li><span class="bold">Fun Fact: </span><?=$model->fact?></li>
    </ul>
</div>

<h3>Bio: </h3>

<p><?=$model->bio?></p>

<div class="view-posts">
    <h2>View <?=$model->name?>'s Posts:</h2>
    <a class="btn btn-info btn-lg" href="/posts/filter/<?=$model->id?>">View</a>
</div>

<a class="btn btn-primary" href="/authors/index">Back</a>

