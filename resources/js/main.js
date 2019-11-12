window.onload = function(){
    refrashMEssage(); //Обновление списка сообщение после загрузки сраницы
}


function refrashMEssage()
{ //Обновление списка сообщений
    let info = {
        method:'get_base',
    };
    let json = JSON.stringify(info);

    fetch('/Api/getMessages', {
       method: 'GET',
    }).then(response => response.json())
        .then(function(result){
            let jo = result;
            document.getElementById('msgs').innerHTML = '';
            for (i in jo) {
                // let date = new Date(( Number(jo[i].data) + 10800) * 1000).toISOString().split('T')[0];
                console.log(jo);
                document.getElementById('msgs').innerHTML +='<div class="message_one"><div class="message_top"><span class="message_fio">'+jo[i].fio+'</span> <span class="message_phone">'+jo[i].email+'</span></div><div class="message_text">'+jo[i].message+'<div><div class="message_data" style="text-align:right;">'+jo[i].datetime+'</div></div>';
                console.log(jo);
            }
        });
}

async function sendMessage()
{ //Отправка сообщений
    let info = {
        method:'add_base',
        fio: document.getElementById('fio').value,
        email: document.getElementById('email').value,
        message: document.getElementById('message').value
    };

    let json = JSON.stringify(info);
    let resp = await fetch('/Api/AddMessage/api.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json;charset=utf-8'},
        body: json
    }).then(response => response.json())
        .then(function(result){
            let jo = result;
            if(jo['status'] != 'ok'){
                alert(jo['e_m']);
            }
            if(jo['status'] == 'ok'){
                document.getElementById('fio').value = '';
                document.getElementById('email').value = '';
                document.getElementById('message').value = '';
            }
        });
    refrashMEssage();
}
