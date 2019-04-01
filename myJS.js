//маска ввода
jQuery(function($){
   $("#phone").mask("+375(99) 999-99-99");
   });

 //проверяет и вставляет имя и телефон
if((localStorage.getItem('newName'))||(localStorage.getItem('newPhone'))) {
        $('#name').val(localStorage.getItem('newName'));
        $('#phone').val(localStorage.getItem('newPhone'));
    };

//записывает имя и телефон по клику,отправляет сообщение, показывает сообщение и удаляет текст сообщения
$('#send_message').click(function(e){
    $name = $('#name').val();
    $phone =  $('#phone').val();
    
    if($phone==""){
        $('#phone').css({'border':'1px solid red'});
        return;
    }else{
        $.post( "telegram.php", { name:  $name, phone:  $phone, text:  $('#text').val()}); //отправил данные в телеграмм  
        $('.masck_message').removeClass("display_none");
        $('#text').val('');
    }
    
    if($name!==""){
         var newName;
        $local = localStorage.setItem('newName', $name); //записал имя
    }
    var newPhone;
    $local = localStorage.setItem('newPhone', $phone);// записал телефон
});

$('.close_message').click(function(){
     $('.masck_message').addClass("display_none");                  
});