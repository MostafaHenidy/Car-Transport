<head>
    <meta charset="UTF-8">
    <title>Customer Support Dashboard</title>
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
    <style>
        .container {
            max-width: 800px;
        }

        .card {
            border-radius: 0.5rem;
            border: 1px solid #dee2e6;
            box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
            background-color: #1c1e21;
            /* dark card background */
            color: #f8f9fa;
            /* light text */
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card-header {
            background-color: #6c757d !important;
            /* secondary */
            color: #ffffff;
            font-weight: 600;
            border-bottom: 1px solid #dee2e6;
            border-radius: 0.5rem 0.5rem 0 0 !important;
        }

        .status-badge {
            padding: 0.4em 0.8em;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 0.25rem;
            color: #fff;
        }

        .bg-open {
            background-color: #17a2b8;
        }

        .bg-answered {
            background-color: #ffc107;
        }

        .bg-closed {
            background-color: #dc3545;
        }

        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .ticket-content {
            line-height: 1.7;
        }

        .reply-card {
            border-left: 3px solid #0d6efd;
        }

        .agent-reply {
            border-left: 3px solid #28a745;
        }

        .reply-form textarea {
            background-color: #2a2d31;
            border: 1px solid #6c757d;
            color: #f8f9fa;
            transition: all 0.3s;
        }

        .reply-form textarea:focus {
            background-color: #343a40;
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .reply-form textarea::placeholder {
            color: #adb5bd;
        }

        .dropdown-menu {
            background-color: #212529;
            border: 1px solid #6c757d;
        }

        .dropdown-item {
            color: #f8f9fa;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: #495057;
            color: white;
        }

        .ticket-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #6c757d;
        }

        .attachment-badge {
            background-color: #343a40;
            color: #f8f9fa;
            cursor: pointer;
            transition: all 0.2s;
        }

        .attachment-badge:hover {
            background-color: rgba(13, 110, 253, 0.2);
            transform: translateY(-2px);
        }

        .timestamp {
            font-size: 0.85rem;
            color: #ced4da;
        }

        .no-replies {
            text-align: center;
            padding: 30px 20px;
            color: #adb5bd;
            border: 1px dashed #6c757d;
            border-radius: 0.5rem;
            background-color: #1e1e1e;
        }

        .btn-outline-light {
            color: #f8f9fa;
            border-color: #f8f9fa;
        }

        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .back-btn {
            background: linear-gradient(135deg, #343a40, #0c2a4d);
            border: none;
            transition: all 0.3s;
        }

        .back-btn:hover {
            transform: translateX(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .reply-btn {
            background: linear-gradient(135deg, #0d6efd, #3a56c7);
            border: none;
            transition: all 0.3s;
        }

        .reply-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.4);
        }

        .section-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #0d6efd, #198754);
            border-radius: 3px;
        }

        .status-dropdown .btn {
            transition: all 0.3s;
        }

        .status-dropdown .btn:hover {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
    </style>
</head>
