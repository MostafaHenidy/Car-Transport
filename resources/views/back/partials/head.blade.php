<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets-front/img/logo.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('assets-front/img/logo.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('assets-front/img/logo.png') }}" sizes="48x48" />
    <style>
        body {
            background-color: #121212;
            color: #fff;
            margin: 0;
        }

        .sidebar {
            width: 260px;
            transition: width 0.3s ease, padding 0.3s ease;
        }

        .glass-sidebar {
            --bg-color: rgba(255, 255, 255, 0.05);
            --highlight: rgba(255, 255, 255, 0.1);
            --text: #ffffff;
            background: var(--bg-color);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-right: 1px solid var(--highlight);
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.4);
            height: 100vh;
            color: var(--text);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            overflow-x: hidden;
        }

        .sidebar.collapsed {
            width: 0 !important;
            padding: 0 !important;
        }

        .glass-content {
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .glass-content {
            opacity: 0;
        }

        #mainContent {
            transition: margin-left 0.3s ease;
            margin-left: 260px;
            padding: 2rem;
        }

        #mainContent.expanded {
            margin-left: 0 !important;
        }

        .toggle-btn {
            position: fixed;
            top: 10px;
            left: 260px;
            z-index: 1050;
            transition: left 0.3s ease;
        }

        .sidebar.collapsed+.toggle-btn {
            left: 10px;
        }

        .glass-content .nav-link {
            color: #ccc;
            padding: 10px 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .glass-content .nav-link:hover,
        .glass-content .nav-link.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                z-index: 999;
            }

            #mainContent {
                margin-left: 0 !important;
            }

            .toggle-btn {
                left: 10px !important;
            }
        }
    </style>
</head>
