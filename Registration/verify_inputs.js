// check all the inputs are not empty
//check the validity of the email address
//the password must contain at least one number, min character + maj character + length at least 8
//check password==confirm_password

/* ay input fih ghalta yaffichilek tahtou l erreur bel ahmar w yoncadri l input bel ahmar
w ken shih ma yaffichi chay */

const name_element=document.getElementById('name');
const email_element=document.getElementById('email');
const pw_element=document.getElementById('password');
const confirm_element=document.getElementById('confirm');

const registration=document.getElementById('register');
registration.addEventListener('click', e => {
    if(validateInputs()==false){
        e.preventDefault(); //prevents the form from being submitted
    }
});

//display an error message if there is an error in the input
const setErrorMessage = (element,message)=>{
    const parent_div = element.parentElement;
    const error_div = parent_div.querySelector('.error');

    error_div.innerText =message;
    parent_div.classList.add('error');     //useful for the css
    parent_div.classList.remove('success');
};

const unsetErrorMessage = (element)=>{
    const parent_div = element.parentElement;
    const error_div = parent_div.querySelector('.error');

    error_div.innerText =" ";
    parent_div.classList.add('success');
    parent_div.classList.remove('error');
};


const isValidEmail=(email)=>{
    const regular_email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regular_email.test(String(email).toLowerCase());
};

// Ensures that the password contains at least one number, one lowercase character, one uppercase character, and length is at least 8 characters
const isValidPassword = password => {
    // The regular expression pattern
    const regular_expression = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    // Test if the password matches the pattern
    return regular_expression.test(password);
};


function validateInputs(){

    //delete white spaces in the beginning and  the end of the input
    const user_name=name_element.value.trim();
    const email=email_element.value.trim();
    const pw=pw_element.value.trim();
    const confirm=confirm_element.value.trim();
    

    //check all the inputs

    if(user_name === ''){
        setErrorMessage(name_element,"please enter a user name");
        return false;
    }
    else{
        unsetErrorMessage(name_element);
    }


    if(email === ''){
        setErrorMessage(email_element,"Please enter an email");
        return false;
    }
    else if(!isValidEmail(email)){
        setErrorMessage(email_element,"Provide a valid email");
        return false;}
    else{
        unsetErrorMessage(email_element);
    }



    if(pw === ''){
        setErrorMessage(pw_element,"please enter a password");
        return false;
    }
    else if(!isValidPassword(pw)){
        setErrorMessage(pw_element,"Provide a valid password");
        return false;
    }
    else{
        unsetErrorMessage(pw_element);
    }

    if(confirm === ''){
        setErrorMessage(confirm_element,"please confirm your password");
        return false;
    }
    else if(pw!== confirm){
        setErrorMessage(confirm_element,"Passwords do not match");
        return false;
    }
    else{
        unsetErrorMessage(confirm_element);
    }

    return true;

};
