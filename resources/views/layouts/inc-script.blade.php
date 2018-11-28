<!-- all js here -->
        <script src="{{url('home/assets/js/vendor/jquery-3.2.1.min.js')}}"></script>
        <script src="{{url('home/assets/js/popper.js')}}"></script>
        <script src="{{url('home/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('home/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{url('home/assets/js/jquery.meanmenu.js')}}"></script>
        <script src="{{url('home/assets/js/plugins.js')}}"></script>
        <script src="{{url('home/assets/js/main.js')}}?v1.3"></script>

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
