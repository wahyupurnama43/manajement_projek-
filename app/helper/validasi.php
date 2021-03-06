<?php 
function setError($err_code)
{
    $err = [
        "all_empty" => "This field is required.",
        "name_empty" => "This field is required.",
        "gender_empty" => "This field is required.",
        "jurusan_empty" => "This field is required.",
        "class_empty" => "This field is required.",
        "user_empty" => "This field is required.",
        "user_error" => "Username not founded in database.",
        "user_copy" => "Username is already taken.",
        "pass_empty" => "This field is required.",
        "pass_error" => "Password is not matching.",
        "menu_name_empty" => "This field is required.",
        "menu_link_empty" => "This field is required.",
        "menu_icon_empty" => "This field is required.",
        "menu_access_empty" => "This field is required."
    ];
    if (isset($err_code)) {
        if (is_array($err_code)) {
            foreach ($err_code as $code) {
                $_SESSION['err'][$code] = $err[$code];
            }
        } else {
            $_SESSION['err'][$err_code] = $err[$err_code];
        }
    }
}

function showError($err_code)
{
    if (isset($err_code)) {
        if (is_array($err_code)) {
            foreach ($err_code as $value) {
                if (isset($_SESSION['err'][$value])) {
                    return '
                    <small class="text-danger">' . $_SESSION['err'][$value] . '</small>
                    ';
                } else {
                    return "";
                }
            }
            unset($_SESSION['err']);
        } else {
            if (isset($_SESSION['err'][$err_code])) {
                return '
                <small class="text-danger">' . $_SESSION['err'][$err_code] . '</small>
                ';
            } else {
                return "";
            }
            unset($_SESSION['err']);
        }
    }
}

function saved($name)
{
    if (!empty($name)) {
        if (isset($_SESSION["def_value"])) {
            if ($_SESSION["def_value"][$name]) {
                return $_SESSION["def_value"][$name];
                unset($_SESSION['def_value']);
            } else {
                return '';
            }
        } else {
            return '';
        }
    }
}
