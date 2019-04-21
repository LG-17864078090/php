
<style>
    *{
        margin: 0;
        padding: 0;
    }
    li{
        list-style: none;
    }
    #container{
        width: 560px;
        height: 300px;
        margin: 10px auto;
        position: relative;
        overflow: hidden;
        border: 2px solid red;

    }
    #container .imgs{
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 3600px;
    }
    #container .imgs img{
        float: left;
        width: 600px;
        height: 100%;
    }
    #container .nav{
        position: absolute;
        right: 10px;
        bottom: 10px;
    }
    #container .arrows{
        position: absolute;
        left: 10px;
        bottom: 10px;
    }
    #container .nav li,.arrows span{
        float: left;
        width: 20px;
        height: 20px;
        background: #000;
        color: #fff;
        margin-right: 10px;
        text-align: center;
        line-height: 20px;
        cursor: pointer;
    }
    #container .nav li.selected{
        background: orange;
    }
</style>


<div id="container">
    <div class="imgs" id="img-container">
        <img src="images/hd1.jpg" alt="">
        <img src="images/hd2.jpg" alt="">
        <img src="images/hd3.jpg" alt="">
        <img src="images/hd4.jpg" alt="">
        <img src="images/hd5.jpg" alt="">
        <img src="images/hd6.jpg" alt="">
    </div>
    <ul class="nav">
        <li class="li-index selected">1</li>
        <li class="li-index" >2</li>
        <li class="li-index" >3</li>
        <li class="li-index" >4</li>
        <li class="li-index" >5</li>
        <li class="li-index" >6</li>
    </ul>
    <div class="arrows">
        <span id="prev">&lt;</span>
        <span id="next">&gt;</span>
    </div>
</div>
<script src="js/jslib.js"></script>
<script>
    var aLi = document.getElementsByClassName('li-index');
    var oContainer = document.getElementById('container');
    var oPrev = document.getElementById('prev');
    var oNext = document.getElementById('next');
    var oImgCon = document.getElementById('img-container');
    var nowIndex = 0;

    for(var i=0;i<aLi.length;i++){
        aLi[i].index = i;
        aLi[i].onmouseover = function () {
            nowIndex = this.index;
            changeImg(this.index);
        };
        aLi[i].onselectstart = function(){
            return false;
        };
    }
    oNext.onclick = function(){
        nowIndex++;
        if(nowIndex == aLi.length){
            nowIndex = 0;
        }
        changeImg(nowIndex);
    };
    oPrev.onclick = function(){
        nowIndex--;
        if(nowIndex == -1){
            nowIndex = aLi.length - 1;
        }
        changeImg(nowIndex);
    };
    oNext.onselectstart = function(){
        return false;
    };
    oPrev.onselectstart = function(){
        return false;
    };

    function changeImg(index){
        for(var j=0;j<aLi.length;j++){
            aLi[j].className = 'li-index';
        }
        aLi[index].className = 'li-index selected';
        animate(oImgCon,{left:-index*600});
    }

    oContainer.onmouseover = function () {
        clearInterval(timer);
    };
    oContainer.onmouseout = function () {
        play();
    };


    var fn = function(){
        oNext.onclick();
    };

    function play(){
        timer = setInterval(fn,2000);
    }
    play();
</script>
