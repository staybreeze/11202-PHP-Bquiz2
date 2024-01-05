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
        min-height: 480px;
        margin-top: -1px;
        margin-left: -1px;
        display: none;
    }

    article {
        padding-left: 1px;
    }

    .active {
        border-bottom: 1px solid white;
    }
</style>


<div class="tags">


    <div id="sec01" class="tag">健康新知</div>
    <div id="sec02" class="tag">菸害防治</div>
    <div id="sec03" class="tag">癌症防治</div>
    <div id="sec04" class="tag">慢性病防治
    </div>
</div>



<article>
    <section id="section01" style="display:block"><h2>健康新知</h2></section>
    <section id="section02"><h2>菸害防治</h2></section>
    <section id="section03"><h2>癌症防治</h2></section>
    <section id="section04"><h2>慢性病防治</h2></section>
</article>

<script>
    $(".tag").on('click', function() {
        $('.tag').removeClass('active')
        $(this).addClass('active')
        let id = $(this).attr('id').replace('sec', 'section');
        console.log(id)
        $("section").hide(); 
        $("#"+id).show();


        // let newId = id.replace('sec', 'section');
        // console.log(newId)
        // $("section").hide(); 
        // $("#"+newId).show();
    })
</script>