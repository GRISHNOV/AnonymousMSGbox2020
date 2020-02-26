function check_id_existence(id) {
    return (document.getElementById(id) != null);
}
function decrypting_messages() {
    let pass = "qwerty123";
    let key_bits = 2048;
    let clientRSAkey = cryptico.generateRSAKey(pass, key_bits);
    let msg_counter = 0;
    while (true){
        if (check_id_existence("encrypted_msg_" + msg_counter)){
            let decryption_result = cryptico.decrypt(document.getElementById("encrypted_msg_" + msg_counter).textContent, clientRSAkey);
            console.log(decryption_result.plaintext);
        }else{
            break;
        }
        msg_counter++;
    }
}