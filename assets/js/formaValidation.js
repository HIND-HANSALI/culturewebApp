// Sign Up
let signupForm = document.getElementById("signUp");
let loginForm = document.getElementById("Login");
let username=document.getElementById('userName');
let email=document.getElementById('email');
let password=document.getElementById('password');
let passwordCheck=document.getElementById('passwordCheck');

emailLogin = document.getElementById("emailLogin");
passwordLogin = document.getElementById("passwordLogin");

if(signupForm){
    signupForm.addEventListener('submit',e=>{
        e.preventDefault();
        const usernameValue = username.value.trim();
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
        const passwordcheckValue = passwordCheck.value.trim();
        let isValid = true;
       

        if (usernameValue === "") {
        setError(username, "Username is required");
        isValid = false;
        } else if (!isValidName(usernameValue)) {
        setError(username, "Provide a valid username");
        } else {
        setSuccess(username);
        }

        if (emailValue === "") {
        setError(email, "Email is required");
        isValid = false;
        } else if (!isValidEmail(emailValue)) {
        setError(email, "Provide a valid email address");
        } else {
        setSuccess(email);
        }

        if (passwordValue == "") {
        setError(password, "Password is required");
        isValid = false;
        } else if (passwordValue.length < 8) {
        setError(password, "Password must be at least 8 character.");
        } else {
        setSuccess(password);
        }

        if (passwordcheckValue === "") {
        setError(passwordCheck, "Please confirm your password");
        isValid = false;
        } else if (passwordcheckValue !== passwordValue) {
        setError(passwordCheck, "Passwords doesn't match");
        } else {
        setSuccess(passwordCheck);
        }

        if (isValid) {
            e.target.submit();
        }

    });
}

console.log("loginForm:");
if (loginForm) {
    loginForm.addEventListener("submit", e => {
        console.log("fjfjfg");
        e.preventDefault();
        emailloginValue = emailLogin.value.trim();
        passwordloginValue = passwordLogin.value.trim();
        let isValid = true;
        if (emailloginValue === "") {
            setError(emailLogin, "Email is required");
            isValid = false;
        } else if (!isValidEmail(emailloginValue)) {
            setError(emailLogin, "Provide a valid email address");
            isValid = false;
        } else {
         setSuccess(emailLogin);
        }

        if (passwordloginValue == "") {
            setError(passwordLogin, "Password is required");
            isValid = false;
        } else if (passwordloginValue.length < 8) {
            setError(passwordLogin, "Password must be at least 8 character.");
            isValid = false;
        } else {
            setSuccess(passwordLogin);
        }
        if (isValid) {
         e.target.submit();
        }
    });
}



const setError = (element, message) => { //receive html element and error msg
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.errormsg');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.errormsg');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};
const isValidEmail = email => { //using regular expression 
    const re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(String(email).toLowerCase()); //return true or false
}
const isValidName = username => {
    const re=/^[a-zA-Z0-9]*$/;
    return re.test(username);
}


// // Sign Up
// signupForm=document.getElementById('signUp');
// loginForm=document.getElementById('Login');
// username=document.getElementById('userName');
// email=document.getElementById('email');
// password=document.getElementById('password');
// passwordCheck=document.getElementById('passwordCheck');

// // const listener = function (e) {
// //     e.preventDefault();
// // }
// // form.removeEventListener("submit", listener);

// if(signupForm){
//     signupForm.addEventListener('submit',e=>{
//         e.preventDefault();
//         signupValide();
//     });
// }
// else{
//     loginForm.addEventListener('submit',f=>{
//         f.preventDefault();
//         validateLogin();
// });
// }


// const setError = (element, message) => { //receive html element and error msg
//     const inputControl = element.parentElement;
//     const errorDisplay = inputControl.querySelector('.errormsg');

//     errorDisplay.innerText = message;
//     inputControl.classList.add('error');
//     inputControl.classList.remove('success')
// }

// const setSuccess = element => {
//     const inputControl = element.parentElement;
//     const errorDisplay = inputControl.querySelector('.errormsg');

//     errorDisplay.innerText = '';
//     inputControl.classList.add('success');
//     inputControl.classList.remove('error');
// };
// const isValidEmail = email => { //using regular expression 
//     const re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//     return re.test(String(email).toLowerCase()); //return true or false
// }
// const isValidName = username => {
//     const re=/^[a-zA-Z0-9]*$/;
//     return re.test(username);
// }

// const signupValide = () => {
//     // var NameFormat = /^[a-zA-Z0-9]*$/;
//     // if (NameSinup.value.match(NameFormat)) {
//     const usernameValue = username.value.trim();//remove white spaces
//     const emailValue = email.value.trim();
//     const passwordValue = password.value.trim();
//     const passwordcheckValue = passwordCheck.value.trim();

//     if(usernameValue === '') {
//         setError(username, 'Username is required');
//     } else if(!isValidName(usernameValue)){  
//         setError(username, 'Provide a valid username');
//     }
//     else {
//         setSuccess(username);
//     }
//     if (emailValue===''){
//         setError(email, 'Email is required');
//     }else if(!isValidEmail(emailValue)){
//         setError(email, 'Provide a valid email address');
//     }else {
//         setSuccess(email);
//     }
//     if(passwordValue==''){
//         setError(password, 'Password is required');
//     }else if(passwordValue.length<8){
//         setError(password, 'Password must be at least 8 character.');

//     }else{
//         setSuccess(password); 
//     }
//     if(passwordcheckValue === '') {
//         setError(passwordCheck, 'Please confirm your password');
//     } else if (passwordcheckValue !== passwordValue) {
//         setError(passwordCheck, "Passwords doesn't match");
//     } else {
//         setSuccess(passwordCheck);
//     }

    
// }
// //login

// emailLogin=document.getElementById('emailLogin');
// passwordLogin=document.getElementById('passwordLogin');


// function validateLogin(){

    
//     emailloginValue = emailLogin.value.trim();
//     passwordloginValue = passwordLogin.value.trim();

//     if (emailloginValue===''){
//         setError(emailLogin, 'Email is required');
        
//     }else if(!isValidEmail(mailloginValue)){
//         setError(emailLogin, 'Provide a valid email address');
//     }else {
//         setSuccess(emailLogin);
//     }    

//     if(passwordloginValue==''){
//         setError(passwordLogin, 'Password is required');
//     }else if(passwordloginValue.length<8){
//         setError(passwordLogin, 'Password must be at least 8 character.');

//     }else{
//         setSuccess(passwordLogin); 
//     }
// }

// // eventlistener INPUT




