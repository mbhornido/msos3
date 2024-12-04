<!-- <div id="global-loader">
<div class="whirly-loader"> </div>
</div> -->
    
<div class="main-wrapper">

    <div class="header">

    <div class="header-left active">
    <a href="{{url('summary')}}" class="logo">
    <img src="{{asset('/images/logo.png')}}" alt="">
    </a>
    <a href="{{url('summary')}}" class="logo-small">
    <img src="{{asset('img/logo-small.png')}}" alt="">
    </a>
    <a id="toggle_btn" href="javascript:void(0);">
    </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <span class="bar-icon">
    <span></span>
    <span></span>
    <span></span>
    </span>
    </a>

    <ul class="nav user-menu">

    <li class="nav-item">
        <div class="top-nav-search">
            <a href="javascript:void(0);" class="responsive-search">
                <i class="fa fa-search"></i>
            </a>
            <form action="#">
                <div class="searchinputs">
                <input type="text" placeholder="Search Here ...">
                <div class="search-addon">
                <span><img src="{{asset('img/icons/closes.svg')}}" alt="img"></span>
                </div>
                </div>
                <a class="btn" id="searchdiv"><img src="{{asset('img/icons/search.svg')}}" alt="img"></a>
            </form>
        </div>
    </li>


        <li class="nav-item dropdown has-arrow flag-nav">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
            <img src="{{asset('img/flags/us1.png')}}" alt="" height="20">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
        <a href="javascript:void(0);" class="dropdown-item">
            <img src="{{asset('img/flags/us.png')}}" alt="" height="16"> English
        </a>
        {{-- <a href="javascript:void(0);" class="dropdown-item">
            <img src="{{asset('img/flags/fr.png')}}" alt="" height="16"> French
        </a>
        <a href="javascript:void(0);" class="dropdown-item">
            <img src="{{asset('img/flags/es.png')}}" alt="" height="16"> Spanish
        </a>
        <a href="javascript:void(0);" class="dropdown-item">
            <img src="{{asset('img/flags/de.png')}}" alt="" height="16"> German
        </a> --}}
    </div>
    </li>


    {{-- <li class="nav-item dropdown">
    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
    <img src="{{asset('img/icons/notification-bing.svg')}}"  alt="img"> <span class="badge rounded-pill">4</span>
    </a>
    <div class="dropdown-menu notifications">
    <div class="topnav-dropdown-header">
    <span class="notification-title">Notifications</span>
    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
    </div>
    <div class="noti-content">
    <ul class="notification-list">
    <li class="notification-message">
    <a href="activities.html">
    <div class="media d-flex">
    <span class="avatar flex-shrink-0">
    <img alt="" src="{{asset('img/profiles/avatar-02.jpg')}}" >
    </span>
    <div class="media-body flex-grow-1">
    <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
    </div>
    </div>
    </a>
    </li>
    <li class="notification-message">
    <a href="activities.html">
    <div class="media d-flex">
    <span class="avatar flex-shrink-0">
    <img alt="" src="{{asset('img/profiles/avatar-03.jpg')}}" >
    </span>
    <div class="media-body flex-grow-1">
    <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
    </div>
    </div>
    </a>
    </li>
    <li class="notification-message">
    <a href="activities.html">
    <div class="media d-flex">
    <span class="avatar flex-shrink-0">
    <img alt="" src="{{asset('img/profiles/avatar-06.jpg')}}">
    </span>
    <div class="media-body flex-grow-1">
    <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
    </div>
    </div>
    </a>
    </li>
    <li class="notification-message">
    <a href="activities.html">
    <div class="media d-flex">
    <span class="avatar flex-shrink-0">
    <img alt="" src="{{asset('img/profiles/avatar-17.jpg')}}">
    </span>
    <div class="media-body flex-grow-1">
    <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
    <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
    </div>
    </div>
    </a>
    </li>
    <li class="notification-message">
    <a href="activities.html">
    <div class="media d-flex">
    <span class="avatar flex-shrink-0">
    <img alt="" src="{{asset('img/profiles/avatar-13.jpg')}}">
    </span>
    <div class="media-body flex-grow-1">
    <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
    <p class="noti-time"><span class="notification-time">2 days ago</span></p>
    </div>
    </div>
    </a>
    </li>
    </ul>
    </div>
    <div class="topnav-dropdown-footer">
    <a href="activities.html">View all Notifications</a>
    </div>
    </div>
    </li> --}}

    <li class="nav-item dropdown has-arrow main-drop">
    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
    <span class="user-img"><img src="{{ asset('logo/' . Auth::user()->logo) }}" alt="">
    <span class="status online"></span></span>
    </a>
    <div class="dropdown-menu menu-drop-user">
    <div class="profilename">
    <div class="profileset">
    <span class="user-img"><img src="{{ asset('logo/' . Auth::user()->logo) }}" alt="">
    <span class="status online"></span></span>
    <div class="profilesets">
    <h6>{{ Auth::user()->name }}</h6>
    <h5>Admin</h5>
    </div>
    </div>
    <hr class="m-0">
    <a class="dropdown-item" href="{{url('profile')}}"> <i class="me-2" data-feather="user"></i> My Profile</a>
    <a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a>
    <hr class="m-0">
    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
    @csrf
        <a class="dropdown-item logout pb-0" href="{{ route('logout') }}"
        onclick="event.preventDefault(); this.closest('form').submit();">
            <img src="{{ asset('img/icons/log-out.svg') }}" class="me-2" alt="img"> Logout
        </a>
    </form>
        
    </div>
    </div>
    </li>
    </ul>


    <div class="dropdown mobile-user-menu">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
    <div class="dropdown-menu dropdown-menu-right">
    <a class="dropdown-item" href="{{url('profile')}}">My Profile</a>
    <a class="dropdown-item" href="generalsettings.html">Settings</a>
    <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
    </div>
    </div>

</div>


<!-- ==================================================================== -->

<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu"> 
<ul>
<li>
<a href="{{url('summary')}}"><img src="{{asset('img/icons/dashboard.svg')}}" alt="img"><span> Dashboard</span> </a>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{asset('img/icons/product.svg')}}" alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
<ul>

<li><a href="{{url('add_product')}}">Add Product</a></li>
<li><a href="{{url('view_category')}}">Add Category</a></li>
<li><a href="{{url('view_size')}}">Add Size</a></li>
<li><a href="{{url('view_payment')}}">Add Tracking</a></li>

<li><a href="{{url('view_product')}}">Product List</a></li>
<li><a href="{{url('display_category')}}">Category List</a></li>
<li><a href="{{url('display_size')}}">Size List</a></li>
<li><a href="{{url('display_tracking')}}">Tracking List</a></li>

</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{asset('img/icons/sales1.svg')}}" alt="img"><span> Sales</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="{{url('admin_orders')}}">Order List</a></li>
<li><a href="{{url('order_product')}}">Total Orders</a></li>
<li><a href="{{url('to_pay')}}">To pay</a></li>
<li><a href="{{url('to_ship')}}">To ship</a></li>
<li><a href="salesreturnlists.html">To receive</a></li>
<li><a href="createsalesreturns.html">Delivered</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{asset('img/icons/purchase1.svg')}}" alt="img"><span> Chat and Support</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="{{url('admin_chat')}}">Chat</a></li>
<li><a href="addpurchase.html">Add Announcement</a></li>
</ul>
</li>
<!-- 
    <li class="submenu">
    <a href="javascript:void(0);"><img src="{{asset('img/icons/expense1.svg')}}" alt="img"><span> Expense</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="expenselist.html">Expense List</a></li>
    <li><a href="createexpense.html">Add Expense</a></li>
    <li><a href="expensecategory.html">Expense Category</a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="{{asset('img/icons/quotation1.svg')}}" alt="img"><span> Quotation</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="quotationList.html">Quotation List</a></li>
    <li><a href="addquotation.html">Add Quotation</a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="{{asset('img/icons/transfer1.svg')}}" alt="img"><span> Transfer</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="transferlist.html">Transfer List</a></li>
    <li><a href="addtransfer.html">Add Transfer </a></li>
    <li><a href="importtransfer.html">Import Transfer </a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="{{asset('img/icons/return1.svg')}}" alt="img"><span> Return</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="salesreturnlist.html">Sales Return List</a></li>
    <li><a href="createsalesreturn.html">Add Sales Return </a></li>
    <li><a href="purchasereturnlist.html">Purchase Return List</a></li>
    <li><a href="createpurchasereturn.html">Add Purchase Return </a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="{{asset('img/icons/users1.svg')}}" alt="img"><span> People</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="customerlist.html">Customer List</a></li>
    <li><a href="addcustomer.html">Add Customer </a></li>
    <li><a href="supplierlist.html">Supplier List</a></li>
    <li><a href="addsupplier.html">Add Supplier </a></li>
    <li><a href="userlist.html">User List</a></li>
    <li><a href="adduser.html">Add User</a></li>
    <li><a href="storelist.html">Store List</a></li>
    <li><a href="addstore.html">Add Store</a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="{{asset('img/icons/places.svg')}}" alt="img"><span> Places</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="newcountry.html">New Country</a></li>
    <li><a href="countrieslist.html">Countries list</a></li>
    <li><a href="newstate.html">New State </a></li>
    <li><a href="statelist.html">State list</a></li>
    </ul>
    </li>
    <li>
    <a href="components.html"><i data-feather="layers"></i><span> Components</span> </a>
    </li>
    <li>
    <a href="blankpage.html"><i data-feather="file"></i><span> Blank Page</span> </a>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><i data-feather="alert-octagon"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="error-404.html">404 Error </a></li>
    <li><a href="error-500.html">500 Error </a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><i data-feather="box"></i> <span>Elements </span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="sweetalerts.html">Sweet Alerts</a></li>
    <li><a href="tooltip.html">Tooltip</a></li>
    <li><a href="popover.html">Popover</a></li>
    <li><a href="ribbon.html">Ribbon</a></li>
    <li><a href="clipboard.html">Clipboard</a></li>
    <li><a href="drag-drop.html">Drag & Drop</a></li>
    <li><a href="rangeslider.html">Range Slider</a></li>
    <li><a href="rating.html">Rating</a></li>
    <li><a href="toastr.html">Toastr</a></li>
    <li><a href="text-editor.html">Text Editor</a></li>
    <li><a href="counter.html">Counter</a></li>
    <li><a href="scrollbar.html">Scrollbar</a></li>
    <li><a href="spinner.html">Spinner</a></li>
    <li><a href="notification.html">Notification</a></li>
    <li><a href="lightbox.html">Lightbox</a></li>
    <li><a href="stickynote.html">Sticky Note</a></li>
    <li><a href="timeline.html">Timeline</a></li>
    <li><a href="form-wizard.html">Form Wizard</a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><i data-feather="bar-chart-2"></i> <span> Charts </span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="chart-apex.html">Apex Charts</a></li>
    <li><a href="chart-js.html">Chart Js</a></li>
    <li><a href="chart-morris.html">Morris Charts</a></li>
    <li><a href="chart-flot.html">Flot Charts</a></li>
    <li><a href="chart-peity.html">Peity Charts</a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><i data-feather="award"></i><span> Icons </span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
    <li><a href="icon-feather.html">Feather Icons</a></li>
    <li><a href="icon-ionic.html">Ionic Icons</a></li>
    <li><a href="icon-material.html">Material Icons</a></li>
    <li><a href="icon-pe7.html">Pe7 Icons</a></li>
    <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
    <li><a href="icon-themify.html">Themify Icons</a></li>
    <li><a href="icon-weather.html">Weather Icons</a></li>
    <li><a href="icon-typicon.html">Typicon Icons</a></li>
    <li><a href="icon-flag.html">Flag Icons</a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><i data-feather="columns"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
    <li><a href="form-input-groups.html">Input Groups </a></li>
    <li><a href="form-horizontal.html">Horizontal Form </a></li>
    <li><a href="form-vertical.html"> Vertical Form </a></li>
    <li><a href="form-mask.html">Form Mask </a></li>
    <li><a href="form-validation.html">Form Validation </a></li>
    <li><a href="form-select2.html">Form Select2 </a></li>
    <li><a href="form-fileupload.html">File Upload </a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><i data-feather="layout"></i> <span> Table </span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="tables-basic.html">Basic Tables </a></li>
    <li><a href="data-tables.html">Data Table </a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="{{asset('img/icons/product.svg')}}" alt="img"><span> Application</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="chat.html">Chat</a></li>
    <li><a href="calendar.html">Calendar</a></li>
    <li><a href="email.html">Email</a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="{{asset('img/icons/time.svg')}}" alt="img"><span> Report</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="purchaseorderreport.html">Purchase order report</a></li>
    <li><a href="inventoryreport.html">Inventory Report</a></li>
    <li><a href="salesreport.html">Sales Report</a></li>
    <li><a href="invoicereport.html">Invoice Report</a></li>
    <li><a href="purchasereport.html">Purchase Report</a></li>
    <li><a href="supplierreport.html">Supplier Report</a></li>
    <li><a href="customerreport.html">Customer Report</a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="{{asset('img/icons/users1.svg')}}" alt="img"><span> Users</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="newuser.html">New User </a></li>
    <li><a href="userlists.html">Users List</a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="{{asset('img/icons/settings.svg')}}" alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="generalsettings.html">General Settings</a></li>
    <li><a href="emailsettings.html">Email Settings</a></li>
    <li><a href="paymentsettings.html">Payment Settings</a></li>
    <li><a href="currencysettings.html">Currency Settings</a></li>
    <li><a href="grouppermissions.html">Group Permissions</a></li>
    <li><a href="taxrates.html">Tax Rates</a></li>
    </ul>
    </li> -->
</ul>
</div>
</div>
</div>
