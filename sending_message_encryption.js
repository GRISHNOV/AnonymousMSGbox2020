function encrypting_message(){
    let open_RSA_key = document.getElementById("receiver_open_RSA_key").textContent;
    let user_msg_content = document.getElementById("user_msg_content").value;
    let encrypted_user_msg = cryptico.encrypt(user_msg_content, open_RSA_key);
    document.getElementById('user_msg_content').value = encrypted_user_msg.cipher;
    return true;
}