<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>>@yield('title','Titulo')</title>
        <!--begin::Accessibility Meta Tags-->
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=yes"
        />
        <meta name="color-scheme" content="light dark" />
        <meta
            name="theme-color"
            content="#007bff"
            media="(prefers-color-scheme: light)"
        />
        <meta
            name="theme-color"
            content="#1a1a1a"
            media="(prefers-color-scheme: dark)"
        />
        <!--begin::Accessibility Features-->
        <!-- Skip links will be dynamically added by accessibility.js -->
        <meta name="supported-color-schemes" content="light dark" />
        <link rel="preload" href="{{ asset('admin/dist/css/adminlte.min.css') }}" as="style" />
        <!--end::Accessibility Features-->
        <!--begin::Fonts-->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
            integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
            crossorigin="anonymous"
            media="print"
            onload="this.media='all'"
        />
        <!--end::Fonts-->
        <!--begin::Third Party Plugin(OverlayScrollbars)-->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
            crossorigin="anonymous"
        />
        <!--begin::Font-awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!--end::Font-awesome-->




        <!--end::Third Party Plugin(OverlayScrollbars)-->
        <!--begin::Third Party Plugin(Bootstrap Icons)-->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
            crossorigin="anonymous"
        />
        <!--end::Third Party Plugin(Bootstrap Icons)-->
        <!--begin::Required Plugin(AdminLTE)-->
        <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}" />
        <!--end::Required Plugin(AdminLTE)-->
        @yield('styles')
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
        <!--begin::App Wrapper-->
        <div class="app-wrapper">
            <!--begin::Header-->
            @include('admin.layouts.header')
            <!--end::Header-->
            <!--begin::Sidebar-->
            @include('admin.layouts.sidebar')
            <!--end::Sidebar-->
            <!--begin::App Main-->
            <main class="app-main">
                <!--begin::App Content Header-->
                <div class="container-fluid">
                    @include('admin.layouts.messages')
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="app-content-title">@yield('title','Titulo')</h3>
                        </div>
                    </div>

                </div>
                <div class="app-content-header">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        @yield('content')

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::App Content Header-->

            </main>
            <!--end::App Main-->
            <!--begin::Footer-->
            @include('admin.layouts.footer')
            <!--end::Footer-->
        </div>
        <!--end::App Wrapper-->
        <!--begin::Script-->
        <!--begin::Third Party Plugin(OverlayScrollbars)-->
        <script
            src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
            crossorigin="anonymous"
        ></script>
        <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            crossorigin="anonymous"
        ></script>
        <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
            crossorigin="anonymous"
        ></script>
        <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
        <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
        <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
        <script>
            const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
            const Default = {
                scrollbarTheme: "os-theme-light",
                scrollbarAutoHide: "leave",
                scrollbarClickScroll: true,
            };
            document.addEventListener("DOMContentLoaded", function () {
                const sidebarWrapper = document.querySelector(
                    SELECTOR_SIDEBAR_WRAPPER
                );
                if (
                    sidebarWrapper &&
                    OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined
                ) {
                    OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                        scrollbars: {
                            theme: Default.scrollbarTheme,
                            autoHide: Default.scrollbarAutoHide,
                            clickScroll: Default.scrollbarClickScroll,
                        },
                    });
                }
            });
        </script>
        <!--end::OverlayScrollbars Configure--><!-- Image path runtime fix -->
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                // Find the link tag for the main AdminLTE CSS file.
                const cssLink = document.querySelector(
                    'link[href*="css/adminlte.css"]'
                );
                if (!cssLink) {
                    return; // Exit if the link isn't found
                }

                // Extract the base path from the CSS href.
                // e.g., from "../css/adminlte.css", we get "../"
                // e.g., from "./css/adminlte.css", we get "./"
                const cssHref = cssLink.getAttribute("href");
                const deploymentPath = cssHref.slice(
                    0,
                    cssHref.indexOf("css/adminlte.css")
                );

                // Find all images with absolute paths and fix them.
                document
                    .querySelectorAll('img[src^="/assets/"]')
                    .forEach((img) => {
                        const originalSrc = img.getAttribute("src");
                        if (originalSrc) {
                            const relativeSrc = originalSrc.slice(1); // Remove leading '/'
                            img.src = deploymentPath + relativeSrc;
                        }
                    });
            });
        </script>
        <!--begin::Bootstrap Tooltips-->
        <script>
            const tooltipTriggerList = document.querySelectorAll(
                '[data-bs-toggle="tooltip"]'
            );
            tooltipTriggerList.forEach((tooltipTriggerEl) => {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });
        </script>
        <!--end::Bootstrap Tooltips-->
        <!--begin::Bootstrap Toasts-->
        <script>
            const toastTriggerList = document.querySelectorAll(
                '[data-bs-toggle="toast"]'
            );
            toastTriggerList.forEach((btn) => {
                btn.addEventListener("click", (event) => {
                    event.preventDefault();
                    const toastEle = document.getElementById(
                        btn.getAttribute("data-bs-target")
                    );
                    const toastBootstrap =
                        bootstrap.Toast.getOrCreateInstance(toastEle);
                    toastBootstrap.show();
                });
            });
        </script>
        <!--end::Bootstrap Toasts-->
        <!--end::Script-->
        @yield('scripts')
    </body>
    <!--end::Body-->
</html>
