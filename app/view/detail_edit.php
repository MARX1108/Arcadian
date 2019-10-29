<div class="main">
<form id="post" method="POST" action="<?= BASE_URL ?>/save_editing_process/<?= $story->id ?>">
        <div id="sub_header">
            <div id="author_info">
                <h1 id="title"><input id="title" name="title" type="text" placeholder="<?= $story->title ?>"></h1>
                <h2 id="name">By <?= $story->author ?></h2>
                <p id="occp">Test Designer</p>
            </div>
           
        </div>

        <img id = "content" src="<?= $story->img_url ?>" alt="" width = "80%">
        </div>
        <div id="comment_sec">
            <div id="comment_right">
                <p id="tag"><input id="tag_input" name="tag" type="text" placeholder="<?= $story->tags?> "></p>
                <p><?= $story->views?> Views</p>
                <p><?= $story->likes?>  Likes</p>
                <p><?= $story->donate?> Donates</p>
                <p>Date <?= $story->date_created?></p>
            </div>

            <div id="comment_left">
                <div class="post" id="post_win">
                    <textarea name = "url" placeholder="Type Your New Url Here. Current url: <?=$story->url?>"></textarea>
                </div>

                <div class="post" id="post_win">
                    <textarea name = "img_url" placeholder="Type Your New Image-Url Here. Current img_url: <?=$story->img_url?>"></textarea>
                </div>

                <div class="post" id="post_win">
                    <textarea id="post_box" name = "description" placeholder="Type Your New Description Here. Current Description: <?=$story->description?>"></textarea>
                    <button id="btn-upload" type = "submit">Confirm Change</button>
                </div>
            </div>
        </div>
        </form>
    </div>