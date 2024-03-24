<div class="content">
    <section class="path">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <i class="fa-duotone fa-house-chimney me-3"></i><a class="p__hover" href="#">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết bài viết</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="product__page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-1 order-lg-0">
                    <div class="sidebar">
                        <div class="sidebar__title">
                            <h4 class="h4__white">DANH MỤC TIN TỨC</h4>
                        </div>
                        <div class="sidebar__menu">
                            <ul>
                                <li>
                                    <div class="border__dashed p__hover">
                                        <a class="p__hover" asp-action="News" asp-route-url="tin-thi-truong">Tin thị trường</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="border__dashed p__hover">
                                        <a class="p__hover" asp-action="News" asp-route-url="tin-van">Tin vắn</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar__title">
                            <h4 class="h4__white">TIN TỨC MỚI</h4>
                        </div>
                        <div class="slide__favorite__product__sidebar">
                            <?php
                            for ($i = 1; $i < 8; $i++) {
                            ?>
                                <div class="col">
                                    <div class="news">
                                        <div class="new__image">
                                            <img src="./public/images/Bai-viet-<?= $i ?>.jpg" alt="">
                                        </div>
                                        <div class="new__title">
                                            <a asp-action="ArticleDetails" asp-controller="Home" asp-route-id="@item.Id">
                                                Vang bóng 1 thời, thương hiệu Miliket đình đám nay chật vật để sinh tồn
                                            </a>
                                        </div>
                                        <div class="new__content">
                                            <div class="new__top__content">
                                                <p>Lượt xem:</p>
                                                <div class="views">123</div>
                                                <span>|</span>
                                                <i class="fa-light fa-calendar-days" style="color: #f7941e;"></i>
                                                <div class="date">21/05/2024</div>
                                            </div>
                                            <div class="new__bot__content">
                                                Do giá nguyên phụ liệu tăng cao, mức độ cạnh tranh trong ngành ngày càng gay gắt khiến tình hình sản xuất, kinh doanh của Miliket gặp rất nhiều khó khăn.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-0 order-lg-1">
                    <div class="article_detail">
                        <h4 class="p__orange">Vang bóng 1 thời, thương hiệu Miliket đình đám nay chật vật để sinh tồn</h4>
                        <span class="border_botton__gray">
                            <i class="fa-light fa-calendar-days" style="color: #f7941e;"></i> 21/05/2024
                            |
                            <i class="fa-solid fa-eye" style="color: #f7941e;"></i> 123
                        </span>
                        <div class="box_bg-white__border-left">
                            Do giá nguyên phụ liệu tăng cao, mức độ cạnh tranh trong ngành ngày càng gay gắt khiến tình hình sản xuất, kinh doanh của Miliket gặp rất nhiều khó khăn.
                        </div>
                        <div class="article_content">
                            Do giá nguyên phụ liệu tăng cao, mức độ cạnh tranh trong ngành ngày càng gay gắt khiến tình hình sản xuất, kinh doanh của Miliket gặp rất nhiều khó khăn.
                            Do giá nguyên phụ liệu tăng cao, mức độ cạnh tranh trong ngành ngày càng gay gắt khiến tình hình sản xuất, kinh doanh của Miliket gặp rất nhiều khó khăn.
                            Do giá nguyên phụ liệu tăng cao, mức độ cạnh tranh trong ngành ngày càng gay gắt khiến tình hình sản xuất, kinh doanh của Miliket gặp rất nhiều khó khăn.
                            Do giá nguyên phụ liệu tăng cao, mức độ cạnh tranh trong ngành ngày càng gay gắt khiến tình hình sản xuất, kinh doanh của Miliket gặp rất nhiều khó khăn.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>