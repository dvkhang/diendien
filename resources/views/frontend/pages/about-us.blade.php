
@extends('frontend.templates.master', [
    'title' => 'Giới thiệu về chúng tôi',
    'include'=>[],

])
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{url('/')}}" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Giới thiệu về chúng tôi</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Giới thiệu về chúng tôi</span>
        </h2>
        <!-- ../page heading-->
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                <div class="col-xs-12 col-sm-12" id="contact_form_map">
                    <h3 class="page-subheading">Thông tin về chúng tôi</h3>
                    <p>Lorem ipsum dolor sit amet onsectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor dapibus eget. Mauris tincidunt aliquam lectus sed vestibulum. Vestibulum bibendum suscipit mattis.</p>
                    <br/>
                    <ul>
                        <li>Praesent nec tincidunt turpis.</li>
                        <li>Aliquam et nisi risus.&nbsp;Cras ut varius ante.</li>
                        <li>Ut congue gravida dolor, vitae viverra dolor.</li>
                    </ul>
                    <br/>
                    <ul class="store_info">
                        <li><i class="fa fa-home"></i>Our business address is 1063 Freelon Street San Francisco, CA 95108</li>
                        <li><i class="fa fa-phone"></i><span>+ 021.343.7575</span></li>
                        <li><i class="fa fa-phone"></i><span>+ 020.566.6666</span></li>
                        <li><i class="fa fa-envelope"></i>Email: <span><a href="mailto:%73%75%70%70%6f%72%74@%6b%75%74%65%74%68%65%6d%65.%63%6f%6d">support@kutetheme.com</a></span></li>
                    </ul>                
                    </div>
            </div>
            <div class="row">
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyANEWfKXpbbX_XfI_MHa7OxWmaSljgP8xw'></script><div style='overflow:hidden;height:500px;width:1136px;'><div id='gmap_canvas' style='height:500px;width:1163px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://embedmaps.org/'>add bing map to website</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=8e59698b36548c74adc12dc5539b496aed54ff41'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(21.5671559,105.82520380000005),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(21.5671559,105.82520380000005)});infowindow = new google.maps.InfoWindow({content:'<strong>Map cua hang</strong><br>thai nguyen<br> Thái nguyên<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
        </div>
    </div>
</div>
    
@endsection
