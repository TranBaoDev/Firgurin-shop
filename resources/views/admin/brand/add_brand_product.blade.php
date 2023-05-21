@extends('admin_layout')
@section('admin_content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-brand-product') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" class="form-control" name="brand_product_name"
                                    id="exampleInputEmail1" placeholder="Tên thương hiệu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea style="resize:none" rows="5" class="form-control" name="brand_product_desc"
                                    id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exambleInput">Trạng thái</label>
                                <select name="brand_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>
                            <?php
                            $message = Session::get('message');
                            if ($message) {
                                echo '<span style="font-weight: 700; color: #cb0e0e;" class="text-alert">', $message . '</span>';
                                Session::pull('message', null);
                            }
                            ?>
                            <br>
                            <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>

    </div>
@endsection