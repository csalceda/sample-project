<nav class="navbar navbar-expand-lg navbar-dark bg-primary main-nav">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/sra/logo_1.png" width="60" height="60" class="d-inline mr-2" alt="">
            St. Rose Academy Inc.</a>
        <button class="navbar-toggler" onclick="openNav()">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="justify-content-end" id="main-nav-links">
            <ul class="navbar-nav mx-4" data-aos="fade-down" data-aos-duration="1000">
                <li class="nav-item">
                    <a class="nav-link" href="/"><span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about"><span>About</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/notices"><span>Announcements</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span>Gallery</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact"><span>Contact Us</span></a>
                </li>
            </ul>
        </div>

        {{-- Responsive Nav --}}
        <div class="responsive-nav-links" id="responsive-nav-links">
            <div class="row">
                <div class="col">
                    <span class="responsive-close" onclick="closeNav()">&times;</span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="list-group list-group-flush" data-aos="fade-down" data-aos-duration="1000">
                        <li class="list-group-item">
                            <a class="nav-link" href="/"><span>Home</span></a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link" href="/about"><span>About</span></a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link" href="/notices"><span>Announcements</span></a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link" href="#"><span>Gallery</span></a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link" href="/contact"><span>Contact Us</span></a>
                        </li>
                        <li class="list-group-item">
                            <a class="nav-link" href="/register">Student Registration</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    function openNav() {
    document.getElementById("responsive-nav-links").style.width = "100%";
    }

    function closeNav() {
    document.getElementById("responsive-nav-links").style.width = "0";
    }
</script>