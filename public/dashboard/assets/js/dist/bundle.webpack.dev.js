"use strict";

$('#registrationForm').parsley();

createOrder = function createOrder(form) {
  var options, response, result, errMessage, errMsgAry, errorHtml;
  return regeneratorRuntime.async(function createOrder$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          _context.prev = 0;
          options = {
            method: "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: form
          };
          _context.next = 4;
          return regeneratorRuntime.awrap(fetch("/createOrder", options));

        case 4:
          response = _context.sent;
          _context.next = 7;
          return regeneratorRuntime.awrap(response.json());

        case 7:
          result = _context.sent;

          if (result.status === "success") {
            // document.getElementById('orderidLabel').textContent = result.order.order_id;
            // document.getElementById('packageLabel').textContent = result.order.amount / 100;
            document.getElementById("hdfc_currency").value = result.order.currency;
            document.getElementById("hdfc_key").value = result.order.key;
            document.getElementById('hdfc_order_id').value = result.order.order_id;
            document.getElementById('hdfc_amount').value = result.order.amount;
            document.getElementById('hdfc_name').value = result.order.name;
            document.getElementById('hdfc_description').value = "New Registration";
            document.getElementById('hdfc_emil').value = result.order.email;
            document.getElementById('hdfc_contact').value = result.order.contact;
            document.getElementById('transaction_id').value = result.order.receipt;
            $('.bs-confirm-modal-center').modal({
              backdrop: "static"
            });
            $('.bs-confirm-modal-center').modal({
              datakeyboard: false
            });
            $('.bs-confirm-modal-center').modal('show');
          } else {
            errMessage = document.getElementById('alert-message');
            errMsgAry = Object.values(result.message);
            errMessage.innerHTML = "";
            errorHtml = "";
            errorHtml = "<div class=\"alert alert-danger alert-dismissible fade show\" id=\"alert-danger\" role=\"alert\">\n                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button> ";
            errMsgAry.forEach(function (element) {
              errorHtml += "<p class=\"m-0\"><strong>Oh snap!</strong> ".concat(element[0], "</p>");
            });
            errorHtml += "</div>";
            errMessage.innerHTML = errorHtml;
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
          }

          _context.next = 14;
          break;

        case 11:
          _context.prev = 11;
          _context.t0 = _context["catch"](0);
          // console.log(error);
          alert("505 | Internal server error, Please contact admin...!");

        case 14:
        case "end":
          return _context.stop();
      }
    }
  }, null, null, [[0, 11]]);
};

handlePaymentResponse = function handlePaymentResponse(form_1) {
  var options, response, result;
  return regeneratorRuntime.async(function handlePaymentResponse$(_context2) {
    while (1) {
      switch (_context2.prev = _context2.next) {
        case 0:
          _context2.prev = 0;
          form_1.append("razorpay_order_id", document.getElementById("hdfc_order_id").value);
          options = {
            method: "POST",
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            body: form_1
          };
          _context2.next = 5;
          return regeneratorRuntime.awrap(fetch("/user/register", options));

        case 5:
          response = _context2.sent;
          _context2.next = 8;
          return regeneratorRuntime.awrap(response.json());

        case 8:
          result = _context2.sent;

          if (result.status === "success") {
            registrationConfirmSubmitForm.submit(); //hdfc payment page
            // openCheckout(); //razorpay payment page

            $(".bs-loading-modal-center").modal("hide");
          } else {
            alert("505 | Internal server error, Please contact admin...!" + result.message);
          }

          _context2.next = 15;
          break;

        case 12:
          _context2.prev = 12;
          _context2.t0 = _context2["catch"](0);
          alert("505 | Internal server error, Please contact admin...!");

        case 15:
        case "end":
          return _context2.stop();
      }
    }
  }, null, null, [[0, 12]]);
};

openCheckout = function openCheckout() {
  try {
    var options = {
        key: document.getElementById("hdfc_key").value,
        amount: document.getElementById("hdfc_amount").value,
        currency: document.getElementById("hdfc_currency").value,
        order_id: document.getElementById("hdfc_order_id").value,
        name: "Binomo Traders",
        description: "New Registration",
        image: "./website/images/header-logo-2.png",
        callback_url: document.getElementById("callback_url").value,
        prefill: {
            name: document.getElementById("hdfc_name").value,
            email: document.getElementById("hdfc_emil").value,
            contact: document.getElementById("hdfc_contact").value,
        },
        notes: {
            address: "Binomo Traders Corporate Office",
        },
        theme: {
            color: "#08C8F6",
        },
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
  } catch (error) {
    // console.log(error);
    alert("505 | Internal server error, Please contact admin...!");
  }
};

regSubmitForm = function regSubmitForm(event) {
  var form, ifscCode, response;
  return regeneratorRuntime.async(function regSubmitForm$(_context3) {
    while (1) {
      switch (_context3.prev = _context3.next) {
        case 0:
          event.preventDefault();
          form = new FormData(registrationForm);
          _context3.prev = 2;
          ifscCode = document.getElementById('ifscCode').value;
          _context3.next = 6;
          return regeneratorRuntime.awrap(fetch("https://ifsc.razorpay.com/".concat(ifscCode)));

        case 6:
          response = _context3.sent;

          if (response.status === 200) {
            createOrder(form);
          } else {
            invalidIFSC();
          }

          _context3.next = 13;
          break;

        case 10:
          _context3.prev = 10;
          _context3.t0 = _context3["catch"](2);
          invalidIFSC();

        case 13:
        case "end":
          return _context3.stop();
      }
    }
  }, null, null, [[2, 10]]);
};

invalidIFSC = function invalidIFSC() {
  var errorHtml = "<div class=\"alert alert-danger alert-dismissible fade show\" id=\"alert-danger\" role=\"alert\">\n            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\n            <p class=\"m-0\"><strong>Oh snap!</strong> Invalid IFSC Code</p>\n            </div>";
  document.getElementById("alert-message").innerHTML = errorHtml;
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
  return;
};

var registrationForm = document.getElementById("registration-form");
var registrationConfirmSubmitForm = document.getElementById("registration-confirm-submit-form");
registrationForm.addEventListener('submit', regSubmitForm);
registrationConfirmSubmitForm.addEventListener("submit", function (event) {
  event.preventDefault();
  var form_1 = new FormData(registrationForm);
  $(".bs-confirm-modal-center").modal("hide");
  $(".bs-loading-modal-center").modal({
    backdrop: "static"
  });
  $(".bs-loading-modal-center").modal({
    datakeyboard: false
  });
  $(".bs-loading-modal-center").modal("show");
  handlePaymentResponse(form_1);
});