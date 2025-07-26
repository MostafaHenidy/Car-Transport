<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('assets-front/img/logo.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('assets-front/img/logo.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('assets-front/img/logo.png') }}" sizes="48x48" />
    <meta name="author" content="Holger Koenemann">
    <meta name="generator" content="Eleventy v2.0.0">
    <meta name="HandheldFriendly" content="true">
    <title>Capodanno</title>
    <link rel="stylesheet" href="{{ asset('assets-front') }}/css/theme.min.css">
    @livewireStyles
    <style>
        /* inter-300 - latin */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-300.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-300.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        /* inter-400 - latin */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-regular.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-regular.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-500.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-500.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-700.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-700.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <style>
        .carousel-item {
            transition: transform 1s ease-in-out, opacity 1s ease-in-out;
        }
    </style>
    <style>
        .notification-card {
            transition: background-color 0.5s ease;
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
        .rating {
            display: inline-block;
            unicode-bidi: bidi-override;
            direction: rtl;
        }

        .star-icon {
            color: #6c757d;
            cursor: pointer;
            transition: all 0.2s ease;
            margin: 0 2px;
        }

        .star-icon:hover,
        .star-icon:hover~.star-icon,
        .star-icon.active,
        .star-icon.active~.star-icon {
            color: #ffc107;
            /* Yellow color for filled stars */
        }

        .star-icon:hover {
            transform: scale(1.2);
            /* Slightly enlarge on hover */
        }
    </style>
    <style>
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .profile-header {
            height: 120px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .profile-body {
            padding-top: 70px;
            position: relative;
            margin-bottom: 20px;
        }

        .profile-stats {
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-weight: 600;
            font-size: 1.2rem;
        }

        .stat-label {
            color: #777;
            font-size: 0.9rem;
        }

        .btn-edit {
            /* position: absolute; */
            /* top: 20px;
            right: 20px; */
            background-color: white;
            color: #764ba2;
            border: none;
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
