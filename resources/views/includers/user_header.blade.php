
<header>
        <div class="main_header">

            <nav class="top_header">
                    <div class="top_left">
                        <a href="{{url('search-order')}}">Track Order</a>
                        <a href="{{url('start_sell')}}">Start Selling</a>
                        <a href="{{asset('app/msosshop.apk')}}" download>Download</a>
                        <a href="https://www.facebook.com/profile.php?id=100086240330686"  target="_blank">Follow us on <i class="fa-brands fa-facebook"></i></a>

                    </div>
                    <div class="top_right">
                        <a href="{{url('faq')}}"><i class="fa-solid fa-circle-question"></i> Help</a>
                        <a href="{{url('developer')}}">Developers</a>
                        <a href="{{url('order_status')}}" class="tab_none">Profile</a>
                    </div>
                </nav>

                <section class="section_header">
                    <header class="header hide"> 
                    <a href="{{url('dashboard')}}" class="logo">
                        <img src="{{ asset('images/download2.png') }}" alt="">

                        <div class="logo_text">
                            <h3>MSOS</h3>
                            <p>Online Shop</p>
                        </div>
                    </a>
                        <div class="search-bar">
                            <form action="{{ url('search') }}" method="GET">
                                <input type="text" id="search-input" name="search" placeholder="Search for products..." value="{{ request('search') }}">
                                <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                            <div id="autocomplete-results" style="display: none;"></div>
                        </div>
                        <div class="header-icons">
                            <a href="{{url('mycart')}}" class="icon1"><i class="fa-solid fa-cart-shopping"></i><span>{{$count}}</span></a>
                            <a href="{{url('profile_edit')}}" class="icon"><i class="fa-solid fa-user"></i></a>
                        </div>
                    </header>
                    <div class="admin_categories hide">
                        @foreach($scategory as $scategory)
                            <a href="{{url('product_super',['superCategory' => $scategory->super_category]) }}">{{ $scategory->super_category }}</a>       
                        @endforeach
                    </div> 
                </section>
        </div>
</header>

    <script>
        $(document).ready(function () {
            $('#search-input').on('input', function () {
                let query = $(this).val();

                if (query.length >= 2) {
                    $.ajax({
                        url: "{{ url('autocomplete') }}",
                        data: { term: query },
                        success: function (data) {
                            let suggestions = data.map(title => `<li>${title}</li>`).join('');
                            $('#autocomplete-results').html(`<ul>${suggestions}</ul>`).show();
                        }
                    });
                } else {
                    $('#autocomplete-results').hide();
                }
            });

            $(document).on('click', function () {
                $('#autocomplete-results').hide();
            });

            $(document).on('click', '#autocomplete-results li', function () {
                let selectedValue = $(this).text();
                $('#search-input').val(selectedValue);
                $('#autocomplete-results').hide();
            });
        });
    </script>