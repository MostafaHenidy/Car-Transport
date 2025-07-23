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
    <style>
        .trip-cards-scroll {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            padding-bottom: 2rem;
            padding-left: 1rem;
            scrollbar-width: none;
            -ms-overflow-style: none;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .trip-cards-scroll:hover .trip-card {
            opacity: 0.7;
            filter: blur(2px);
            transition: opacity 0.3s ease, filter 0.3s ease;
        }

        .trip-cards-scroll::-webkit-scrollbar {
            display: none;
        }

        .trip-card {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            width: 300px;
            min-height: 520px;
            flex-shrink: 0;
            scroll-snap-align: start;
            border-radius: 1.5rem;
            background-color: #111;
            color: white;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease, z-index 0.3s ease;
            border: 2px solid transparent;
            z-index: 1;
            padding-bottom: 1rem;
        }

        .trip-card:hover {
            opacity: 1 !important;
            filter: none !important;
            transform: scale(1.12);
            border: 2px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 40px rgba(255, 255, 255, 0.2);
            z-index: 10;
        }



        .cart-btn-container {
            position: absolute;
            bottom: 1.5rem;
            left: 1.5rem;
            right: 1.5rem;
        }

        .trimmed-text {
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: block;
        }
    </style>
</head>
