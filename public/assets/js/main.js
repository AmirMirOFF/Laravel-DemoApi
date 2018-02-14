
$(function() {
    /**
     *  код выполнен с  пометкой  быстрая реаализация .
     */

    var session = false;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function setNews(articles){
        $('#login').addClass('dis_none');
        $('#news').removeClass('dis_none');
        let html ='';
        for(let one in articles){
            console.log(articles[one]);
            html+='<div class="col-xs-12 panel-body article_block">'+articles[one].text;
            html+= '<div class="col-xs-2 title_news">'+articles[one].name+' ( '+articles[one].created_at.slice(10)+' )</div>'+'</div>';
        }
        $('#news_list').append(html);
    }


    $('form').submit(function() {
        let data;
        data = JSON.stringify({"email": $('#email').val(), "password":$('#password').val()});
        goSend("/api/login",data,function( response ) {
                response = JSON.parse(response);
                if(response.status == 1){
                    //document.cookie('status');
                    setNews(response.news);
                }else{
                    alert('Не верный пароль или логин');
                }
            }
        );
        return false;
    });


    function goSend(url,data,callback){
        $.ajax({
            data:data,
            method: "POST",
            url: url,
        }).done(callback);
    }

});