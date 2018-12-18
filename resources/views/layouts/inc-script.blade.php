<!-- all js here -->
        <script src="{{url('home/assets/js/vendor/jquery-3.2.1.min.js')}}"></script>


        <!-- Load Facebook SDK for JavaScript -->
        <!-- Load Facebook SDK for JavaScript -->
        <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="429034057231543"
  theme_color="#fa3c4c"
  logged_in_greeting="บจก.นครโคราช"
  logged_out_greeting="บจก.นครโคราช">
</div>


        <script src="{{url('home/assets/js/popper.js')}}"></script>
        <script src="{{url('home/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('home/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{url('home/assets/js/jquery.meanmenu.js')}}"></script>
        <script src="{{url('home/assets/js/plugins.js')}}"></script>
        <script src="{{url('home/assets/js/main.js')}}?v1.8"></script>



        <script>
                $(document).ready(function(){
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $(".post_sub").click(function(){
                        $.ajax({
                            /* the route pointing to the post function */
                            url: '{{url('post_subscribe')}}',
                            type: 'POST',
                            /* send the csrf-token and the input to the controller */
                            data: {_token: CSRF_TOKEN, email:$(".email_sub").val()},
                            dataType: 'JSON',
                            /* remind that 'data' is the response of the AjaxController */
                            success: function (data) {
                                $(".writeinfo2").append(data.msg);

                                if(data.status == 'success'){

                                  setTimeout(function() {
                                         $(".writeinfo2").empty()
                                  }, 2000);

                                }

                                setTimeout(function() {
                                     $(".writeinfo2").empty()
                                }, 3000);
                            }
                        });
                    });
               });
            </script>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126404865-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-126404865-1');
            </script>
