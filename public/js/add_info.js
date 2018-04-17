/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(46);


/***/ }),

/***/ 46:
/***/ (function(module, exports) {

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //change the text to uppercase of postal code textbox when the focus is lost
    $("input:text[name='postal']").blur(function () {
        var postal_code = $(this).val().toUpperCase();
        $(this).val(postal_code);
    }); //end of blur function


    /*This function is called from validateInputFields() function to display errors*/
    function displayErrors(fieldName, err) {
        //$(fieldName).find('.error').remove();//remove any previous errors displayed
        $(fieldName).after().append('<div class="error">' + err + '</div>'); //add div to display errors
        return false;
    }

    function validateInputFields(clientName, province, tel, postal, salary, formName) {
        //variables
        msg = '';
        flag = true;
        regExpName = /^[a-zA-Z]+\s?[a-zA-Z]+\s?[a-zA-Z]+$/g;
        telRegExp = /(^\(\d{3}\)\s?\d{3}\-\d{4})$|(^\d{3}\-\d{3}\-\d{4})$/g;
        postalRegExp = /^[a-zA-Z]\d{1}[a-zA-Z]\s?\d{1}[a-zA-Z]\d{1}$/g;
        salaryRegExpQuebec = /^(\d{1,3})(?=\s)(\s\d{3})*(\,(?=\d{2}$)|$)(\d{2})?/g;
        salaryRegExpOthers = /^(([0-9]{0,2}(\,?[0-9]{3})*)|\0)?(\.[0-9]{2})?$/g;
        //salaryRegExpOthers=/(^\d{2}\,\d{3}\.\d{2})|(^\d{5}\.\d{2})|(^\d{5})/g;


        $(formName).find('.error').remove(); //remove any previous error
        /*Start client/user name validation*/
        if (clientName === '') {
            msg = '<ul>';
            msg += '<li>The Name field is required. </li>';
            msg += '<li>Le champ Nom est requis.</li>';
            msg += '</ul>';
            flag = displayErrors('#clientError', msg);
        } else if (clientName.length < 2) {
            msg = '<ul>';
            msg += '<li>The Name must be at least 2 characters long.</li>';
            msg += '<li> Le nom doit comporter au moins 2 caractères</li>';
            msg += '</ul>';
            flag = displayErrors('#clientError', msg);
        } else if (clientName.length >= 2) {
            //check if the name has number
            if (!isNaN(clientName)) {
                msg = '<ul>';
                msg += '<li>Number(s) not allowed for Name field.</li>';
                msg += '<li>Les nombres ne sont pas autorisés pour le champ Nom.</li>';
                msg += '</ul>';
                flag = displayErrors('#clientError', msg);
            } else if (!regExpName.test(clientName)) {
                msg = '<ul>';
                msg += '<li>Number(s) not allowed for Name field.</li>';
                msg += '<li>Les nombres ne sont pas autorisés pour le champ Nom.</li>';
                msg += '</ul>';
                flag = displayErrors('#clientError', msg);
            }
        }
        /*End of client/user name validation*/

        /*Start province validation*/
        if (province === '') {
            msg = '<ul>';
            msg += '<li>Please select province.</li>';
            msg += '<li>S\'il vous plaît sélectionnez la province.</li>';
            msg += '</ul>';
            flag = displayErrors('#provinceError', msg);
        }
        /*End of province validation*/

        /*Start of telephone validation */
        if (tel === '') {
            msg = '<ul>';
            msg += '<li>Telephone field is required.</li>';
            msg += '<li>champ Téléphone est nécessaire</li>';
            msg += '</ul>';
            flag = displayErrors('#telError', msg);
        } else if (!telRegExp.test(tel)) {
            msg = '<ul>';
            msg += '<li>Telephone number must be in one of these format.</li>';
            msg += '<li>Le numéro de téléphone doit être dans l\'un de ces formats.</li>';
            msg += '<li>Example:(xxx) xxx-xxxx, (xxx)xxx-xxx, xxx-xxx-xxxx</li>';
            msg += '</ul>';
            flag = displayErrors('#telError', msg);
        }
        /*End of telephone validation*/

        /*Start of postal code validation */
        if (postal === '') {
            msg = '<ul>';
            msg += '<li>Postal code field is required.</li>';
            msg += '<li>champ Code postal est requis</li>';
            msg += '</ul>';
            flag = displayErrors('#postalError', msg);
        } else if (!postalRegExp.test(postal)) {
            msg = '<ul>';
            msg += '<li>Postal Code must be in one of these format.</li>';
            msg += '<li>Le code postal doit être dans l\'un de ces formats.</li>';
            msg += '<li>Example:M5G 2G8, M5G2G8</li>';
            msg += '</ul>';
            flag = displayErrors('#postalError', msg);
        }
        /*End of Postal code validation*/

        if (salary === '') {
            msg = '<ul>';
            msg += '<li>Salary field is required.</li>';
            msg += '<li>Le champ de salaire est requis</li>';
            msg += '</ul>';
            flag = displayErrors('#salaryError', msg);
        } else {
            switch (province) {
                case '2':
                    if (!salaryRegExpQuebec.test(salary)) {
                        if (!salaryRegExpOthers.test(salary)) {
                            msg = '<ul>';
                            msg += '<li>Salary must be in one of these format.</li>';
                            msg += '<li>salaire doit être dans l\'un de ces formats.</li>';
                            msg += '<li>Example:</li>';
                            msg += '<li><ol><li>40,000.00</li>';
                            msg += '<li>40000</li>';
                            msg += '<li>40000.00</li>';
                            msg += '<li>40 000,00</li>';
                            msg += '<li>40 000</li></ol></li>';
                            msg += '</ul>';
                            flag = displayErrors('#salaryError', msg);
                        }
                    }
                    break;
                default:
                    if (!salaryRegExpOthers.test(salary)) {
                        msg = '<ul>';
                        msg += '<li>Salary must be in one of these format.</li>';
                        msg += '<li>salaire doit être dans l\'un de ces formats.</li>';
                        msg += '<li>Example:</li>';
                        msg += '<li><ol><li>40,000.00</li>';
                        msg += '<li>40000</li>';
                        msg += '<li>40000.00</li></ol></li>';
                        msg += '</ul>';
                        flag = displayErrors('#salaryError', msg);
                    }
                    break;
            }
        }

        return flag;
    }

    function saveUpdateUserInformation(url, data, formName) {

        //get the input values from the form fields and assign to variables.
        var clientName = $.trim($("input[name='name']").val());
        var province = $("input[name='prov_id']").val(); //$("#_province").val();
        var tel = $.trim($("input[name='telephone']").val());
        var postal = $.trim($("input[name='postal']").val());
        var salary = $.trim($("input[name='salary']").val());

        //check if user inputs are valid. If its valid make ajax call to save or update (depends on url) data
        if (validateInputFields(clientName, province, tel, postal, salary, formName)) {

            $.ajax({
                method: 'POST',
                url: url,
                data: data,
                dataType: 'json'
            }).done(function (res) {
                //alert("hello");

                $('#child_container_col').empty().append(res.view);
                $('#add_info').removeClass('active'); //remove the active class
                $('#list_users').removeClass('active');
                console.log(res.view);

                // console.log('province:'+res.province[name]);
                //showUserInformation(res.id)
            }).fail(function (res) {
                console.log(res.responseText);
                //var resError=JSON.parse(res.responseText);
                //console.log(resError['message']);
                if (res.status !== 422) {
                    //alert('Error saving your work.');
                    $('#frmSaveUser').find('.error').remove(); //remove any previous errors displayed
                    return;
                } else {

                    $(formName).find('.error').remove();
                    //parse the response text and and get the errors
                    var errors = JSON.parse(res.responseText);
                    // console.log(errors);
                    for (var fieldName in errors['errors']) {
                        //console.log(errors['errors'][fieldName]);
                        var inputField = $(formName).find('[name=' + fieldName + ']').parent(); // find the parent element of the input that has error
                        //if there are more than one error message create a list by concatenating errors in msg var.
                        var msg = '<ul>';
                        for (var i = 0; i < errors['errors'][fieldName].length; i++) {
                            msg += '<li>' + errors['errors'][fieldName][i] + '</li>';
                        }
                        msg += '</ul>';

                        inputField.after().append('<div class="error">' + msg + '</div>'); //display the error message below the field.
                    }
                }
            }); //end of ajax method
        } //end of if statement
    }

    //when the user clicks on save button call ajax to save user information
    $('#child_container_col').on('submit', '#frmSaveUser', function (e) {
        e.preventDefault();
        url = './user/save';
        data = $(this).serialize(); //get all the input field values
        formName = '#frmSaveUser';

        saveUpdateUserInformation(url, data, formName);
    }); //end of form submit function

    /*Function to display recently inserted user's information
    function showUserInformation(id) {
        console.log('id:' + id);
        $.ajax({
            method: 'GET',
            url: './userinfo',
            data: {id: id}
        })
            .done(function (data) {
                console.log(JSON.stringify(data));
                console.log(data);
                $('.container-fluid').empty().html(data);
            })
            .fail(function (res) {
                console.log(JSON.stringify(res));
            })//end of ajax method
    }*/

    //Update User Information
    $('#child_container_col').on('submit', '#frmUpdateUser', function (e) {
        e.preventDefault();

        //variables
        url = $(this).attr('action');
        data = $(this).serialize(); //get all the input field values
        formName = '#frmUpdateUser';

        saveUpdateUserInformation(url, data, formName);
    }); //end of form submit event

}); //end of ready function

/***/ })

/******/ });