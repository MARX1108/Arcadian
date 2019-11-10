<div class="main">
<form id="post" method="POST" action="<?= BASE_URL ?>/save_editing_process/<?= $story->id ?>">
      <ul>
        <div id="sub_header" class = "container">
            <div id="author_info">
                <h1 class = "h1"><input id="title" name="title" type="text" placeholder="<?= $story->title ?>"></h1>
                <h2 class = "h3">By <?= $story->author ?></h2>
            </div>
        </div>

        <img class = "card container" src="<?= $story->img_url ?>" alt="" >


        </ul>
        <div class = "row " >
            
            <div class = "card m-3 ml-5  col-md-7 buttom">
                <div class="card ml-5 p-3 mb-3 col-md-offset-2" id="post_win">
                    <textarea name = "url" placeholder="Type Your New Url Here. Current url: <?=$story->url?>"></textarea>
                </div>

                <div class="card ml-5 p-3 mb-3 col-md-offset-2" id="post_win">
                    <textarea name = "img_url" placeholder="Type Your New Image-Url Here. Current img_url: <?=$story->img_url?>"></textarea>
                </div>

                <div class="card ml-5 p-3 mb-3 col-md-offset-2" id="post_win">
                    <textarea id="post_box" name = "description" placeholder="Type Your New Description Here. Current Description: <?=$story->description?>"></textarea>
                    <button id="btn-upload" type = "submit">Confirm Change</button>
                </div>
            </div>

            <div class = "card col-md-4  m-3 p-3">
                <p id="tag"><input id="tag_input" name="tag" type="text" placeholder="<?= $story->tags?> "></p>
                <p><?= $story->views?> Views</p>
                <p><?= $story->likes?>  Likes</p>
                <p><?= $story->donate?> Donates</p>
                <p>Date <?= $story->date_created?></p>
            </div>



        </div>
        </form>
    </div>