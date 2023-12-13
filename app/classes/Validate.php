<?php

namespace App\Classes;

use App\Core\DataBase;
use App\Model\Category;
use App\Model\User;

class Validate
{
    private $errors;
    private $user;
    private $category;
    public function __construct()
    {
        $this->user = new User();
        $this->category = new Category();
        $this->errors = [];
    }


    public function fullname($fullname = null)
    {
        if (empty(trim($fullname))) {
            $this->errors['fullname'] = 'Họ và tên bắt buộc phải nhập';
        } else {
            if (strlen(trim($fullname)) < 2) {
                $this->errors['fullname'] = 'Họ tên tối thiểu 2 ký tự';
            }
        }
    }

    public function email($email = null, $unique = false)
    {
        if (empty(trim($email))) {
            $this->errors['email'] = 'Email bắt buộc phải nhập';
        } else {
            if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = 'Email không hợp lệ';
            }
            if ($unique == true) {
                $condition = "email='$email'";
                $checkEmailUser = $this->user->checkExists($condition);
                if ($checkEmailUser) {
                    $this->errors['email'] = 'Email đã tồn tại trong hệ thống';
                }
            }
        }
    }
    public function password($password = null)
    {

        if (empty(trim($password))) {
            $this->errors['password'] = 'Mật khẩu bắt buộc phải nhập';
        } else {
            if (strlen(trim($password)) < 6) {
                $this->errors['password'] = 'Mật khẩu tối thiểu 6 ký tự';
            } else {
                $pattern = '/^.*(?=.*[!@#$%^&*]).*$/';
                if (!preg_match($pattern, trim($password))) {
                    $this->errors['password'] = 'Mật khẩu chứa ít nhất 1 ký tự đặt biệt';
                }
            }
        }
    }

    public function oldPassword($password = null)
    {

        if (empty(trim($password))) {
            $this->errors['old_password'] = 'Mật khẩu bắt buộc phải nhập';
        } else {
            $login = new Login();
            // Xử lí khi user đã đăng nhập
            if (!empty($login->getUser())) {
                $userLogin = $login->getUser();
                if (!password_verify($password, $userLogin['password'])) {
                    $this->errors['old_password'] = 'Mật khẩu cũ chưa chính xác';
                }
            }
        }
    }


    public function newPassword($password = null)
    {

        if (empty(trim($password))) {
            $this->errors['new_password'] = 'Mật khẩu bắt buộc phải nhập';
        } else {
            if (strlen(trim($password)) < 6) {
                $this->errors['new_password'] = 'Mật khẩu tối thiểu 6 ký tự';
            } else {
                $pattern = '/^.*(?=.*[!@#$%^&*]).*$/';
                if (!preg_match($pattern, trim($password))) {
                    $this->errors['new_password'] = 'Mật khẩu chứa ít nhất 1 ký tự đặt biệt';
                }
            }
        }
    }
    public function confirmNewPassword($confirmPassword = null, $password = null)
    {
        if (empty(trim($confirmPassword))) {
            $this->errors['confirm_new_password'] = 'Xác nhận mật khẩu bắt buộc phải nhập';
        } else {
            if (!hash_equals($password, $confirmPassword)) {
                $this->errors['confirm_new_password'] = 'Mật khẩu không khớp';
            }
        }
    }

    public function confirmPassword($confirmPassword = null, $password = null)
    {
        if (empty(trim($confirmPassword))) {
            $this->errors['confirm_password'] = 'Xác nhận mật khẩu bắt buộc phải nhập';
        } else {
            if (!hash_equals($password, $confirmPassword)) {
                $this->errors['confirm_password'] = 'Mật khẩu không khớp';
            }
        }
    }

    // function required
    public function productName($name = '')
    {
        if (empty(trim($name))) {
            $this->errors['name'] = 'Tên sản phẩm bắt buộc phải nhập';
        }
    }
    public function productPrice($price = '')
    {
        if (empty(trim($price))) {
            $this->errors['price'] = 'Giá sản phẩm bắt buộc phải nhập';
        }
    }
    public function productFile($photo = '')
    {
        if (empty(trim($photo))) {
            $this->errors['photo'] = 'Hình ảnh bắt buộc phải chọn';
        }
    }

    public function categoryName($name = '', $unique = false)
    {
        if (empty(trim($name))) {
            $this->errors['name'] = 'Tên danh mục bắt buộc phải nhập';
        } else {
            if ($unique == true) {
                $condition = "name='$name'";
                $checkCategoryName = $this->category->checkExists($condition);
                if ($checkCategoryName) {
                    $this->errors['name'] = 'Tên danh mục đã tồn tại trong hệ thống';
                }
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
