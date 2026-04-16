<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-SHOP || DASHBOARD</title>
  
    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Admin UI micro-overrides — modern polish -->
    <style>
        :root { --admin-accent: #F7941D; --admin-accent-dark: #d97c10; }

        /* Sidebar — deep dark gradient */
        .bg-gradient-primary { background: linear-gradient(180deg, #1a1a2e 10%, #16213e 100%) !important; }
        .sidebar-brand { border-bottom: 1px solid rgba(255,255,255,.08); padding: 1.5rem 1rem; }
        .sidebar-brand-text { color: #fff !important; font-weight: 800; letter-spacing: 0.08em; }

        /* Sidebar nav items */
        .sidebar .nav-item .nav-link { border-radius: 6px; margin: 2px 10px; transition: all 0.2s; }
        .sidebar .nav-item .nav-link:hover { background: rgba(247,148,29,.18) !important; color: var(--admin-accent) !important; }
        .sidebar .nav-item.active .nav-link { background: rgba(247,148,29,.22) !important; color: var(--admin-accent) !important; }
        .sidebar .nav-item .nav-link i { color: rgba(255,255,255,.5); }
        .sidebar .nav-item:hover .nav-link i,
        .sidebar .nav-item.active .nav-link i { color: var(--admin-accent) !important; }

        /* Collapsible sidebar headings */
        .sidebar .sidebar-heading { color: rgba(255,255,255,.35) !important; font-size: 10px; letter-spacing: 0.12em; }

        /* Cards */
        .card { border: none; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,.06); }
        .card-header { border-radius: 12px 12px 0 0 !important; }

        /* Border-color accent cards */
        .border-left-primary { border-left-color: var(--admin-accent) !important; }

        /* Buttons */
        .btn-primary { background-color: var(--admin-accent) !important; border-color: var(--admin-accent) !important; border-radius: 6px; }
        .btn-primary:hover { background-color: var(--admin-accent-dark) !important; border-color: var(--admin-accent-dark) !important; }
        .btn-success { border-radius: 6px; }
        .btn-danger  { border-radius: 6px; }
        .btn-warning { border-radius: 6px; }
        .btn-info    { border-radius: 6px; }
        .btn-secondary { border-radius: 6px; }

        /* Tables */
        .table thead th { font-size: 11px; letter-spacing: .08em; text-transform: uppercase; font-weight: 700; }
        .table-bordered { border-radius: 8px; overflow: hidden; }

        /* Form controls */
        .form-control { border-radius: 6px; border-color: #e5e7eb; }
        .form-control:focus { border-color: var(--admin-accent); box-shadow: 0 0 0 0.2rem rgba(247,148,29,.2); }

        /* Topbar */
        .topbar { box-shadow: 0 1px 4px rgba(0,0,0,.06); }
        .topbar .nav-item .nav-link { color: #555; }
    </style>

    @stack('styles')
  
</head>