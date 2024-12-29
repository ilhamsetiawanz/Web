<!-- resources/views/components/header.blade.php -->
<header class="container full-container w-full text-sm py-5 xl:px-9 px-5">
    <!-- ========== HEADER ========== -->
    <nav class="w-full flex items-center justify-between" aria-label="Global">
        <ul class="icon-nav flex items-center gap-4">
            <li class="relative xl:hidden">
                <a class="text-xl icon-hover cursor-pointer text-heading"
                    id="headerCollapse" data-hs-overlay="#application-sidebar-brand"
                    aria-controls="application-sidebar-brand" aria-label="Toggle navigation">
                    <i class="ti ti-menu-2 relative z-1"></i>
                </a>
            </li>
        </ul>
        <div class="flex items-center gap-4">
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                    <img class="object-cover w-9 h-9 rounded-full"
                        src="https://png.pngtree.com/png-clipart/20211023/ourlarge/pngtree-chili-spicy-logo-png-image_4002693.png"
                        alt="" aria-hidden="true" />
                </a>
            </div>
        </div>
    </nav>
    <!-- ========== END HEADER ========== -->
</header>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('application-sidebar-brand');
        const headerCollapse = document.getElementById('headerCollapse');

        headerCollapse.addEventListener('click', function(e) {
            e.preventDefault();
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('hidden');
        });

        // Close sidebar when clicking outside of it
        document.addEventListener('click', function(event) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnToggleButton = headerCollapse.contains(event.target);

            if (!isClickInsideSidebar && !isClickOnToggleButton && !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.add('hidden');
            }
        });
    });
</script>
@endpush