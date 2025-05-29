
const createCookie = (name, value, minutes) => {
    if (minutes) {
        var date = new Date();
        date.setTime(date.getTime() + (minutes * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else {
        var expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}



function alert(icon, position, title) {
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

function showErrorMessage(errorElement, field, message) {
    errorElement.innerHTML = message;
    field.classList.add("is-invalid");
}

function hideErrorMessage(errorElement, field) {
    errorElement.innerHTML = "";
    field.classList.remove("is-invalid");
}

function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

const generateCodeString = () => {
    const chars = '0123456789';
    let result = '';
    for (let i = 0; i < 6; i++) {
        const randomIndex = Math.floor(window.crypto.getRandomValues(new Uint32Array(1))[0] / (0xffffffff + 1) * chars.length);
        result += chars[randomIndex];
    }
    return result;

};

const getCookie = (name) => {
    let value = `; ${document.cookie}`;
    let parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}


function Resend(el, expired = 59) {
    el.disabled = true;

    var timeInSecs = Date.now() / (1000 * 60);
    var untilTimeInSecs = timeInSecs + expired;

    if (el) {
        var countDownInterval = setInterval(function () {
            var timeLeft = untilTimeInSecs - timeInSecs;
            el.innerHTML = `${timeLeft}`;

            createCookie('resetcountdown', timeLeft, 1);
            untilTimeInSecs--;

            if (timeLeft < 0) {
                el.disabled = false;
                el.innerHTML = `RESEND OTP`;
                clearInterval(countDownInterval);
            }

        }, 1000);
    }
}

// student
const verifySOTP = (el) => {
    const enteredOTP = el.value;
    const expectedOTP = getCookie('sOTP');;

    let semail = document.getElementById('emailSContainer');
    let sBtnOTP = document.getElementById('sbtnContainer');
    let otpSContainer = document.getElementById('otpSContainer');
    let stud_btn = document.getElementById('stud_btn');
    let sok = document.getElementById('sok');
    let status = document.getElementById('stud_status');

    let email = document.getElementById('semail');
    let emailError = document.getElementById('semailError');
    if (enteredOTP !== '') {
        if (/^\d{6}$/.test(enteredOTP) && enteredOTP === expectedOTP) {
            el.classList.remove("error");
            document.getElementById("sotpError").textContent = "";
            otpSContainer.classList.add('d-none');
            status.value = 'verified';
            stud_btn.remove();
            email.classList.remove('is-invalid');
            emailError.innerHTML = '';
            sok.classList.remove('d-none');
            semail.classList.remove('mb-3');
            sBtnOTP.classList.remove('mb-3');
        } else {
            el.classList.add("error");
            semail.classList.add('mb-3');
            otpSContainer.classList.remove('mb-3');
            sBtnOTP.classList.add('mb-3');
            emailError.innerHTML = '';
            document.getElementById("sotpError").textContent = "Invalid OTP";
        }
    } else {
        el.classList.remove("error");
        semail.classList.add('mb-3');
        sBtnOTP.classList.add('mb-3');
        otpSContainer.classList.add('mb-3');
        emailError.innerHTML = '';
        document.getElementById("sotpError").textContent = "";
    }
};

const sendSOTP = (el) => {
    let semail = document.getElementById('semail');
    let semailError = document.getElementById('semailError');
    let otpSContainer = document.getElementById('otpSContainer');
    let sbtnContainer = document.getElementById('sbtnContainer');
    sbtnContainer.classList.remove('mb-3');
    if (semail.value === '') {
        showErrorMessage(semailError, semail, "Input is required.");
        el.classList.add('mb-lg-3');
        return false;
    } else if (!isValidEmail(semail.value)) {
        showErrorMessage(semailError, semail, "Invalid email address.");
        el.classList.add('mb-lg-3');
        return false;
    } {
        hideErrorMessage(semailError, semail);
    }

    semail.disabled = true;
    el.disabled = true;
    el.innerHTML = 'SENDING OTP..';

    let code = generateCodeString();
    const path = "./ajax/user/post.php";
    fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `send_sotp=item&email=${semail.value}&code=${code}`,
    }).then((response) => {
        return response.text();
    }).then((data) => {
        data = data.trim();
        // console.log(data)
        if (data == 'send') {
            createCookie('sOTP', code, 2);
            otpSContainer.classList.remove('d-none');
            otpSContainer.classList.remove('mb-3');
            el.classList.remove('mb-lg-3');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
            el.setAttribute('onclick', 'resendSOTP(this)');
            Resend(el, 59);
        } else {
            alert('error', 'top', 'Unable to send an OTP. Please try again.');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
        }
    }).catch(console.error);
}

const resendSOTP = (el) => {
    let semail = document.getElementById('semail');
    el.disabled = true;
    el.innerHTML = 'SENDING OTP..';
    let otpSContainer = document.getElementById('otpSContainer');
    let code = generateCodeString();
    const path = "./ajax/user/post.php";
    fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `send_sotp=item&email=${semail.value}&code=${code}`,
    }).then((response) => {
        return response.text();
    }).then((data) => {
        data = data.trim();
        // console.log(data)
        if (data == 'send') {
            createCookie('sOTP', code, 2);
            otpSContainer.classList.remove('d-none');
            el.classList.remove('mb-lg-3');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
            el.setAttribute('onclick', 'resendSOTP(this)');
            Resend(el, 59);
        } else {
            alert('error', 'top', 'Unable to resend OTP. Please try again.');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
        }
    }).catch(console.error);
}

// faculty
const sendFOTP = (el) => {
    let email = document.getElementById('femail');
    let emailError = document.getElementById('femailError');
    let otpContainer = document.getElementById('otpFContainer');
    let btnContainer = document.getElementById('fbtnContainer');
    btnContainer.classList.remove('mb-3');
    otpContainer.classList.remove('mb-3');
    if (email.value === '') {
        showErrorMessage(emailError, email, "Input is required.");
        el.classList.add('mb-lg-3');
        return false;
    } else if (!isValidEmail(email.value)) {
        showErrorMessage(emailError, email, "Invalid email address.");
        el.classList.add('mb-lg-3');
        return false;
    } {
        hideErrorMessage(emailError, email);
    }

    email.disabled = true;
    el.disabled = true;
    el.innerHTML = 'SENDING OTP..';

    let code = generateCodeString();
    const path = "./ajax/user/post.php";
    fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `send_sotp=item&email=${email.value}&code=${code}`,
    }).then((response) => {
        return response.text();
    }).then((data) => {
        data = data.trim();
        // console.log(data)
        if (data == 'send') {
            createCookie('fOTP', code, 2);
            otpContainer.classList.remove('d-none');
            el.classList.remove('mb-lg-3');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
            el.setAttribute('onclick', 'resendFOTP(this)');
            Resend(el, 59);
        } else {
            alert('error', 'top', 'Unable to send an OTP. Please try again.');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
        }
    }).catch(console.error);
}

const verifyFOTP = (el) => {
    const enteredOTP = el.value;
    const expectedOTP = getCookie('fOTP');;

    let semail = document.getElementById('emailFContainer');
    let sBtnOTP = document.getElementById('fbtnContainer');
    let otpSContainer = document.getElementById('otpFContainer');
    let stud_btn = document.getElementById('fac_btn');
    let sok = document.getElementById('fok');
    let status = document.getElementById('fac_status');

    let email = document.getElementById('femail');
    let emailError = document.getElementById('femailError');
    if (enteredOTP !== '') {
        if (/^\d{6}$/.test(enteredOTP) && enteredOTP === expectedOTP) {
            el.classList.remove("error");
            document.getElementById("fotpError").textContent = "";
            otpSContainer.classList.add('d-none');
            status.value = 'verified';
            stud_btn.remove();
            email.classList.remove('is-invalid');
            emailError.innerHTML = '';
            sok.classList.remove('d-none');
            semail.classList.remove('mb-3');
            sBtnOTP.classList.remove('mb-3');
        } else {
            el.classList.add("error");
            semail.classList.add('mb-3');
            otpSContainer.classList.remove('mb-3');
            sBtnOTP.classList.add('mb-3');
            emailError.innerHTML = '';
            document.getElementById("fotpError").textContent = "Invalid OTP";
        }
    } else {
        el.classList.remove("error");
        semail.classList.add('mb-3');
        sBtnOTP.classList.add('mb-3');
        otpSContainer.classList.add('mb-3');
        emailError.innerHTML = '';
        document.getElementById("fotpError").textContent = "";
    }
};

const resendFOTP = (el) => {
    let semail = document.getElementById('femail');
    el.disabled = true;
    el.innerHTML = 'SENDING OTP..';
    let otpContainer = document.getElementById('otpFContainer');

    let code = generateCodeString();
    const path = "./ajax/user/post.php";
    fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `send_sotp=item&email=${semail.value}&code=${code}`,
    }).then((response) => {
        return response.text();
    }).then((data) => {
        data = data.trim();
        // console.log(data)
        if (data == 'send') {
            createCookie('fOTP', code, 2);
            otpContainer.classList.remove('d-none');
            el.classList.remove('mb-lg-3');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
            el.setAttribute('onclick', 'resendFOTP(this)');
            Resend(el, 59);
        } else {
            alert('error', 'top', 'Unable to resend OTP. Please try again.');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
        }
    }).catch(console.error);
}


// employee
const sendEOTP = (el) => {
    let email = document.getElementById('eemail');
    let emailError = document.getElementById('eemailError');
    let otpContainer = document.getElementById('otpEContainer');
    let btnContainer = document.getElementById('ebtnContainer');
    btnContainer.classList.remove('mb-3');
    otpContainer.classList.remove('mb-3');
    if (email.value === '') {
        showErrorMessage(emailError, email, "Input is required.");
        el.classList.add('mb-lg-3');
        return false;
    } else if (!isValidEmail(email.value)) {
        showErrorMessage(emailError, email, "Invalid email address.");
        el.classList.add('mb-lg-3');
        return false;
    } {
        hideErrorMessage(emailError, email);
    }

    email.disabled = true;
    el.disabled = true;
    el.innerHTML = 'SENDING OTP..';

    let code = generateCodeString();
    const path = "./ajax/user/post.php";
    fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `send_sotp=item&email=${email.value}&code=${code}`,
    }).then((response) => {
        return response.text();
    }).then((data) => {
        data = data.trim();
        if (data == 'send') {
            createCookie('eOTP', code, 2);
            otpContainer.classList.remove('d-none');
            el.classList.remove('mb-lg-3');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
            el.setAttribute('onclick', 'resendEOTP(this)');
            Resend(el, 59);
        } else {
            alert('error', 'top', 'Unable to send an OTP. Please try again.');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
        }
    }).catch(console.error);
}


const verifyEOTP = (el) => {
    const enteredOTP = el.value;
    const expectedOTP = getCookie('eOTP');;

    let semail = document.getElementById('emailEContainer');
    let sBtnOTP = document.getElementById('ebtnContainer');
    let otpSContainer = document.getElementById('otpEContainer');
    let stud_btn = document.getElementById('em_btn');
    let sok = document.getElementById('eok');
    let status = document.getElementById('em_status');

    let email = document.getElementById('eemail');
    let emailError = document.getElementById('eemailError');
    if (enteredOTP !== '') {
        if (/^\d{6}$/.test(enteredOTP) && enteredOTP === expectedOTP) {
            el.classList.remove("error");
            document.getElementById("eotpError").textContent = "";
            otpSContainer.classList.add('d-none');
            status.value = 'verified';
            stud_btn.remove();
            email.classList.remove('is-invalid');
            emailError.innerHTML = '';
            sok.classList.remove('d-none');
            semail.classList.remove('mb-3');
            sBtnOTP.classList.remove('mb-3');
        } else {
            el.classList.add("error");
            semail.classList.add('mb-3');
            otpSContainer.classList.remove('mb-3');
            sBtnOTP.classList.add('mb-3');
            emailError.innerHTML = '';
            document.getElementById("eotpError").textContent = "Invalid OTP";
        }
    } else {
        el.classList.remove("error");
        semail.classList.add('mb-3');
        sBtnOTP.classList.add('mb-3');
        otpSContainer.classList.add('mb-3');
        emailError.innerHTML = '';
        document.getElementById("eotpError").textContent = "";
    }
};

const resendEOTP = (el) => {
    let semail = document.getElementById('eemail');
    el.disabled = true;
    el.innerHTML = 'SENDING OTP..';
    let otpContainer = document.getElementById('otpEContainer');

    let code = generateCodeString();
    const path = "./ajax/user/post.php";
    fetch(path, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `send_sotp=item&email=${semail.value}&code=${code}`,
    }).then((response) => {
        return response.text();
    }).then((data) => {
        data = data.trim();
        // console.log(data)
        if (data == 'send') {
            createCookie('eOTP', code, 2);
            otpContainer.classList.remove('d-none');
            el.classList.remove('mb-lg-3');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
            el.setAttribute('onclick', 'resendFOTP(this)');
            Resend(el, 59);
        } else {
            alert('error', 'top', 'Unable to resend OTP. Please try again.');
            el.disabled = false;
            el.innerHTML = 'RESEND OTP';
        }
    }).catch(console.error);
}
const studentCookie = () => {
    createCookie('regPosition', 'student', 60);
}

const facultyCookie = () => {
    createCookie('regPosition', 'faculty', 60);
}

const employeeCookie = () => {
    createCookie('regPosition', 'employee', 60);
}