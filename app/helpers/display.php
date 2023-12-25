<?php
function isInvalid($errors = [], $fieldName = '')
{
  return isset($errors[$fieldName]) ? 'is-invalid' : false;
}

function getMessageError($errors = [], $fieldName = '')
{
  return $errors[$fieldName] ?? false;
}

function old($old = [], $fieldName = '')
{
  return $old[$fieldName] ?? false;
}

function alert($msg = '', $type = '')
{

  if (!empty($msg) && !empty($type)) {
    return ' 
    <div class="message-error alert alert-' . $type . ' alert-dismissible fade show" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
}

function getContentVerified($otp = null)
{
  $content = 'Mã OTP của bạn là: <b>' . $otp . '</b><br><br>
        
    Vui lòng sử dụng OTP để hoàn tất quá trình đăng nhập của bạn. OTP có giá trị trong 5 phút.
    <br><br>  
    Nếu bạn chưa thử đăng nhập ngay bây giờ, vui lòng bỏ qua email này. <br><br>
    
    Vui lòng liên hệ với chúng tôi để được trợ giúp bằng cách trả lời email này..<br><br>
    
    Trân trọng!';
  return $content;
}

function getContentForgotPassword($linkReset = '')
{
  $content = 'Chúng tôi nhận được yêu cầu khôi phục mật khẩu từ bạn.<br><br> Vui lòng nhấn vào link sau để tiến hành khôi phục mật khẩu <br>';
  $content .= $linkReset;
  $content .= '<br><br>Trân trọng!';
  return $content;
}

function toast($title, $icon)
{
  return "
        <script>
            Swal.fire({
                toast: true,
                icon: '$icon', 
                title: '$title',
                position: 'bottom-right',
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                },
                willClose: () => {
                    Swal.enableBodyScroll(); // Tắt overlay khi toast biến mất
                }
            })
        </script>
    ";
}

// 0 -> chờ xác nhận, 1 -> đã xác nhận, 2 -> đang giao hàng, 3 -> giao hàng thành công, 4 -> đã hủy
function tagStatusOrder($status)
{
  if ($status == 0) {
    return "<button class='btn btn-sm btn-warning'>Chờ xác nhận</button>";
  }
  if ($status == 1) {
    return "<button class='btn btn-sm btn-info'>Đã xác nhận</button>";
  }
  if ($status == 2) {
    return "<button class='btn btn-sm btn-primary'>Đang giao hàng</button>";
  }
  if ($status == 3) {
    return "<button class='btn btn-sm btn-success'>Giao hàng thành công</button>";
  }
  if ($status == 4) {
    return "<button class='btn btn-sm btn-danger'>Đã hủy</button>";
  }
}
