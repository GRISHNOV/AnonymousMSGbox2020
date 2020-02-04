function preprocessing_auth_form(){
    valid = true;
    if (( document.auth_form.user_login.value == "" ) || ( document.auth_form.user_password.value == "" )) {
        alert ( "Заполните формы Login и Password для авторизации" );
        valid = false;
    }else{
        document.getElementById('login_input').style.display='none';
        document.getElementById('password_input').style.display='none';

        var x = document.getElementById("processing_input").value;
        document.getElementById("processing_indicator").innerHTML = x;

        document.auth_form.user_login.value = SHA512(SHA512(document.auth_form.user_login.value));
        document.auth_form.user_password.value = SHA512(SHA512(document.auth_form.user_password.value));
    }
    return valid;
}