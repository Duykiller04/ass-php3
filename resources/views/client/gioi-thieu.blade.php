@extends('client.layouts.master')
@section('title')
    Giới thiệu
@endsection
@section('content')
<div class="container">
  @include('client.components.breadcrumb',['pageName' => 'Giới thiệu'])
    <div class="row">
  
      <div class="col-md-8">
  
        <h1>Giới thiệu về trang tin tức News</h1>
  
        <p class="lead">
          News là một trong những trang tin tức lớn nhất, cập nhật tin tức nóng hổi, chính xác và đa dạng nhất mỗi ngày. 
        </p>
  
        <h3>Nguồn tin đa dạng</h3>
        
        <p>
          Chúng tôi cung cấp tin tức từ nhiều lĩnh vực như: chính trị, kinh tế, thể thao, giải trí trong nước và quốc tế. Đội ngũ phóng viên được bố trí khắp các tỉnh thành, quốc gia để cập nhật tin tức nhanh nhất.
        </p>
  
        <h3>Nội dung đa dạng</h3>
  
        <p>
          Ngoài tin tức nóng, chúng tôi cung cấp nhiều chuyên mục phong phú như thời sự, kinh doanh, thể thao, giải trí, du lịch, khoa học công nghệ, xã hội... phục vụ nhu cầu của độc giả.
        </p>
  
        <h3>Đội ngũ chuyên nghiệp</h3>  
  
        <p>
          Đội ngũ biên tập viên giàu kinh nghiệm sẽ tổng hợp, kiểm duyệt kỹ càng nội dung tin tức để đảm bảo tính chính xác, trung thực và phong phú. Chúng tôi luôn nỗ lực cung cấp bài viết chất lượng cao nhất cho bạn đọc.
        </p>
  
      </div>
  
      <div class="col-md-4">
  
        <img src="/theme/client/images/logo.png" class="img-fluid rounded" alt="News">
  
        <p class="text-center">Hình ảnh minh họa về trang tin tức</p>
  
      </div>
  
    </div>
  
  </div>
@endsection