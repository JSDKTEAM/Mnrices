<style>
    header{ 
        position: fixed; /* Set the navbar to fixed position */
        top: 0; /* Position the navbar at the top of the page */
        width: 100%; /* Full width */
        z-index:1;
    }
    .badge-notify{
        background:red;
        position: absolute;
        right: -7px;    
        top: 1px;
        z-index:1;
        
    }
    section{padding: 30px 0; float: left; width: 100%}
    .card{float: left; width:100%}
    .navbar {border: medium none; float: left; margin-bottom: 0px; width: 100%;border-radius: 0}
    .title-large {font-size: 20px; margin: 10px 0 5px; line-height: 27px; color: #141517;}
    .title-small { color: #141517; font-size: 16px; font-weight: 400; line-height: 23px; margin: 6px 0 0;}
    .title-x-small {font-size: 18px; margin: 0px;}
    .title-large a, .title-small a, .title-x-small a{color: inherit}
    .banner-sec{float: left; width: 100%; background: #EBEBEB;margin-top:170px;z-index:-1} 
    .top-head{background: #42A5F5; width: 100%; float: left; height: 100px;}
    .top-head h1 {color: #fff; font-size: 36px; font-weight: 600; margin: 18px 0 0;}
    .top-head small{float: left; width: 100%; font-size: 14px; color: #fff; margin-top: 5px; margin-left: 5px;}
    .top-head .admin-bar {text-align: right; margin-top: 22px;}
    .top-head .admin-bar a {color: #fff; line-height: 49px; position: relative; padding:0 7px;}
    .top-head .admin-bar a:hover{color: #ff0000}
    .top-head .admin-bar a i{margin-right: 6px;}
    .top-head .admin-bar .ping {background: #ff0000; border: 1px solid #141517; border-radius: 50%; height: 14px; position: absolute; right: 3px;    top: 13px; width: 14px; z-index: 1;}
    .top-head .admin-bar img {float: right; height: 50px; width: 50px; margin-left: 18px;}
    .top-nav{background: #fff; padding: 0; border-bottom: 1px solid #dbdbdb}
    .top-nav .nav-link {padding-bottom: 0.9rem; padding-top: 0.7rem;}
    .top-nav .navbar-nav .nav-item + .nav-item{margin-left:0}
    .top-nav li a{color: #141517;   padding: 0 10px; border-bottom: 2px solid #fff}
    .top-nav li a:hover, .top-nav li.active a{color: #141517; border-bottom: 2px solid #35cbdf }
    .top-nav .form-control{border-color: #fff}
    .top-nav .dropdown-item{padding:5px 20px 5px 10px !important;border-bottom: 0 !important }
    .top-nav .dropdown-item:hover{color: #141517; border-left: 2px solid #35cbdf !important;background: #fff}
    .top-nav .dropdown-menu{padding:10px;}
    .red{
        color:red;
    }
    #or{
        color:#FFB300;
    }
</style>
<header>
<div class="top-head left">
      <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <h1><span>Rice  </span>Disease</small></h1>
            </div>
            <div class="col-md-6 col-lg-3 ml-auto admin-bar hidden-sm-down">
            </div>
          </div>
      </div>
</div>
<section class="top-nav">
    <nav class="navbar navbar-expand-lg py-0 navbar-light">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="?controller=work&action=index_work"><i class="fas fa-home"></i> จัดการข้าว</a>
                </li>
              </ul>  
              <ul class="navbar-nav ml-auto">
                
    
              </ul> 
          </div>
        </div>
    </nav>
</section>
</header>



<script>
$(document).ready(function() {
    $(".nav-drop").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
    $("#add_work").submit(function( event ) {
        var check = data_check('#txtFromDate','#txtToDate')
        console.log(check);
        if(check)
        {
            $('.alert').remove();
            return;
        }
        else
        {
            $('.alert').remove();
            $("#txtToDate").after("<span class='alert red'>วันที่ส่งงานน้อยกว่าวันที่เริ่มงาน</span>");
        }
        event.preventDefault();
    });
});
</script>