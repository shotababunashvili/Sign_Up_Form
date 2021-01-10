$(document).ready(function () {
    console.log("ready!");


    function valid(input) {
        return typeof input !== "undefined" && input !== null && input.length !== 0;
    }

    function cstTrim(text) {
        return valid(text) ? text.trim() : null;
    }
/*
    const rowCountByEmail = function (Email) {

        console.log(`************** Email = ${Email}`);

 */
        /*
        let counter = await
            $.ajax({
                url: '../Controller/check_mail.php',
                method: 'GET',
                data: {Email: Email},
                success: function (response) {
                    console.log("inside rowCountByEmail res= %s", response);
                    //counter = response;
                    //resolve(response);
                    return response;
                }
            });

        //let counter = await getRC;

         */
        /*
        const getRC = new Promise((resolve, reject)=>{
            $.ajax({
                url: '../Controller/check_mail.php',
                method: 'GET',
                data: {Email: Email},
                success: function (response) {
                    console.log("inside rowCountByEmail res= %s", response);
                    //counter = response;
                    resolve(response);

                }
            });
        });
        let counter = await getRC;
        return counter;

         */
    /*
        return new Promise((resolve, reject)=>{
            $.ajax({
                url: '../Controller/check_mail.php',
                method: 'GET',
                data: {Email: Email},
                success: function (response) {
                    console.log("inside rowCountByEmail res= %s", response);
                    //counter = response;
                    resolve(response);

                }
            });
        });
    };


     */
    /*
    async function validateEmail(Email) {
        let res = await rowCountByEmail(Email);
        // console.log(`inside validateEmail res = ${res}`);
        return res == 0;
    }

     */


    function validateForm(F_Name, L_Name, Email) {

        if (!valid(F_Name))
            $('#fname_messages').html('<p class="text-danger">*Please Enter Your First Name</p>');
        if (!valid(L_Name))
            $('#lname_messages').html('<p class="text-danger">*Please Enter Your Last Name</p>');
        if (!valid(Email))
            $('#email_messages').html('<p class="text-danger">*Please Enter Your Email</p>');
        /*else if (!validateEmail(Email))
            $('#email_messages').html('<p class="text-danger">*This Email Is Already In Use</p>');

         */


        if (valid(F_Name))
            $('#fname_messages').html(``);
        if (valid(L_Name))
            $('#lname_messages').html(``);
        if (valid(Email) /*&& validateEmail(Email)*/)
            $('#email_messages').html(``);

        return valid(F_Name) && valid(L_Name) && valid(Email) /*&& validateEmail(Email)*/;


    }

    $('#user_form').submit(e => {
        e.preventDefault();
        const formData = {
            F_Name: cstTrim($('#fname_id').val()),
            L_Name: cstTrim($('#lname_id').val()),
            Email: cstTrim($('#email_id').val())
        };
        if (validateForm(formData.F_Name, formData.L_Name, formData.Email)) {
            $.post("../Controller/form_add.php", formData, (data) => {
                //console.log(response);
                let dataUtils = JSON.parse(data);
                console.log(`status= ${dataUtils.status}`);
                console.log(`response= ${dataUtils.response}`);
                console.log(data);

                if(dataUtils.status === 'error' ){
                    $('#email_messages').html('<p class="text-danger">*This Email Is Already In Use</p>');
                }
                else {
                    $('#user_form').trigger('reset');
                    //alert('successfully submitted');
                }



            });
        }
    });
});