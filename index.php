<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
?>
<?php
include_once "./header.php"
?>
<body>
    <section id="sidebar">
        <header>
            <?php
            include_once "./Php/config.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

            if (mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
            }
            ?>
            <div class="image-text">
                <span class="image">
                    <a href=""><img src="./Images/logo.jpeg" alt=""> </a>
                </span>

                <div class="text logo-text">
                    <span class="name">NODE EIGHT</span>
                    <span class="profession">HR System</span>
                </div>
            </div>
        </header>
        <ul class="side-menu">
            <li> <a href="#" class="active"><i class='bx bxs-dashboard icon'></i>
                    Dashboard</a>
            </li>
            <li> <a href="#"><i class='bx bxl-microsoft-teams icon'></i>
                    Teams<i class='bx bx-chevron-right icon-right'></i> </a>

                <ul class="side-dropdown">
                    <li> <a href="#"> <i class='bx bx-laptop icon'></i> Technical</a></li>
                    <li> <a href="#"> <i class='bx bx-movie-play icon'></i>Comm. & Media</a></li>
                    <li> <a href="#"> <i class='bx bx-dollar-circle icon'></i>Finance</a></li>
                    <li> <a href="#"> <i class='bx bxs-briefcase icon'></i>Venture</a></li>
                    <li> <a href="#"> <i class='bx bxs-hard-hat icon'></i>GreenLab</a></li>
                </ul>
            </li>

            <li> <a href="./Todo.php"><i class='bx bx-notepad icon'></i>
                    Todo List</a>
            </li>
            <li> <a href="./Reminder.php"><i class='bx bxs-bell-ring icon'></i>
                    Reminders</a>
            </li>

            <li> <a href="#"><i class='bx bxs-calendar icon'></i>
                    Calender<i class='bx bx-chevron-right icon-right'></i>
                </a>
                <ul class="side-dropdown">
                    <li> <a href="#"> <i class='bx bx-list-plus icon'></i> Tasks</a></li>
                    <li> <a href="./History.php"><i class='bx bx-history icon'></i>History</a></li>
                </ul>
            </li>

            <li> <a href="./Report.php"><i class='bx bxs-report icon'></i>
                    Reports </a>
            </li>

            <li> <a href="#"><i class='bx bx-log-out icon '></i>
                    Log Out </a>
            </li>
        </ul>

        <div class="ads">
            <div class="wrapper">
                <a href="./suggest.php" class="btn-upgrade">Suggestions</a>
                <p>Your Suggestions <span> Are Welcome!</span></p>
            </div>
        </div>
    </section>

    <section id="content">
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search.....">
                    <i class='bx bx-search icon'></i>
                </div>
            </form>
            <a href="#" class="nav-link">
                <i class='bx bxs-bell icon'></i>
                <span class="badge">8</span>
            </a>
            <a href="#" class="nav-link">
                <i class='bx bx-message-dots icon'></i>
                <span class="badge">4</span>
            </a>
            <span class="divider"></span>
            <div class="profile">
                <img src="Php/images/<?php echo $row['img'] ?>" alt="">

                <ul class="profile-link">
                    <li><a href="#"><i class='bx bxs-user-circle icon'></i>Profile</a></li>
                    <li><a href="#"><i class='bx bxs-cog'></i>Settings</a></li>
                    <li><a href="./Php/logout.php?logout_id = <?php echo $row['unique_id'] ?>"><i class='bx bx-log-out'></i>Logout</a></li>
                </ul>
            </div>
        </nav>
        <main>
            <h1 class="title">Dashboard</h1>
            <ul class="breadcrumbs">
                <li> <a href="#">Dashboard</a></li>
            </ul>
            <div class="info-data">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>2000</h2>
                            <p>Trainees</p>
                        </div>
                        <i class='bx bxs-group icon'></i>
                    </div>
                    <span class="progress" data-value="60%"></span>
                    <span class="label">60%</span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>10</h2>
                            <p>Workers</p>
                        </div>
                        <i class='bx bxs-hard-hat icon'></i>
                    </div>
                    <span class="progress" data-value="50%"></span>
                    <span class="label">50%</span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>15</h2>
                            <p>Pageviews</p>
                        </div>
                        <i class='bx bx-street-view icon'></i>
                    </div>
                    <span class="progress" data-value="75%"></span>
                    <span class="label">75%</span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>7</h2>
                            <p>Interns</p>
                        </div>
                        <i class='bx bxs-group down icon'></i>
                    </div>
                    <span class="progress" data-value="30%"></span>
                    <span class="label">30%</span>
                </div>
            </div>
            <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3>Financial Reports</h3>
                        <div class="menu">
                            <i class="bx bx-dots-horizontal-rounded icon"></i>
                            <ul class="menu-link">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Save</a></li>
                                <li><a href="#">Remove</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chart">
                        <div id="chart">

                        </div>
                    </div>
                </div>

                <section class="content-data">
                    <div class="head">
                        <h3>Daily Dose</h3>
                        <div class="menu">
                            <i class="bx bx-dots-horizontal-rounded icon"></i>
                            <ul class="menu-link">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Save</a></li>
                                <li><a href="#">Remove</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="quotes">
                        <header>Quote of the Day</header>
                        <div class="content">
                            <div class="quote-area">
                                <i class='bx bxs-quote-left'></i>
                                <p class="quote">Many of life's failures are people who did not realize how close they were to success when they gave up.</p>
                                <i class='bx bxs-quote-right'></i>
                            </div>
                            <div class="author">
                                <span>__</span>
                                <span class="name">Thomas A. Edison</span>
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="features">
                                <ul>
                                    <li class="sound"><i class='bx bxs-volume-full'></i></li>
                                    <li class="copy"><i class='bx bxs-copy'></i></li>
                                    <li class="twitter"><i class='bx bxl-twitter'></i></li>
                                </ul>
                                <button>New Quote</button>
                            </div>
                        </div>
                    </div>

            </div>

            </div>
            </div>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="./Javascript/index.js"></script>
</body>

</html>