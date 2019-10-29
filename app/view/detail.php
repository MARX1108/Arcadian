<div class="main">
        <div id="sub_header">
            <div id="author_info">
                <h1 id="title"><?= $story->title ?></h1>
                <h2 id="name">By <?= $story->author ?></h2>
                <p id="occp">Graphic Designer</p>
            </div>
           
        </div>

        <img id = "content" src="<?= $story->img_url ?>" alt="" width = "80%">
        </div>
        <div id="comment_sec">
            <div id="comment_right">
                <p id="tag"><?= $story->tags?></p>
                <p><?= $story->views?> Views</p>
                <p><?= $story->likes?>  Likes</p>
                <p><?= $story->donate?> Donates</p>
                <p>Date <?= $story->date_created?></p>
            </div>

            <div id="comment_left">
                <div class="post">
                    <p><a href="#">Description</a></p>
                    <p> <?=$story->description?></p>

                </div>
                <div class="post" id="post_win">
                    <textarea id="post_box" placeholder=" Post Something"></textarea>
                    <button id="btn-post">Post</button>
                    <button id="btn-upload">Upload</button>
                </div>
            </div>
        </div>
    </div>