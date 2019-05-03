<div class="search">
    <input type="text" placeholder="在公告中查询你想要的通知" id="searchInput">
    <div class="show-result">

    </div>
</div>

<style>
    .search{
        margin-top: 20px;
        text-align: center;
        position: relative;
    }
    .search>input{
        padding: 0 10px;
        width: 280px;
        height: 25px;
    }


    .search .show-result{
        display: none;
        padding: 0 10px;
        margin: 0 auto;
        width: 282px;
        border: 1px solid #CCCCCC;
        border-top: none;
        text-align: left;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        background: white;
        max-height: 150px;
        overflow-y: auto;
     }

    .search .show-result li{
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>

<script src="js/jquery-1.12.4.js"></script>
<script>
    $('#searchInput').on('focus',function () {
        $('.show-result').show();
    });

    document.addEventListener('click',function (event) {
        if(event.target == main){
            $('.show-result').hide();

        }
    });

    $('#searchInput').on('keyup',function () {
        var text = $(this).val();
        $.get('user/find_announce',{
            text:text
        },function (data) {
            $('.show-result').empty();
            if(data.length){
                for (var i=0; i<data.length; i++){
                    $('.show-result').append("<li><a href='welcome/announcement_detail/"+data[i].id+"'>" +data[i].title+ "</a></li>");
                }
            }else{
                $('.show-result').append('<li>没有找到相关结果！</li>');
            }
        },'json')
    })
</script>