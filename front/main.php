<style>
    .tag {

        width: 100px;
        padding: 5px 10px;
        border: 1px solid black;
        /* 好用 */
        margin-top: -1px;
        margin-left: -1px;
        border-radius: 8px 8px 0 0;

    }

    .tags {
        display: flex;
        padding-left: 1px;
        /* position: relative;
        z-index: 9; */
    }

    article section {
        border: 1px solid black;
        min-height: 400px;
        margin-top: -1px;
        margin-left: -1px;

    }

    article {
        padding-left: 1px;
    }

    .active {
        border-bottom: 1px solid white;
    }
</style>


<div class="tags">


    <div class="tag">健康新知</div>
    <div class="tag">菸害防治</div>
    <div class="tag">癌症防治</div>
    <div class="tag">慢性病防治
</div>
</div>

<article>
    <section>1</section>
    <section>2</section>
    <section>3</section>
    <section>4</section>
</article>

<script>
    $(".tag").on('click', function() {
$('.tag').removeClass('active')
$(this).addClass('active')

    })
</script>