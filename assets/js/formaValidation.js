// Sign Up
signupForm=document.getElementById('signUp');
loginForm=document.getElementById('Login');
username=document.getElementById('userName');
email=document.getElementById('email');
password=document.getElementById('password');
passwordCheck=document.getElementById('passwordCheck');


if(signupForm){
    signupForm.addEventListener('submit',e=>{
        e.preventDefault();
        signupValide();
    });
}
else{
    loginForm.addEventListener('submit',f=>{
        f.preventDefault();
        validateLogin();
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

const signupValide = () => {
    // var NameFormat = /^[a-zA-Z0-9]*$/;
    // if (NameSinup.value.match(NameFormat)) {
    const usernameValue = username.value.trim();//remove white spaces
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const passwordcheckValue = passwordCheck.value.trim();

    if(usernameValue === '') {
        setError(username, 'Username is required');
    } else if(!isValidName(usernameValue)){  
        setError(username, 'Provide a valid username');
    }
    else {
        setSuccess(username);
    }
    if (emailValue===''){
        setError(email, 'Email is required');
    }else if(!isValidEmail(emailValue)){
        setError(email, 'Provide a valid email address');
    }else {
        setSuccess(email);
    }
    if(passwordValue==''){
        setError(password, 'Password is required');
    }else if(passwordValue.length<8){
        setError(password, 'Password must be at least 8 character.');

    }else{
        setSuccess(password); 
    }
    if(passwordcheckValue === '') {
        setError(passwordCheck, 'Please confirm your password');
    } else if (passwordcheckValue !== passwordValue) {
        setError(passwordCheck, "Passwords doesn't match");
    } else {
        setSuccess(passwordCheck);
    }

    
}
//login

emailLogin=document.getElementById('emailLogin');
passwordLogin=document.getElementById('passwordLogin');


function validateLogin(){

    
    emailloginValue = emailLogin.value.trim();
    passwordloginValue = passwordLogin.value.trim();

    if (emailloginValue===''){
        setError(emailLogin, 'Email is required');
        
    }else if(!isValidEmail(mailloginValue)){
        setError(emailLogin, 'Provide a valid email address');
    }else {
        setSuccess(emailLogin);
    }    

    if(passwordloginValue==''){
        setError(passwordLogin, 'Password is required');
    }else if(passwordloginValue.length<8){
        setError(passwordLogin, 'Password must be at least 8 character.');

    }else{
        setSuccess(passwordLogin); 
    }
}
// eventlistener INPUT


