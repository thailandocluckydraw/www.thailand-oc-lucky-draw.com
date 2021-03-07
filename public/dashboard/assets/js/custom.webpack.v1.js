$("#registrationFormV2").parsley();
const registrationFormV2 = document.getElementById("registrationFormV2");
const btnSubmitCheckout = document.getElementById("btnSubmitCheckout");

checkServerValidation = async (form) => {
    try {
        const options = {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            body: form,
        };

        const response = await fetch("/validate-form", options);
        const result = await response.json();

        if (result.status === "success") {
            $("#confirmRegModal").modal({
                backdrop: "static",
                datakeyboard: false,
                show: true,
            });
        } else {
            showAlertMsg(result);
        }
    } catch (error) {
        // console.log(error);
        alert("505 | Validation error, Please contact admin...!");
    }
};

createOrder = async (form_1) => {    
    try {
        const options = {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            body: form_1,
        };

        const response = await fetch("/createOrder", options);
        const result = await response.json();

        if (result.status === "success") {
            openCheckout(result.order); //razorpay payment page
        } else {
            $("#confirmRegModal").modal("hide");
            $("#btnSubmitCheckout").prop("disabled", false);
            showAlertMsg(result);        
        }
    } catch (error) {
        $("#confirmRegModal").modal("hide");
        $("#btnSubmitCheckout").prop("disabled", false);
        alert("505 | Not able to place order, Please contact admin...!");
    } 
}

showAlertMsg = (result) => {
    const errMessage = document.getElementById("alert-message");
    const errMsgAry = Object.values(result.message);
    errMessage.innerHTML = "";
    let errorHtml = "";

    errorHtml = `<div class="alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> `;
    errMsgAry.forEach((element) => {
        errorHtml += `<p class="m-0"><strong>Oh snap!</strong> ${element[0]}</p>`;
    });
    errorHtml += `</div>`;
    errMessage.innerHTML = errorHtml;

    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    return;
};

openCheckout = (order) => {
    try {
        const base_url = window.location.origin;
        const logo_path = base_url + "/website/images/header-logo-2.png";

        const options = {
            key: order.key,
            amount: order.amount,
            currency: order.currency,
            order_id: order.order_id,
            name: "Binomo Traders",
            description: "New Registration",
            image: logo_path,
            handler: async (response) => {
                $("#confirmRegModalBody").html("");
                const checkoutDiv = `<h3 class="text-dark">Please wait...!</h3>
                    <p class="pt-2 pb-3">Registration on progress, Don't close the window until it completes.</p>`;
                $("#confirmRegModalBody").html(checkoutDiv);

                // update payment status, send sms & email and add uer to binary tree
                updatePayment(response);
            },
            prefill: {
                name: order.name,
                email: order.email,
                contact: order.contact,
            },
            // readonly: { name: true, email: true, contact: true },
            notes: {
                address: "Binomo Traders Corporate Office",
            },
            theme: {
                color: "#08C8F6",
            },
            method: {
                upi: true,
                card: true,
                wallet: true,
                netbanking: true,
            },
        };

        const rzp1 = new Razorpay(options);
        rzp1.open();

        
        $("#confirmRegModalBody").html("");
        const checkoutDiv = `<h3 class="text-dark">Please wait...!</h3>
                    <p class="pt-2 pb-3">Don't close the payment page</p>
                    <p class="pt-2 pb-3">If you forcefully closed the payment page then <a href="/register" class="text-info"><u>refresh</u></a> and try again!</p>`;
        $("#confirmRegModalBody").html(checkoutDiv);
    } catch (error) {
        // console.log(error);
        alert("505 | Checkout page error, Please contact admin...!");
    }
};

const updatePayment = (paymentData) => {
    $.ajax({
        url: "/update/payment/status",
        type: "POST",
        data: JSON.stringify(paymentData),
        contentType: "application/json",
        success: function (data) {
            if (data.status === "success") {
                $("#confirmRegModalBody").html("");
                const successDiv = `<h4 class="text-dark">Registration Successful!</h4>
                <p class="pt-2 pb-3">If you dint get an SMS or email, contact admin using the Payment Receipt ID.</p>
                <p class="pt-2 pb-3">Payment Receipt: ${data.paymentReceipt}</p>
                <a href="/login" class="btn btn-success waves-effect waves-light">Home</a>`;
                $("#confirmRegModalBody").html(successDiv);
            } else {
                $("#confirmRegModalBody").html("");
                const failureDiv = `<h4 class="text-dark">Registration Failed!</h4>
                <p class="pt-2 pb-3">Take a copy of the Payment Receipt in case if your amount is deducted.</p>
                <p class="pt-2 pb-3">Payment Receipt: ${data.paymentReceipt}</p>`;
                $("#confirmRegModalBody").html(failureDiv);
            }
        },
    });
    return;
};

regSubmitForm = async (event) => {
    event.preventDefault();
    const form = new FormData(registrationFormV2);

    try {
        const ifscCode = document.getElementById('ifscCode').value;
        const response = await fetch(`https://ifsc.razorpay.com/${ifscCode}`);
        if (response.status === 200) {
            checkServerValidation(form);
        } else {
            invalidIFSC();
        }
    } catch (error) {
        invalidIFSC();
    }
}

invalidIFSC = () => {
    const errorHtml = `<div class="alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p class="m-0"><strong>Oh snap!</strong> Invalid IFSC Code</p>
            </div>`;
    document.getElementById("alert-message").innerHTML = errorHtml;

    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    return;
}



registrationFormV2.addEventListener("submit", regSubmitForm);

btnSubmitCheckout.addEventListener("click", (event) => {
    event.preventDefault();
    const form_1 = new FormData(registrationFormV2);

    $("#btnSubmitCheckout").prop("disabled", true);

    createOrder(form_1);
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});