<h1><?=$model->Title?></h1>
<br>
<h3 id="by">BY: <?=$model->Author?></h3>
<p class="content"><?=$model->Content?></p>
<h2>Follow <?=$model->Author?>:</h2>
<div class="author-info">
    <img id="view-pic" src=<?=$model->picture?> alt="author">
    <ul class="social-links">
        <li><a href="https://www.google.co.uk/">Twitter</a></li>
        <li><a href="https://www.google.co.uk/">Facebook</a></li>
        <li><a href="https://www.google.co.uk/">Instagram</a></li>
    </ul>
</div>




<a class="btn btn-primary" href="/posts/index">back</a>