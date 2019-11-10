<div class="main">
    <ul>
        <div id="sub_header" class = "container">
            <div id="author_info">
                <h1 class = "h1"><?= $story->title ?></h1>
                <h2 class = "h3">By <?= $story->author ?></h2>
            </div>
        </div>

        <img class = "card container" src="<?= $story->img_url ?>" alt="" >


        
        </ul>
        <div class = "row " >
            <div class = "card m-3 ml-5  col-md-7 buttom">
                <div class="card ml-5 p-3 mb-3 col-md-offset-2 ">
                    <p><a href="#">Description</a></p>
                    <p> <?=$story->description?></p>
                </div>

                <div class="card ml-5 p-3" id="post_win">
                    <textarea id="post_box" placeholder=" Post Something" class = "form-control m-3"></textarea>
                    <button id="btn-post" class = "btn btn-primary mb-2">Post</button>
                    <button id="btn-upload"  class = "btn btn-primary">Upload</button>
                </div>
            </div>

            <div class = "card col-md-4  m-3 p-3">
                <p id="tag"><?= $story->tags?></p>
                <p><?= $story->views?> Views</p>
                <p><?= $story->likes?>  Likes</p>
                <p><?= $story->donate?> Donates</p>
                <p>Date <?= $story->date_created?></p>
            </div>
        </div>
    </div>