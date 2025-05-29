export function idnumPattern(input) {
    const pattern = /^(\d{4}-\d{4}|\d{6}-\d{6})$/;
    return pattern.test(input);
}



export const checkNum = (value) => {
    if (!isNaN(value)) {
        return true;
    } else {
        return false;
    }
}

export function isString(input) {
    const regex = /^[a-zA-Z\s]{2,50}$/;
    return regex.test(input);
}

export function isValidMiddleName(input) {
    const regex = /^[a-zA-Z\s]{0,50}$/;
    return regex.test(input);
}

export function isValidAge(age) {
    const regex = /^[0-9]+$/;
    return regex.test(String(age)) && age >= 8 && age <= 120;
}

export function isValidPassword(password) {
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/;
    return regex.test(password);
}


export function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}


export function isStudentID(input) {
    const regex = /^\d{4}-\d{4}$/;
    return regex.test(input);
}

export function isFacEmID(input) {
    const regex = /^\d{6}-\d{6}$/;
    return regex.test(input);
}


export function showErrorMessage(errorElement, field, message) {
    errorElement.innerHTML = message;
    field.classList.add("is-invalid");
}

export function hideErrorMessage(errorElement, field) {
    errorElement.innerHTML = "";
    field.classList.remove("is-invalid");
}

export const generateCodeString = () => {
    const chars = '0123456789';
    let result = '';
    for (let i = 0; i < 6; i++) {
        const randomIndex = Math.floor(window.crypto.getRandomValues(new Uint32Array(1))[0] / (0xffffffff + 1) * chars.length);
        result += chars[randomIndex];
    }
    return result;

};

export function Resend(expired = 59) {
    let divParent = document.getElementById("rresend-timer");
    var timeInSecs = Date.now() / (1000 * 60);
    var untilTimeInSecs = timeInSecs + expired;
    if (divParent) {
        var divChild = divParent.querySelector("p");

        if (!divChild) {
            divChild = document.createElement("p");
            divParent.appendChild(divChild);
        }

        var button = document.createElement("button");
        button.innerHTML = "Resend";
        button.setAttribute("type", "button");
        button.setAttribute("id", "resend-button");
        button.classList.add('resend-btn');
        button.addEventListener("click", rresendProc);

        var countDownInterval = setInterval(function () {
            var timeLeft = untilTimeInSecs - timeInSecs;
            divChild.innerHTML = `Didn't get the OTP? &nbsp;Resend in ${timeLeft}s`;

            createCookie('resetcountdown', timeLeft, 1);
            untilTimeInSecs--;

            if (timeLeft < 0) {
                divChild.innerHTML = `Didn't get the OTP? `;
                divChild.appendChild(button);
                clearInterval(countDownInterval);
            }

        }, 1000);
    }

}

export const rresendProc = async () => {
    let email = getCookie('email');
    let resendbutton = document.getElementById('resend-button');
    if (email != '') {
        resendbutton.disabled = true;
        resendbutton.innerHTML = `Resend...`;
        let code = generateCodeString();
        createCookie("code", code, 15);

        const path = "./ajax/user.php";
        await fetch(path, {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `resend=item&email=${email}&code=${code}`,
        })
            .then((response) => {
                return response.text();
            })
            .then((data) => {
                console.log(data)
                if (data === "send") {
                    alert("Email resend successfully");
                    Resend(59);
                    createCookie("resetcountdown", 59, 1);

                } else {
                    resendbutton.disabled = false;
                }
            })
            .catch(console.error);
    }
}

export const Penalty = (expired = 30) => {
    var timeInSecs = Date.now() / (1000 * 60);
    var untilTimeInSecs = timeInSecs + expired;
    let error = document.getElementById("error_status");
    var countDownInterval = setInterval(function () {
        var timeLeft = untilTimeInSecs - timeInSecs;
        let login_btn = document.getElementById("btn_login");

        if (login_btn) {
            login_btn.disabled = true;
            login_btn.classList.add('disabled-btn');
        }

        if (error) {
            error.innerHTML = `There have been too many login failures from your network in a short time period. Please wait and try again later. ${timeLeft}s`;
            error.classList.add('error');
        }

        createCookie('penalty', timeLeft, 1);

        untilTimeInSecs--;
        if (timeLeft <= 0) {
            clearInterval(countDownInterval);
            if (error) {
                error.classList.remove('error');
            }
            let err = document.getElementById("error_status")
            if (err) {
                err.innerHTML = '';
            }
            //  document.getElementById("counter").innerText = 0;
            if (login_btn) {
                login_btn.classList.remove('disabled-btn');
                login_btn.disabled = false;
            }

        }
    }, 1000);
}

export const createCookie = (name, value, minutes) => {
    if (minutes) {
        var date = new Date();
        date.setTime(date.getTime() + (minutes * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else {
        var expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

export const getCookie = (name) => {
    let value = `; ${document.cookie}`;
    let parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

export const eraseCookie = (name) => {
    document.cookie = name + '=; Max-Age=-99999999;';
}

export function alert(icon, position, title) {
    const Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: icon,
        title: title
    })
}