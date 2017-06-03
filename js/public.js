$(function () {
    $.fn.extend({
        Tab:function (tit,select,con) {
            var that=$(this);
            $(this).find(tit).click(function () {
                // var i=$(this).index('.box span');
                // var i=$(this).index();
//					var i=$('.box span').index(this);
                var i=that.find(tit).index(this);
                $(this).addClass(select).siblings().removeClass(select);
                that.find(con).eq(i).show().siblings().hide();
            })
        }

    })
    $('.wrap').Tab('.ft-public','select','.tab-hade');
    $('.main2').Tab('.home li','select','.TabConChild');
})
$(function(){
    $('.ft-public').click(function () {
        var sum=$(this).index();
        if(sum!=0){
            $('header').css('display','none')
        }else {
            $('header').css('display','block')
        }
    })
})
//        轮播图
$(function () {
    var imgW=$('#con img').width();
//			console.log(imgW)
    var x=1;
    $('#wrap').scrollLeft(imgW);
    $('#list li').click(function () {
        clearInterval(timer);
        x=$(this).index();
        $('#list li').eq(x).addClass('select').siblings().removeClass('select');
        $('#wrap').stop().animate({scrollLeft:imgW*x});
        auto();
    });

    var timer=null;
    function auto() {
        timer=setInterval(function () {
            if (x>$('#con img').length-1){
                x=1;
                $('#wrap').scrollLeft(0);
            }
            $('#list li').eq(x-1).addClass('select').siblings().removeClass('select');
            $('#wrap').stop().animate({scrollLeft:imgW*x})
            x++;
        },2000)
    }
    auto();
})
// 返回
$(function(){
    $('#goback').click(function(){
        window.history.go(-1);
    })
})
$(function(){
    $(".shou").click(function(){
            $('.zz_link').toggle(2000);
    })
})
$.ajax({
        type:"post",
        url: "../php/demo.php",
        dataType: "json",
        success: function (data) {
//            console.log(data);
            for (var item in data){
               var con=" <li><p>需求："+data[item].title+"</p><p>品质："+data[item].message+"</p><p>价格："+data[item].price+"</p><p>收购人："+data[item].man+"</p><p>电话："+data[item].tel+"</p></li>";
              $('.buy-inf ul').get(0).innerHTML+=con;
            }
        }
    })

$("ul").on("click",".delete",function () {
    var mids=$(this).attr("name");
    $(this).parent().remove();
    $.ajax({
        type:"post",
        url:"../php/delete.php",
        data:{mid:mids},
        success:function (response) {
            alert(response);
        }
    })
})