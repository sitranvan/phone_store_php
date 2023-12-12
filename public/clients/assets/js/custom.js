function updateParams(paramName, paramValue) {
  var currentUrl = window.location.href;
  var urlObject = new URL(currentUrl);

  // Xóa tham số hiện tại của paramName
  urlObject.searchParams.delete(paramName);

  // Thêm tham số mới vào URL
  urlObject.searchParams.append(paramName, paramValue);

  // Chuyển đến URL mới mà không làm tải lại trang
  history.pushState({}, "", urlObject.href);

  // Nếu bạn muốn tải lại trang sau khi cập nhật URL, bạn có thể sử dụng:
  window.location.href = urlObject.href;
}

// Hàm lấy số trang hiện tại từ URL
function getCurrentPage() {
  var currentUrl = window.location.href;
  var urlObject = new URL(currentUrl);
  var pageParam = urlObject.searchParams.get("page");
  return pageParam ? parseInt(pageParam) : 1;
}

function updateSortBy(value) {
  // Sử dụng hàm updateParams đã có
  updateParams("priceSort", value);
}
