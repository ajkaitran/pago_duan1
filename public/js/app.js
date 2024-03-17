// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.
//menu đứng im
$(document).ready(function () {
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var navHeader = $('.nav__header');
        var navHeaderHeight = navHeader.outerHeight();

        if (scroll >= navHeaderHeight) {
            navHeader.addClass('fixed');
        } else {
            navHeader.removeClass('fixed');
        }
    });
});
$(document).ready(function () {
    $("#toggle_search").click(function () {
        $(".search_drop").toggle();
    });
    $("#toggle_cart").click(function () {
        $(".badges__drop").toggle();
    });
    $("#toggle_user").click(function () {
        $(".user__drop").toggle();
    });

    // Ẩn .nav_header__mobile ban đầu
    $(".nav_header__mobile").hide();

    // Hiển thị .nav_header__mobile khi .left_header được nhấp
    $(".left_header").click(function () {
        $(".nav_header__mobile").show();
    });

    // Ẩn .nav_header__mobile khi .close_navbars được nhấp
    $(".close_navbars").click(function () {
        $(".nav_header__mobile").hide();
    });

    // Ẩn .nav_header__mobile khi click bên ngoài nó
    $(document).mouseup(function (e) {
        var container = $(".nav_header__mobile");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });
    $('.nav_drop').hide(); // Ẩn mặc định tất cả .nav_drop__children
    $('.caret-down').click(function () {
        var dropElement = $(this).parent().next('.nav__drop');
        dropElement.slideToggle();
    });
    $('.nav_drop__children').hide(); // Ẩn mặc định tất cả .nav_drop__children

    $('.btn-child').click(function () {
        // Tìm phần tử .nav_drop__children liền kề trong cấp con
        var dropChildrenElement = $(this).parent().next('.nav_drop__children');

        // Sử dụng slideToggle để thêm hiệu ứng slide
        dropChildrenElement.slideToggle();
    });

    // Ẩn .dropdown__menu ban đầu
    $(".dropdown__menu").hide();

    // Hiển thị .dropdown__menu khi .dropdown được nhấp
    $(".dropdown").click(function () {
        $(".dropdown__menu").show();
    });

    // Ẩn .dropdown__menu khi .dropdown được nhấp
    $(".dropdown").click(function () {
        $(".dropdown__menu").hide();
    });
});

// slideshow
$('.slide__banner').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    autoplay: true,
    autoplaySpeed: 3000,
});
$('.slide__service').slick({
    infinite: true,
    slidesToShow: 8,
    slidesToScroll: 4,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 6,
                slidesToScroll: 3,
                infinite: true,
                dots: false
            }
        },
        {
            breakpoint: 740,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }
    ]
});
$('.slide__list').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        },
        {
            breakpoint: 740,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.slide__new__service').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        },
        {
            breakpoint: 740,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }
    ]
});
$('.slide__favorite__product').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        },
        {
            breakpoint: 740,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.slide__favorite__product__sidebar').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        },
        {
            breakpoint: 740,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.slide__related__products').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        },
        {
            breakpoint: 740,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.list-collation-page').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
});

//tabs
$(function () {
    $("#tabs").tabs();
});
$(function () {
    var randomCode = generateRandomCode();
    document.getElementById("code").value = randomCode; // có sãn 1 mã khi khởi động
});


function generateRandomCode() {
    var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    var code = "";
    for (var i = 0; i < 5; i++) {
        var randomIndex = Math.floor(Math.random() * characters.length);
        code += characters.charAt(randomIndex);
    }
    return code;
}
$('.border__dashed').click(function () {
    console.log($(this));
    $(this).next('.dropdown__menu').toggle(); // Ẩn hiện dropdown__menu khi click vào thẻ a
});

$("#priceRange").ionRangeSlider({
    type: "double",
    min: 0,
    max: 100000000,
    from: 0,
    to: 100000000,
});
$('.item-product').fancybox({
    type: 'ajax',
    layout: 'ProductDetails'
});

$("#priceRange").change(function () {
    var array = $(this).val().split(';');

    $.ajax({
        url: "/Home/ListProductView",
        type: 'GET',
        data: {
            min: array[0],
            max: array[1]
        },
        success: function (result) {
            $(".product__list").empty();
            $(".product__list").html(result);

            console.log(result)
        }
    });
})
$('.checkbox-btn').change(function () {
    var cutlineValues = $('.checkbox-cutline:checked').map(function () {
        return this.value;
    }).get().join(',');
    console.log(cutlineValues)
    var laminationValues = $('.checkbox-lamination:checked').map(function () {
        return this.value;
    }).get().join(',');
    var printsizeValues = $('.checkbox-printsize:checked').map(function () {
        return this.value;
    }).get().join(',');
    var printedformValues = $('.checkbox-printedform:checked').map(function () {
        return this.value;
    }).get().join(',');
    var papertypeValues = $('.checkbox-papertype:checked').map(function () {
        return this.value;
    }).get().join(',');
    var glueValues = $('.checkbox-glue:checked').map(function () {
        return this.value;
    }).get().join(',');
    $.ajax({
        type: 'POST',
        url: "/Home/ListProductView",
        data: {
            cutline: cutlineValues,
            lamination: laminationValues,
            printsize: printsizeValues,
            printedform: printedformValues,
            papertype: papertypeValues,
            glue: glueValues
        },
        success: function (result) {
            $(".product__list").empty();
            $(".product__list").html(result);
        },
        error: function (error) {
            console.log('Error:', error);
        }
    });
});

function AddToCollation(id) {
    $.ajax({
        url: '/Home/AddToCollation',
        type: 'POST',
        data: {
            id: id,
        },
        success: function (data) {
            if (data.result === 1) {
                Toast('success', '#2abfa5', 'Đã thêm vào mục so sánh sản phẩm')
            } else {
                Toast('error', '#e74c3c', 'Không thể thêm vào so sánh')
            }
        },
        error: function () {
            Toast('error', '#e74c3c', 'Đã có lỗi xảy ra trong quá trình xử lý!!!')
        }
    });
}

function RemoveToCollation(item, id) {
    Swal.fire({
        text: "Bạn chắc chắn muốn xóa sản phẩm này khỏi danh sách so sánhg",
        showCancelButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/Home/RemoveFromCollation',
                type: 'POST',
                data: {
                    id: id,
                },
                success: function (data) {
                    if (data.result === 1) {
                        Toast('success', '#2abfa5', 'Đã xóa sản phẩm khỏi mục so sánh')
                        $(item).parent(".page_collation__item").fadeOut();
                    } else {
                        Toast('error', '#e74c3c', 'Không thể xóa khỏi so sánh')
                    }
                },
                error: function () {
                    Toast('error', '#e74c3c', 'Đã có lỗi xảy ra trong quá trình xử lý!!!')
                }
            });
        }
    })
}
function AddToWishlist(id) {
    $.ajax({
        url: '/Member/AddToWishlist',
        type: 'POST',
        data: {
            productId: id,
        },
        success: function (data) {
            if (data.result === 1) {
                Toast('success', '#2abfa5', data.msg)
            } else {
                window.location.href = "/dang-nhap";
            }
        },
        error: function () {
            Toast('error', '#e74c3c', 'Đã có lỗi xảy ra trong quá trình xử lý!!!')
        }
    });
}

function RemoveFromWishlist(id) {
    $.ajax({
        url: '/Member/RemoveFromWishlist',
        type: 'POST',
        data: {
            productId: id,
        },
        success: function (data) {
            if (data.result === 1) {
                Toast('success', '#2abfa5', data.msg)
                $(`.box__favorite__product[data-itemId="${id}"]`).parent(".col").fadeOut();
            } else {
                Toast('error', '#e74c3c', data.msg)
            }
        },
        error: function () {
            Toast('error', '#e74c3c', 'Đã có lỗi xảy ra trong quá trình xử lý!!!')
        }
    });
}
function ContactJS() {
    //Tạo mã 5 chữ & số
    document.getElementById("generate-code").addEventListener("click", function () {
        var randomCode = generateRandomCode();
        document.getElementById("code").value = randomCode;
    });
}
function QuantityJS() {
    $(".input-quantity").niceNumber({
        autoSize: false
    });
}
function SlideProductJS() {
    // Khởi tạo carousel cho phần "slide__images"
    $('.slide__images').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        autoplay: true,
        autoplaySpeed: 3000,
    });

    // Khởi tạo carousel cho phần "slide__images__nav"
    $('.slide__images__nav').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
    });

    // Đặt sự kiện khi slide thay đổi trong phần "slide__images"
    $('.slide__images').on('afterChange', function (event, slick, currentSlide) {
        // Loại bỏ lớp CSS 'active' từ tất cả các ảnh trong phần "slide__images__nav"
        $('.slide__images__nav .nav-image').removeClass('active');
        // Thêm lớp CSS 'active' vào ảnh tương ứng trong phần "slide__images__nav"
        $('.slide__images__nav .nav-image').eq(currentSlide).addClass('active');
    });

    // Xử lý sự kiện click trên các hình ảnh điều hướng
    $('.slide__images__nav .nav-image').click(function () {
        // Lấy chỉ mục của hình ảnh điều hướng được click
        var selectedIndex = $(this).data('index');

        // Sử dụng phương thức `slickGoTo` của Slick để điều hướng đến slide được chọn trong slideshow chính
        $('.slide__images').slick('slickGoTo', selectedIndex);
    });

    // Thêm lớp 'active' cho hình ảnh điều hướng đầu tiên ban đầu
    $('.slide__images__nav .nav-image[data-index="0"]').addClass('active');
}

function QuickCart(id) {
    $.ajax({
        type: "GET",
        url: "/ShoppingCart/AddToCart",
        data: {
            productId: id,
            quantity: 1,
        },
        success: function (data) {
            $(".badges__icons").text(data.count);
            UpdateCartMini()
            if (data.result === 1) {
                Swal.fire({
                    text: "Thêm vào giỏ hàng thành công",
                    icon: 'success',
                    iconColor: '#2abfa5',
                    showCancelButton: true,
                    confirmButtonText: 'Giỏ hàng',
                    confirmButtonColor: '#2abfa5',
                    cancelButtonText: 'Mua thêm',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/gio-hang";
                    }
                })
            } else {
                Toast('error', '#e74c3c', 'Thêm vào giỏ hàng không thành công')
            }
        },
        error: function () {
            Toast('error', '#e74c3c', 'Đã có lỗi xảy ra trong quá trình xử lý!!!')
        }
    });
}

function UpdateCartMini() {
    $.ajax({
        type: "GET",
        url: "/ShoppingCart/CartMini",

        success: function (data) {
            $(".badges__drop").empty();
            $(".badges__drop").html(data);
        },
        error: function () {
            Toast('error', '#e74c3c', 'Đã có lỗi xảy ra trong quá trình xử lý!!!')
        }
    });
}

$("#detailForm").on("submit", function (e) {
    e.preventDefault();
    $.post("/ShoppingCart/AddToCart", $(this).serialize(), function (data) {
        if (data.result === 1) {
            Swal.fire({
                text: "Thêm vào giỏ hàng thành công",
                icon: 'success',
                iconColor: '#2abfa5',
                showCancelButton: true,
                confirmButtonText: 'Giỏ hàng',
                confirmButtonColor: '#2abfa5',
                cancelButtonText: 'Mua thêm',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/gio-hang";
                } else {
                    $(".badges__icons").text(data.count);
                }
            })
        } else {
            Toast('error', '#e74c3c', 'Thêm vào giỏ hàng không thành công')
        }
    })
})
function UpdateToCart(inputElement) {
    var itemId = inputElement.closest('.table_cart__item').find("th").data('itemid');
    var itemTotal = inputElement.closest('.table_cart__item').find(".item-cart-total");
    var newQuantity = inputElement.val();

    $.ajax({
        url: '/ShoppingCart/UpdateToCart',
        type: 'POST',
        data: {
            recordId: itemId,
            quantity: newQuantity
        },
        success: function (data) {
            $(".features-cart--count").text(data.count);
            $(".shopping-cart-total").text(data.cartTotal);
            itemTotal.text(data.itemTotal)
            if (data.result === 1) {
                Toast('success', '#2abfa5', 'Cập nhật giỏ hàng thành công')
            } else {
                Toast('error', '#e74c3c', 'Cập nhật giỏ hàng không thành công')
            }
        },
        error: function () {
            Toast('error', '#e74c3c', 'Đã có lỗi xảy ra trong quá trình xử lý!!!')
        }
    });
}


function RemoveFromCart(id) {
    Swal.fire({
        text: "Xóa sản phẩm khỏi giỏ hàng ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Xác nhận',
        confirmButtonColor: '#e74c3c',
        cancelButtonText: 'Hủy',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/ShoppingCart/RemoveFromCart',
                type: 'POST',
                data: {
                    recordId: id,
                },
                success: function (data) {
                    $(".features-cart--count").text(data.count);

                    if (data.result === 1) {
                        Toast('success', '#2abfa5', 'Xóa thành công')
                        $(`th[data-itemId="${id}"]`).parent('.table_cart__item').fadeOut();
                    } else {
                        Toast('error', '#e74c3c', 'Xóa không thành công')
                    }
                },
                error: function () {
                    Toast('error', '#e74c3c', 'Đã có lỗi xảy ra trong quá trình xử lý!!!')
                }
            });
        }
    })

}
function RemoveFromCartDrop(id) {
    Swal.fire({
        text: "Xóa sản phẩm khỏi giỏ hàng ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Xác nhận',
        confirmButtonColor: '#e74c3c',
        cancelButtonText: 'Hủy',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/ShoppingCart/RemoveFromCart',
                type: 'POST',
                data: {
                    recordId: id,
                },
                success: function (data) {
                    $(".features-cart--count").text(data.count);
                    UpdateCartMini()
                    if (data.result === 1) {
                        Toast('success', '#2abfa5', 'Xóa thành công');
                        $(`div[data-itemId="${id}"]`).fadeOut();
                    } else {
                        Toast('error', '#e74c3c', 'Xóa không thành công')
                    }
                },
                error: function () {
                    Toast('error', '#e74c3c', 'Đã có lỗi xảy ra trong quá trình xử lý!!!')
                }
            });
        }
    })

}
function Toast(type, color, msg) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        iconColor: '#ffffff',
        color: '#ffffff',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: type,
        background: color,
        title: msg
    })
}
$("#checkboxAtStore").change(function () {
    if ($(this).is(":checked")) {
        $("#customerAddress").slideUp()
        $("#storeAddress").slideDown()
    } else {
        $("#customerAddress").slideDown()
        $("#storeAddress").slideUp()
    }
});

//Select2
// District select
$(document).ready(function () {
    // Sự kiện khi giá trị của dropdown Tỉnh/Thành phố thay đổi
    $("#CityId").change(function () {
        // Lấy giá trị của dropdown Tỉnh/Thành phố được chọn
        var selectedCityId = $(this).val();

        // Gọi Ajax để lấy danh sách Quận/Huyện dựa trên Id của Tỉnh/Thành phố
        $.ajax({
            url: "/danh-sach-quan-huyen",
            type: "GET",
            data: { cityId: selectedCityId },
            success: function (data) {
                // Xóa tất cả các option hiện tại trong dropdown Quận/Huyện
                $("#DistrictId").empty();

                // Thêm option mặc định
                $("#DistrictId").append('<option value="">---Chọn quận/huyện---</option>');

                // Thêm các option mới từ dữ liệu nhận được từ server
                $.each(data.districts, function (index, item) {
                    $("#DistrictId").append('<option value="' + item.id + '">' + item.name + '</option>');
                });
            },
            error: function () {
                console.log("Lỗi khi gửi yêu cầu Ajax lấy danh sách Quận/Huyện.");
            }
        });
    });
});

// Ward select
$(document).ready(function () {
    // Sự kiện khi giá trị của dropdown Quận/Huyện thay đổi
    $("#DistrictId").change(function () {
        // Lấy giá trị của dropdown Quận/Huyện được chọn
        var selectedDistrictId = $(this).val();

        // Gọi Ajax để lấy danh sách Phường/Xã dựa trên Id của Quận/Huyện
        $.ajax({
            url: "/danh-sach-xa-phuong",
            type: "GET",
            data: { districtId: selectedDistrictId },
            success: function (data) {
                // Xóa tất cả các option hiện tại trong dropdown Phường/Xã
                $("#WardId").empty();

                // Thêm option mặc định
                $("#WardId").append('<option value="">---Chọn phường/xã---</option>');

                // Thêm các option mới từ dữ liệu nhận được từ server
                $.each(data.wards, function (index, item) {
                    $("#WardId").append('<option value="' + item.id + '">' + item.name + '</option>');
                });
            },
            error: function () {
                console.log("Lỗi khi gửi yêu cầu Ajax lấy danh sách Phường/Xã.");
            }
        });
    });
});
//End

$("#contactForm").on("submit", function (e) {
    e.preventDefault();
    $.post("/Home/ContactForm", $(this).serialize(), function (data) {
        if (data.status) {
            Swal.fire({
                title: "Thành công !",
                icon: "success"
            });
            $("#contactForm").trigger("reset");
        } else {
            Swal.fire({
                title: "Thất bại vui lòng thử lại !",
                icon: "error"
            });
        }
    });
});
