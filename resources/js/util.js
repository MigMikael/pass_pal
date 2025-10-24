import Webpass from "@laragear/webpass"

export function generatePassword(len, upper, nums, special) {
    var length = (len) ? (len) : (10);
    var string = "abcdefghijklmnopqrstuvwxyz"; //to upper 
    var numeric = '0123456789';
    var punctuation = '!@#$%^&*()_+~`|}{[]\:;?><,./-=';
    var password = "";
    var character = "";
    var crunch = true;

    if (!upper && !nums && !special) {
        return ""
    }

    while (password.length < length) {
        const entity1 = Math.ceil(string.length * Math.random() * Math.random());
        const entity2 = Math.ceil(numeric.length * Math.random() * Math.random());
        const entity3 = Math.ceil(punctuation.length * Math.random() * Math.random());
        let hold = string.charAt(entity1);
        hold = (password.length % 2 == 0) ? (hold.toUpperCase()) : (hold);

        if (upper) {
            character += hold;
        }
        if (nums) {
            character += numeric.charAt(entity2);
        }
        if (special) {
            character += punctuation.charAt(entity3);
        }
        password = character;
    }
    password = password.split('').sort(function () { return 0.5 - Math.random() }).join('');
    return password.substring(0, len);
    // alert(password.substring(0, len));
    // console.log(password.substring(0, len));
}

export async function registerPasskey() {
    if (Webpass.isUnsupported()) {
        alert("Your browser doesn't support WebAuthn.")
    }
    const {
        success, error
    } = await Webpass.attest("/webauthn/register/options", "/webauthn/register")

    console.log("is success", success)

    if (success) {
        window.location.replace("/pwitems")
        alert("Register passkey success!.")
    } else {
        console.log('error', error)
        alert("Register passkey fail!.")
    }
}

export async function loginPasskey() {
    if (Webpass.isUnsupported()) {
        alert("Your browser doesn't support WebAuthn.")
    }

    const { success, error } = await Webpass.assert(
        "/webauthn/login/options",
        "/webauthn/login",
    )

    if (success) {
        window.location.replace("/pwitems")
    }
    else {
        console.log('error', error)
    }
}