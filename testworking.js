function Loginclose() {
    console.log("Вызов функции Loginclose()");
    var loginBlock = document.getElementById('login_block');
    if (loginBlock) {
        loginBlock.style.display = 'none';
        console.log("Элемент login_block скрыт");
    } else {
        console.error("Элемент login_block не найден");
    }
    
}

